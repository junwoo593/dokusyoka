@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1><span>DOKUSYOKA</span>で新たな出会いを</h1>
                @if (!Auth::check())
                 <a href="{{ route('signup.get') }}" class="btn btn-success btn-lg">Let's Start DOKUSYOKA</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')
  @include('books.books')
    {!! $books->render() !!}

@endsection




