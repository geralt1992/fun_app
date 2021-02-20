<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

Use Alert;
use App\content;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show_main_page(){

        //RAČUNA BROJA DUPLIKATA UNUTAR STUPCA
        $table =  DB::table('contents')
        ->select('contents.*',DB::raw('COUNT(nabijem_koga) as count'))
        ->groupBy('nabijem_koga')
        ->orderBy('count' , 'desc')
        ->take(5)
        ->get();

        return view('main')->with('table' , $table);
    }
    

    public function show_disclaimer(){
        return view('disclaimer');
    }


    public function store_adress_for_newsletter(Request $request){

        //RECAPTCHA PRTOECTION! 
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = '6LcI9OIZAAAAAFM3_N1urxIyf4XkDZuMzfvZD3To';
        $recaptcha_response = $request->recaptcha_response;
        //dd($recaptcha_response);
        
        // Make and decode POST request:
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($recaptcha);
       
        //dd($recaptcha);
        if ($recaptcha->score >= 0.5) {
            $email = new email;
            $email->visitor_email = $request->save_mail;
            $email->save();
            
            sleep(2);
            
            return redirect()->route('main')->with('success',  'Vaš E-mail je uspješno pohranjen!');
        }else {
            return dd('Vi ste robot, molim da se udaljite sa stranice!');
        }
        }


    public function save_infos(Request $request){

        $validator = Validator::make($request->all(),
        [
          'who'   => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'),
          'whome'   => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'),
          'why'   => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'),
        ]);

        if($validator->fails()){
            Alert::error('Nešto si zeznio', 'Ne koristi: + - ( ) * / _ # $');
            return redirect()->route('show_main_page')->withInput()->withErrors($validator);
        }

          //RECAPTCHA PRTOECTION! 
          $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
          $recaptcha_secret = '6LcI9OIZAAAAAFM3_N1urxIyf4XkDZuMzfvZD3To';
          $recaptcha_response = $request->recaptcha_response;
          //dd($recaptcha_response);
          
          // Make and decode POST request:
          $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
          $recaptcha = json_decode($recaptcha);
         
          //dd($recaptcha);
          if ($recaptcha->score >= 0.5) {


            $content_for_save = new content;

            $random_number = rand(1, 1000000);
    
            if(empty($request->who)){
                $content_for_save->user = "guest" .$random_number;
            }else{
                $content_for_save->user = $request->who;
            }
           
            $content_for_save->nabijem_koga = $request->whome;
            $content_for_save->nabijem_zbog = $request->why;
    
            $content_for_save->save();
    
            Alert::success('Uspješno spremljeno!');
            return redirect()->route('show_second_page' , [$request->whome]);
              
              
          }
          else {
              return dd('Vi ste robot, molim da se udaljite sa stranice!');
          }
    }


    public function show_second($word){
        
        $results = DB::table('contents')->where('nabijem_koga' , $word)->orderBy('created_at' , 'desc')->paginate(16);
        $count = DB::table('contents')->where('nabijem_koga' , $word)->count();

        return view('second')->with('results' , $results)->with('name' , $word)->with('count' , $count);
    }

    
    public function search(Request $request){

        $validator = Validator::make($request->all(),
        [
          'whome'   => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'),
          'why'   => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'),
        ]);

        if($validator->fails()){
            return redirect()->route('show_main_page')->withInput()->withErrors($validator);
        }

/*

        $find = DB::table('contents');

        //$count =  $find->select( DB::raw("(SELECT count(contents.user) where user = ) as count_number"))->get();


        $count = DB::table('contents')->where('nabijem_koga', 'LIKE' , '%' .$request->ime . '%')->count();
        dd($count);

//->where('nabijem_koga', 'LIKE' , '%' .$request->ime . '%')->count()

*/

//coutn tablica ovo sad i ako nije staviomo ono s upitnikom unutra ? ili @if(number == 0)  i onda da rezervni rez to je count tablica koja biljezi koliko jer usera po imenu nabijeno
//spojis ih relathionshipovima

        $userBuilder = DB::table('contents');

        if( !empty($request->ime)){
            $userBuilder = $userBuilder->where('nabijem_koga', 'LIKE' , '%' .$request->ime . '%');
        }

        if( !empty($request->razlog)){
            $userBuilder = $userBuilder->where('nabijem_zbog' , 'LIKE' , '%' . $request->razlog . '%');
        }

        $search_results = $userBuilder
        ->select('contents.id' , 'contents.nabijem_zbog' , 'contents.nabijem_koga' , 'contents.created_at' ,
        DB::raw("(SELECT count(contents.nabijem_koga) where nabijem_koga =  '$request->ime'   ) as number"))
        ->groupBy('contents.nabijem_koga')
        ->orderBy('contents.created_at' , 'desc')->paginate(12);

        $no_results = 'Nažalost nema rezultata pretrage. Pokušajte s drugom ključnom riječi ili drugim imenom!';
        
        if(count($search_results) <= 0){
            return view('mid')->with('no_results' , $no_results);
        }else{
            return view('mid')->with('search_results' , $search_results);
        }
    }



    
    public function get_api(){

        $data = DB::table('contents')->get();
        return response()->json($data);
    }


    public function play(){
        return view('PLAY');
    }

}
