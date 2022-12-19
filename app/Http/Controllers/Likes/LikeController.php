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

    public function create($idPost)
    {
        $like = $this->likes->firstOrCreate([
            'user_id' => auth()->user()->id,
            'post_id' => $idPost,
            'stlike'   => 1
        ]);

        $author = $like->post->user;
        $author->notify(new Notifications($like));

        return redirect()->back();
    }
}
