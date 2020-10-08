<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Erstelle Job<h1>
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
            <form method="POST" action="{{ route('jobs.store') }}">
                @csrf
                <div class={{$errors->has('title')}}>
                    <label for="title">Job Title:</lable>
                    <input type="text" name="title" value="{{old('title')}}" /> 
                </div>
                <div>
                    <label for="description">Description:</label>
                    <input type="text" name="description" value="{{old('description')}}" />
                </div>
                <div>
                    <label for="dauer">Dauer:</label>
                    <input type="text" name="dauer" value="{{old('dauer')}}" />
                </div>
                <div>
                    <label for="company_id">Company Id:</label>
                    <input type="text" name="company_id" value="{{old('company_id')}}" />
                </div>
                <button type="submit">Create</button>
            </form>
        </div>
    </body>
</html>