@extends('layouts.app')
@section('content')
@foreach ($items as $item)
<h1>{{$item->name}}</h1>
<a href="/item/change/{{$item->id}}">{{__('Change')}}</a>
<a onclick="return confirm({{__('Are you sure you want to delete ')}}{{$item->name}})" href="/item/delete/{{$item->id}}">{{__('Delete')}}</a>
@endforeach
@endsection
