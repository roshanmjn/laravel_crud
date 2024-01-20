<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .create-user {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .create-user label {
            display: block;
            margin-bottom: 5px;
        }

        .create-user input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .create-user input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        .create-user input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    
    <div class="create-user">
    @if(isset($errors)&& $errors->any())
    <div style="margin: 20px; padding: 20px; border: 1px solid #e74c3c; background-color: #f2dede; color: #a94442; border-radius: 5px;">
        <ul style="list-style-type: none; padding: 0;">
            @foreach($errors->all() as $error)
                <li style="margin-bottom: 10px;">{{ $error }}</li>
            @endforeach
            @php
            $errors = null;
            @endphp
        </ul>
    </div>
    @endif
    <form method="post" action="{{route('user.save')}}">
        @csrf
        @method('post')

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name">

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name">

        <label for="email">Email:</label>
        <input type="text" name="email" id="email">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Submit">
    </form>
    </div>
</body>
</html>
