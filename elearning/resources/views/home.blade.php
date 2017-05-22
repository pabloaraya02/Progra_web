@extends('layouts.app')

@section('content')
   <h1>HOME</h1>
   <h1>{{$user->name}}</h1>


   <H1>{{$user->amITeacher()}}</H1>


@endsection
