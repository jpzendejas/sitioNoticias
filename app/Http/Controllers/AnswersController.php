<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Answer;


class AnswersController extends Controller
{
    public function add_answers(Request $request){
      $user_id = Auth::user()->id;

      $rules = [
        'answer'=>'required',
        'commentid'=>'required'
      ];
      $this->validate($request, $rules);

      $answers = new Answer();
      $answers->answer = $request->answer;
      $answers->commentid = $request->commentid;
      $answers->userid = $user_id;
      $answers->save();
    }
}
