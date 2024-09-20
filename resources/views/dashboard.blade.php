<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Dashboard</h1>
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </thead>
            <tbody>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td><a href="logout">Logout</a></td>
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <div class="row">
            <div class="col-md-col-md-offset-4">
                <h2>Add post</h2>
                <form action="{{ route('add-post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="title">TITLE HEADING</label>
                        <input type="text" name="title" class="form-control">
                        <input type="hidden" name="userid" value="{{Session::get('loginId')}}" class="form-control">
                        <span class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="contain">Add contain</label>
                        <textarea class="form-control" name="contain"></textarea>
                        <span class="text-danger">
                            @error('contain')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success">Submit</button>
                    </div>
                    <br>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <th>Post title</th>
                    <th>Post</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                @foreach ($postdata as $abc)
                <tbody>
                    <td>{{ $abc->title }}</td>
                    <td>{{ $abc->post }}</td>
                    <td>
                        @if ($abc->status==1)
                        <img height="40" width="40" src ="{{asset('assets/images/active.jpg')}}" />
                        @else
                        <img height="20" width="20" src ="{{asset('assets/images/inactive.jpg')}}" />
                        @endif

                    </td>
                    <td>
                        @if ($abc->status==1)
                        <a href="inactive/{{$abc->id}}">Like</a>
                        @else
                        <a href="active/{{$abc->id}}">Unlike</a>
                        @endif
                        &nbsp; &nbsp;
                        <a href="delete/{{$abc->id}}">DELETE</a>
                    </td>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
