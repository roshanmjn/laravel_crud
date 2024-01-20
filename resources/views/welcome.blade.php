<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Full height of the viewport */
            margin: 0;
        }

        div {
            margin-bottom: 20px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        form, a {
            text-align: center;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div>
        <h1>Home</h1>
    </div>

    <div>
       <div style="margin-bottom:10px;">
             <a href="/login">
                <button type="submit">Create User</button>
            </a>
       </div>

        <a href="/login">
            <button>Login</button>
        </a>
    </div>
</body>
</html>
