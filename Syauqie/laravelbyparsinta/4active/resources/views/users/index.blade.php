<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users Page</title>
</head>

<body>
    @foreach ($users as $user)
        <ul>{{ $user['name'] }}</ul>
        <ul>{{ $user['email'] }}</ul>
    @endforeach
</body>

</html>
