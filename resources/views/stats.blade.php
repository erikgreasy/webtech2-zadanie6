@extends('layouts.app')

@section('content')

<main>
    <div class="container">
        <h1>Štatistiky prihlásení</h1>

        <table class="table">
            <tr>
                <th>Vlajka</th>
                <th>Krajina</th>
                <th>Počet návštev</th>
            </tr>

            @foreach ($logs as $log)
                <tr>
                    <td>
                        @if($log->country)
                            <img src="http://www.geonames.org/flags/x/{{ strtolower( $log->country ) }}.gif" alt="vlajka" class="flag">
                        @endif
                    </td>
                    <td>
                        @if($log->country)
                            <a href="{{ route('countryLogs', $log->country) }}">
                                {{ $log->country }}
                            </a>
                        @else
                            Neznáme
                        @endif
                    </td>

                    <td>{{ $log->visits }}</td>
                </tr>

            @endforeach

        </table>
    </div>
</main>

@endsection