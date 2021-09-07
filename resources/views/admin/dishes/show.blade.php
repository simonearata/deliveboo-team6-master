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

                          {{-- <a class="btn btn-1" href=" {{ route('admin.restaurants.create') }} ">Aggiungi ristorante</a> --}}

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

            <h1>{{ $restaurant->restaurant_name }}: tutti i piatti</h1>

            @foreach ($dishes as $dish)
            @if ($dish->restaurant_id===$restaurant->id)
            <div class="image-container">

              {{-- <img src="/img/logo-deliveroo-frontend.png" alt="immagine"/> --}}
              @if ($dish->cover)
                <img src="{{asset('storage/'. $dish->cover)}}" alt="{{$dish->name}}">
              @endif

                <ul class="image-caption caption-2">
                  <li><h4>{{ $dish->name }}</h4></li>
                  <li>Ingredienti: {{ $dish->ingredients }}</li>
                  <li>Prezzo: {{ $dish->price}}</li>
                  <li>Visibile: {{ $dish->visible }}</li>
                  <li>
                    <a href=" {{ route('admin.dishes.edit', $dish) }} " class="btn btn-edit mt-4">
                      <i class="fas fa-edit"></i>
                    </a>
                              
                    <form class="form-container d-inline" action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
                    @csrf
                    @method('DELETE')
                      <button type="submit" class="btn btn-delete">
                        <i class="fas fa-trash-alt"></i>
                      </button>       
                    </form>

                  </li>
                </ul>
                    
              </div>
            @endif
            @endforeach

            {{-- <div class="container-box-restaurant">
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

                  <div>
                    <h5>Ingredienti: {{ $dish->ingredients }}</h5>
                  </div>

                  <div>
                    <h5>Prezzo: {{ $dish->price}}</h5>
                  </div>

                  <div>
                    <h5>Visibile: {{ $dish->visible }}</h5>
                  </div>

                          <div class="action-restaurant-card">
                              <a href=" {{ route('admin.dish.show', $dish) }} " class="btn btn-eye"><i class="fas fa-eye"></i></a>
                              <a href=" {{ route('admin.dishes.edit', $dish) }} " class="btn btn-edit"><i class="fas fa-edit"></i></a>
                              <form class="form-container" action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                              <button type="submit" class="btn btn-delete"><i class="fas fa-trash-alt"></i></button>

                                  <button type="submit" class="btn btn-danger btn-11"><i class="fas fa-trash-alt"></i></button>
                              </form>

                          </div>

                          <div class="action-restaurant-menu">
                              <a href="{{route('admin.orders.details' , ['id' => $restaurant->id ] )}}" class="btn btn-22">Ordini</a>
                              <a href=" {{ route('admin.dishes.index', $restaurant) }} " class="btn btn-22">Menù</a>
                          </div>

                        </div>
                        @endif
                      @endforeach
                    </div>
                </div> --}}
         </div>

    </div>

  {{-- <div class="container">

    <h1>I miei piatti</h1>

    @if (session('deleted'))
      <div class="alert alert-success" role="alert">
          <span> <strong>{{ session('deleted') }}</strong> eliminato correttamente</span>
      </div>
    @endif

    <table class="table">

      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Restaurant ID</th>
          <th scope="col">Nome piatto</th>
          <th scope="col">Ingredienti</th>
          <th scope="col">Prezzo</th>
          <th scope="col" colspan="3">Actions</th>
        </tr>
      </thead>

      <tbody>

        <tr>

          @foreach ($dishes as $dish)
            <tr>
              <td> {{ $dish->id }} </td>
              <td> {{ $dish->restaurant_id }} </td>
              <td> {{ $dish->name }} </td>
              <td>
                {{ $dish->ingredients }}
              </td>
              <td>
                {{ $dish->price }}
              </td>
              <td>
                {{ $dish->visible }}
              </td>
              <td>
                @if ($dish->cover)
                  <img src="{{ asset('storage/'. $dish->cover) }}" alt="{{ $dish->name }}" style="width: 150px">
                @endif
              </td>

              <td>
                <a href=" {{ route('admin.dishes.show', $dish) }} " class="btn btn-success">SHOW</a>
              </td>
              <td>
                <a class="btn btn-secondary" href=" {{ route('admin.dishes.edit', $dish) }} ">EDIT</a>
                href="{{route('admin.restaurants.edit' , ['restaurant' => $restaurant->id ] )}}"
              </td>
              <td>
                <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
              </td>
            </tr>
          @endforeach
          <button class="btn btn-success">
            <a href=" {{ route('admin.dishes.create') }} ">Crea un nuovo piatto</a>
          </button>
        </tr>

      </tbody>

    </table>

  </div>
 --}}


@endsection
