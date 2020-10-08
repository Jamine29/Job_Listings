@extends('layouts.app')

@section('content')
    <div>
        <h1>List Companies</h1>
        <a href="{{ route('companies.create')}}">Create</a>
        <p>count companies: {{count($companies)}}</p>
        @foreach ($companies as $company)
            @can('view-any', $company)
            <p>{{ $company->id }}</p>
            <p>{{ $company->company_name }}</p>
            <p>{{ $company->number_of_employees }}</p>
            <p>{{ $company->email }}</p>
            <a href="{{ route('companies.show', $company->id )}}">Show</a>
            <a href="{{ route('companies.edit', $company->id )}}">Edit</a>
            
            <form action="{{ route('companies.destroy', $company->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type=submit>DELETE</button>
            </form>
            @endcan
        @endforeach
    </div>   
@endsection