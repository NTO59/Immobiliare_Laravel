@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="d-flex my-4 justify-content-around align-items-center">
            <h1 class=" text-center">Nos annonces</h1>
            <a href="/nos-annonces/creer" class="btn btn-primary">Créer une annonce</a>
        </div>
         {{-- old() permet de récuperer le withInput(). Ce sont les données de la requête précédente --}}
        
        @if (old())
            <div class="alert alert-success">
                L'annonce {{ old('title')}} à été ajoutée avec succès.
            </div>
        @endif

        <div class="row">
            @foreach ($properties as $property)
                <div class="col-lg-3">
                    <div class="card text-center mb-4">
                        <div class="card-body bg-dark">
                            <h5 class="card-title ">{{ $property->title }}</h5>
                            <p class="card-text"> {{Str::limit($property->description, 20)}} </p>
                            <a href="properties/show" class="btn btn-light d-grid">Voir l'annonce</a>
                            <div class="card-footer text-muted">
                                {{number_format($property->price)}} €
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
