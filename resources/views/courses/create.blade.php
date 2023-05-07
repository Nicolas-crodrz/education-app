@extends('layouts.partials.head')
@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Crear curso</h1>
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

            <form action="{{ url('/courses') }}" method="POST" class="course-form">
                @csrf
                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="duration">Duración:</label>
                    <input type="text" id="duration" name="duration" value="{{ old('duration') }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('adminPanel') }}" class="btn btn-primary text-center">Back to Admin Panel</a>
            </form>
        </div>
    </div>
@endsection


