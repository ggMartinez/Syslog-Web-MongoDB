<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemEvent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SystemEventController extends Controller
{
    public function index(Request $request){
        $hosts = $this -> getHosts();
        $tags = $this -> getTags();
        $events = $this -> getLogEvents($request);
        return view('home', ['Events' => $events, 'Hosts' => $hosts, 'Tags' => $tags]);
    }


    private function getLogEvents($request){
        return SystemEvent::query()
        ->when($request->filled('host'), function ($query) use ($request) {
            $query->where('FromHost', $request->host);
        })
        ->when($request->filled('tag'), function ($query) use ($request) {
            $query->where('SysLogTag', $request->tag);
        })
        ->when($request->filled('message'), function ($query) use ($request) {
            $query->where('Message', "like" ,"%" . $request->message . "%");
        })
        ->paginate(50);

    }

    private function getHosts(){
        if(Cache::has('hosts'))
            return Cache::get('hosts');
        
        $hosts = DB::table('system_events')->distinct("FromHost")->get();
       
        Cache::put('hosts', $hosts, 300);
        return $hosts;
    }

    private function getTags(){
        if(Cache::has('tags'))
            return Cache::get('tags');
        
        
        $tags = DB::table('system_events')->distinct("SysLogTag")->get();
        Cache::put('tags', $tags, 300);
        return $tags;
    }
}
