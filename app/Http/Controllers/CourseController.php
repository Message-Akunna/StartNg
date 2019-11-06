<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Courses;
use App\RegisteredCourses;
use App\User;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::where('active', 1)->get();
        return view('course.allcourses')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'duration'=>'required',
            'tutor'=>'required'
        ]);

        $course = new Courses;
        $course->title = $request->input('title');
        $course->description = $request->input('body');
        $course->duration = $request->input('duration');
        $course->price = $request->input('price');     
        $course->user_id = auth()->user()->id;
        $course->save();
        
        return redirect('/')->with('success','Course Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Courses::find($id);
        return view('course.detail')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Courses::find($id);
        
        if (!isset($course)){
            return redirect('/')->with('error', 'That course is not available');
        }

        if(auth()->user()->role == 0){
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        if(auth()->user()->role == 1){
            if(auth()->user()->role == $course->user_id){
                return redirect('/')->with('error', 'Unauthorized Page');
            }
        }

        //return view('course.edit')->with('course', $course);
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
        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'duration'=>'required',
            'tutor'=>'required'
        ]);

        $course = Courses::find($id);
        $course->title = $request->input('title');
        $course->description = $request->input('body');
        $course->duration = $request->input('duration');
        $course->price = $request->input('price');     
        $course->user_id = auth()->user()->id;
        $course->save();
        
        return redirect('/')->with('success','Course Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Courses::find($id);
        if (empty($course)) {

            return redirect()->route('index');
        }

        $course->active = ($course->active == 0) ? 1 : 0;
        $title = ($course->active == 1) ? "enabled" : "disabled";


        $course->save();
        return back();
    }

    public function registerCourses($id)
    {

        $check = Courses::where('id',$id)->exists();
        if($check){
            $post = RegisteredCourses::where('user_id',auth()->user()->id)
                ->where('course_id',$id)->exists();

            if($post){
                return back()->with('error', 'You Have Previously Registered for the Course');
            }
            else{
                $add_course = new RegisteredCourses;
                $add_course->course_id = $id;
                $add_course->user_id = auth()->user()->id;
                $add_course->progress = 0;
                $add_course->save();                
                return back()->with('success', 'Registration was Succesful');
            }
        }
        else{
            return back()->with('error', 'Course does not exist');
        }
    }

    public function mycourse($id){
        $check = User::where('id',$id)->exists();

        if($check) {
            $check = RegisteredCourses::where('user_id', $id)->exists();
            if($check) {
                $check = RegisteredCourses::where('user_id', $id)->get();
                $courses = [];
                foreach ($check as $item) {

                    $output = Course::where('id', $item->course_id)->get()[0];

                    array_push($courses, (array)$output);
                }

                return view('course.mycourses',compact('courses'));
            }

            else{
              $message="no registered course";
                return redirect('mycourse')->with('error',$message);
            }
            $user=DB::table('users')->where('id',$id)->get()[0];
        }
        else{
            $message='user does not exist';
            return redirect('mycourse')->with('error',$message);
        }

    }
}
