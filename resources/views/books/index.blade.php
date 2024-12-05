@extends('layout')

@section('title')
Home 
@endsection



@section('page-content')


    <div class="row mt-2">
        <div class = "col-lg-10">
            <form method="get" action="{{ route('books.index') }}">
                <div class="row g-3">
                    <div class="col-8">
                      <input type="text" class="form-control" name="search" placeholder="Search" value="{{request('search')}}">
                    </div>
                    <div class="col">
                      <button type="text" class="btn btn-success"> <i class="bi bi-search"></i> Search</button>
                    </div>
                  </div>

           </form>
        </div>

        <div class = "col-lg-2">
            <p class = "text-end">
                <a href="{{route('books.create')}}" class = "btn btn-primary"><i class="bi bi-file-earmark-plus"></i> New Book</a>
            </p>
        </div>
    </div>

    <h1 >Book List</h1>
    <table class="table table-striped" >
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>

            @foreach( $books as $book )
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->stock }}</td>
                <td> 
                    <a class="btn btn-info" href = "{{route('books.show',$book->id)}}"> <i class="bi bi-info-circle"></i> View</a>
                    <a class="btn btn-warning" href = "{{route('books.edit',$book->id)}}"> <i class="bi bi-pencil-square"></i> Edit</a>
                    <form class= "d-inline-block" method="post" action="{{route('books.destroy')}}"  onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$book->id}}">
                        <input type="submit" value="Delete" class="btn btn-danger" >
                    </form>
                </td>
            </tr>
                
            @endforeach
    </table>
    {{$books->links()}}

    @endsection