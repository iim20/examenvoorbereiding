@extends('layouts.app')

@section('content')
    <div class="mt-16 flex flex-col">
        @foreach($medewerkers as $medewerker)
        <p>

            </p>
            
            <a href="/medewerkers/{{$medewerker->id}}">
                {{$loop->iteration}}: {{ $medewerker->naam}}
            </a>
        @endforeach
    </div>

@endsection