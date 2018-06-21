@if (Auth::user()->is_wanting($book->title))
    {!! Form::open(['route' => 'book_user.dont_want', 'method' => 'delete']) !!}
        {!! Form::hidden('book_title', $book->title) !!}
        {!! Form::button('<i class="fas fa-heart fa-2x"></i>', ['type'=>'submit', 'class' => 'btn btn-link text-danger']) !!}
    {!! Form::close() !!}
@else 
    {!! Form::open(['route' => 'book_user.want']) !!}
        {!! Form::hidden('book_title', $book->title) !!}
       {!! Form::button('<i class="far fa-heart fa-2x"></i>', ['type'=>'submit', 'class' => 'btn btn-link text-danger']) !!}
    {!! Form::close() !!}
@endif