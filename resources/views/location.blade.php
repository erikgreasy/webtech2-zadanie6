@extends('layouts.app')

@section('content')


<main>
    <div class="container">
        <h4>Tvoja ip: {{ $ip }}</h4>
        <p>{{ $gps }}</p>
        <p>{{ $city }}</p>
        <p>{{ $country }}</p>
        <p>Hlavné mesto je {{ $capital }}</p>

    </div>
</main>

@endsection