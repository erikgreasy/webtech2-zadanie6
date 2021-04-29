@extends('layouts.app')

@section('content')

<main>
    <div class="container">
        <table class="table">
            <tr>
                <th>Mesto</th>
                <th>Počet návštev</th>
            </tr>

            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->city }}</td>
                    <td>{{ $log->visits }}</td>
                </tr>
            @endforeach

        </table>
    </div>
</main>
    
@endsection