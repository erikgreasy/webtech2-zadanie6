@extends('layouts.app')

@section('content')

<main>
    <div class="container">
        <h1>Predpoveď na zajtra: {{ $city }}</h1>
        <div>
            {{ $status }}
            {{ $temp }} °C
        </div>
    </div>
</main>

@endsection