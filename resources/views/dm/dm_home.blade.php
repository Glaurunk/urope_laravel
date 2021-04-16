@extends('layouts.app_dm')

@section('content')
    <div class="container">
        <h1>DM Home</h1>
        @foreach ($users as $user)
            <div class="card">
                <div class="card-header">
                    <h2>{{ $user->name }}</h2>
                </div>
                <div class="card-body">
                    @foreach ($user->characters as $character)
                        @include('partials.character_card')
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

@endsection