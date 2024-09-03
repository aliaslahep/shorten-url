<?php

namespace App\Http\Controllers;

use App\Models\UrlLogs;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LogController extends Controller
{
    
    public function logs() {
        
        $url_log = UrlLogs::leftJoin('users','url_logs.user_id','=','users.id')
                    ->select('url_logs.ip_address', 'url_logs.user_id', 'url_logs.url', 'users.name', DB::raw('count(*) as total_count'), DB::raw('max(url_logs.time) as last_seen'))
                    ->groupBy('url_logs.ip_address', 'url_logs.user_id', 'url_logs.url', 'users.name')
                    ->get();


        return view('url.log',[

            'url_logs' => $url_log,

        ]);

    }
}
