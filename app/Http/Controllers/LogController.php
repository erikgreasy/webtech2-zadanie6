<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function getByCountry($country) {
        $logs = Log::groupBy('city')->selectRaw('city, sum(visits) as visits')->where('country', $country)->get();
        return view('country', [
            'logs'  => $logs
        ]);
    }
}
