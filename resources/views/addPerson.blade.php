<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45A049;
        }
    </style>
    </head>
<body>
    <h1>Welcome to our site</h1>
    <form  action="{{route('person.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" name="first_name" id="firstName" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" name="last_name" id="lastName" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <div>
                <input type="radio" name="gender" value="male" id="male" required>
                <label for="male">Male</label>
            </div>
            <div>
                <input type="radio" name="gender" value="female" id="female" required>
                <label for="female">Female</label>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</body>
</html>
