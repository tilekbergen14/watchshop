<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Watch;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Watch $watch, Request $request){
        if(!$request->user()){
            return redirect()->route("login");
        }
        $watch->comments()->create([
            "body" => $request->body,
            "user_id" => $request->user()->id
        ]);
        return back();
    }
    public function delete(Comment $comment, Request $request){
        if($request->user()->id === $comment->user->id){
            $comment->delete();
        }
        return back();
    }
}
