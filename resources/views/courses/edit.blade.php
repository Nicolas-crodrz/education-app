@extends('layouts.partials.head')
@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Editar curso</h1>
    </div>

    <div class="card-body">
        @if ($errors->any())
            <div class="error-container">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/courses/'.$course->id) }}" method="POST" class="course-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" value="{{ $course->title }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" class="form-control">{{ $course->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="duration">Duración:</label>
                <input type="text" id="duration" name="duration" value="{{ $course->duration }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
