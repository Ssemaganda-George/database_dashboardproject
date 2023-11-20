<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Data Table</title>
    
</head>

<body>
    @include('NavBar')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Added this line -->
        <a href="/staff/create" class="btn btn-primary mb-3">Create New Staff</a>

        <table id="myTable">
            <caption>This is the staff table</caption>
            <thead>
                <tr>
                    <th>Staff No</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Branch No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $staff->StaffNumber }}</td>
                        <td>{{ $staff->Name }}</td>
                        <td>{{ $staff->Position }}</td>
                        <td>{{ $staff->Salary }}</td>
                        <td>{{ $staff->branch->BranchNumber }}</td>
                        <td>
                            <a href="{{ route('staff.edit', ['staff_id' => $staff->StaffNumber]) }}"
                                class="btn btn-primary">Edit</a>
                            <a href="{{ route('staff.destroy', ['staff_id' => $staff->StaffNumber]) }}"
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
