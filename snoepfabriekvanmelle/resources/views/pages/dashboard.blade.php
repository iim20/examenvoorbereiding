@extends('layouts.app')

@section('content')

    @if(session('error'))
        <div class="p-4 mb-4 text-sm text-white rounded-lg bg-pink-500" role="alert">
            <span class="font-medium">{{ session('error') }} > <a class="underline text-white" href="/login">Login</a></span>
        </div>
    @endif
    
    <!-- Users -->
    @if(auth()->check())
            <div class="flex justify-center space-x-3">

                <h1 class="text-3xl text-center mt-4">Hallo </h1>
                <h1 class="text-3xl bg-blue p-2 text-white -skew-y-3 w-fit">
                    {{ auth()->user()->name }}
                </h1>
            </div>
    @else
        <span class="hidden"></span>
    @endif



    <div class="mt-2 mb-12 px-0 py-4 flex justify-between">
        <div>
            <h1 class="text-2xl font-medium">Dashboard</h1>
        </div>
        @auth
            <a class="capitalize flex justify-between px-8 font-medium leading-6 w-44 py-2 rounded-lg bg-blue text-white" href="/storingen/create">
                <span>
                    <svg class="w-6" fill="none" stroke="white" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path>
                    </svg>
                </span>
                <span>
                    storingen
                </span>
            </a>
        @endauth
        
    </div>
    
    <div class="flex justify-between mt-6 gap-4">
        <div class="w-[30rem] h-36 rounded-xl pt-6 bg-blue text-white">
            <div class="flex justify-between mx-auto max-w-[85%]">
                <div class="flex flex-col">
                    <span class="pb-6 text-xl ">Totale storingen</span>
                    <span class="text-4xl">{{ $totaleStoringen }}</span>
                </div>
                <div class="flex justify-center items-center w-28 h-8 rounded-full mt-auto space-x-2 border border-white">
                    <svg class="mt-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 9.33333V3.33333" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.33334 5.33334L8.00001 2.66667L10.6667 5.33334" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    @if ($totaleStoringen != 0)
                        <span>{{ number_format(($openStoringen - $aantalAfgehandeldStoringen) / $totaleStoringen * 100, 1)}}%</span>
                    @else
                        <span>N/A</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="w-[30rem] h-36 rounded-xl pt-6 border border-gray-300">
            <div class="flex justify-between mx-auto max-w-[85%]">
                <div class="flex flex-col">
                    <span class="pb-6 text-xl ">Open storingen</span>
                    <span class="text-4xl">{{ $openStoringen }}</span>
                </div>
                <div class="flex justify-center items-center w-28 h-8 rounded-full mt-auto space-x-2 border border-black">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.0285 6.70088L8.05422 12.7008" stroke="#161616" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.7123 10.6894L8.05707 13.3675L5.379 10.7123" stroke="#161616" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    @if ($totaleStoringen != 0)
                        <span>{{ number_format(($openStoringen / $totaleStoringen) * 100, 1)}}%</span>
                    @else
                        <span>N/A</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="w-[30rem] h-36 rounded-xl pt-6 border border-gray-300">
            <div class="flex justify-between mx-auto max-w-[85%]">
                <div class="flex flex-col">
                    <span class="pb-6 text-xl ">Afgehandeld storingen</span>
                    <span class="text-4xl">{{ $aantalAfgehandeldStoringen }}</span>
                </div>
                <div class="flex justify-center items-center w-28 h-8 rounded-full mt-auto space-x-2 border border-black">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.0285 6.70088L8.05422 12.7008" stroke="#161616" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.7123 10.6894L8.05707 13.3675L5.379 10.7123" stroke="#161616" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    @if ($totaleStoringen != 0)
                        <span>{{ number_format(($aantalAfgehandeldStoringen / $totaleStoringen) * 100, 1)}}%</span>
                    @else
                        <span>N/A</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    
    @auth
        <div id="open" class="relative overflow-x-auto shadow-md mt-10 sm:rounded-lg">
            <h1 class="text-2xl font-medium my-10">Recente storingen</h1>
                
            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                  <span class="font-medium">{{ session('success') }}</span>
                </div>
            @elseif(session('destroy') ?? session('error'))
                <div class="p-4 mb-4 text-sm text-white rounded-lg bg-red-600" role="alert">
                    <span class="font-medium">{{ session('destroy') ?? session('error') }}</span>
                </div>
            @endif

            <table class="w-full text-sm text-left text-gray-500 border-2 border-t dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-2 border-t dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4"></th>
                        <th scope="col" class="px-6 py-3">
                            Machine
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Omschrijving
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Medewerker
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Locatie
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status niveau
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Statusupdate
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($storingen->count())
                        @foreach($storingen as $storing)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    <div class="flex space-x-4">
                                    @if ($storing->statusupdate_id === 2)
                                        <form action="{{ route('dashboard.update', $storing->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="machine_id" value="{{ old('machine', $storing->machine_id) }}">
                                            <input type="hidden" name="statusniveau_id" value="{{ old('statusniveau', $storing->statusniveau_id) }}">
                                            <input type="hidden" name="statusupdate_id" value="3">
                                            <input type="hidden" name="description" value="{{ old('description', $storing->description) }}">
                                            <button type="submit">
                                                <svg class="w-6 h-6 blue" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_13_18)"><path d="M1.75 3.5H2.91667H12.25" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M4.66669 3.50001V2.33334C4.66669 2.02392 4.7896 1.72717 5.0084 1.50838C5.22719 1.28959 5.52393 1.16667 5.83335 1.16667H8.16669C8.47611 1.16667 8.77285 1.28959 8.99165 1.50838C9.21044 1.72717 9.33335 2.02392 9.33335 2.33334V3.50001M11.0834 3.50001V11.6667C11.0834 11.9761 10.9604 12.2728 10.7416 12.4916C10.5229 12.7104 10.2261 12.8333 9.91669 12.8333H4.08335C3.77393 12.8333 3.47719 12.7104 3.2584 12.4916C3.0396 12.2728 2.91669 11.9761 2.91669 11.6667V3.50001H11.0834Z" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.83331 6.41667V9.91667" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.16669 6.41667V9.91667" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_13_18"><rect width="14" height="14" fill="white"/></clipPath></defs>
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <svg class="w-6 h-6 blue opacity-20" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_13_18)"><path d="M1.75 3.5H2.91667H12.25" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M4.66669 3.50001V2.33334C4.66669 2.02392 4.7896 1.72717 5.0084 1.50838C5.22719 1.28959 5.52393 1.16667 5.83335 1.16667H8.16669C8.47611 1.16667 8.77285 1.28959 8.99165 1.50838C9.21044 1.72717 9.33335 2.02392 9.33335 2.33334V3.50001M11.0834 3.50001V11.6667C11.0834 11.9761 10.9604 12.2728 10.7416 12.4916C10.5229 12.7104 10.2261 12.8333 9.91669 12.8333H4.08335C3.77393 12.8333 3.47719 12.7104 3.2584 12.4916C3.0396 12.2728 2.91669 11.9761 2.91669 11.6667V3.50001H11.0834Z" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.83331 6.41667V9.91667" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.16669 6.41667V9.91667" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_13_18"><rect width="14" height="14" fill="white"/></clipPath></defs>
                                        </svg>
                                    @endif
                                        <a href="/storingen/{{ $storing->id }}/edit">
                                            <svg class="w-6 h-6" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_12_19)">
                                                <path d="M11.6667 8.55166V11.6667C11.6667 11.9761 11.5438 12.2728 11.325 12.4916C11.1062 12.7104 10.8094 12.8333 10.5 12.8333H2.33335C2.02393 12.8333 1.72719 12.7104 1.5084 12.4916C1.2896 12.2728 1.16669 11.9761 1.16669 11.6667V3.49999C1.16669 3.19058 1.2896 2.89383 1.5084 2.67504C1.72719 2.45624 2.02393 2.33333 2.33335 2.33333H5.44835" stroke="#0040C0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10.5 1.16667L12.8334 3.50001L7.00002 9.33334H4.66669V7.00001L10.5 1.16667Z" stroke="#0040C0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_12_19">
                                                <rect width="14" height="14" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4  whitespace-nowrap w-32 dark:text-white">
                                    <div class="text-sm font-medium">{{ $storing->machine->naam}}</div>
                                </th>
                                <td class="px-6 py-4 w-[500px]">
                                   {{ $storing->description}}
                                </td>
                                <td class="px-6 py-4 capitalize">
                                    {{ $storing->medewerker->naam}}
                                </td> 
                                <td class="px-6 py-4 capitalize">
                                    {{ $storing->machine->locatie->naam}}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        @if($storing->statusniveau->niveaunaam == 'minor')
                                            <div class="capitalize w-20 p-2 text-center rounded-md bg-stone-400 bg-opacity-50 mr-2 text-black">
                                                {{ $storing->statusniveau->niveaunaam }}
                                            </div>
                                        @elseif($storing->statusniveau->niveaunaam == 'major')
                                            <div class="flex items-center">
                                                <div class="capitalize w-20 p-2 text-center rounded-md bg-sky-200 bg-opacity-100 mr-2 text-black">
                                                    {{ $storing->statusniveau->niveaunaam }}
                                                </div>
                                            </div>
                                        @elseif($storing->statusniveau->niveaunaam == 'trivial')
                                            <div class="flex items-center">
                                                <div class="capitalize w-20 p-2 text-center rounded-md bg-emerald-300 bg-opacity-50 mr-2 text-black">
                                                    {{ $storing->statusniveau->niveaunaam }}
                                                </div>
                                            </div>
                                        @else
                                            <div class="flex items-center">
                                                <div class="capitalize w-20 p-2 text-center rounded-md bg-red-300 bg-opacity-30 mr-2 text-black">
                                                    {{ $storing->statusniveau->niveaunaam }}
                                                </div>
                                            </div>
                                        @endif                                                                                          
                                    </div>
                                </td>

                                <td>
                                    <div class="flex items-center">
                                        @if($storing->statusupdate->updatenaam == 'open')
                                            <div class="capitalize w-32 p-2 text-center rounded-2 border-2 border-blue mr-2 text-black">
                                                {{ $storing->statusupdate->updatenaam }}
                                            </div>
                                        @else
                                            <div class="flex items-center">
                                                <div class="capitalize w-[8rem] p-2 text-center rounded-2 border-2 border-orange-400 mr-2 text-black">
                                                    {{ $storing->statusupdate->updatenaam }}
                                                </div>
                                            </div>
                                       
                                        @endif                                                                                          
                                    </div> 
                                </td>
                           
                            </tr>
                            
                        @endforeach
                        
                    @else
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center">Alle storingen zijn afgehandeld, kijk naar 
                                <a class="underline text-blue" href="/#historie">
                                    historie
                                </a> 
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table> 
        </div>

        <div>
            {{ $storingen->links('pagination::tailwind') }}
        </div>
    @endauth

    <div id="historie" class="mt-16">
        <div class="relative overflow-x-auto shadow-md mt-10 sm:rounded-lg">
            <h1 class="text-2xl font-medium my-10">Afgehandeld storingen</h1>
            <table class="w-full text-sm text-left text-gray-500 border-2 border-t dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-2 border-t dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Machine
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Omschrijving
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Medewerker
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Locatie
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($afgehandeldStoringen->count())
                        @foreach($afgehandeldStoringen as $afgehandeldStoring)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                              
                                <th scope="row" class="px-6 py-4 w-64 whitespace-nowrap dark:text-white">
                                    <div class="text-sm font-medium">{{ $afgehandeldStoring->machine->naam}}</div>
                                </th>
                                <td class="px-6 py-4 w-[500px]">
                                   {{ $afgehandeldStoring->description}}
                                </td>
                                <td class="px-6 py-4 capitalize">
                                    {{ $afgehandeldStoring->medewerker->naam}}
                                </td>  
                                <td class="px-6 py-4 capitalize">
                                    {{ $afgehandeldStoring->machine->locatie->naam}}
                                </td>
                                <td>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <div class="capitalize w-32 p-2 text-center rounded-2 border-2 border-red-600 mr-2 text-black">
                                                {{ $afgehandeldStoring->statusupdate->updatenaam }}
                                            </div>
                                        </div>
                                    </div> 
                                </td>
                           
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center">Alle storingen zijn nog open, kijk naar
                                <a class="underline text-blue" href="/#open">
                                    recente storingen tabel
                                </a> 
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>      
        <div>
            {{ $afgehandeldStoringen->links('pagination::tailwind') }}
        </div>  
    </div>

   
  
@endsection