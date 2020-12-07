<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

//use App\Http\Resources\CommentsResource;

class CommentsController extends Controller
{
    //
    public function index(){
        //return new CommentsResource((Comment::paginate(5)));
        $data=Comment::latest()->paginate(20);
        return response()->json($data);

        //CommentsResource::collection(Comment::all());
    }
    public function search(Request $request){
        if($request->searchBy ==="all"){
           // return $request->name;
            //$data= DB::select("select * from comments where name LIKE '$request->name' OR country LIKE '$request->name' OR salary LIKE '$request->name' OR comments LIKE '$request->name'");

            $data=Comment::where('name','LIKE',$request->name.'%')
            ->orWhere('salary','LIKE',$request->name.'%')
            ->orWhere('comments','LIKE',$request->name.'%')
            ->orWhere('country','LIKE',$request->name.'%')->paginate(10);

            //$d=collect($data);
            return response()->json($data);
        }
        else{
            $data=Comment::where($request->searchBy,'=',$request->name)->paginate(5);
            return response()->json($data);
        }

        //return $request->name;
    }
}
