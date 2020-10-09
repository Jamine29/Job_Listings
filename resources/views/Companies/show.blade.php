@extends('layouts.app')

@section('content')
    <div style="margin:0% 10% 4% 10%;">
        <div>
            @can('update', $company)
                <a class="btn btn-primary" href="{{ route('companies.edit', $company)}}">Edit</a>
            @endcan
            @can('delete', $company)
                <form style="display: inline-block;margin-left:2%;" action="{{ route('companies.destroy', $company) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type=submit>DELETE</button>
                </form>
            @endcan
        </div>
        <h1 style="margin:2% 0% 2% 0%;">{{ $company->name }}</h1>
        <div class="card">
            <div class="card-header"><h5 class="card-title">Company</h5></div>
                <div class="card-body">
                    <h5 class="card-title">Description</h5>
                    <p>{{ $company->description }}</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Address</h5>
                    <p>{{ $company->address }}</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">E-Mail</h5>
                    <p>{{ $company->email }}</p>
                </div>
            </div>
        </div>

        <div class="card" style="margin:0% 10% 2% 10%;">
            <div class="card-header">Jobs</div>
                @foreach ($jobs as $job)
                    <div class="card-body">
                        <a href="{{ route('jobs.show', $job)}}">
                            <h5 class="card-title">{{ $job->title }}</h5>
                        </a>
                        <p>{{ $job->description }}</p>
                        <a class="btn btn-primary" href="{{ route('jobs.show', $job->id )}}">Show Job</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
