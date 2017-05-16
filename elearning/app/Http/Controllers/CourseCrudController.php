<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Week;
use Session;
use DB;
class CourseCrudController extends Controller
{

    public function __construct(){
        $this->middleware('checkAdmin:"Admin"');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $courses = Course::orderBy('id_course','desc')->get();
        return view('course.courseIndex',compact('courses'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('course.courseCreate');
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

         $rules = array(
            'course_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'duration' => 'required'

        );
        $this->validate($request, $rules);

        
        $course = $request->all();
        
        

        //$theNewUser = DB::table('users')->where('email', '=', $request()->email())->get();
        //se ccrea el curso y se obtiene el curso desde la base que se acaba de crear.
        $theNewCourse = Course::create($course);
        $theNewCourseID = $theNewCourse->id_course;

        //aqui vamos a calcular cuantas semanas vamos a crear en la base basado en las semanas del curso
        //$theRoleID = $request->input('id_role');
        //llenamos un array con la cantidad de semanas 
        $weeksArray = array();     
        $duracion = $request->duration;

        $weekStartDate = $request->start_date;
        //date('Y-m-d', strtotime($weekStartDate. ' + 7 days'));
        $week_start_date=$weekStartDate;
        for($x=1;$x<=$duracion;$x++){

                //$theWeek = new Week(['subject'=>'','visible'=>1,'status'=>1]);
            $week_end_date = date('Y-m-d', strtotime($week_start_date. ' +6 days'));
            $weeksArray[] = new Week(['subject'=>'',
                                        'visible'=>1,
                                        'status'=>1,
                                        'start_date'=>$week_start_date, 
                                        'end_date'=>$week_end_date]);
            $week_start_date = date('Y-m-d', strtotime($week_start_date. ' +7 days'));
        }
        //

        
        $theNewCourse = Course::find($theNewCourseID);
        //$theNewCourse->weeks()->saveMany($weekssss);
        $theNewCourse->weeks()->saveMany($weeksArray);

        //$theNewUser->roles()->attach($theRoleID,['status' => 1]);
        
        
        Session::flash('message', 'Course Created Successfully!');
        return redirect('course');
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
        $course = Course::find($id);
        //$weeks = Course::find($id)->weeks;
        $weeks = $course->weeks;
       
        return view('course.courseShow',compact('course','weeks'));
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
    }
}
