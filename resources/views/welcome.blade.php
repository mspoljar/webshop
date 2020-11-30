@extends('layouts.app')
@section('content')
    Welcome
    <br>
    <a href="/items">{{__('Products')}}</a>
    <a href="/category">{{__('Categories')}}</a>
@endsection