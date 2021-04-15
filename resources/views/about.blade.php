<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
</head>
<body>
    <h1>Hello Laravel</h1>

    <h2>Blade simplifie le PHP</h2>
    
    <?php echo date('d/m/Y'); //en PHP ?>
    
    {{ date('d/m/Y') }} 
    
    <h2>if en Blade</h2>
    @if (1===1)
    je suis un if
    @endif
    
    <h2>boucle en Blade</h2>
    @for ($i = 0; $i < $count; $i++)
    {{ $i }}
    @endfor
    
    <h2>Protection XSS en Blade</h2>
    {{'<script> alert("toto") </script>'}}
    {!! '<h1> Pas de protection XSS </h1>' !!}

</body>
</html>