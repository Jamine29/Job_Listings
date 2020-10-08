<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>List CompanyUsers</h1>
        @foreach ($companyUsers as $companyUser)
            <p>Company id:{{ $companyUser->company_id }}</p>
            <p>User id:{{ $companyUser->user_id }}</p>
            <form action="{{ route('companyUsers.destroy',['company_id' => $companyUser->company_id, 'user_id' => $companyUser->user_id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type=submit>DELETE</button>
            </form>
        @endforeach
    </body>
</html>