<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Controllers\CategoryController;
use Auth;
use App\Http\Requests\AddBooksRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as gRequest;
use App\Category;

class BookController extends Controller
{

    public function getAvailableBook($cateId)
    {
        if ($cateId != 0) {
            return $books = Book::where('available', 1)->where('category_id', $cateId)->get()->toJson();
        } else {
            return $books = Book::where('available', 1)->get()->toJson();
        }
    }

    public function showAvailableBook()
    {
        $categories = CategoryController::getCategory();
        return view('books', ['categories' => $categories]);
    }

    public function showAddBooksPage()
    {
        $category = Category::all();
        return view('addbooks', compact('category'));
    }

    public function saveNewBook(AddBooksRequest $request)
    {
        //Upload image to imgur and get an api
        $url = "https://api.imgur.com/3/image";
        $client_id = "ec059f02e935857";
        $client = new Client();
        $gRequest = new gRequest(
            'POST',
            $url,
            [
                "Authorization" => "Client-ID " . $client_id
            ],
            base64_encode(file_get_contents($request->file('uploadImage')->getRealPath()))
        );
        $gResponse = $client->send($gRequest, ['timeout' => 2]);
        $imgLink = json_decode($gResponse->getBody()->getContents());
        //Save to books table
        $book = new Book;
        $book->available = 1;
        $book->name = $request->name;
        $book->category_id = $request->category;
        $book->info = $request->info;
        $book->imgLink = $imgLink->data->link;
        $book->save();

        return redirect()->back()->with('status', 'Book added!');
    }

    public function updateRentBook(Request $request)
    {
        $data = json_decode($request->input('data'));
        $user_id = Auth::user()->id;
        foreach ($data as $book_id) {
            $book = Book::find($book_id);
            $book->user_id = $user_id;
            $book->available = 0;
            $book->save();
        }
        return redirect()->back()->with('status', 'Book rent successfully!!');
        ;
    }

    public function returnRentBook(Request $request)
    {
        $data = json_decode($request->input('data'));
        foreach ($data as $book_id) {
            $book = Book::find($book_id);
            $book->user_id = null;
            $book->available = 1;
            $book->save();
        }
        return;
    }
}
