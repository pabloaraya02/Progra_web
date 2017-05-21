@extends('layouts.app')

@section('content')
   <h1>HOME</h1>
   <h1>{{$user->name}}</h1>

   @if($user->amIAdmin())
   	<h1>Soy admin</h1>
   @else
   	<h1>soy otro...</h1>
   @endif
   <H1>{{$user->amITeacher()}}</H1>
   @if($user->amITeacher())
   	<h1>Yo soy un profe</h1>
   @else
   	<h1>soy otro...</h1>
   @endif

@endsection
