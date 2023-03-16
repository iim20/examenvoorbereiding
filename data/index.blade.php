@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-[93%]">
  
    <div class="mt-10 flex items-center">
        <h1 class="text-4xl font-bold">Enquêtes</h1>
        <div class="space-x-4 flex ml-10 font-bold">
            
            <div class="p-4 bg-gray-200 w-36 text-center">Alle</div>
            <div class="p-4 bg-gray-200 w-36 text-center">Beschikbare</div>
            <div class="p-4 bg-gray-200 w-36 text-center">Ingevuld</div>
        </div>
        
        <div class="p-4 bg-gray-200 w-60 text-center ml-auto">
            <a class="capitalize flex justify-between px-8 font-medium leading-6 w-44 py-2 rounded-lg bg-blue text-black" href="/employee/enquetes/create">
                <span>
                    <svg class="w-6" fill="none" stroke="white" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path>
                    </svg>
                </span>
                <span>
                    Enquêtes
                </span>
            </a>
        </div>
        
    </div> 
    
    <div class="w-full p-4 mt-10 bg-gray-200 rounded-sm">
        {{-- Table --}}
        <div class="w-full">
            <div class="flex justify-between font-semibold uppercase">
                <div class="border-r-2 border-gray-300 w-[12%]">
                    <h1 class="ml-4">title</h1>
                </div>
                <div class="border-r-2 border-gray-300 w-[12%]">
                    <h1>categorie</h1>
                </div>
                <div class="border-r-2 border-gray-300 w-[12%]">
                    <h1 class="ml-2">datum</h1>
                </div>
                <div class="border-r-2 border-gray-300 w-[20%];">
                    <h1>punten verkregen</h1>
                </div>
                <div class="w-[12%]">
                    <a href="" class=""><h1>bekijken</h1></a>
                </div>
            </div>
        {{-- Table content --}}

            <div class="font-semibold">
                @foreach ($enquetes as $enquete)
                    <div class="row-content flex justify-between bg-white p-3 m-3" style="border-radius:3px;">
                        <div class="naam" style="width:30%;">
                            {{ $enquete->title}}
                        </div>
                        <div class="categorie" style="width:40%;">
                            <p class="ml-4">{{ $enquete->category->name }}</p>
                        </div>
                        <div class="datum" style="width:40%;">
                            {{ $enquete->created_at->format('d/m/Y')}}
                        </div>
                        <div class="punten" style="width:50%;">
                            @if ($enquete->category->name == "Voeding")
                                <p class="ml-4">150 punten</p>
                            @elseif ($enquete->category->name == "Gezondheid")
                                <p class="ml-4">750 punten</p>
                            @elseif ($enquete->category->name == "Sport")
                                <p class="ml-4">200 punten</p>
                            @else
                                <p class="ml-4">500 punten</p>
                            @endif

                        </div>
                        <div class="bekijken" style="width:14%;">
                            <a href=""><img src="{{url('/images/eye.png')}}" alt="eye" width="30"></a>
                        </div>
                    </div>
                @endforeach
              
                
            </div>
        </div>
    </div>
</div>
  
@endsection