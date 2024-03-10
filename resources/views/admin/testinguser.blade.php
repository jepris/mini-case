<!-- resources/views/users/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <form method="POST" action="{{ route('admin.update', $user->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ $user->name }}"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ $user->email }}"><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
