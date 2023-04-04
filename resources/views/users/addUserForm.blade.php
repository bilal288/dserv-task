@extends('layout/master')
@section('body')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add User</h3>
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

                        <form method="POST" action="{{ route('user.store') }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            @csrf
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 label-align">Title</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="title" class="form-control">
                                        <option>Choose title</option>
                                        <option value="mr">Mr</option>
                                        <option value="mrs">Mrs</option>
                                        <option value="dr">Dr</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first_name" name="first_name" required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="last_name" name="last_name" required="required" class="form-control">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="email" id="email" name="email" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="birthday" name="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                </div>
                            </div>
                            <!-- <select nam class="form-control select2 " multiple>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                                <option value="4">Option 4</option>
                                <option value="5">Option 5</option>
                            </select> -->


                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 label-align">User Group</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <!-- <select name="user_group_ids[]" class="selectpicker" multiple data-live-search="true">
                                        <option>Choose User Group</option>
                                        @foreach ($userGroups as $userGroup)
                                        <option value="{{ $userGroup->id }}">{{ $userGroup->name }}</option>
                                        @endforeach
                                    </select> -->

                                    <div class="select-options">
                                        @foreach ($userGroups as $userGroup)
                                        <div class="option">
                                            <input type="checkbox" name="user_group_ids[]" value="{{ $userGroup->id }}" />
                                            <label for="option1">{{ $userGroup->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Male &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="female" class="join-btn"> Female
                                        </label>
                                    </div> -->

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                                <div class="col-md-6 col-sm-6 ">
                                
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="radio1" name="gender" value="male" checked>
                                            <label class="form-check-label" for="radio1">&nbsp; Male &nbsp;</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="radio2" name="gender" value="female"> 
                                            <label class="form-check-label" for="radio2">&nbsp; Female &nbsp;</label>
                                    
                                    </div>
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