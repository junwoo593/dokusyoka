@extends('layouts.app')

@section('content')
    <h1>♥ Ranking</h1>
    @include('books.books', ['books' => $books])
@endsection