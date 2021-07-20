@extends('todo.layout')

@section('style')
    <style>
        h1{
            color:red;
        }
        div.center{
            display: grid;
            place-items: center;
        }
    </style>
@endsection

@section('content')
<div class="center">
    <h1>Todo {{ $about }}</h1>

    <form method="GET" action="{{ route ('todo.submit') }}">
        <input type="text" placeholder="input title here" name="title" />
        <input type="text" placeholder="input body here" name="body" />
        <input type="submit" value="submit-button" />
    </form>

    <ul>
        @foreach ($todo as $key => $value)
            <li>{{$key}} : {{$value->title}} - {{$value->body}} ID:{{ $value->id }}
                <a href="{{ route ('todo.delete', $value->id)}}">Delete</a>
            </li>
        @endforeach
    </ul>

    <form method="GET" action="{{ route ('todo.update') }}">
        <input type="text" placeholder="input id here" name="id" />
        <input type="text" placeholder="input title here" name="title" />
        <input type="text" placeholder="input body here" name="body" />
        <input type="submit" value="update-button" />
    </form>
</div>
@endsection
