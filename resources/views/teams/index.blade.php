<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Liste des Équipes</title>
</head>

<body>

    @foreach ($data['groups'] as $group)
        <h1>Groupe {{ $group['letter'] }}</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Équipe</th>
                    <th scope="col">Drapeau</th>
                    <th scope="col">MP</th>
                    <th scope="col">V</th>
                    <th scope="col">N</th>
                    <th scope="col">D</th>
                    <th scope="col">GF</th>
                    <th scope="col">GA</th>
                    <th scope="col">Différence de buts</th>
                    <th scope="col">Pts</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($group['teams'] as $team)
                    <tr>
                        <td scope="row">{{ $team['name'] }}</td>
                        <td>
                            @if (isset($flags[$team['country']]))
                                <img src="{{ $flags[$team['country']]['image'] }}" alt="{{ $team['name'] }} drapeau"
                                    style="width: 30px; height: 20px;">
                            @else
                                Aucun drapeau
                            @endif
                        </td>



                        <td>{{ $team['games_played'] }}</td>
                        <td>{{ $team['group_points'] }}</td>
                        <td>{{ $team['wins'] }}</td>
                        <td>{{ $team['draws'] }}</td>
                        <td>{{ $team['losses'] }}</td>
                        <td>{{ $team['goals_for'] }}</td>
                        <td>{{ $team['goals_against'] }}</td>
                        <td>{{ $team['goal_differential'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

</body>

</html>
