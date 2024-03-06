@extends('layouts.app')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <div class="container">
        @foreach ($data['groups'] as $grop)
            <h1>Groups {{ $grop['letter'] }}</h1>

            <table class="table">     
            
                <thead>
                    <tr>
                        <th scope="col">Team</th>
                        <th scope="col">MP</th>
                        <th scope="col">W</th>
                        <th scope="col">D</th>
                        <th scope="col">L</th>
                        <th scope="col">GF</th>
                        <th scope="col">GA</th>
                        <th scope="col">GD</th>
                        <th scope="col">Pts</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grop['teams'] as $team)
                        <tr>
                            <td scope="row">
                                @foreach ($flags as $flag)
                                    @if ($team['name'] === $flag['name'])
                                        <img src="{{ $flag['image'] }}" style="height: 40px; width: 40px"
                                            alt="{{ $flag['name'] }}">
                                    @endif
                                @endforeach
                                {{ $team['name'] }}
                            </td>
                            <td>{{ $team['group_points'] }}</td>
                            <td>{{ $team['wins'] }}</td>
                            <td>{{ $team['draws'] }}</td>
                            <td>{{ $team['losses'] }}</td>
                            <td>{{ $team['games_played'] }}</td>
                            <td>{{ $team['goals_for'] }}</td>
                            <td>{{ $team['goals_against'] }}</td>
                            <td>{{ $team['goal_differential'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
@endsection
