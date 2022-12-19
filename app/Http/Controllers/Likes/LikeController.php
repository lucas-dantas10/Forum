<?php

namespace App\Http\Controllers\Likes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Likes;

class LikeController extends Controller
{
    private $likes;

    public function __construct(Likes $likes)
    {
        $this->likes = $likes;
    }

    public function create($idPost)
    {
        $this->likes->create([
            'user_id' => auth()->user()->id,
            'post_id' => $idPost,
            'stlike'   => 1
        ]);

        return redirect()->back();
    }
}
