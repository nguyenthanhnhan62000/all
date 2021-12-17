<?php

namespace App\Http\Controllers;

use Goutte\Client;


use App\Models\law;
use Illuminate\Http\Request;

class LawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 
    public function test()
    {
        // $url = "https://thuvienphapluat.vn/page/BangGiaDat.aspx?city=32&district=0&street=0&pricerange=0-99999&P=59";
        // $client = new Client();
        // $page = $client->request('get',$url);
        // // echo "<pre>";
        // // print_r($page);

        // $page->filter('.info-top')->text();


    }
  
    public function index()
    {
        $laws = Law::all();
        return view('index', compact('laws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $law = new Law;
        $law->content = $request->content;
        $law->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\law  $law
     * @return \Illuminate\Http\Response
     */
    public function show(law $law)
    {
        $content = $law->content;

        $data = strripos($content, 'luật');
        
        // dd($data);
        return view('view', compact('law'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\law  $law
     * @return \Illuminate\Http\Response
     */
    public function edit(law $law)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\law  $law
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, law $law)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\law  $law
     * @return \Illuminate\Http\Response
     */
    public function destroy(law $law)
    {
        //
    }
}
