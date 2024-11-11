<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Items List</title>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

</head>
<body>
    <!-- resources/views/components/data-table.blade.php -->
    <div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card p-5">
                <div class="data-table">
                    <table id="{{ $id }}" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                {{ $header }}
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

<script>
    $(document).ready(function() {
        $('#{{ $id }}').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ $ajaxUrl }}',
            columns: [
                @foreach($columns as $column)
                    { data: '{{ $column['data'] }}', name: '{{ $column['name'] }}' },
                @endforeach
            ]
        });
    });
</script>