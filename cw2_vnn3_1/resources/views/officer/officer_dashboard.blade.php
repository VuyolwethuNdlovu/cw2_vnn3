@extends('layout.app')

@section('content')

    <div>
        @extends('layout.partials.nav')
    </div>
    <h5 class="nav-item">Officer: {{auth()->user()->user_id}}</h5>
    <div id="app">
        <officer-view-question-table></officer-view-question-table>

    </div>


@endsection
