<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <h1>User</h1>
    @if(isset($error))
    <p>User id doesn't exist</p>
    @endif
    @if(isset($success))
    <p>{{$success}}</p>
    @endif
    @if(isset($id))
    <p>id: {{ $id }}</p>
    @endif
    @if(isset($user))
    <p>user: {{ $user }}</p>
    @endif
</body>
</html> 