@extends('layouts.app')

@section('content')
    <div style="margin:0% 10% 4% 10%;">
        <h1 style="margin-bottom:4%;">Jobs</h1>
        @foreach ($jobs as $job)
            <div class="card" style="margin-bottom:4%;">
                <div class="card-body">
                    <a href="{{ route('jobs.show', $job)}}">
                        <h5 class="card-title">{{ $job->title }}</h5>
                    </a>
                    <p>{{ $job->description }}</p>
                    <a class="btn btn-primary" href="{{ route('jobs.show', $job->id )}}">Show Job</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
    