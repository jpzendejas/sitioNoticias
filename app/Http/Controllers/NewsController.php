<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\Comment;
use File;


class NewsController extends Controller
{
   public function index(){
     $news = News::orderBy('id')->paginate(10);
     return view('news.index', compact('news'));
   }

   public function createNew(){
     return view('news.create');
   }

   public function storeNew(Request $request){
     $user_id = Auth::user()->id;
     $rules = [
       'title'=>'required',
       'content'=>'required',
       'image'=>'required'
     ];
     $this->validate($request, $rules);

     $destinationPath = public_path('/images/');
     $image = $request->file('image');
     $image_name = $image->getClientOriginalName();
     $image->move($destinationPath, $image_name);


     $new = new News();
     $new->title = $request->title;
     $new->content = $request->content;
     $new->image = $image_name;
     $new->userid = $user_id;
     $new->save();

     $notification = array(
        'message' =>'Noticia creada correctamente',
        'alert-type' => 'success'
      );

     return back()->with($notification);
   }

   public function newsIndex(){
     $news = News::orderBy('id', 'desc')->get();
     return view('news.list', compact('news'));
   }

   public function getNew(Request $request, $id){
     if ($id) {
       $comments = Comment::where('newid', $id)->get();
       $new = News::where('id', $id)->first();
       return view('news.detail_new',compact('new', 'comments'));
     }
   }
}
