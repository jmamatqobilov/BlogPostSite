<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function allPost(){

        $comments = Comment::all();


        $user_ids = $comments->pluck('user_id');
        $users = User::whereIn('id', $user_ids)->get();
        $comments = $comments->map(function($comment) use ($users){
            $comment->{"user"} = $users[$comment->user_id];
            return $comment;
        });
        
        // $commentsCollection = array_map(function(){},$comments);

        // $comments = $comments->map(function($comment){
        //     $comment->{"user"} = User::find($comment->user_id);
        //     return $comment;
        // });
        return view('blog.all', ['comments' => $comments]);
    }




    

   
    
    public function commentstore(Request $request)
    {
        try {
            Comment::create([
                'user_id' => auth()->id(),
                'body'=>$request->body,
                'application_id'=>$request->application_id,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        return redirect('/');
    }

}
