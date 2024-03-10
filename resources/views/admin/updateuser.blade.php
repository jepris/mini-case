<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data | Online Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @csrf
        <h1 class="text-center mt-3">Update Kursus Online</h1>
            <div class="card" style="margin-top: 70px">
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
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"><br>
        
        <label for="notelp">Phone Number:</label><br>
        <input type="text" id="notelp" name="notelp" value="{{ old('notelp', $user->notelp) }}"><br>
        
        <label for="jeniskelamin">Gender:</label><br>
        <select id="jeniskelamin" name="gender">
            <option value="pria" {{ old('gender', $user->jeniskelamin) === 'pria' ? 'selected' : '' }}>Pria</option>
            <option value="wanita" {{ old('gender', $user->jeniskelamin) === 'wanita' ? 'selected' : '' }}>Wanita</option>
        </select><br>
        
        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="active" {{ old('status', $user->status) === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $user->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select><br><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>

            </div>
        </div>
    </div>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
