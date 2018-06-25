@if ($books)
    <div class="row">
        @foreach ($books as $key => $book)
            <div class="book">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $book->image_url }}" alt="" class="">
                        </div>
                        <div class="panel-body">
                            @if ($book->id)
                                <p class="book-title"><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></p>
                            @else
                                <p class="book-title">{{ $book->title }}</p>
                            @endif
                            <div class="buttons text-center">
                                @if (Auth::check())
                                    @include('books.want_button', ['book' => $book])
                                    @include('books.have_button', ['book' => $book])
                                @endif
                            </div>
                        </div>
                        @if (isset($book->count))
                            <div class="panel-footer">
                                <p class="text-center"><span>{{ $key+1 }}</span><span>位</span><span>:</span><span>{{ $book->count}}</span> <span>people</span></p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif








