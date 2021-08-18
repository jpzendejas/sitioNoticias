@extends('layouts.app')

@section('content')
<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Crear Noticia</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('news')}}" class="btn btn-sm btn-success">Inicio</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('store_new') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                      <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>

                      <div class="col-md-6">
                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}"autofocus required>

                          @if ($errors->has('title'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('title') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Contenido') }}</label>

                      <div class="col-md-6">
                          <textarea id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" value="{{ old('content') }}" required autofocus></textarea>

                          @if ($errors->has('content'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('content') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                      <div class="col-md-6">
                          <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required>

                          @if ($errors->has('image'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('image') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-warning">
                              {{ __('Crear Noticia') }}
                          </button>
                      </div>
                  </div>
              </form>

           </div>
          </div>
@endsection
