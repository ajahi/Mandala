<?php

namespace App\Jobs;



use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Exception;

class ApiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * 
     */

    protected array $input;
    public function __construct($data)
    {
        $this->input=$data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
       try{
        Post::create($this->input);
       }catch(Exception $e){
        Log::error('error occured'.$e->getMessage());
       }
       
    }
}
