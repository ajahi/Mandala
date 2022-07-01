<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function edit(rc $rc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rc $rc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function destroy(rc $rc)
    {
        //
    }

    public function calllist(){
        $js=HTTP::get('https://api.openweathermap.org/data/2.5/weather?&q=Kathmandu&appid='.(env('OPEN_APP_ID')))->json();
        
    $location=[
        'london','tokyo','paris','berlin','newyork'
    ];
    $retive_data=array();
    for($i=0;$i<sizeof($location);$i++){
        $js=HTTP::get('https://api.openweathermap.org/data/2.5/weather?&q='.$location[$i].'&appid='.(env('OPEN_APP_ID')))->json();
        array_push($retive_data,array($js['weather'][0]['main'],$js['name']));
    }
     return serialize($retive_data);
    }

    public function testfunc(){
        $js=HTTP::get('https://api.openweathermap.org/data/2.5/weather?&q=Kathmandu&appid='.(env('OPEN_APP_ID')))->json();
        // return $js['weather'][0]['main'];
        return $js['name'];
    }
}
