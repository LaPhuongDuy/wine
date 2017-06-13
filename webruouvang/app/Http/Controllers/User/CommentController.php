<?php

namespace App\Http\Controllers\User;

use App\Events\NewComment;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if ($request->user_id != Null) {
            $comment = Comment::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'content' => $request->conten,
            ]);

            broadcast(new NewComment($comment))->toOthers();

            return $comment;
        }
    }
}
