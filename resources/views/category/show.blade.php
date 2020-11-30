@extends('layouts.app')
@section('content')
@foreach ($categories as $category)
<h1>{{$category->name}}</h1>
<a href="/category/change/{{$category->id}}">{{__('Change')}}</a>
<a onclick="return confirm('{{__('Are you sure you want to delete')}} {{$category->name}}');"  href="/category/delete/{{$category->id}}"><button class="btn btn-blue">{{__('Delete')}}</button></a>
<br>
@endforeach
<br>
<a href="/category/new">{{__('New category')}}</a>

@endsection
