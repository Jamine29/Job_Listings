<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Show User</h1>
        <p>{{ $user->id }}</p>
        <p>{{ $user->first_name }}</p>
        <p>{{ $user->last_name }}</p>
        <p>{{ $user->email }}</p>
    </body>
</html>