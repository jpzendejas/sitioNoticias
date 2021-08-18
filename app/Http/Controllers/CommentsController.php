<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentsController extends Controller
{
    public function storeComment(Request $request){
      $user_id = Auth::user()->id;
      $rules = [
        'comment'=>'required',
        'newid'=>'required'
      ];
      $this->validate($request, $rules);

      $comments = new Comment();
      $comments->comment = $request->comment;
      $comments->newid = $request->newid;
      $comments->userid = $user_id;
      $comments->save();
      $notification = array(
         'message' =>'Comentario creado correctamente',
         'alert-type' => 'success'
       );

      return back()->with($notification);
    }

    public function get_comments_info($id){
      if ($id) {
        $comment = Comment::where('id',$id)->first();
        return $comment;
      }
    }
}
