@extends('layouts.app')

@section('content')

<div class="dashboard">

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
    {{-- ----------PARTE DESTRA ------------}}
    <div class="box-right">
        <h1 class="title-box-right">Nuovo piatto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container-box-new-restaurant">
            <div class="restaurants-box-form">
                <form action=" {{ route('admin.dishes.store') }} " method="POST" enctype="multipart/form-data" style="
                margin: auto;">
                    @csrf
                    @method('POST')

                    <div class="form-create">
                        <label for="name" class="label-control"></label>
                        <input type="text" id="name" placeholder="Nome piatto" class="line-form" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>

                    <div class="form-create">
                        <label for="ingredients" class="label-conrol"></label>
                        <textarea name="ingredients" id="ingredients" placeholder="Ingredienti" class="line-form" class="form-control @error('ingredients') is-invalid @enderror" rows="6">{{ old('ingredients') }}</textarea>
                        @error('ingredients')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>

                    <div class="form-create">
                        <label for="price" class="label-control mb-2"></label>
                        <input type="text" id="price" placeholder="Prezzo" name="price" class="line-form" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                        @error('name')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>

                    <div class="form-create">
                        <label for="visible" class="label-control mb-2">{{ __('Disponibile') }}</label>
                        <div class="form-check form-check-inline mx-3">
                           <input type="radio" id="visible"  name="visible" value="1" class="line-form" id="inlineRadio1" class="form-control @error('visible') is-invalid @enderror">
                            <label class="form-check-label" for="visible">Sì</label>
                            @error('name')
                            <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>

                        <div class="form-check form-check-inline mx-3">
                            <input type="radio" id="visible"  name="visible" value="0" class="line-form" {{-- id="inlineRadio1"  --}}class="form-control @error('visible') is-invalid @enderror">
                             <label class="form-check-label" for="visible">No</label>
                             @error('name')
                             <p class="text-danger"> {{$message}} </p>
                             @enderror
                         </div>

                    </div>



                    <div class="cover-inserita">
                        <label class="label-control form_label mb-2" for="cover" ><h6>Cover:</h6></label>
                        <input type="file" id="cover" name="cover" class="form-control cover @error('cover') is-invalid @enderror" value="{{ old('cover') }}">
                        @error('cover')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>

                    <div class="list list-plate">
                        <input type="hidden" name="type_id" value="{{$restaurants}}" >
                        <label></label>
                        <select class="input" name="restaurant_id">
                            <option value="" hidden>Il ristorante in cui vuoi questo piatto</option>
                            @foreach ($restaurants as $restaurant)
                                <option value="{{$restaurant->id}}" {{ old('restaurant_id') == $restaurant->id ? "selected=selected" : '' }}>{{$restaurant->restaurant_name}}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="btn-send-reset">
                        <button class="btn btn-send" type="submit">Invio</button>
                        <button class="btn btn-reset" type="reset">Reset</button>
                    </div>

                </form>
            </div>
        </div>

        <a href=" {{ route('admin.dishes.show', $restaurant) }} " {{-- class="ristorante" --}}><img  class="ristorante"src="/img/ristorante.png" alt="ristorante"></a>
    </div>
</div>

<style>
    .form-check {
        width: 30px;
        /* background-color: red; */
    }

    .form-check-inline{
        display: inline-block;
    }
    #inlineRadio1{
        width: 20px;
    }
</style>
@endsection