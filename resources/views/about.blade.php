{{-- On va étendre le fichier resourses/views/layouts/app.blade.php --}}

@extends('layouts.app') {{-- layout/app --}}

{{-- @parent vaut la valeur par defaut "Immobiliare" --}}

@section('title')
    A propos - @parent
@endsection

{{-- On met le contenu suivant dans le yield content --}}
@section('content')
<div class="container text-light">

    <h1>Hello {{ $name }} </h1>
    
    <ul>
        @foreach ($bibis as  $bibi)
            <li>
                {{-- @dump($loop) --}}
                 {{ $loop->index }} {{ $bibi }} 
            </li>
        @endforeach
    </ul>
    
    
    <h2>Blade simplifie le PHP</h2>
    
    <?php echo date('d/m/Y');?>
    
    {{ date('d/m/Y') }} 
    
    <h2>if en Blade</h2>
    
    @if (1===1)
    je suis un if
    @endif
    
    <h2>boucle en Blade</h2>
    
    @for ($i = 0; $i < 11; $i++)
    {{ $i }}
    @endfor
    
    <h2>Protection XSS en Blade</h2>
    
    {{'<script> alert("toto") </script>'}}
    {!! '<h1> Pas de protection XSS </h1>' !!}
</div>


@endsection