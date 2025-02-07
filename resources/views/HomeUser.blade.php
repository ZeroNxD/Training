<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    <title>Home User</title>
</head>
<body>
    <div class="container">
        <h1 style="font-weight: bold; margin-top: 20px;">User Management Table</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success" style="margin-top: 20px;">
            {{ session('success') }}
        </div>
    @endif
    
    @if (!empty($allusers))
    <div class="container" style="text-align: right;"> 
        <button class="btn btn-primary" style="font-weight: bold; margin-top: 20px; margin-left: 30px; width: 150px;" onclick="window.location.href='{{ route('CreateForm')}}'">
            Add User
        </button>
    </div>
    <div class="container mt-5">
        <table id="usersTable" class="display">
            <thead>
                <th style="text-align: center;">Number</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Action</th>
            </thead>
    
            <tbody>
                @foreach($allusers as $index => $user)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td style="text-align: center;">{{ $user->name }}</td>
                    <td style="text-align: center;">{{ $user->email }}</td>
                    <td style="text-align: center;">
                        @if ($user->status == 'Success')
                            <span style="color: green">{{$user->status}}</span>
                        @elseif ($user->status == 'Failed')
                            <span style="color: red">{{$user->status}}</span>
                        @else
                            <span style="color: blue">NULL</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p>No Data Avaiable</p>
    @endif
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable();
        });
    </script>
</body>

</html>