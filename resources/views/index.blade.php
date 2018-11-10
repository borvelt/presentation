@extends('layouts.base')

@section('title', 'Start')

@section('body')
    <div>
        <a href="{{route('topics.index')}}">Topics</a>
        <a href="{{route('tags.index')}}">Tags</a>
    </div>
@endsection
