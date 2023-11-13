<!-- Include DataTables Editable JavaScript -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.1.4/js/dataTables.rowGroup.min.js"></script>



<script>
    $(document).ready(function () {
        let table = $('#myTable').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": [0] } // Disable sorting for the first column
            ]
        });

        // Enable DataTables Editable
        table.MakeCellsEditable({
            "onUpdate": myCallbackFunction,
            "inputCss": 'my-input-class',
            "columns": [1, 2], // Specify which columns are editable (indexes start from 0)
            "allowNulls": {
                "columns": [1, 2], // Specify which columns allow null values
                "errorClass": 'error' // Specify the error class for null value
            },
            "confirmationButton": { "confirmCss": 'btn btn-success', "cancelCss": 'btn btn-danger' }
        });
    });

    // Callback function when cell is updated
    function myCallbackFunction(updatedCell, updatedRow, oldValue) {
        console.log("Cell updated: " + updatedCell.data());
    }
</script>

<style>
    .my-input-class {
        width: 100%;
        box-sizing: border-box;
    }
</style>


<script src="https://cdn.datatables.net/1.13.7/js/dataTables.jqueryui.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.jqueryui.min.css">

