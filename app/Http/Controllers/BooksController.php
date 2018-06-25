<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Book;

class BooksController extends Controller
{
    
    
     public function create()
    {
        $title = request()->title;
        $items = [];
        if ($title) {
            $client = new \RakutenRws_Client();
            $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));

            $rws_response = $client->execute('BooksBookSearch', [
                'title' => $title,
                'imageFlag' => 1,
                'hits' => 20,
            ]);

            // Creating "Item" instance to make it easy to handle.（not saving）
            foreach ($rws_response->getData()['Items'] as $rws_item) {
                $item = new Book();
                $item->isbn = $rws_item['Item']['isbn'];
                $item->title = $rws_item['Item']['title'];
                $item->url = $rws_item['Item']['itemUrl'];
                $item->image_url = str_replace('?_ex=120x120', '', $rws_item['Item']['mediumImageUrl']);
                $items[] = $item;
            }
        }

        return view('books.create', [
            
            'title' => $title,
            'books' => $items,
        ]);
    }
    
    public function show($id)
    {
      $book = Book::find($id);
      $want_users = $book->want_users;
      $have_users = $book->have_users;

      return view('books.show', [
          'book' => $book,
          'want_users' => $want_users,
          'have_users' => $have_users,
      ]);
  }
}

