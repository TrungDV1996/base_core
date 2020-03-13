@extends("layout.layout")
@section("content")
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($result as $value)
            <tr>
                <th scope="row">{{ $value['id'] }}</th>
                <td>{{ $value['name'] }}</td>
                <td>{{ $value['email'] }}</td>
                <td>{{ $value['password'] }}</td>
                <td><a href="{{ $baseUrl }}user/edit/{{ $value['id'] }}">Edit</a></td>
                <td>
                    <a href="{{ $baseUrl }}user/delete/{{ $value['id'] }}" onclick="return confirm('Are You Sure?')">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection