@if (Auth::user()->is_having($book->title))
    {!! Form::open(['route' => 'book_user.dont_have', 'method' => 'delete']) !!}
        {!! Form::hidden('book_title', $book->title) !!}
        {!! Form::button('<i class="fas fa-shopping-cart fa-2x"></i>', ['type'=>'submit', 'class' => 'btn btn-link text-danger']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'book_user.have']) !!}
        {!! Form::hidden('book_title', $book->title) !!}
        {!! Form::button('<i class="fas fa-shopping-cart fa-2x"></i>', ['type'=>'submit', 'class' => 'btn btn-link text-danger']) !!}
    {!! Form::close() !!}
@endif







