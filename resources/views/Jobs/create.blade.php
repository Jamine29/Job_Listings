@extends('layouts.app')

@section('content')
        <div style="margin:0% 10% 4% 10%;">
            <h1 style="margin-bottom:2%;">Create a new Job<h1>
            @if($errors->any())
                <div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('jobs.store') }}">
                @csrf
                  <div class="form-group">
                    <label for="companyId">Company</label>
                    <select class="form-control" id="companyId" name="companyId">
                        @foreach(auth()->user()->companies()->get() as $company) {
                            <option value={{ $company->id}}>{{ $company->name }}</option>
                        }
                        @endforeach
                    </select>
                    @error('companyId')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <textarea rows="2" maxlength="150" class="form-control @error('title') is-invalid @enderror" name="title" autofocus>{{old('title', '')}}</textarea>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="2" maxlength="250" class="form-control @error('description') is-invalid @enderror" name="description">{{old('description', '')}}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
@endsection