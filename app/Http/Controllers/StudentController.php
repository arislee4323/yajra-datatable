<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        return view('student.index');
    }

    public function student()
    {
        $students = student::all();
        return response()->json([
            'students'=>$students, 
        ]);
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
       

        $validator = Validator::make($request->all(), [
            'name'=>'required|max:191',
            'email'=>'required|max:191',
            'phone'=>'required|max:191',
            'course'=>'required|max:191'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{


            $student = new student();
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->course = $request->input('course');
            $student->save();
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
        $student = student::find($id);
        if ($student) 

        {
            return response()->json([
                'status'=>200,
                'student'=>$student,
               
            ]);

        }else{
            return response()->json([
                'status'=>404,
                'message'=> 'Student Not Found',
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
            'email'=>'required|max:191',
            'phone'=>'required|max:191',
            'course'=>'required|max:191'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{


            $student = student::find($id);
            if ($student) 

            {
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->course = $request->input('course');
            $student->update();
            return response()->json([
                'status'=>200,
                'message'=>'Update Successfully',
               
            ]);

            }else{
            return response()->json([
                'status'=>404,
                'message'=> 'Student Not Found',
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
        $student = student::find($id);
        $student->delete();
        return response()->json([
            'status'=> 200,
            'message'=> 'Student Deleted Successfully',
        ]);
    }
}
