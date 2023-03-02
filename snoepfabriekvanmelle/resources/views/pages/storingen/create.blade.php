@extends('layouts.app')

@section('content')
    <h1 class="text-2xl mt-6 mb-10 font-medium">Nieuwe storing</h1>
    <div class="border border-gray-400 p-10 pb-8">
        <form class="space-y-8" method="POST" action="{{ route('storingen.store') }}">
            @csrf
            <div class="form-control flex flex-col space-y-2">
                <label class="font-semibold" for="machine_id">Machine</label>
                <select class="pl-4 border border-indigo-500 rounded-md w-full h-12" name="machine_id" id="machine_id">
                   @foreach(\App\Models\Machine::all() as $machine)
                    <option 
                        value="{{ $machine->id }}"
                        {{ old('machine_id') == $machine->id ? 'selected' : ''}}> 
                        {{ ucwords($machine->naam) }}
                    </option>
                   @endforeach
                </select>
                @error('machine')
                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-between gap-14">
                <div class="form-control flex flex-col w-[75%] space-y-2">
                    <label class="font-semibold" for="statusniveau_id">Status niveau</label>
                    <select class="pl-4 border border-indigo-500 rounded-md h-12" name="statusniveau_id" id="statusniveau_id">
                        @foreach(\App\Models\Statusniveau::all() as $statusniveau)
                            <option 
                            value="{{ $statusniveau->id }}"
                            {{ old('statusniveau_id') == $statusniveau->id ? 'selected' : ''}}> 
                            {{ ucwords($statusniveau->niveaunaam) }}
                        </option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control flex flex-col w-[75%] space-y-2">
                    <label class="font-semibold" for="statusupdate_id">Status update</label>
                    <select class="pl-4 border border-indigo-500 rounded-md h-12" name="statusupdate_id" id="statusupdate_id">
                        @foreach(\App\Models\Statusupdate::where('id', '<>', 3)->get() as $statusupdate)
                            <option 
                            value="{{ $statusupdate->id }}"
                            {{ old('statusupdate_id') == $statusupdate->id ? 'selected' : ''}}> 
                            {{ ucwords($statusupdate->updatenaam) }}
                        </option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-control flex flex-col space-y-2">
                <label class="font-semibold" for="description">Omschrijving</label>
                <textarea class="pl-4 pt-4 rounded-md border border-indigo-500" value="{{ old('description') }}" name="description" id="description" cols="30" rows="6"></textarea>
                @error('description')
                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="capitalize mr-0 px-8 py-2 font-medium leading-6 w-44 rounded-lg bg-blue text-white">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
@endsection