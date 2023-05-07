@extends('layouts.partials.head')
@extends('layouts.app')
@section('content')
    <h1>Cursos</h1>
    <a href="{{ route('adminPanel') }}" class="create-link">Back to Admin Panel</a>
    <a href="{{ url('/courses/create') }}"class="create-link">Crear nuevo curso</a>
    @foreach ($courses as $course)
        <div class="course-container">
            <h3 class="course-title">{{ $course->title }}</h3>
            <p class="course-description">{{ $course->description }}</p>
            <p class="course-info">Duración: {{ $course->duration }}</p>
            <a href="{{ url('/courses/' . $course->id . '/edit') }}" class="edit-link">Editar</a>
            <form action="{{ url('/courses/' . $course->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">Eliminar</button>
            </form>
        </div>
    @endforeach
@endsection
