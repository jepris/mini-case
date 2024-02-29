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
        <h1 class="text-center mt-3">Edit Kursus Online</h1>
            <div class="card" style="margin-top: 70px">
                <form style="margin: 30px" action="/dashboard/kursus/{{ $kursus->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Cover</label>
                        <input class="form-control" type="file" id="cover" name="cover" required autofocus value="{{ old('cover',$kursus->cover) }}">
                      </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" aria-describedby="emailHelp"
                            required autofocus value="{{ old('judul',$kursus->judul) }}">
                    </div>
                    <div class="mb-3">
                          <label for="category" class="form-label">Category</label>
                            <select name="category" class="form-select" id="category">
                                @foreach($category as $categories)
                                    <option value="{{ $categories->id }}" {{ old('category', $kursus->category_id) == $categories->id ? 'selected' : '' }}>
                                        {{ $categories->name }}
                                    </option>
                                @endforeach
                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                        <input type="textarea" name="description" class="form-control" id="description"
                        required autofocus value="{{ old('description',$kursus->description) }}">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
