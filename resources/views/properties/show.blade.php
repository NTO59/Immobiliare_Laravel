@extends('layouts/app')

@section('content')
    <div class="container">

       
            <h3 class="my-4 text-center text-light"> {{ $annonce->title }} </h3>

            <div class="img text-light">
                IMAGE
            </div>

            <div class="infos text-light">
                <p> {{ $annonce->description }} </p>


                <p> {{ number_format($annonce->price) }} € </p>
            </div>
       
    </div>
@endsection
