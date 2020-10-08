@extends('layouts.app')

@section('content')
    <h1 style="margin:0% 10% 4% 10%;">Jobs</h1>
    @foreach ($jobs as $job)
        @can('view-any', $job)
            <div class="card" style="margin:4% 10% 4% 10%;">
                <div class="card-body">
                    <a href="{{ route('jobs.show', $job)}}">
                        <h5 class="card-title">{{ $job->title }}</h5>
                    </a>
                    <p>{{ $job->description }}</p>
                    <a class="btn btn-primary" href="{{ route('jobs.show', $job->id )}}">Show Job</a>
                </div>
            </div>
        @endcan
    @endforeach
@endsection
    