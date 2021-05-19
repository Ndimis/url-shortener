<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Url;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;



class UrlsController extends Controller
{
    public function create(){
    	return view('welcome');
    }

    public function store(Request $request){
	    	// dd(request('url'));
		//1) valider l'url

		// $url = $request->url;
		
		 // Validator::make(compact('url'), 
		 // 	['url' => 'required|url'],
		 	//['url.required' => 'Vous devez fournir une URL', 'url.url' => 'URL invalide']
		 // )->validate();
		$this->validate($request, ['url' => 'required|url']);
		// if($validation->fails()){
		// 	dd('Failed');
		// }
		// else {
		// 	dd('succes');
		// }

		$record = $this->getRecordForUrl($request->url);

		//2) Vérifier si l'url a déja été raccourci
		//$record = Url::where('url',$url)->first();

		return view('result')->with('shortener', $record->shortener);

	}
    

    public function show($shortener) {
    
	    $url  = Url::where('shortener', $shortener)->firstOrFail();
	    return redirect($url->url);
	    // if(! $url) {
	    // 	return redirect('/');
	    // } else {
	    // 	return redirect($url->url);
	    // }

	}


	private function getRecordForUrl($url) {
		
		return Url::firstOrCreate(['url'=> $url],
			['shortener' => Url::getUniqueShortUrl()]
		);

		// $record = Url::where('url',$url)->first();

		// if($record) {
		// 	return view('result')->with('shortener', $record->shortener);
		// }
		// //3) Creer une nouvelle short url et la retouner
		// else {
		// return	Url::create([
		// 		'url' => $url,
		// 		'shortener' => Url::getUniqueShortUrl()
		// 	]);
		// }
		//4) Félicitation 

		// if($url2){
		// 	return view('result')->with('shortener', $url2->shortener);
		// }
		// else {
		// 	return redirect('/');
		// }
	}
}
