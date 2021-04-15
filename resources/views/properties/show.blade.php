@extends('layouts/app')

@section('content')
    <div class="container">
        @foreach ($annonces as $annonce)
            
            <h3> {{ $annonce->title }} </h3>

            <p> {{ $annonce->description }} </p>


            <p> {{ number_format($annonce->price) }} € </p>


        @endforeach
    </div>
@endsection
