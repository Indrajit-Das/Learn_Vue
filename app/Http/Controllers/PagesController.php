<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Student;

class PagesController extends Controller
{
    //
    public function index(){
        return Comment::paginate(3);
        return view('test1');
    }
    public function second(){
        return view('test2');
    }
    public function comment(Request $request){
        $cmnt=new Comment();
        $cmnt->comments =$request->comment;
        $cmnt->save();
    }

    //student show per page dynamic
    public function students(Request $request){
        $stu=Student::paginate($request->perPage);
        return response()->json($stu);
    }

    //student search
    public function search(Request $request){
        if($request->searchBy ==="all"){
           // return $request->name;
            //$data= DB::select("select * from comments where name LIKE '$request->name' OR country LIKE '$request->name' OR salary LIKE '$request->name' OR comments LIKE '$request->name'");

            $data=Student::where('name','LIKE',$request->name.'%')
            ->orWhere('in_class','LIKE',$request->name.'%')
            ->orWhere('school','LIKE',$request->name.'%')
            ->orWhere('roll','LIKE',$request->name.'%')
            ->orWhere('position','LIKE',$request->name.'%')
            ->orWhere('age','LIKE',$request->name.'%')
            ->orWhere('religion','LIKE',$request->name.'%')->paginate(10);

            //$d=collect($data);
            return response()->json($data);
        }
        else{
            $data=Student::where($request->searchBy,'=',$request->name)->paginate(10);
            return response()->json($data);
        }

        //return $request->name;
    }

}
