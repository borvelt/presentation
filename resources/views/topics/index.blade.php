@extends('layouts.topics')

@section('content')
    @if(Session::has('success'))
    <div class="alert alert-success">
        <ul><li>{{Session::get('success')}}</li></ul>
    </div>
    @endif
    <ul>
        @forelse ($topics as $topic)
            <li><a href="{{route('topics.show', ['id'=>$topic->id])}}">{{$topic->title}}</a></li>
        @empty
            <li>No Topic</li>
        @endforelse

        <li><a href="{{route('topics.create')}}"> Create New Topic </a></li>
    </ul>
@endsection
