@extends('layouts.topics')

@section('title', '')

@section('content')

    <div class="show-topics">
        <p>Title: {{$topic->title}}</p>
        <p>Description: {{$topic->description}}</p>
        <p>Banner: {{$topic->banner}}</p>
        <p>Date Created: {{$topic->created_at}}</p>
        <div class='actions'>
            <a href="{{route('topics.edit', $topic->id)}}">Edit</a>
        </div>
    </div>

@endsection
