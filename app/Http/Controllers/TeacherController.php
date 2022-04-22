<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use Illuminate\Support\Facades\Validator;
use DataTables;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $teachers = teacher::all();
        if($request->ajax()){
            return datatables()->of($teachers)
            ->addIndexColumn()
            ->addColumn('action', function ($teacher)
            {
               $btn = '<a href="javascript:void(0)"  data-toggle="tooltip" data-id="'.
            $teacher->id. '" data-original-title="Edit" class=" edit btn btn-success mr5" data-toggle="modal"  ">Edit</a><br>';
            
            $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
            $teacher->id. '" data-original-title="Delete" class=" delete btn btn-danger mr5" data-toggle="modal"  ">Delete</a>';
            return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:191',
            'nip'=>'required|max:191',
            'course'=>'required|max:191',
            'grade'=>'required|max:191'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
             
            $teacher = new teacher();
            $teacher->name = $request->input('name');
            $teacher->nip = $request->input('nip');
            $teacher->course = $request->input('course');
            $teacher->grade = $request->input('grade');
            $teacher->save();
            return response()->json([
                'status'=>200,
                'message'=>'Created Successfully', 
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
       $teacher = teacher::find($id);
       // return response()->json($teacher);
        if ($teacher) 

        {
            return response()->json([
                'status'=>200,
                'teacher'=>$teacher,
               
            ]);

        }else{
            return response()->json([
                'status'=>404,
                'message'=> 'Teacher Not Found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

         $validator = Validator::make($request->all(), [
            'name'=>'required|max:191',
            'nip'=>'required|max:191',
            'course'=>'required|max:191',
            'grade'=>'required|max:191'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{


            $teacher = teacher::find($id);
            if ($teacher) 

            {
            $teacher->name = $request->input('name');
            $teacher->nip = $request->input('nip');
            $teacher->course = $request->input('course');
            $teacher->grade = $request->input('grade');
            $teacher->update();
            return response()->json([
                'status'=>200,
                'message'=>'Update Successfully',
               
            ]);

            }else{
            return response()->json([
                'status'=>404,
                'message'=> 'Teacher Not Found',
            ]);
        }
           
     }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $teacher = teacher::find($id);
        $teacher->delete();
        return response()->json([
            'status'=> 200,
            'message'=> 'Teacher Deleted Successfully',
        ]);
    }
    
}
