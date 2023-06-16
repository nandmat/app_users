<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCommentRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $model;
    protected $user;

    public function __construct(Comment $comment, User $user)
    {
        $this->model = $comment;
        $this->user = $user;
    }

    public function index(Request $request, $userId)
    {
        if(!$user = $this->user->find($userId))
        {
            return redirect()->back();
        }

        $comments = $user->comments()
                            ->where('body', 'LIKE', "%{$request->search}%")
                            ->get();

        return view('users.comments.index', [
            'comments' => $comments,
            'user' => $user
        ]);
    }

    public function create($userId)
    {
        if(!$user = $this->user->find($userId))
        {
            return redirect()->back();
        }

        return view('users.comments.create', [
            'user' => $user
        ]);
    }

    public function store($userId, StoreUpdateCommentRequest $request)
    {
        if(!$user = $this->user->find($userId))
        {
            return redirect()->back();
        }


        $user->comments()->create([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comment.index', ['id' => $userId]);
    }

    public function edit($id)
    {
        if(!$comment = $this->model->find($id))
        {
            return redirect()->back();
        }

        return view('users.comments.edit', [
            'comment' => $comment,
            'user' => $comment->user
        ]);
    }

    public function update(StoreUpdateCommentRequest $request, $id)
    {
        if(!$comment = $this->model->find($id))
        {
            return redirect()->back();
        }

        $comment->update([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comment.index', ['id' => $comment->user_id]);
    }
}
