<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit, .delete {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #4caf50;
            color: white;
            border-radius: 4px;
            margin-right: 5px;
        }

        .delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>

    <h2>User Management</h2>
    @if(isset($error))
    <p>User id doesn't exist</p>
    @endif
    @if(isset($success))
    <p>{{$success}}</p>
    @endif
    @if(isset($users) && count($users) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->first_name .' '. $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form method="GET" action="{{ route('user.edit', ['id' => $user->id]) }}">
                    @csrf
                    <button type="submit" class="edit">Edit</button>
                </form>
                <form method="POST" action="{{ route('user.destroy', ['id' => $user->id]) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    @else
        <p>No users found.</p>
    @endif

</body>
</html>
