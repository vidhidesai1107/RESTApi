<?php

namespace App\Http\Controllers\api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ItemController extends Controller
{
    public function index()
    {
        $items = Book::all();

        if ($items->count() > 0) {
            return response()->json([
                'status' => 200,
                'items' => $items,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'Result' => 'No data found.',
            ], 404);
       }
    }

    public function create()
    {
        return view('books.create');
    }


    public function store (Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' =>'required|string|max:191',
            'author'=>'required|string|max:191',
        ]);
            
        if ($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=> $validator->messages()
            ],422);
        }
        else{
            $item= Book::create(
                [
                    'name'=>$request->name,
                    'author'=>$request->author,
                ]);
                if($item){
                    return response()->json([
                        'status' => 200,
                        'message'=>'Details added Successfully'
                    ], 200);
                }else{

                    return response()->json([
                        'status' => 500,
                        'message'=>'Something went wrong'
                    ], 500);
                }
        }
    }
}
