@extends('layout')

@section('page-content')

    
    <h1 >Book Details</h1>

    <table class="table table-striped">
            <tr>
                <th>ID</th>
                <td>{{ $book ->id}}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $book ->title}}</td>
            </tr>
            <tr>
                <th>Author</th>
                <td>{{ $book ->author}}</td>
            </tr>
            <tr>
                <th>ISBN</th>
                <td>{{ $book ->isbn}}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $book ->price}}</td>
            </tr>
            <tr>
                <th>Stock</th>
                <td>{{ $book ->stock}}</td>
            </tr>
            
          
    </table>
    <tr><td>
        <a class="btn btn-danger" href="{{route('books.edit', $book->id)}}">Edit</a>
        </td>
    </tr>
    <p>
        <a href="{{route('books.index') }}" class="btn btn-primary">Book List</a>
    </p>
    @endsection