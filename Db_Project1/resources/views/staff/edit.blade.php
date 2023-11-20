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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('staff.update', $staff->StaffNumber) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $staff->Name) }}">
            </div>

            <div class="mb-3">
                <label for="branch_number" class="form-label">Branch Address</label>
                <select class="form-control" id="branch_number" name="branch_number">
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->BranchNumber }}"
                            {{ $branch->BranchNumber == $staff->BranchNumber ? 'selected' : '' }}>
                            {{ $branch->Address }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position"
                    value="{{ old('position', $staff->Position) }}">
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="text" class="form-control" id="salary" name="salary"
                    value="{{ old('salary', $staff->Salary) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
