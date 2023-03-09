@extends('layouts.app')

@section('content')
<h1 class="text-2xl mt-6 mb-10 font-medium">Edit storing</h1>
    <div class="border border-gray-400 p-10 pb-8">
        <form class="space-y-8" method="POST" action="/storingen/{{ $storing->id }}">
            @csrf
            @method('PATCH')

            <div class="form-control flex flex-col w-full space-y-2">
                <label class="font-semibold" for="machine_id">Machine</label>
                <select class="pl-4 border border-indigo-500 rounded-md h-12" name="machine_id" id="machine_id">
                   @foreach(\App\Models\Machine::all() as $machine)
                    <option 
                        value="{{ $machine->id }}"
                        {{ old('machine_id', $storing->machine_id) == $machine->id ? 'selected' : ''}}> 
                        {{ ucwords($machine->naam) }}
                    </option>
                   @endforeach
                </select>
            </div>
            <div class="flex justify-between gap-14">
                <div class="form-control flex flex-col w-[75%] space-y-2">
                    <label class="font-semibold" for="statusniveau_id">Statusniveau</label>
                    <select class="pl-4 border border-indigo-500 rounded-md h-12" name="statusniveau_id" id="statusniveau_id">
                        @foreach(\App\Models\Statusniveau::all() as $statusniveau)
                            <option 
                                value="{{ $statusniveau->id }}"
                                {{ old('statusniveau_id', $storing->statusniveau_id) == $statusniveau->id ? 'selected' : ''}}> 
                                {{ ucwords($statusniveau->niveaunaam) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control flex flex-col w-[75%] space-y-2">
                    <label class="font-semibold" for="statusupdate_id">Statusupdate</label>
                    <select class="pl-4 border border-indigo-500 rounded-md h-12" name="statusupdate_id" id="statusupdate_id">
                        @foreach(\App\Models\Statusupdate::where('id', '<>', 3)->get() as $statusupdate)
                            <option 
                                value="{{ $statusupdate->id }}"
                                {{ old('statusupdate_id', $storing->statusupdate_id) == $statusupdate->id ? 'selected' : ''}}> 
                                {{ ucwords($statusupdate->updatenaam) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-control flex flex-col space-y-2">
                <label class="font-semibold" for="medewerker_id">Medewerker</label>
                <select class="pl-4 border border-indigo-500 rounded-md h-12" name="medewerker_id" id="medewerker_id">
                    @foreach(\App\Models\Medewerker::all() as $medewerker)
                        <option 
                            value="{{ $medewerker->id }}"
                            {{ old('medewerker_id', $storing->medewerker_id) == $medewerker->id ? 'selected' : ''}}> 
                            {{ ucwords($medewerker->naam) }}
                        </option>
                    @endforeach
                </select>
                @error('statusniveau_id')
                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-control flex flex-col space-y-2">
                <label class="font-semibold" for="description">Omschrijving</label>
                <textarea class="pl-1 pt-4 block w-full rounded-md border border-indigo-500" name="description" id="description" cols="30" rows="6">
                    {{ old('description', $storing->description) }}
                </textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="capitalize mr-0 px-8 py-2 font-medium leading-6 w-44 rounded-lg bg-blue text-white">
                    Aanpassen
                </button>
            </div>
        </form>
    </div>
@endsection