<?php

namespace App\Http\Controllers;

use App\Events\RedisRealTimeEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(){
        //phpinfo();
        //echo Redis::get('lee');
        //Redis::publish('redis-real-time', json_encode(['foo' => 'bar']));


        event(new RedisRealTimeEvent('redis-real-time', serialize(['lee' => 'name'])));
        return view('welcome');
    }

}

