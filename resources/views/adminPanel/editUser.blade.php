@extends('layouts.partials.head')

    <h1>Edit User</h1>

    <form action="{{ route('editUser', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $user->lastname }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control">
                <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>student</option>
                <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>teacher</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>

