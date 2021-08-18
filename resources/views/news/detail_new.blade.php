@extends('layouts.app')

@section('content')
<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">{{$new->title}}</h3>
                  <br>
                  <h4 class="mb-0">Creado por: {{$new->title}}</h4>
                </div>
                <div class="col text-right">
                  <h5 class="mb-0">Fecha Publicación: {{$new->created_at}}</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="container">
                <img src="/sitioNoticias/public/images/{{$new->image}}" style="width:90%">
              </div>
              <div class="container">
                <br>
                <p>{{$new->content}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <br>
              <div class="container">
                <h3 class="mb-0">Comentarios</h3>
                <br>
                <ul>
                  @foreach($comments as $comment)
                  <li>{{$comment->comment}}<br>
                    Creado por: {{{$comment->userid}}}<br>
                    <button onclick="openModal({{$comment->id}})" class="btn btn-sm btn-primary">Responder</button>
                  </li>
                  @endforeach
                </ul>

              </div>
              <div class="container">
                <h3 class="mb-0">Comentar</h3>
                <form class="" action="{{route('store_comment')}}" method="post">
                  @csrf
                  <textarea name="comment" id="comment" style="width:100%" ></textarea>
                  <input type="hidden" name="newid" id="newid" value="{{$new->id}}">
                  <button value="submit" class="btn btn-sm btn-warning">Comentar</button>
                </form>
              </div>
            </div>
            <div class="card-body">
           </div>
          </div>
@endsection
