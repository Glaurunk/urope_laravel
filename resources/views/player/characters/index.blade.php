@extends('layouts.app')

@section('content')
    
<div class="container">
    <h1 class="mb-5">{{ Auth::user()->name }}@php echo substr(Auth::user()->name, -1) != 's' ? '\'s' : '\'' @endphp Characters</h1>
    <div class="">    
    @if (count($characters) > 0)
        @foreach ($characters as $character)
           @include('partials.character_card')
        @endforeach
    @else 
        <h3>You don't have any characters yet!</h3>
    @endif
    </div>
</div>

@endsection