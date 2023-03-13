@extends('layouts.app')

@section('content')
<div class="mt-24 space-y-6">

    <h1 class="text-4xl">
        {{ $storing->machine->naam}}
        <span class="text-3xl -skew-y-3 bg-blue text-white p-4 capitalize">
            {{ $storing->machine->locatie->naam}}
        </span> 
    </h1>
    <div class="text-lg mt-16">
        Ingevoerd door: 
        <a class="underline" href="{{ route('medewerkers.show', ['medewerker' => $storing->medewerker->id]) }}">
            {{ $storing->medewerker->naam}}
        </a>
    </div>
    <sub>

    </sub>
    <p>
        {{ $storing->description}}
    </p>


</div>
@endsection