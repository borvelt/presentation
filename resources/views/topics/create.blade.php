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
    @endif
    <form method="POST" action="{{route('topics.store')}}">
        @csrf
        <label for="title"> Title </label><input id="title" type="text" name="title" />
        <label for="description"> Description </label><input id="description" type="text" name="description" />
        <button type="submit">Submit</button>
    </form>
@endsection
