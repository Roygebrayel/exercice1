<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        table {
            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        td {
            text-align: left;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45A049;
        }
    </style>
</head>
<body>

<h2>User Details</h2>

<table>
    <tr>
        <th>ID</th>
        <td>{{ $person->id }}</td>
    </tr>
    <tr>
        <th>First Name</th>
        <td>{{ $person->first_name }}</td>
    </tr>
    <tr>
        <th>Last Name</th>
        <td>{{ $person->last_name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $person->email }}</td>
    </tr>
    <tr>
        <th>Gender</th>
        <td>{{ $person->gender }}</td>
    </tr>
    <!-- Add more details here if needed -->
</table>

<!-- Back button to return to the table -->
<button onclick="window.location='{{ route('person.index') }}';">Back</button>

</body>
</html>
