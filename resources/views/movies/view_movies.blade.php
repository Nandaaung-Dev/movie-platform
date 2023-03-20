<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    @foreach ($movies as $movie)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $movie->name }}</h5>
                <p class="card-text">{{ $movie->description }}</p>
                <p class="card-text">Rating:{{ $movie->rating }}</p>
                <p class="card-text">Category: <b>{{ $movie->category_id }}</b></p>
                <img src="{{ url('storage/images/' . $movie->image) }}" style="height: 200px; width: 150px;">
            </div>
        </div>
    @endforeach
</div>
