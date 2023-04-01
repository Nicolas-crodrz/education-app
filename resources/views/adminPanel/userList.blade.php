@extends('layouts.partials.head')
<h1>List of Users</h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                @php
                    $orderBy = request()->query('orderBy', 'name');
                    $direction = request()->query('direction', 'asc');
                    if ($orderBy === 'name' || $orderBy === 'lastname' || $orderBy === 'email' || $orderBy === 'role') {
                        $direction = $direction === 'asc' ? 'desc' : 'asc';
                    }
                @endphp
                <th><a href="?orderBy=name&direction={{ $direction }}">Name</a></th>
                <th><a href="?orderBy=lastname&direction={{ $direction }}">Last Name</a></th>
                <th><a href="?orderBy=email&direction={{ $direction }}">Email</a></th>
                <th><a href="?orderBy=role&direction={{ $direction }}">Role</a></th>
                <th colspan="1">Edit</th>
                <th colspan="1">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                      <a href="{{ route('editUser', $user->id) }}" class="btn btn-primary">Edit</a>
                  </td>
                  <td>
                      <form action="" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
              </tr>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $users->links() }}

