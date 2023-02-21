<!DOCTYPE html>
<html>

<head>
    <title>Images Uploader</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <div>
        <h1> Product Management</h1>
        <table id="datatable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>product name</th>
                    <th>product description</th>
                    <th>product product_sku</th>
                    {{-- <th>product cost</th> --}}
                    <th>product image</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>



    </div>

</body>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            processing: true,
            serverside: true,
            order: [
                [0, "desc"]
            ],
            ajax: "{{ route('listUser') }}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'product_name'
                },
                {
                    data: 'product_description'
                },
                {
                    data: 'product_sku',

                },
                {
                    data: 'product_image',
                    render: function(data, type, row) {

                        var img1 = 'http://localhost:8000/' + data;

                        console.log(data);
                        return `<img src=${img1} width="100" height="100"/>`;




                    }
                }



            ]
        });
    });
</script>


</html>
