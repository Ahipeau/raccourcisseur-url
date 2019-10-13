<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Url;



class UrlsController extends Controller
{
    //
    public function create() 
    {
     return view('welcome'); 
 
    }

    public function store() 
    {
        $url = request('url');
    //valider l'url
    $data = ['url'=>$url];
    $rules = ['url'=>'required|url'];
    $message= ['required'=>'Ce champ est requis', 'url'=>'URL invalide'];
    Validator::make($data, $rules,$message)->validate();
    

    // verifier si l'url a deja ete raccourcir et la retourner si tel est le cas
    $record= Url::where('url', $url)->first();

    if ($record) {
        return view('result')->withShortened($record->shortened);
    }
    //créer une nouvelle short url et la retourner


    $row = Url::create ([
        'url'=> $url,
        'shortened'=> Url::get_unique_short_url()
    ]);

    if ($row) {
        return view('result')->withShortened($row->shortened);
    }
    
    //Félicitations voici l'url raccourcir 
    }

    public function show($shortened) {
        $url= Url::whereShortened($shortened)->first();
        if (!$url) {
            return redirect ('/');
        } 
            return redirect($url->url);

    }


}
