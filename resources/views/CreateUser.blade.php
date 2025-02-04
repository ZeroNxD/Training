<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create User</title>
</head>
<body> 
    <div class="container">
        <h1 style="font-weight: bold; margin-top: 20px;">Create New User</h1>
        <form action="{{ route('AddUser') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="formFile" class="form-label" style="font-weight: bold; margin-top: 20px;">Name</label>
                <input class="form-control" type="text" name="name" value="{{old('name')}}">
                @error('name')
                    <p class="text-red-500 text-xs" style="color: red; font-weight: bold;">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="formFile" class="form-label" style="font-weight: bold; margin-top: 20px;">Email</label>
                <input class="form-control" type="email" name="email" value="{{old('email')}}">
                @error('email')
                    <p class="text-red-500 text-xs" style="color: red; font-weight: bold;">{{$message}}</p>
                @enderror
            </div>

            <button type='submit' class="btn btn-success">Add New User</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>