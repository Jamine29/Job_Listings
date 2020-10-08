@extends('layouts.app')


@section('content')
        <div>
            @if($errors->any())
                <div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('companies.update', $company->id) }}">
                @csrf
                @method('PATCH')
                <div class={{$errors->has('first_name')}}>
                    <label for="company_name">Company Name:</lable>
                    <input type="text" name="company_name" value="{{old('company_name', $company->company_name)}}" /> 
                </div>
                @if ($errors->has('number_of_employees'))
                    <span>
                        hier
                    <span>
                @endif
                <div>
                    <label for="number_of_employees">Number of employees:</label>
                    <input type="text" name="number_of_employees" value="{{old('number_of_employees', $company->number_of_employees)}}" />
                </div>
                <div>
                    <label for="email">E-Mail:</label>
                    <input type="text" name="email" value="{{old('email', $company->email)}}"/>
                </div>
                <button type="submit">Update Company</button>
            </form>
        </div>
@endsection