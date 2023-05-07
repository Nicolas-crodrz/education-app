@extends('layouts.app')

@section('content')
    <h1>{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    <p>Duración: {{ $course->duration }}</p>
    <a href="{{ url('/courses/'.$course->id.'/edit') }}">Editar</a>
    <form action="{{ url('/courses/'.$course->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection
