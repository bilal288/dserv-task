@extends('layout/master')
@section('body')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit User</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="POST" action="{{ route('user.update') }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            @csrf
                            @method('PUT')
                            <input id="user_id" name="user_id" type="hidden" value="{{ $user->id }}">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 label-align">{{ __('Title') }}</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="title" class="form-control">
                                        <option value="mr" {{ $user->title == 'mr' ? 'selected' : '' }}>Mr</option>
                                        <option value="mrs" {{ $user->title == 'mrs' ? 'selected' : '' }}>Mrs</option>
                                        <option value="dr" {{ $user->title == 'dr' ? 'selected' : '' }}>Dr</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">{{ __('First Name') }}<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" name="first_name" value="{{ $user->first_name }}" required class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">{{ __('Last Name') }}<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="last-name" name="last_name" value="{{ $user->last_name }}" required class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" value="{{ $user->birthday}}" required="required" type="text" onfocus="this.type='date'" name="birthday" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>

                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                                <div class="col-md-6 col-sm-6">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-secondary<?php echo ($user->gender == 'male') ? ' active' : ''; ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="male" class="join-btn" <?php echo ($user->gender == 'male') ? ' checked' : ''; ?>> &nbsp; Male &nbsp;
                                        </label>
                                        <label class="btn btn-primary<?php echo ($user->gender == 'female') ? ' active' : ''; ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="female" class="join-btn" <?php echo ($user->gender == 'female') ? ' checked' : ''; ?>> Female
                                        </label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                                <div class="col-md-6 col-sm-6 ">
                                
                                        <div class="form-check">
                                        <input type="radio" name="gender" value="male" class="form-check-input" <?php echo ($user->gender == 'male') ? ' checked' : ''; ?>>
                                            <label class="form-check-label" for="radio1">&nbsp; Male &nbsp;</label>
                                        </div>
                                        <div class="form-check">
                                        <input type="radio" name="gender" value="female" class="form-check-input" <?php echo ($user->gender == 'female') ? ' checked' : ''; ?>> Female

                                            <label class="form-check-label" for="radio2">&nbsp; Female &nbsp;</label>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 label-align">User Group</label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="select-options">
                                        @foreach ($userGroups as $userGroup)
                                        <div class="option">
                                            <input type="checkbox" name="user_group_ids[]" value="{{ $userGroup->id }}" @if($user->userGroups->contains($userGroup)) checked @endif />
                                            <label for="{{ $userGroup->name }}">{{ $userGroup->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->
<script>
    const dateInput = document.querySelector('#birthday');
    const today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('max', today);
</script>
@endsection