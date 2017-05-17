<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Week;
use App\Resource_type;
use App\Resource;
class ResourceCrudController extends Controller
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
        return view('resources.resourceIndex');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($courseId=null,$weekId=null)
    {
        //
        if($courseId===null || $weekId===null){
            $course = null;
            $week = null;
            $resource_types = Resource_type::orderBy('id_resource_type','desc')->get();
            return view('resources.resourceCreate',compact("courseId","weekId","course","week","resource_types"));
        }else{
            $course = Course::find($courseId);
            $week = Week::find($weekId);
            $resource_types = Resource_type::orderBy('id_resource_type','desc')->get();
            return view('resources.resourceCreate',compact("courseId","weekId","course","week","resource_types"));
        }
        
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
            'name' => 'required',
            'url' => 'required',
            'notes' => 'required'

        );
        $this->validate($request, $rules);

        
        $resource = $request->all();
        
        

        //$theNewUser = DB::table('users')->where('email', '=', $request()->email())->get();
        //se ccrea el curso y se obtiene el curso desde la base que se acaba de crear.
        $theNewResource = Resource::create($resource);
        $theWeek = $theNewResource->week;
        $theCourse = $theWeek->course;

        /*$theNewCourseID = $theNewCourse->id_course;

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
        
        
        Session::flash('message', 'Course Created Successfully!');*/
        return redirect('course/' . $theCourse->id_course);
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
