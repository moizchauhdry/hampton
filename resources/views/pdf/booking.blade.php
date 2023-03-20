<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking - {{$booking->id}}</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table table,
        .table th,
        .table td {
            width: 100%;
            border: 1px solid rgb(194, 189, 189);
            padding: 3px;
            font-size: 14px;
            text-align: left
        }
    </style>
</head>

<body>
    @include('pdf.partials.booking')
</body>

</html>