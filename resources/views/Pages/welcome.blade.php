@extends('layouts.main')

@section('content')
    <div
        style="
     position: fixed;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     background-color: rgba(0, 0, 0, 0.5);
     z-index: 1;
     display: flex;
     justify-content: center;
     align-items: center;

 ">
        <div class="card bg-white" style="padding: 30px;">
            <div class="card-body">
                <h1 class="text-center ">Login</h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Añade la animación al cargar la página
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.querySelector('.modal');
            modal.style.opacity = 1;
            modal.style.transform = 'scale(1)';
        });
    </script>
@endsection
