<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link type="text/css" href="{{asset('js/toastr.min.css')}}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrase') }}</a>
                                </li>
                            @endif
                        @else
                            @if(Auth::user()->employeeid)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('news') }}">{{ __('Noticias') }}</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('news_index') }}">{{ __('Noticias') }}</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Responder comentario:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('add_answer') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"autofocus readonly>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="created_at" class="col-md-4 col-form-label text-md-right">{{ __('Fecha / Hora Comentario') }}</label>

                <div class="col-md-6">
                    <input id="created_at" type="text" class="form-control{{ $errors->has('created_at') ? ' is-invalid' : '' }}" name="created_at" value="{{ old('created_at') }}" autofocus readonly>

                    @if ($errors->has('created_at'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('created_at') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="commenttext" class="col-md-4 col-form-label text-md-right">{{ __('Comentario') }}</label>

                <div class="col-md-6">
                    <input id="commenttext" type="text" class="form-control{{ $errors->has('commenttext') ? ' is-invalid' : '' }}" name="commenttext" value="{{ old('commenttext') }}" readonly>

                    @if ($errors->has('commenttext'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('commenttext') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <input type="hidden" name="commentid" id="commentid" value="">

            <div class="form-group row">
                <label for="answer" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta') }}</label>

                <div class="col-md-6">
                    <textarea id="answer" class="form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}" name="answer" value="{{ old('answer') }}" required></textarea>

                    @if ($errors->has('answer'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('answer') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-warning">
                        {{ __('Responder') }}
                    </button>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
  <script src="{{asset('js/toastr.min.js')}}"></script>
</body>
<script>
function openModal(commentid){
  $.ajax({
    method:'GET',
    dataType:"json",
    url:"/sitioNoticias/public/get_comment_info/"+commentid,
    success:function(response){
      setCommentInfo(response);
    }
  })

}
function setCommentInfo(response){
  $('#name').val(response.userid)
  $('#created_at').val(response.created_at)
  $('#commenttext').val(response.comment)
  $('#commentid').val(response.id)
  $('#exampleModalCenter').modal('show');
}
</script>
<script>
toastr.options = {
"closeButton": false,
"debug": false,
"newestOnTop": false,
"progressBar": false,
"positionClass": "toast-top-left",
"preventDuplicates": false,
"onclick": null,
"showDuration": "300",
"hideDuration": "1000",
"timeOut": "5000",
"extendedTimeOut": "1000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut"
}
@if(Session::has('message'))
var type = "{{ Session::get('alert-type', 'info') }}";
switch(type){
  case 'info':
  toastr.info("{{ Session::get('message') }}");
  break;

  case 'warning':
  toastr.warning("{{ Session::get('message') }}");
  break;

  case 'success':
  toastr.success("{{ Session::get('message') }}");
  break;

  case 'error':
  toastr.error("{{ Session::get('message') }}");
  break;
}
@endif
</script>
</html>
