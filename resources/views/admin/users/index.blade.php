<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('layout')
    @section('title')
    <h1>Quản lý users </h1>
    @endsection
    @section('contents')
    <!-- <div class="container">
        <form action="{{ route('admin.users.index') }}" method="GET" class="row col-6">
            <div class="col-10">
                <input class="form-control col-4 d-inline" type="text" name="keyword" value="{{ old('keyword') }}" />
                <button class="btn btn-primary col-4">Tìm kiếm</button>
            </div>
        </form>
    </div>
    <div class="row mt-4">
        <div class="col-6"></div>
        <div class="col-6">
            {{-- <a class="btn btn-success"
                href="{{ route('admin.users.create') }}">Create</a> --}}
            <button class="btn btn-success" role="button" data-toggle="modal" data-target="#modal_create">Create</button>

            <div class="modal fade" id="modal_create" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm mới người dùng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="form_create" action="{{ route('admin.users.store') }}">
                                @csrf
                                <div class="mt-3">
                                    <label>Name</label>
                                    <input class="mt-3 form-control" type="text" name="name" />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label>Email</label>
                                    <input class="mt-3 form-control" type="email" name="email" />
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label>Address</label>
                                    <input class="mt-3 form-control" type="text" name="address" />
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label>Password</label>
                                    <input class="mt-3 form-control" type="password" name="password" />
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <label>Gender</label>
                                    <select class="mt-3 form-control" name="gender">
                                        <option value="{{ config('common.user.gender.male') }}">
                                            Male
                                        </option>
                                        <option value="{{ config('common.user.gender.female') }}">
                                            Female
                                        </option>
                                    </select>
                                    @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label>Role</label>
                                    <select class="mt-3 form-control" name="role">
                                        <option value="{{ config('common.user.role.user') }}">
                                            User
                                        </option>
                                        <option value="{{ config('common.user.role.admin') }}">
                                            Admin
                                        </option>
                                    </select>
                                    @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <button class="mt-3 btn btn-primary">Create</button>
                                    <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 -->

    <table class="table table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Email</td>
                <td>
                    address
                </td>
                <td>Invoice</td>
                <td>Gender</td>
                <td>Role</td>
                <td><a href="{{ route('admin.users.create') }}">
                        Thêm mới</a></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><a href="{{ route('admin.users.show', [ 'user' => $item->id ]) }}">{{ $item->name }}</a></td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->invoices()->count() }}</td>
                <td>{{ $item->gender == config('common.user.gender.male') ? "Nam" : "Nữ" }}</td>
                <td>{{ $item->role == config('common.user.role.user') ? "User" : "Admin" }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.users.edit', [ 'user' => $item->id ])}}">Update</a>
                </td>
                <td>
                    <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $item->id }}">Delete</button>
                    <div class="modal fade" id="confirm_delete_{{ $item->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Xóa bản ghi này?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('admin.users.delete', [ 'user' => $item->id ])}}" method="POST">
                                        @csrf
                                        <button tybe="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    {{$data->links()}}
    @endsection
    @push('script')
    <script>
        $("#form_create").on('submit', function(event) {
            event.preventDefault();
            // const url = $("#form_create").attr("action");
            const url = "{{ route('admin.users.store') }}";
            let name = $("#form_create input[name='name']").val();
            let email = $("#form_create input[name='email']").val();
            let address = $("#form_create input[name='address']").val();
            let password = $("#form_create input[name='password']").val();
            let gender = $("#form_create select[name='gender']").val();
            let role = $("#form_create select[name='role']").val();
            let _token = $("#form_create input[name='_token']").val();
            const data = {
                // _token,
                name,
                email,
                address,
                password,
                gender,
                role,
            };
            fetch(url, {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        "X-CSRF-Token": _token,
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                    },
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.status == 200) {
                        window.location.reload();
                    }
                })
        });
    </script>
    @endpush
</body>

</html>