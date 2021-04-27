<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




class PageController extends Controller
{
    
    private $weatherkey = "0d13bb1a4e9d2006d6fb589da3168f2e";

    public function home() {
        $ip = '90.64.198.108';
        $country_info = $this->getCountryInfo($ip);
        $details = $this->getIpInfo($ip);
        $forecast = json_decode( file_get_contents('http://api.openweathermap.org/data/2.5/weather?units=metric&q='. $details->city .'&appid=' . $this->weatherkey) );
        $status = $forecast->weather[0]->main;
        $temp = $forecast->main->temp;
        // return $forecast;
        return view('home', [
            'city'      => $details->city,
            'status'    => $status,
            'temp'      => $temp,
            'forecast'  => $forecast
        ]);
    }

    public function location(Request $request) {
        $ip = '90.64.198.108';
        $details = $this->getIpInfo($ip);
        $country_info = $this->getCountryInfo($ip);

        return view('location', [
            'ip'   => $ip,
            'gps'   => $details->loc,
            'city'  => $details->city,
            'country'    => $details->country,
            'capital'   => $country_info->capital
        ]);
    }

    private function getCountryInfo($ip) {

        $details = $this->getIpInfo($ip);
        return json_decode( file_get_contents("https://restcountries.eu/rest/v2/alpha?codes={$details->country}") )[0];
    }

    private function getIpInfo($ip) {
        $details = json_decode( file_get_contents("http://ipinfo.io/{$ip}/json") );

        return $details;
    }


}
