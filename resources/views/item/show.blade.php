@extends('layouts.app')
@section('content')
@foreach ($items as $item)
<h1>{{$item->name}}</h1>
<a href="/item/change/{{$item->id}}">{{__('Change')}}</a>
<a onclick="return confirm('{{__('Are you sure you want to delete')}} {{$item->name}}');"  href="/item/delete/{{$item->id}}"><button class="btn btn-blue">{{__('Delete')}}</button></a>
<br>
@endforeach
<br>
<a href="/item/new">{{__('New product')}}</a>

@endsection
