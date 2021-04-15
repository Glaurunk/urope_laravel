@extends('layouts.app')

@section('content')
    
<div class="container">
    <h1>{{ Auth::user()->name }}'s Characters</h1>
    <div class="row">    
    @if (count($characters) > 0)
        @foreach ($characters as $character)
            @php $stats = json_decode($character->stats, true) @endphp
            <div class="card col col-lg-4">
                <div class="card-header">
                    <h3>{{ $character->name }}</h3>
                </div>
                <div class="card-body">
                    <h4 class="mb-3">ATTRIBUTES</h4>
                    <p>STR: {{ $stats['attributes']['STR'] }}</p>
                    <p>DEX: {{ $stats['attributes']['DEX'] }}</p>
                    <p>CON: {{ $stats['attributes']['CON'] }}</p>
                    <p>INT: {{ $stats['attributes']['INT'] }}</p>
                    <p>WIS: {{ $stats['attributes']['WIS'] }}</p>
                    <p>CHA: {{ $stats['attributes']['CHA'] }}</p>
                    <hr>
                    <h4 class="mb-3">WEAPONS</h4>
                    @foreach ($stats['weapons'] as $weapon)
                        <p>{{ $weapon }}</p>
                    @endforeach
                </div>
            </div>
        @endforeach
    @else 
        <h3>You don't have any characters yet!</h3>
    @endif
    </div>
</div>

@endsection