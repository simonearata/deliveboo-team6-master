@extends('layouts.app')

@section('content')

    <div class="dashboardd">

        <div class="box-left">

            {{-- <div class="logo"><span>immagine ristoratore</span></div> --}}
            <div class="content-video">
              <video class="ristoratore-logo logo" poster="/video/pizza-backend.gif" autoplay loop muted></video>
            </div><!--/content-video-->


            <h3 class="title-benvenuto"><span class="span-benvenuto">Benvenuto/a</span>
              <span>{{ Auth::user() -> name }}!</span>
            </h3>



              {{-- <li class="nav-item dropdown">
               <h3>Benvenuto/a</h3><a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a> </li>--}}

             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
              >
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>




            {{-- <a href=" {{ route('admin.dishes.index') }} " class="btn btn-success">Mostra menù</a> --}}

            <div class="contenitore-btn-sinistra">
                <div class="list-btn-sinistra">
                    <div class="bottoni-sinistra">
                         {{-- <a class="nav-link" href=" {{ route('admin.restaurants.index') }} ">I tuoi ristoranti per favore</a> --}}
                          <a class="btn btn-1" href=" {{ route('admin.restaurants.index') }} ">I tuoi ristoranti </a>

                          <a class="btn btn-1" href=" {{ route('admin.restaurants.create') }} ">Aggiungi ristorante</a>

                          <a class="btn btn-1" href=" {{ route('admin.dishes.create') }} ">Aggiungi piatto</a>

                          <a class="btn btn-1 btn-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                          </a>
                    </div>
                 </div>
            </div>



          </div>

          <div class="box-right">
                @if (session('deleted'))
                    <div class="alert alert-success" role="alert">
                        <span>Il piatto: <strong> {{ session('deleted') }}</strong> è stato eliminato correttamente</span>
                    </div>
                @endif

                <h1>I miei piatti</h1>

                <div class="container-box-restaurant">
                    <div class="restaurants-index" style="margin-bottom: 120px" >
                        @foreach ($dishes as $dish)
                        @if ($dish->restaurant_id===$restaurant->id)
                        <div class="restaurant-card-index post">

                          <div class="cover-card ">
                            @if ($dish->cover)
                              <img src="{{asset('storage/'. $dish->cover)}}" alt="{{$dish->name}}" style="width: 150px">
                            @endif
                          </div>

                          <div class="title-restaurant-card">
                            <h1>{{ $dish->name }}</h1>
                          </div>

{{--                           <ul>
                            <li>Ingredienti: {{ $dish->ingredients }}</li>
                            <li>Prezzo: {{ $dish->price}}</li>

                            <li>Visibile: {{ $dish->visible }}</li>
                          </ul> --}}

                          <div >
                            <span class="ingredients">Ingredienti: {{ $dish->ingredients }}</span>
                          </div>
                          
                          <div>
                            <h5>Prezzo: {{ $dish->price}}</h5>
                          </div>

                          <div>
                            <h5>Visibile: {{ $dish->visible }}</h5>
                          </div>

                          <div class="action-restaurant-card">


                          </div>

                          <div class="action-restaurant-menu">

                          </div>

                        </div>
                        @endif
                      @endforeach
                    </div>
                </div>
         </div>

    </div>


@endsection
