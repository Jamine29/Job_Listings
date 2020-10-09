@extends('layouts.app')

@section('content')
        <div style="margin:0% 10% 4% 10%;">
            <h1 style="margin-bottom:2%;">Edit Job<h1>
            <form method="POST" action="{{ route('jobs.update', $job) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="hidden" id="companyId" name="companyId" value="{{old('companyId', $job->companyId)}}" /> 
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title', $job->title)}}" maxlength="150" autofocus/>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="2" maxlength="250" class="form-control @error('description') is-invalid @enderror" name="description">{{old('description', $job->description)}}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
                <a class="btn btn-danger" href="{{ route('jobs.show', $job)}}">Cancel</a>
            </form>
        </div>
@endsection
