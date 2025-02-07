<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemEvent;

class SystemEventController extends Controller
{
    public function index(Request $request){
        $events = SystemEvent::paginate(50);
        return view('home', ['Events' => $events]);
    }
}
