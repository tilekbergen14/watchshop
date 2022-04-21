<?php

namespace App\Http\Controllers;

use App\Models\Watch;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $watches = null;
        $search = $request->search ?? null;
        if($search){
            $watches = Watch::query()->where('name', 'like', "%$request->search%")->paginate(10);
        }else{
            $watches = Watch::paginate(10);
        }
        return view("welcome", ["watches" => $watches, "search" => $search]);
    }
}
