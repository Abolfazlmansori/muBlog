<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommendStatus;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class CommentController extends Controller
{
    public function comments()
    {
        $comments = Comment::query()->orderByRaw('FIELD(status,
            "'.CommendStatus::Draft->value.'",
            "'.CommendStatus::Approved->value.'",
            "'.CommendStatus::Rejected->value.'")'
        )->paginate(10);
        return view("admin.comments.index",compact('comments'));
    }

    #[NoReturn] public function StoreComment(Request $request)
    {
        $body = $request->get('body');
        Comment::query()->create([
            'body' => $body,
            'user_id' => auth()->user()->id,
            'article_id' => $request->get('article_id'),
        ]);
        return response()->json(['success' => 'بعد از تایید مدیر نظر شما نمایش داده خواهد شد!']);
    }

    public function approvedComments(Comment $comment)
    {
        $comment->update([
            'status' => CommendStatus::Approved->value
        ]);
        return redirect()->back()->with('success','نظر تایید شد ');
    }

    public function rejectComments(Comment $comment)
    {
        $comment->update([
            'status' => CommendStatus::Rejected->value
        ]);
        return redirect()->back()->with('success','نظر رد شد ');
    }
}
