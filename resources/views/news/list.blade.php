@extends('layouts.app')

@section('content')
<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Noticias</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('create_new')}}" class="btn btn-sm btn-success">Regresar</a>
                </div>
              </div>
            </div>
            <div class="row">
              @foreach($news as $new)
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="images/{{$new->image}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$new->title}}</h5>
                  <p class="card-text">Publicado: {{$new->created_at}}</p>
                  <a href="new/{{$new->id}}" class="btn btn-primary">Ver noticia</a>
                </div>
              </div>
              @endforeach
           </div>
          </div>
@endsection
