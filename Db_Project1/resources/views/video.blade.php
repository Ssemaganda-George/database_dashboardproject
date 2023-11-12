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
        <table id="myTable">

            <thead>
                <tr>
                    <th>CatalogNumber</th>
                    <th>VideoNumber</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>DailyRental</th>
                    <th>Cost</th>
                    <th>Status</th>
                    <th>MainActors</th>
                    <th>Director</th>
                    <th>BranchNumber</th>
                    <th>MovieYear</th>
                </tr>
            </thead>
            <tbody>
                @foreach($videos as $video)
                <tr>
                    <td>{{$video->CatalogNumber}}</td>                        
                    <td>{{$video->VideoNumber}}</td>
                    <td>{{$video->Title}}</td>
                    <td>{{$video->Category}}</td>                        
                    <td>{{$video->DailyRental}}</td>
                    <td>{{$video->Cost}}</td>
                    <td>{{$video->Status}}</td>                        
                    <td>{{$video->MainActors}}</td>
                    <td>{{$video->Director}}</td>
                    <td>{{$video->BranchNumber}}</td>                        
                    <td>{{$video->MovieYear}}</td>
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

</html>
