<?php

namespace App\Http\Controllers;


use App\Models\Urls;

use Illuminate\Http\Request;

use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


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


        

        $j = 0;

        for($i=65;$i<=122;$i++) {

            if($i>90 && $i<97){
            
                continue;
            
            } else {
            
                $char_arr[$j++] = chr($i);
            
            }
        }
        
        for($i=0;$i<10;$i++) {
            $char_arr[$j++] = $i;
        }


        $string = "";

        $j=0;

        while(1){
        
            for($i=0;$i<62**(4+$j);$i++) {

                $taken_char = Arr::random($char_arr,(4+$j));

                $string = implode("",$taken_char);

                if(Urls::where('shorten_url',$string)->get()->isEmpty()) {

                    $urls->shorten_url = url('/').'/'.$string;

                    break;

                } else {

                    $string ="";
                }
            
            }  
            
            if($string == "") {

                $j++;

            } else {

                break;
            }

        }
        

        $urls->url = $url;

        $urls->created_by = auth()->id();

        $urls->save();

        $total_urls = Urls::get();
        
        $user_urls = Urls::where('created_by',auth()->id())->get();

        return view('url.show',[

            'total_urls' => $total_urls,
        
        ]);

    }

    public function list() {

        $total_urls = Urls::get();
        
        return view("url.show",[

            'total_urls' => $total_urls,

        ]);
    }
}
