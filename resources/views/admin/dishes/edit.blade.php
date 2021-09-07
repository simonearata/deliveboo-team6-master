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
       <h1 class="title-box-right">Modifica:<a href=" {{ route('admin.dishes.index', $dish) }} "> {{ $dish->name }} </a></h1>

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
                <form action=" {{ route('admin.dishes.update', $dish) }} " method="POST" enctype="multipart/form-data" style="
                margin: auto;">
                    @csrf
                    @method('PATCH')

                    <div class="mt-2">
                    <label for="name" class="form_label">Title:</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $dish->name }}" value="{{ old('name', $dish->name) }}">
                    @error('name')
                        <p class="text-danger"> {{$message}} </p>
                    @enderror
                    </div>

                    <div class="mt-2">
                    <label for="ingredients" class="form_label">Ingredienti:</label>
                    <textarea name="ingredients" id="ingredients" class="form-control @error('ingredients') is-invalid @enderror" rows="7">{{ old('ingredients',$dish->ingredients) }}</textarea>
                    @error('ingredients')
                        <p class="text-danger"> {{$message}} </p>
                    @enderror
                    </div>

                    <div class="mt-2">
                    <label for="price" class="form_label ">Prezzo:</label>
                    <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $dish->price }}" value="{{ old('price', $dish->price) }}">
                    @error('name')
                        <p class="text-danger"> {{$message}} </p>
                    @enderror
                    </div>

                    <div class="mt-2">
                    <label class="label-control form_label " for="cover" >Cover:</label>
                    @if ($dish->cover)
                        <img src="{{asset('storage/'. $dish->cover)}}" alt="{{$dish->name}}" style="width: 100px">
                    @endif
                    <input onchange="previewFile()" type="file" id="cover" name="cover" class="form-control @error('cover') is-invalid @enderror" value="{{ old('cover') }}">
                    @error('cover')
                        <p class="text-danger"> {{$message}} </p>
                    @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-5">
                    <a href=" {{ route('admin.dishes.index') }} "><< Back</a>
                    {{-- <button type="submit" class="btn btn-primary">SUBMIT</button> --}}
                    <button class="btn btn-send" type="submit">Invio</button>
                    </div>
                </form>
            </div>
            <a href=" {{ route('admin.restaurants.index') }} " {{-- class="ristorante" --}}><img  class="ristorante"
                style="border-radius: 100%;"
             src="/img/menu.png" alt="menu"></a>
        </div>



   </div>

</div>

<script>
  function previewFile() {
    var preview = document.querySelector('img');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();
    reader.onloadend = function () {
      preview.src = reader.result;
    }
    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
    }
  }
</script>
@endsection
