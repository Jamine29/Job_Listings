@extends('layouts.app')

@section('content')
    <div>
        <div style="margin:0% 10% 4% 10%;">
            <h1 style="margin-bottom:2%;">Create a new Company<h1>
            <form method="POST" action="{{ route('companies.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name', '')}}" maxlength="150" autofocus/>
                    @error('name')
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

                <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" value="{{old('address', '')}}" maxlength="150" />
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{old('email', '')}}" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                                <p>{{ $message }}</p>
                        </span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>
@endsection
