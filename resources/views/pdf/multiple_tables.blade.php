<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Tables PDF</title>
    <style>
        h1 {
            color:red;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
<h1>My PDF</h1>
    <p>Date: @php echo date('Y-m-d'); @endphp</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>
    <h1>Table 1: User Data</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tableData1 as $row)
            <tr>
                <td>{{ $row['id'] }}</td>
                <td>{{ $row['name'] }}</td>
                <td>{{ $row['age'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Table 2: Product Data</h1>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tableData2 as $row)
            <tr>
                <td>{{ $row['product'] }}</td>
                <td>{{ $row['price'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
