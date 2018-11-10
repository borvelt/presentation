@extends('layouts.topics')

@section('title', 'Create New Topic')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif(Session::has('success'))
        <div class="alert alert-success">
            <ul><li>{{Session::get('success')}}</li></ul>
        </div>
    @endif
    <form method="POST" action="{{route('topics.update',  ['id'=>$topic->id])}}">
        @method('PUT')
        @csrf
        <label for="title"> Title </label>
        <input id="title" type="text" name="title" value="{{old('title') ?? $topic->title}}" />
        <label for="description"> Description </label>
        <input id="description" type="text" name="description" value="{{old('description') ?? $topic->description}}" />
        <button type="submit">Submit</button>
    </form>
    <form action="{{ route('topics.destroy', ['id'=>$topic->id])}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

@endsection
