<?php

namespace App\Http\Controllers\Likes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Likes;
use App\Notifications\Notifications;

class LikeController extends Controller
{
    private $likes;

    public function __construct(Likes $likes)
    {
        $this->middleware('auth');
        $this->likes = $likes;
    }

    public function loadLikes(Request $request)
    {
        $like = $this->likes->where('post_id', $request->idPost)->get();

        return response()->json($like);
    }

    public function likes(Request $request)
    {
        $like = $this->likes->create([
            'user_id' => auth()->user()->id,
            'post_id' => $request->idPost,
            'stlike'   => 1
        ]);

        $author = $like->post->user;
        $author->notify(new Notifications($like));
    }
}
