<?php

namespace App\Http\Controllers;


use App\Models\Urls;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class UrlController extends Controller
{
    
    public function create() {
        
        return view('url.create');

    }

    public function store (Request $request) {

        $validator = Validator::make($request->all(),[

            'url' => 'required|min:2|unique:urls',              

        ]);

        if($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        
        }

        $url = $request->url;

        $urls = new Urls();

        $start  = 0*(26**3)+0*(26**2)+0*26+0;

        for($j=$start;;$j++) {
            
            $short_url2 ="bitly/";

            $r = ($j%26)+1;

            $q = (int)($j/26);

            $short_url2 = $short_url2.chr(64+(($q/26)/26)%26 +1).chr(64+ (($q/26)%26)+1).chr(64+ ($q%26)+1).chr(64+ $r); 
            
            if(Urls::where('shorten_url',$short_url2)->get()->isEmpty()) {

                $urls->shorten_url = $short_url2;

                break;
            }   

        }

        $urls->url = $url;

        $urls->created_by = auth()->id();

        $urls->save();

        return view('dashboard');

    }

    public function show() {

        $total_urls = Urls::count();
        
        $user_urls = Urls::where('created_by',auth()->id())->get();
        
        return view("url.show",[

            'total_urls' => $total_urls,

            'user_urls' => $user_urls,
        ]);
    }
}
