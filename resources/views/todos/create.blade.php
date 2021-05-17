<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Todos</title>
</head>

<body>
    <div class="container">
        @if (session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message') }} </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{  route("todo.store") }}">
            @csrf
            <div class="m-3">
                <h1>What next you need To-Do</h1>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <button type=" submit" class="btn btn-primary m-3">Submit</button>
        </form>
    </div>
</body>

</html>