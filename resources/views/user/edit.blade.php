@extends("layout.layout")

@section("content")
    <form method="post" action="{{ $baseUrl }}user/update" id="formEdit">
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" name="id" class="form-control" value="{{ $result['id'] }}" id="id" placeholder="" readonly>
        </div>
        <div class="form-group">
            <label for="username">Name</label>
            <input type="text" name="username" class="form-control" value="{{ $result['name'] }}" id="name" placeholder="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{ $result['email'] }}" id="email" placeholder="email">
        </div>
        <button type="submit" name="update" class="btn btn-primary" id="update">Update</button>
        <div>
            <a href="{{ $baseUrl }}">Return Home</a>
        </div>
    </form>
@endsection