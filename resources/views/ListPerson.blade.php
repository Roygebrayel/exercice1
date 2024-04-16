<!DOCTYPE html>
<html>
<head>
    <style>
        table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border: 1px solid #ddd;
}

th {
  text-align: center;
  background-color: #f2f2f2;
}

form {
  border: 1px solid #ddd;
  padding: 10px;
  width: 300px; /* Adjust width as needed */
  margin: 0 auto; /* Center the form horizontally */
}

label {
  display: block; /* Makes labels appear on new lines */
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px; /* Rounded corners */
}

input[type="submit"] {
  background-color: #4CAF50; /* Green color */
  color: white;
  padding: 8px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer; /* Change cursor to indicate clickability */
}

input[type="submit"]:hover {
  background-color: #45A049; /* Darker green on hover */
}
    </style>
</head>
<body>

<h2>person Table</h2>

<form action="{{ route('person.index') }}" method="GET">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" placeholder="Enter name or email.." value="{{ $search }}">
    <input type="submit" value="Search">
</form>

<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>lastname</th>
        <th>email</th>
        <th>gender</th>
        <th>action</th>
    </tr>

    @foreach($all as $per) 
        <tr >
            <td onclick="window.location='{{ route('person.show', ['person' => $per->id]) }}';" style="cursor: pointer;">{{$per->id}}</td>
            <td>{{$per->first_name}}</td>
            <td>{{$per->last_name}}</td>
            <td>{{$per->email}}</td>
            <td>{{$per->gender}}</td>
            <td >
                <a href="{{ route('person.edit', ['person' => $per->id]) }}">edit</a>
                <form action="{{ route('person.destroy', ['person' => $per->id]) }}" method="post" onsubmit="return confirmDelete()">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete">
                </form>
            </td>
        </tr>
    @endforeach
</table>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this user?");
    }
</script>

</body>
</html>
