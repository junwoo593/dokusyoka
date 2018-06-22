@extends('layouts.app')

@section('content')
    <div class="search">
        <div class="row">
            <div class="text-center">
                {!! Form::open(['route' => 'books.create', 'method' => 'get', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                        {!! Form::text('title', $title, ['class' => 'form-control input-lg', 'placeholder' => 'Enter the Keyword', 'size' => 40]) !!}
                    </div>
                    {!! Form::submit('Search', ['class' => 'btn btn-warning btn-lg']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @include('books.books', ['books' => $books])
@endsection