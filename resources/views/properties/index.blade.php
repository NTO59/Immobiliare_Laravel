@extends('layouts/app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Nos annonces</h1>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col-lg-3">
                    <div class="card text-center mb-4">
                        <div class="card-body bg-dark">
                            <h5 class="card-title ">{{ $property->title }}</h5>
                            <p class="card-text"> {{Str::limit($property->description, 20)}} </p>
                            <a href="#" class="btn btn-light d-grid">Voir l'annonce</a>
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
