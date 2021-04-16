@extends('layouts/app')

@section('content')
    <div class="container">
        @foreach ($annonces as $annonce)
            <h3 class="my-4 text-center"> {{ $annonce->title }} </h3>

            <div class="img">
                IMAGE
            </div>

            <div class="infos">
                <p> {{ $annonce->description }} </p>


                <p> {{ number_format($annonce->price) }} € </p>
            </div>
        @endforeach
    </div>
@endsection
