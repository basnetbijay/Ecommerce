@extends('layout')
@section('title', 'manageRoles')
@section('section')

    <div class="container-fluid m-5">
        <div class="d-flex justify-content-between">
            <h2>Roles</h2>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <form action="{{ route('user.roleAssign', $user->id) }}" method="post">
                            @csrf
                            <td>
                                <select class="form-select" aria-label="Default select example" name="role">
                                    <option selected disabled>Select the roles</option>
                                    @foreach ($roles as $role)
                                        @if ($user->hasRole($role->id))
                                            <option value= "{{ $role->name }}" selected>{{ $role->name }}</option>
                                        @else
                                            <option value= "{{ $role->name }}">{{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal">Update</button>
                            </td>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal" tabindex="-1" id="AddroleButton">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
