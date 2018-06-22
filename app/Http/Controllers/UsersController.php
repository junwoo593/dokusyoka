<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
use App\Book;

class UsersController extends Controller
{
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $count_want = $user->want_books()->count();
        $count_followings = $user->followings()->count();
        $count_followers = $user->followers()->count();
        $items = \DB::table('books')->join('book_user', 'books.id', '=', 'book_user.book_id')->select('books.*')->where('book_user.user_id', $user->id)->distinct()->paginate(20);

        return view('users.show', [
            'user' => $user,
            'books' => $items,
            'count_want' => $count_want,
            'count_followings' => $count_followings,
            'count_followers' => $count_followers,
            // 'count_have' => $count_have,
        ]);
    }
     public function followings($id)
    {
        $user = User::find($id);
        $count_followings = $user->followings()->count();
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
            'count_followings' => $count_followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $count_followers = $user->followers()->count();
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
            'count_followers' => $count_followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
        
}
