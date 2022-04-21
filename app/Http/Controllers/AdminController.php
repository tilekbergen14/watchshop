<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Watch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use SebastianBergmann\Environment\Console;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(function ($request, $next) {
            if(!Auth::user()->isadmin){
                return redirect()->route('home');
            }
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        $watches = null;
        $search = $request->search ?? null;
        if($search){
            $watches = Watch::query()->where('name', 'like', "%$request->search%")->paginate(10);
        }else{
            $watches = Watch::paginate(10);
        }
       
        return view('admin.watches', ["watches" => $watches, "search" => $search]);
    }

    public function createwatchget(Request $request)
    {
        $watch = null;
        if($request->id){
            $watch = Watch::find($request->id);
        }
        return view('admin.createwatch', ["watch" => $watch]);
    }

    public function createwatchpost(Request $request)
    {
        $this->validate($request, [
            'name' => "required|max:255",
            'price' => "required|max:255",
        ]);
        $imagePath = $request->existedImage ?? null;
        if ($request->image) {
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg|max:3072',
            ]);
            $imageName = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/thumbnails'), $imageName);
            if($imagePath){
                File::delete(public_path($imagePath));
            }
            $imagePath = "/images/thumbnails/" . $imageName;
        }
        $watch = Watch::find($request->id);
        if($watch){
            $request->name !== $watch->name && $watch->name = $request->name;
            $request->price !== $watch->price && $watch->price = $request->price;
            $request->description !== $watch->description &&  $watch->description = $request->description;
            $request->released_year !== $watch->released_year &&  $watch->released_year = $request->released_year;
            $request->country !== $watch->country &&  $watch->country = $request->country;
            $request->type !== $watch->type && $watch->type = $request->type;
            $imagePath !== $watch->image && $watch->image = $imagePath;
            $watch->update();
            return redirect()->route("admin");
        }
        Watch::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'released_year' => $request->released_year,
            'country' => $request->country,
            'type' => $request->type,
            'image' => $imagePath,
        ]);
        return back();
    }

    public function deletewatch(Request $request){
        Watch::find($request->id)->delete();
        return back();
    }

    /******** user actions *********/
    public function users(Request $request)
    {
        $users = null;
        $search = $request->search ?? null;
        if($search){
            $users = User::query()->where('name', 'like', "%$request->search%")->paginate(10);
        }else{
            $users = User::paginate(10);
        }
        return view('admin.users', ["users" => $users, "search" => $search]);
    }

    
    public function deleteUser(User $user){
        $user->delete();
        return back();
    }
    public function makeAdmin(User $user){
        if( !$user->isadmin){
            $user->isadmin = true;
        }else{
            $user->isadmin = false;
        }
        $user->save();
        return back();
    }
}
