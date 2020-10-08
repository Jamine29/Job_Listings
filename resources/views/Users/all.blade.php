<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>List User</h1>
        @foreach ($users as $user)
            <p>{{ $user->id }}</p>
            <p>{{ $user->first_name }}</p>
            <p>{{ $user->last_name }}</p>
            <p>{{ $user->email }}</p>
            <a href="{{ route('users.show', $user->id )}}">Show</a>
            <a href="{{ route('users.edit', $user->id )}}">Edit</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type=submit>DELETE</button>
            </form>
        @endforeach
    </body>
</html>