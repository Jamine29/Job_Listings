@extends('./layouts.app')


@section('content')
        <h1>Erstelle Company<h1>
        <div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('companies.store') }}">
                @csrf
                <div class={{$errors->has('company_name')}}>
                    <label for="company_name">Company Name:</lable>
                    <input type="text" name="company_name" value="{{old('company_name')}}" /> 
                </div>
                @if ($errors->has('last_name'))
                    <span>
                        hier
                    <span>
                @endif
                <div>
                    <label for="number_of_employees">Number of Employees:</label>
                    <input type="text" name="number_of_employees" />
                </div>
                <div>
                    <label for="email">E-Mail:</label>
                    <input type="text" name="email" />
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type=input name="password" />
                </div>
                <button type="submit">Sign Up</button>
            </form>
        </div>
@endsection