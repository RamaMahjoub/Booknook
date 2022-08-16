<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\AdminInformation;
use App\Models\Comment;
use App\Models\CustomerInformation;
use App\Models\LibraryBook;
use App\Models\User;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    use ApiResponder;

    public function __construct()
    {
        $this->middleware('auth:api')->except('index');
    }

    public function index(LibraryBook $book)
    {
        $comments = Comment::where('book_id', $book->id)->get();
        return $this->okResponse(CommentResource::collection($comments), 'All comments');
    }

    public function store(Request $request, LibraryBook $book)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse(null, $validator->errors()->toJson());
        }

        $comment = new Comment();
        $comment->value = $request->value;
        $comment->book_id = $book->id;
        $comment->user_id = Auth::id();
        $comment->save();

        return $this->okResponse(null, 'comment added successfully');
    }

    public function update(Request $request, Comment $comment)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse(null, $validator->errors()->toJson());
        }

        $comment->update([
            'value' => $request->value
        ]);

        return $this->okResponse(null, 'comment updated successfully');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return $this->okResponse(null, 'deleted is done');
    }
}
