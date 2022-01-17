@extends('layout.app')

@section('content')
    <div>
        @extends('layout.partials.nav')
    </div>
    <h5 class="nav-item">Resident: {{auth()->user()->name}}</h5>
    <div id="app">
        <resident-index :user="{{ auth()->user() }}"></resident-index>
    </div>
@endsection
