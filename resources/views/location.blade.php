@extends('layouts.app')

@section('content')


<main>
    <div class="container">
        @if( isset($notfound) )
            mesto sa nedá lokalizovať alebo sa nachádzate na vidieku
        @else
            <h4>Tvoja ip: {{ $ip }}</h4>
            <p>{{ $gps }}</p>
            <p>{{ $city }}</p>
            <p>{{ $country }}</p>
            <p>Hlavné mesto je {{ $capital }}</p>
        @endif

    </div>
</main>

@endsection