<h1>{{$title}}</h1>

@if(empty($contador))
    <FONT COLOR="red">No se ha podido contar ninguna película</FONT>
@else
    <div>
        <p>Contador de cuantas pelis hay: {{$contador}}</p>
    </div>
@endif