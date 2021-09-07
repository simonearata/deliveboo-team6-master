@extends('layouts.app')

@section('content')

    <div class="dashboard">

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
            <h1>Nome: {{ $restaurant->restaurant_name }} </h1>

            <div class="contenitore-carta show">
                @if ($restaurant->cover)
                    <p>Cover:</p><img src="{{asset('storage/'. $restaurant->cover)}}" alt="{{$restaurant->restaurant_name}}" style="width: 250px">
                @endif
                <p> Indirizzo: {{ $restaurant->address }} </p>
                <p> P. Iva: {{ $restaurant->p_iva }} </p>
                
                <div>
                  @forelse ($restaurant->categories as $category)
                  <span class="badge badge-primary"> {{ $category->name }} </span>  
                  @empty
                    Nessuna categoria
                  @endforelse
                </div>
                

                <div>
                  @if ($restaurant->type)
                  Tipo: {{ $restaurant->type->name }}
                  @else
                    Nessun tipo di cucina 
                  @endif 
                </div>

              
              
                <div class="d-flex justify-content-between mt-5">
               <a href=" {{ route('admin.restaurants.index') }} "><< Back</a>
                <!-- {{-- <a class="btn btn-secondary" href=" {{ route('admin.restaurants.edit', $restaurant) }} ">EDIT</a> --}} -->
              </div>
            </div>


        </div>

    </div>



@endsection