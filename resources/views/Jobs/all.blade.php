<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>List Jobs 1</h1>
        @foreach ($jobs as $job)
            <p>{{ $job->id }}</p>
            <p>{{ $job->title }}</p>
            <p>{{ $job->description }}</p>
            <p>Dauer: {{ $job->dauer }}</p>
            <a href="{{ route('jobs.show', $job->id )}}">Show</a>
            <a href="{{ route('jobs.edit', $job->id )}}">Edit</a>
            <form action="{{ route('jobs.destroy', $job->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type=submit>DELETE</button>
            </form>
        @endforeach
    </body>
</html>