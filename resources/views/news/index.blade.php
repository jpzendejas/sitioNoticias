@extends('layouts.app')

@section('content')
<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Noticias</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('create_new')}}" class="btn btn-sm btn-success">Nueva noticia</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush" id="datos">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Contenido</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Fecha de Creación</th>
                    <th scope="col">Creador</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($news as $new)
                  <tr>
                    <th scope="row">
                      {{$new->title}}
                    </th>
                    <td>{{$new->content}}</td>
                    <td>{{$new->image}}</td>
                    <td>{{$new->created_at}}</td>
                    <td>{{$new->userid}}</td>
                    <td>
                      <!-- <button class="btn btn-sm btn-success" >Ver Ciudadano</button> -->

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-body">
              {{$news->links()}}
           </div>
          </div>
@endsection
