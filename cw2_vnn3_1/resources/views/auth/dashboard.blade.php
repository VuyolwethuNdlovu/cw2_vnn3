@extends('layout.app')

@section('content')
    <div>
        @extends('layout.partials.nav')
    </div>
    <h3 class="nav-item">Officer: {{auth()->user()->user_id}}</h3>

@endsection
