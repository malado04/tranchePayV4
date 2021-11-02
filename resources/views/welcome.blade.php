<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/logo.css')}}" rel="stylesheet" type="text/css">


        
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Se connecter</a>
                        @if (Route::has('register'))
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            S'inscrire
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <!-- <h5 class="modal-title" id="exampleModalLabel">Vous vous s'inscrivez en tant que:</h5> -->
                     <img src="{{asset ('image/logo.jpeg')}}" class="logo  " style="margin-left:45%;" alt="">

                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <a href="{{ route('register') }}">
                                        <button type="button" class="btn btn-warning form-control">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                       Client</button>
                                      </a>
                                    </div>
                                    <div class="col-md-6">
                                      <a href="{{ url('/registercommercant') }}">
                                        <button type="button" class="btn btn-warning form-control">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                         Commercant</button>
                                      </a>
                                    </div>
                                  </div>

                                    
                                </div>
                                <div class="modal-footer">
                                  <a href="{{ url('/') }}" >
                                    <button type="button" class="btn btn-danger">Annuler</button>
                                  </a>
                                </div>
                              </div>
                            </div>        
                        @endif
                    @endauth
                </div>
            @endif


<script src="{{asset ('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset ('js/bootstrap.min.js')}}"></script>

    </body>
</html>
