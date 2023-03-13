@extends('layouts.app')

@section('content')
<div class="mt-24 space-y-6">
    <div>
        <h1 class="text-2xl font-medium">{{ $medewerker->naam }}</h1>
            <p class="text-gray-500">{{ $medewerker->locatie->naam }}</p>
    </div>

    <div class="mt-10">
        <h2 class="text-lg font-medium">Storingen</h2>
        <ul>
            @foreach ($medewerker->storingen as $storing)
                <li>{{ $storing->description }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection