@extends('layouts.layout')

@section('content')

<h1>This is a week</h1>
<h3>{{$week->start_date}}</h3>
<h3>{{$week->end_date}}</h3>

@endsection