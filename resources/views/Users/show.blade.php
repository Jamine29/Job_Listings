@extends('layouts.app')

@section('content')
    <div class="container" style="margin:0% 10% 4% 10%;">
        <h1>Account</h1>
        <p>Name: {{ $user->name }}</p>
        <p>E-Mail: {{ $user->email }}</p>

        <form style="display: inline-block;" action="{{ route('users.destroy', $user) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type=submit>DELETE</button>
        </form>
    </div>
@endsection