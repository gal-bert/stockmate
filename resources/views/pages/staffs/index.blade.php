@extends('layouts.web')

@section('title', 'Stockmate | Staffs')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Staff List</h1>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button class="btn btn-success" data-toggle="modal" data-target="#addStaff">Add Staff</button>

        <div class="modal fade" id="addStaff" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('staffs.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="staffName">Staff Name</label>
                                <input type="text" class="form-control" name="staffName" required>
                            </div>
                            <div class="form-group">
                                <label for="staffName">Staff Address</label>
                                <input type="text" class="form-control" name="staffAddress">
                            </div>
                            <div class="form-group">
                                <label for="staffName">Staff Contact</label>
                                <input type="text" class="form-control" name="staffContact">
                            </div>
                            <div class="form-group">
                                <label for="staffName">Staff Gender</label>
                                <select class="form-control" name="staffGender" required>
                                    <option value="" selected disabled>--choose gender--</option>
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add Staff</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="staffs" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Staff Name</th>
                        <th>Staff Address</th>
                        <th>Staff Contact</th>
                        <th>Staff Gender</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($staffs as $staff)
                        <tr>
                            <td>{{$staff->staff_id}}</td>
                            <td>{{$staff->staff_name}}</td>
                            <td>{{$staff->staff_address}}</td>
                            <td>{{$staff->staff_contact}}</td>
                            <td>{{$staff->staff_gender == 1 ? 'Male' : 'Female'}}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#editStaff{{$staff->staff_id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

                                <div class="modal fade" id="editStaff{{$staff->staff_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Staff</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('staffs.update', $staff->staff_id)}}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="staffName">Staff Name</label>
                                                        <input type="text" class="form-control" name="staffName" value="{{$staff->staff_name}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="staffName">Staff Address</label>
                                                        <input type="text" class="form-control" name="staffAddress" value="{{$staff->staff_address}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="staffName">Staff Contact</label>
                                                        <input type="text" class="form-control" name="staffContact" value="{{$staff->staff_contact}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="staffName">Staff Gender</label>
                                                        <select class="form-control" name="staffGender">
                                                            <option value="1" {{$staff->staff_gender == 1 ? 'selected' : ''}}>Male</option>
                                                            <option value="0" {{$staff->staff_gender == 0 ? 'selected' : ''}}>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Update Staff</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

{{--                                <form method="POST" style="display:inline;" action="{{route('staffs.destroy', $staff->staff_id)}}">--}}
{{--                                    {{ method_field('DELETE') }}--}}
{{--                                    {{ csrf_field() }}--}}
{{--                                    <button onclick="return confirm('Are you sure to delete staff \'{{$staff->staff_name}}\'?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>--}}
{{--                                </form>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('additional-js')
    <script>
        $(document).ready(function() {
            $('#staffs').DataTable({
                ordering: true,
                searching: true,
                paging: true
            });
        });
    </script>
@endsection
