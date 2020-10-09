@extends('layouts.app')

@section('content')
    <div style="margin:0% 10% 4% 10%;">
        <div>
            @can('update', $job)
                <a class="btn btn-primary" href="{{ route('jobs.edit', $job)}}">Edit</a>
            @endcan
            @can('delete', $job)
                <form style="display: inline-block;margin-left:2%;" action="{{ route('jobs.destroy', $job) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type=submit>DELETE</button>
                </form>
            @endcan
        </div>
        <h1 style="margin:2% 0% 2% 0%;">{{ $job->title }}</h1>
        <div class="card">
            <div class="card-header">Description</div>
                <div class="card-body">
                    <p>{{ $job->description }}</p>
                </div>
            </div>
        </div>
        <div class="card" style="margin:0% 10% 0% 10%;">
            <div class="card-header">Company</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $company->name }}</h5>
                    <p>{{ $company->description }}</p>
                    <p>{{ $company->address }}</p>
                    <p>{{ $company->email }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
