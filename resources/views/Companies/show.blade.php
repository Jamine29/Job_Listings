<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Show Company</h1>
        <p>{{ $company->id }}</p>
        <p>{{ $company->company_name }}</p>
        <p>{{ $company->number_of_employees }}</p>
        <p>{{ $company->email }}</p>
    </body>
</html>