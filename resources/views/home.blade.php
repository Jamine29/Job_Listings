@extends('layouts.app')

@section('content')
    <div class="container" style="margin:0% 10% 4% 10%;">
        <h1 style="margin:2% 0;">Your Companies</h1>
        @foreach (auth()->user()->companies()->get() as $company)
            <div class="card" style="margin-bottom:4%;">
                <div class="card-body">
                    <a href="{{ route('companies.show', $company)}}">
                        <h5 class="card-title">{{ $company->name }}</h5>
                    </a>
                    <p>{{ $company->description }}</p>
                    <a class="btn btn-primary" href="{{ route('companies.show', $company->id )}}">Show Company</a>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
