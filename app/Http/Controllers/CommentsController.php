<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function comment(Request $request){
        $validatedData = $request->validate([
            'article_id'=> 'required',
            'body'=> 'required|string',
        ]);
        Comment::create([
            'user_id' => Auth::id(),
            'article_id' => $validatedData['article_id'],
            'body' => $validatedData['body']
        ]);

        return back();
    }

    public function delete($id){
        $comment = Comment::findOrFail($id);
        $comment -> delete();
        return redirect()->route('articles.show')->with('delete', 'commentaire supprimé avec succes');
    }

}
