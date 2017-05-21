<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Course;
use App\Week;
use App\Resource_type;
use App\Resource;

use Validator;
use Redirect;
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
        
        //se ccrea el curso y se obtiene el curso desde la base que se acaba de crear.
        $theNewResource = Resource::create($resource);
        $theWeek = $theNewResource->week;
        $theCourse = $theWeek->course;
        
        
        $this->upload();


        return redirect('course/' . $theCourse->id_course);

        //Session::flash('message', 'Resource Created Successfully!');
        

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

    public function upload() {
        $supportedFormats = 'jpeg,docx,doc,pdf,txt,png,bmp';
        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required|mimes:'.$supportedFormats,);
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            Session::flash('error', 'Formato del recurso a subir no valido, formatos soportados: '.$supportedFormats);
            return Redirect::to('resource/create');
        }
        else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'C:\Users\Respaldo\\'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renaming image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
              
                Storage::put($fileName, $file);
              
                echo asset("storage/" . $fileName);
              
              
                // sending back with message
                Session::flash('success', 'Recurso agregado exitosamente'); 
                return Redirect::to('resource/create');
            }
        }
    }
}
