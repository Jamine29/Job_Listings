<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Show Job</h1>
        <p>{{ $job->id }}</p>
        <p>{{ $job->title }}</p>
        <p>{{ $job->description }}</p>
        <p>{{ $job->dauer }}</p>
        <p>{{ $job->company_id }}</p>
    </body>
</html>