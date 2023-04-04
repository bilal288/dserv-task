@extends('layout/master')
@section('body')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Manage Users</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        There are Users list below.
                                    </p>
                                    <table id="datatable" class="table table-striped table-bordered users-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Birthday</th>
                                                <th>Gender</th>
                                                <th>User Group </th>
                                                <th>Active</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr style="background-color: {{ $user->is_active ? '' : 'red' }};">
                                                <td>{{ $user->title }}</td>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->birthday }}</td>
                                                <td>{{ $user->gender }}</td>
                                                <td>
                                                    @foreach ($user->userGroups as $userGroup)
                                                    <li>{{ $userGroup->name }}</li>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <select name="is_active" class="form-select is_active" aria-label="Select Status" data-id="{{ $user->id }}">
                                                        <option value="1" {{ $user->is_active ? 'selected' : '' }}>Activate</option>
                                                        <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Deactivate</option>
                                                    </select>

                                                </td>
                                                <td>
                                                    @php
                                                    $message;
                                                    if ($user->userGroups->count()) {
                                                    $message = 'Are you sure you want to delete this user from the following user groups: ' . $user->userGroups->implode('name', ', ') . '?';
                                                    } else {
                                                    $message = 'Are you sure you want to delete this user?';
                                                    }
                                                    @endphp
                                                    <a href="{{ route('user.delete', $user->id) }}" onclick="{{ 'return confirm(\'' . $message . '\')' }}">
                                                        <button type="submit" class="btn btn-danger btn-sm" name="delete" id="delete-user">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </a>


                                                    <a href="{{ route('user.edit', $user->id) }}">
                                                        <button type="button" class="btn btn-info btn-sm" name="update">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection