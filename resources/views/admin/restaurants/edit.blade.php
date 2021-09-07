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

    <!-- PARTE DESTRA DELLA DASHBORD -->

    <div class="box-right">
        <h1 class="title-box-right">Modifica ristorante</h1>

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
            <form action=" {{ route('admin.restaurants.update', $restaurant) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')



                <div class="form-create">
                    <label for="restaurant_name" class="form_label">Nome del ristorante:</label>
                    <input type="text" id="restaurant_name" name="restaurant_name" class="line-form @error('restaurant_name') is-invalid @enderror" value="{{ $restaurant->restaurant_name }}" value="{{ old('restaurant_name', $restaurant->restaurant_name) }}">
                    @error('restaurant_name')
                        <p class="text-danger"> {{$message}} </p>
                    @enderror
                </div>

{{-- --------------------------------- --}}



                <div class="form-create">
                    <label for="address" class="form_label">Indirizzo:</label>
                    <input type="text" id="address" name="address" class="line-form @error('address') is-invalid @enderror" value="{{ $restaurant->address }}" value="{{ old('address', $restaurant->address) }}">
                    @error('address')
                      <p class="text-danger"> {{$message}} </p>
                    @enderror
                </div>

{{-- ------------------------------------ --}}





                <div class="form-create">
                    <label for="p_iva" class="form_label">P. iva:</label>
                    <input maxlength="11" type="text" id="p_iva" name="p_iva" class="line-form @error('p_iva') is-invalid @enderror" value="{{ $restaurant->p_iva }}" value="{{ old('p_iva', $restaurant->p_iva) }}">
                    @error('p_iva')
                      <p class="text-danger"> {{$message}} </p>
                    @enderror
                </div>


{{-- --------------------------------------------- --}}

                <div class="list list-plate">



                        <input type="hidden" name="type_id" value="{{$types}}" >

                            <label></label><br>
                            <select class="input" name="type_id">
                                <option value="" hidden>Tipo di ristorante</option>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}" {{ old('name') == $type->id ? "selected=selected" : '' }}>{{$type->name}}</option>
                                @endforeach

                            </select>

{{-- ----------------------------------------------- --}}
                        <div class="category-box">
                            <h6>Categorie ristorante</h6>
                            <br>
                            {{-- <h6>Categorie ristorante</h6> --}}
                            @foreach($categories as $category)
                                <span class="span-check">
                                    <input type="checkbox" class="checkbox"
                                        id="category{{ $loop->iteration }}"
                                        name="categories[]"
                                        value="{{ $category->id }}"
                                        {{-- @if(in_array($category->id, old('categories',[])))  checked  @endif --}}
                                        @if (in_array($category->id, old('categories', [])) && $errors->any())
                                          checked
                                        @elseif (!$errors->any() && $restaurant->categories->contains($category->id))          
                                          checked
                                        @endif
                                    >
                                    <label for="tag{{ $loop->iteration }}"><span class="category-check">{{ $category->name }}</span></label>
                                </span>
                            @endforeach
                            @error('categories')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- ----------------------- --}}
                        <div class="cover-inserita">
                            <label class="label-control form_label mb-2" for="cover" ><h6>Cover:</h6></label>
                            @if ($restaurant->cover)
                                <img src="{{asset('storage/'. $restaurant->cover)}}" alt="{{$restaurant->restaurant_name}}" style="width: 100px">
                            @endif




                            <input onchange="previewFile()" type="file" id="cover" name="cover" class="form-control cover @error('cover') is-invalid @enderror" value="{{ old('cover') }}">
                            @error('cover')
                            <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>





                        <div class="btn-send-reset">
                            <button class="btn btn-send" type="submit">Invio</button>
                            {{-- <button class="btn btn-reset" type="reset">Reset</button> --}}
                        </div>

                    </div>
                </div>

            </form>
        </div>
        <a href=" {{ route('admin.restaurants.index') }} " {{-- class="ristorante" --}}><img  class="ristorante"src="/img/ristorante.png" alt="ristorante"></a>
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
