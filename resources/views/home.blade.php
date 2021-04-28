@extends('layouts.app')

@section('content')

<main>
    <div class="container">
        @if( isset($notfound) )
            mesto sa nedá lokalizovať alebo sa nachádzate na vidieku
        @else
            <h1>Predpoveď na zajtra: {{ $city }}</h1>
            <div>
                {{ $status }}
                {{ $temp }} °C
            </div>
        @endif
    </div>
</main>

@endsection