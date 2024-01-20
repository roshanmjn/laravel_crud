<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #217dbb;
        }
    </style>
</head>
<body>
<div>
<div id='loginResult'></div>
<form id="login" method="POST">
    <label for="email">Email:</label>
    <input type="text" name="email" >

    <label for="password">Password:</label>
    <input type="password" name="password" >

    <button type="submit">Login</button>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#login').submit(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('user.login') }}", 
                data: formData,
                success: function (response) {
                    $('#loginResult').html(response);
                    console.log(response)
                    window.location.href = "/dashboard";
                },
                error: function (error) {
                    console.log(error)
                    $('#loginResult').html('Error: ' + error.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
