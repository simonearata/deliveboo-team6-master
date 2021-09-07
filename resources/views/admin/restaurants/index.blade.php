@extends('layouts.app')

@section('content')

  <div class="dashboardd">

    <div class="box-left">

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



      <div class="contenitore-btn-sinistra">
          <div class="list-btn-sinistra">
              <div class="bottoni-sinistra">
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
                <span>Il ristorante: <strong> {{ session('deleted') }}</strong> è stato eliminato correttamente</span>
            </div>
         @endif

        <h1>I miei ristoranti</h1>

        {{-- @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                <span> <strong>{{ session('deleted') }}</strong> eliminato correttamente</span>
            </div>
         @endif --}}
    <div class="container-box-restaurant">
      <div class="restaurants-index" style="margin-bottom: 120px" >
        @foreach ($restaurants as $restaurant)
          <div class="restaurant-card-index post">

            <div class="cover-card  " style="text-align: center">
              @if ($restaurant->cover)
                <img src="{{asset('storage/'. $restaurant->cover)}}" alt="{{$restaurant->restaurant_name}}" style="width: 150px">
              @endif
            </div>

            <div class="title-restaurant-card">
              <h1>{{ $restaurant->restaurant_name }}</h1>
            </div>

            <div>
              <h5><span>Indirizzo: </span>{{ $restaurant->address }}</h5>
            </div>

            <div>
              <h5><span>Partita iva: </span>{{ $restaurant->p_iva }}</h5>
            </div>

            <div class="action-restaurant-card">
                <a href=" {{ route('admin.restaurants.show', $restaurant) }} " class="btn btn-eye"><i class="fas fa-eye"></i></a>
                <a href="{{route('admin.restaurants.edit' , ['restaurant' => $restaurant->id ] )}}" class="btn btn-edit"><i class="fas fa-edit"></i></a>
                <form class="form-container"action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-delete"><i class="fas fa-trash-alt"></i></button>

                    {{-- <button type="submit" class="btn btn-danger btn-11"><i class="fas fa-trash-alt"></i></button> --}}
                </form>

            </div>

            <div class="action-restaurant-menu">
                <a {{-- href="{{route('admin.orders.details' , ['id' => $restaurant->id ] )}}" --}} class="btn btn-22">Ordini</a>
                <a href=" {{ route('admin.dishes.show', $restaurant) }} " class="btn btn-22">Menù</a>
            </div>



            {{-- <div class="action-restaurant-card-index">

              <div class="line">
                <a href=" {{ route('admin.restaurants.show', $restaurant) }} " class="btn btn-11"><i class="fas fa-eye"></i></a>
              </div>

              <div class="line">
                <a href="{{route('admin.restaurants.edit' , ['restaurant' => $restaurant->id ] )}}" class="btn btn-11"><i class="fas fa-edit"></i></a>
              </div>

              <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST" class="line">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-11"><i class="fas fa-trash-alt"></i></button>
              </form>

             <div class="line">
                <a href="{{route('admin.orders.details' , ['id' => $restaurant->id ] )}}" class="button-index button-ordini-index">Ordini</a>
              </div>


              <div class="line">
                <a href=" {{ route('admin.dishes.index') }} " class="btn btn-success btn-22">Menù</a>
              </div>

            </div> --}}

          </div>
        @endforeach
      </div>
    </div>

    </div>

  </div>

@endsection
