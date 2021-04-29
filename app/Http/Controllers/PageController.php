<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class PageController extends Controller
{
    
    private $weatherkey = "0d13bb1a4e9d2006d6fb589da3168f2e";

    public function home(Request $request) {
        $ip = $request->ip();
        
        // $ip = '90.64.198.108';
        $this->checkLog($ip);
        $country_info = $this->getCountryInfo($ip);

        if( !$country_info ) {
            return view('home', [
                'notfound'  => true
            ]);
        }

        $details = $this->getIpInfo($ip);
        $forecast = json_decode( file_get_contents('http://api.openweathermap.org/data/2.5/weather?units=metric&q='. $details->city .'&appid=' . $this->weatherkey) );
        $status = $forecast->weather[0]->main;
        $temp = $forecast->main->temp;

        return view('home', [
            'city'      => $details->city,
            'status'    => $status,
            'temp'      => $temp,
            'forecast'  => $forecast
        ]);
    }

    public function location(Request $request) {
        $ip = $request->ip();
        $this->checkLog($ip);

        $details = $this->getIpInfo($ip);
        if( !$details ) {
            return view('location', [
                'notfound'  => true
            ]);
        }

        $country_info = $this->getCountryInfo($ip);

        return view('location', [
            'ip'   => $ip,
            'gps'   => $details->loc,
            'city'  => $details->city,
            'country'    => $details->country,
            'capital'   => $country_info->capital
        ]);
    }

    public function stats(Request $request) {
        
        $ip = $request->ip();
        // $ip = '90.64.198.108';

        $this->checkLog($ip);

        $logs = DB::table('logs')->groupBy('country')->selectRaw('country, sum(visits) as visits')->get();

        return view('stats', [
            'logs'  => $logs
        ]);
    }

    private function getCountryInfo($ip) {

        $details = $this->getIpInfo($ip);
        if( $details ) {
            return json_decode( file_get_contents("https://restcountries.eu/rest/v2/alpha?codes={$details->country}") )[0];
        }

        return false;
    }

    private function getIpInfo($ip) {
        $details = json_decode( file_get_contents("http://ipinfo.io/{$ip}/json") );
        if( isset($details->bogon) ) {
            return false;
        }

        return $details;
    }

    private function checkLog($ip) {
        $country_info = $this->getCountryInfo($ip);

        $log = Log::where('ip', $ip)->first();

       
        if( !$country_info ) {
            if( !$log ) {
                $log = new Log();
                $log->ip = $ip;
                $log->visits = 1;
                $log->country = null;
                $log->city = null;
                $log->save();
            }
    
            if( $log->isLoggable() ) {
                $log->visits += 1;
                $log->save();
            }
            
        }

        $details = $this->getIpInfo($ip);

        if( !$log ) {
            $log = new Log();
            $log->ip = $ip;
            $log->visits = 1;
            $log->country = $details->country;
            $log->city = isset($details->city) ? $details->city : null;
            $log->save();
        }

        if( $log->isLoggable() ) {
            $log->visits += 1;
            $log->save();
        }
    }

}
