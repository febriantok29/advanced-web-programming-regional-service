<!DOCTYPE html>
<html>

<head>
    <title>Customer PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .customer-details {
            margin-bottom: 20px;
        }

        .customer-details th,
        .customer-details td {
            text-align: left;
            padding: 8px;
        }

        .customer-details th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Customer Information</h1>
    </div>
    <div class="customer-details">
        <table>
            <tr>
                <th>Name:</th>
                <td>{{ $customer->name }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $customer->email }}</td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td>{{ $customer->phone }}</td>
            </tr>
            <tr>
                <th>Address:</th>
                <td>{{ $customer->address }}</td>
            </tr>
            <tr>
                <th>Regional:</th>
                <td>{{ $customer->regional->name }}</td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <p>Generated on {{ \Carbon\Carbon::now()->toFormattedDateString() }}</p>
    </div>
</body>

</html>
