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

        <form action="{{ route('member.update', $members->MemberNumber) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="member_number" class="form-label">MemberNumber</label>
                <input type="text" class="form-control" id="member_number" name="member_number"
                    value="{{ old('member_number', $members->MemberNumber) }}">
            </div>

            <div class="mb-3">
                <label for="first_name" class="form-label">FirstName</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    value="{{ old('first_name', $members->FirstName) }}">
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">LastName</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    value="{{ old('last_name', $members->LastName) }}">
            </div>

            <div class="mb-3">
                <label for="member_address" class="form-label">Address</label>
                <input type="text" class="form-control" id="member_address" name="member_address"
                    value="{{ old('member_address', $members->Address) }}">
            </div>

            <div class="mb-3">
                <label for="registration_date" class="form-label">RegistrationDate</label>
                <input type="text" class="form-control" id="registration_date" name="registration_date"
                    value="{{ old('registration_date', $members->RegistrationDate) }}">
            </div>

            <div class="mb-3">
                <label for="branch_number" class="form-label">Branch Address</label>
                <select class="form-control" id="branch_number" name="branch_number">
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->BranchNumber }}"
                            {{ $branch->BranchNumber == $members->BranchNumber ? 'selected' : '' }}>
                            {{ $branch->Address }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="balance" class="form-label">Balance</label>
                <input type="text" class="form-control" id="balance" name="balance"
                    value="{{ old('balance', $members->Balance) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
