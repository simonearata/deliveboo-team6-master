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

                      <a class="btn btn-1 btn-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>
                </div>
             </div>
        </div>



      </div>

{{-- <div class="box-right">
    <div class="dash-login">
        <div>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>  --}}

    <div class="box-right">
        <div class="card-login">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('Login effettuato con successo') }}
        </div>
    </div>

</div>


@endsection