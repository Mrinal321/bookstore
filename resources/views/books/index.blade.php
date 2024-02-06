<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>Bookstore</h1>

    <div class="row">
        <div class="col-lg-10">
            <form  action="{{ route('books.index') }}" method="GET" >
                <div class="form-row">
                    <div class="col-8">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Search"
                               value="{{ request('search') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-default">Search</button>

                    </div>
                </div>
            </form>

        </div>

        <div class="col-lg-2">
            <p class="text-right"><a href="{{route('books.create')}}" class="btn btn-primary">New Book</a></p>
        </div>
    </div>

    <table class="table table-striped" width = "50%" border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th colspan="3" class="text-center">Action</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->price}}</td>
                <td><a href="{{ route('books.show', $book->id)}}">View</a></td>
                <td><a href="{{route('books.edit',$book->id)}}">Edit</a></td>
                <td>
                    <form  method="post" action="{{route('books.destroy',$book)}}" onsubmit="return confirm('Sure?')">
                        @csrf
                        @method('DELETE')
                        <input type="submit" style="padding: 0; margin: 0" value="Delete" class="btn btn-link text-danger"/>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    {{ $books -> Links() }}

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>
