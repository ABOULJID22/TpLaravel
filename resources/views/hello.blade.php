<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>hello {{$noms}} and  welcome to my page
    </h1>
    <h2>les langages </h2>
    <table border='1'>
        <tr>
            <th>les langages</th>
        </tr>

    @foreach ($langs as $lg)
    <tr>
        <td>{{$lg}}</td>
        </tr>
        @endforeach

</table>

<div>
    <p>forme tset</p>
    Inpute: <input type="text" >
 </div>

</body>
</html>
