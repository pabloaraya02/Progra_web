<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Week;
use App\Resource_type;
use App\Resource;




use Illuminate\Support\Facades\File;


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Validator;
use Redirect;
use Request;
use Session;
class ResourceCrudController extends Controller
{

    private $folder = '/public/media/profiles';

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
        $files = File::files($this->folder);
        return view('resources.resourceIndex')->with('images',$files);
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
    public function store($request)
    {

        //
        $rules = array(
            'name' => 'required',
            'url' => 'required',
            'notes' => 'required'

        );
        $this->validate($request, $rules);

        
        $resource = $request->all();
        
        //se ccrea el curso y se obtiene el curso desde la base que se acaba de crear.
        $theNewResource = Resource::create($resource);
        $theWeek = $theNewResource->week;
        $theCourse = $theWeek->course;


        //Session::flash('message', 'Resource Created Successfully!');
        return redirect('course/' . $theCourse->id_course);

    }


public function store2($request)
    {

        

        //$file = Input::file('filename');
        $file = $request->thefile('thefile');
        // $name = $file->getClientOriginalName();
        //$upload = $file->move($this->folder.'/resource', $name);
        //$upload = $file->move($this->folder.'/resource', $name);
        /*if (!$upload) {
            //Session::flash('message', 'Guardado correctamente');
            //Session::flash('class', 'success');
        }
        else{
            //Session::flash('message', 'Error al guardar');
            //Session::flash('class', 'danger');
        }*/

        //return Redirect::to('/resource');
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
