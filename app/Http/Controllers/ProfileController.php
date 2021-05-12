<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user) {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postsCount = Cache::remember('count.posts.' . $user->id , now()->addSeconds(30), function () use($user) {
            return $user->posts->count();
        });
        $followersCount = Cache::remember('count.followers.' . $user->id , now()->addSeconds(30), function () use($user) {
            return $user->profile->followers->count();
        });
        $followingCount = Cache::remember('count.following.' . $user->id , now()->addSeconds(30), function () use($user) {
            return $user->following->count();
        });

        return view('profiles.index', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user) {
        // $this->authorize('update', $user->profile);
        if (! Gate::allows('update', $user->profile)) {
            abort(403);
        }
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user) {
        // $this->authorize('update', $user->profile);
        if (! Gate::allows('update', $user->profile)) {
            abort(403);
        }
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
            'url' => 'url',
            'image' => ''
        ]);

        if(request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect("/profile/{$user->id}");
    }
}
