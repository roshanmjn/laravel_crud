<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    @if(isset($errors) && $errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{$message}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(cookie('access_token'))
    <script>
        console.log(document.cookie)
        // if (!document.cookie.includes('access_token')) {
        //     window.location.href = '/login';
        // }
    </script>
    @endif

    <div>
        <p>hi {{$user}}</p>
        <a href="/logout">
            <button>Logout</button>
        </a>
    </div>
</body>
</html>