<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Book;



class BookUserController extends Controller
{
    public function want()
    {
        $title = request()->book_title;
        //var_dump($title);
        //exit;
        //$title = 'Laravel';
        // Search items from "title"
        $client = new \RakutenRws_Client();
        $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));
        $rws_response = $client->execute('BooksBookSearch', [
            'title' => $title,
            
        ]);
        //$rws_item = $rws_response->getData()['Items'][0]['Item'];
        //var_dump($rws_response->getData());
        //var_dump($rws_response);
        //exit;
        $rws_item = $rws_response->getData()['Items'][0]['Item'];

        // create Item, or get Item if an item is found
        $item = Book::firstOrCreate([
            'isbn' => $rws_item['isbn'],
            'title' => $rws_item['title'],
            'url' => $rws_item['itemUrl'],
            'image_url' => str_replace('?_ex=120x120', '', $rws_item['mediumImageUrl'])
               
        ]);

        \Auth::user()->want($item->id);

        return redirect()->back();
    }

    public function dont_want()
    {
        $title = request()->book_title;

        if (\Auth::user()->is_wanting($title)) {
            $itemId = Book::where('title', $title)->first()->id;
            \Auth::user()->dont_want($itemId);
        }
        return redirect()->back();
    }
    
    public function have()
    {
        $title = request()->book_title;

        // Search items from "itemCode"
        $client = new \RakutenRws_Client();
        $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));
        $rws_response = $client->execute('BooksBookSearch', [
            'title' => $title,
        ]);
        $rws_item = $rws_response->getData()['Items'][0]['Item'];

        // create Item, or get Item if an item is found
        $item = Book::firstOrCreate([
            'isbn' => $rws_item['isbn'],
            'title' => $rws_item['title'],
            'url' => $rws_item['itemUrl'],
            // remove "?_ex=128x128" because its size is defined
            'image_url' => str_replace('?_ex=128x128', '', $rws_item['mediumImageUrl'])
        ]);

        \Auth::user()->have($item->id);

        return redirect()->back();
    }

    public function dont_have()
    {
        $title = request()->book_title;

        if (\Auth::user()->is_having($title)) {
            $itemId = Book::where('title', $title)->first()->id;
            \Auth::user()->dont_have($itemId);
        }
        return redirect()->back();
    }
}
