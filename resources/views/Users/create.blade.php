<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Erstelle User<h1>
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
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class={{$errors->has('first_name')}}>
                    <label for="first_name">First Name:</lable>
                    <input type="text" name="first_name" value="{{old('first_name')}}" /> 
                </div>
                @if ($errors->has('last_name'))
                    <span>
                        hier
                    <span>
                @endif
                <div>
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" />
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
    </body>
</html>