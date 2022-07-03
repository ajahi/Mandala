<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use App\Jobs\ApiJob;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('apicall',function(){
    {
        $location=[
            'london','tokyo','paris','berlin','new york'
        ];
        $retive_data=array();
        for($i=0;$i<sizeof($location);$i++){
            $js=HTTP::get('https://api.openweathermap.org/data/2.5/weather?&q='.$location[$i].'&appid='.(env('OPEN_APP_ID')))->json();
          array_push($retive_data,$js['weather'][0]['main']);
        }
        $data=[
            'tokyo'=>$retive_data[1],
            'london'=>$retive_data[0],
            'paris'=>$retive_data[2],
            'berlin'=>$retive_data[3],
            'newyork'=>$retive_data[4],
            'date'=>Carbon::today()->toDateString()
        ];
            
        dispatch(new ApiJob($data));
        
    }
})->purpose('call api every 6 hour');