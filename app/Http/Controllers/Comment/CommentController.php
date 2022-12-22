<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Notifications\PostComment;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store(Request $request)
    {
        $comment = $this->comment->firstOrCreate([
            'title' => $request->title,
            'body'  => $request->body,
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id
        ]);

        $author = $comment->post->user;
        $author->notify(new PostComment($comment));

        return redirect()
                ->route('post.show', $comment->post_id)
                ->withSuccess('Comentário realizado com sucesso!');
    }
}
