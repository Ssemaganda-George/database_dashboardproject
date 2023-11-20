<!DOCTYPE <!DOCTYPE html> <html> <head> <meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    @include('NavBar')
    <div class="container mt-5">
        <!-- <table class="table table-striped"> -->
        <!-- <table class="table table-bordered"> -->
        <!-- <table class="table table-hover"> -->
        <!-- <div class="table-responsive">
            <table class="table table-striped"> -->
        <!-- <table id="myTable"> -->
        <!-- <table class="table table-dark table-striped"> -->
        <!-- <table class="table table-hover">

            <thead>
                <tr>
                    <th>RentalNumber</th>
                    <th>RentalDate</th>
                    <th>DueDate</th>
                    <th>ActualReturnDate</th>
                    <th>MemberNumber</th>
                    <th>VideoCatalogNumber</th>
                    <th>VideoNumber</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                <tr>
                    <td>{{$rental->RentalNumber}}</td>                        
                    <td>{{$rental->RentalDate}}</td>
                    <td>{{$rental->DueDate}}</td>
                    <td>{{$rental->ActualReturnDate}}</td>                        
                    <td>{{$rental->MemberNumber}}</td>
                    <td>{{$rental->VideoCatalogNumber}}</td>
                    <td>{{$rental->VideoNumber}}</td>                        
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>let table = new DataTable('#myTable');</script>
</body>

</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.8/css/jquery.dataTables.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-bottom: none;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 0;
        }

        .table {
            border-radius: 15px;
            overflow: hidden;
        }

        .table thead th {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .badge-primary {
            background-color: #007bff;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .badge-danger {
            background-color: #dc3545;
        }
    </style>
    <title>Enhanced Bootstrap Table</title>
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Rentals Table</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- <table class="table table-striped"> -->
                <table class="table table-striped" id="myTable">
                <!-- <table class="table table-dark table-striped"> -->
                    <thead>
                        <tr>
                            <th>RentalNumber</th>
                            <th>RentalDate</th>
                            <th>DueDate</th>
                            <th>ActualReturnDate</th>
                            <th>MemberNumber</th>
                            <th>VideoCatalogNumber</th>
                            <th>VideoNumber</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rentals as $rental)
                    <tr>
                        <td>{{$rental->RentalNumber}}</td>                        
                        <td>{{$rental->RentalDate}}</td>
                        <td>{{$rental->DueDate}}</td>
                        <td>{{$rental->ActualReturnDate}}</td>                        
                        <td>{{$rental->MemberNumber}}</td>
                        <td>{{$rental->VideoCatalogNumber}}</td>
                        <td>{{$rental->VideoNumber}}</td>                        
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            Your additional content or actions can go here
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.2.slim.min.js" integrity="sha384-qJkI/Jz9T0I7doJg2P9lurp7C0DT4/Saf1T/06PfrFcmEj4Q2jWf5LVoEDE2uL5M" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQeAepzDtONXP8yl5EZfpx9oNXQlAfnE9U5LcplbWl2UjLhOA+9q" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.8/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>



