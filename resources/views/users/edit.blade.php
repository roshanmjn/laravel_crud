<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>

    <h2>Edit User</h2>

    <form method="POST" action="{{ route('user.update', ['id' => $user->id]) }}">
        @csrf
        @method('put')

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="{{ $user->first_name }}" id="first_name">

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="{{ $user->last_name }}" id="last_name">

        <label for="email">Email:</label>
        <input type="text" name="email" value="{{ $user->email }}" id="email">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Update">
    </form>

</body>
</html>
