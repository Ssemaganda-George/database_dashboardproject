<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Data Table</title>
</head>

<body>
    @include('NavBar')
    <div class="container mt-5">
        @if (session('success'))
                <div id="notification" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    // Add a script to hide the notification after a specified time (e.g., 5000 milliseconds = 5 seconds)
                    setTimeout(function () {
                        document.getElementById('notification').style.display = 'none';
                    }, 5000);
                </script>
        @endif

        <!-- Added this line -->
        <a href="/branch/create" class="btn btn-primary mb-3">Create New Branch</a>

        <table id="myTable">
            <caption>This is the Branches' table</caption>
            <!-- <table class="table table-striped"> -->
            <thead>
                <tr>
                    <th>BranchNumber</th>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($branches as $branch)
                    <tr>
                        <td>{{$branch->BranchNumber}}</td>                        
                        <td>{{$branch->Address}}</td>
                        <td>{{$branch->Telephone}}</td>
                        <td>
                            <a href="{{ route('branch.edit', ['branch_id' => $branch->BranchNumber]) }}"
                                class="btn btn-primary">Edit</a>
                            <a href="{{ route('branch.destroy', ['branch_id' => $branch->BranchNumber]) }}"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>
</html>
