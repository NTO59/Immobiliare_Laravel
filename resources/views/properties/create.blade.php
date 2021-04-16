@extends('layouts/app')

@section('content')
    <div class="container">

        <h2 class="my-4">Formulaire en GET</h2>
        @if (request('name'))
            Bonjour {{ request('name') }}
        @endif

        <form action="">
            <input type="text" name="name">

            <button class="btn btn-primary">Envoyer</button>
        </form>


        <h2 class="my-4">Formulaire en POST</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Genere une balise avec le token CSRF. Ce token permet de proteger le site contre les attaques CSRF. 
            Laravel va simplement vérifier que le tokeb envoyé correspond à celui de la personne qui est actuellement sur le site --}}
            {{-- <input type="hidden" name="_token" value="123456"> --}}
            <div class="my-4">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value=" {{old('title')}} ">

                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="my-4">
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
            </div>
            <div class="my-4">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" value=" {{old('description')}} "></textarea>
            </div>
            <div class="my-4">
                <label for="price">Prix</label>
                <input type="text" name="price" id="price" class="form-control" value=" {{old('price')}} ">
            </div>
            <div class="form-check">
                <input type="checkbox" name="sold" id="sold" class="form-check-input" {{old('sold') ? 'checked' : ''}}>
                <label for="sold">Vendu ?</label>
            </div>

            <button class="btn btn-primary">Ajouter</button>
        </form>

    </div>
@endsection
