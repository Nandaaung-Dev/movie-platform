<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form method="post" action="{{ route('movies.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="my-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="my-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" rows="2" id="description" placeholder="Enter description" name="description"></textarea>
            </div>
            <div class="my-3">
                <label for="image" class="form-label" class="form-control">Upload Image:</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <div class="my-3">
                <label for="rating" class="form-label">Rating:</label>
                <input type="number" class="form-control" id="rating" placeholder="Enter Rating" name="rating">
            </div>
            <div class="my-3">
                <label for="category" class="form-label">Category:</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
