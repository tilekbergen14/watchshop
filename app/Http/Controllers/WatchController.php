<?php

namespace App\Http\Controllers;
use App\Models\Watch;
use Illuminate\Http\Request;

class WatchController extends Controller
{
    public function index(Watch $watch, Request $request){
        return view("watch.index", ["watch" => $watch]);
    }
}