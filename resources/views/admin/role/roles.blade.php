@extends('layout')
@section('title', 'manageRoles')
@section('section')

    <div class="container-fluid m-5">
        <div class="d-flex justify-content-between">
            <h2>Roles</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddroleButton">Add Roles</button>
        </div>
      

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Name</th>
                    <th scope="col">View</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td>{{ $role->name }}</td>
                        <td>View btn</td>
                        <td> Action btns</td>
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
                    <div class="modal-body">

                        <form action=" {{ route('role.addRole') }}" method="POST">
                            @csrf
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Name</label>
                                <input type="text" id="form3Example3" class="form-control" name="name" />
                                @error('Name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
