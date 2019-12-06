@extends('default')


@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ '/employees' }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ '/employees/store' }}">
        <div class="row">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Employee Name:</strong>
                    <input type="text" name="full_name" id="full_name" value="" class = 'form-control' placeholder="Enter Employee Full Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6">
                <strong>Email ID:</strong>
                <input type="text" name="email_id" id="email_id" value="" class = 'form-control' placeholder="Enter Email ID">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <strong>Mobile Number:</strong>
                <input type="text" name="mobile_no" id="mobile_no" value="" class = 'form-control' placeholder="Enter Mobile Number">
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <strong>Password:</strong>
                <input type="text" name="password" id="password" value="" class = 'form-control' placeholder="Enter Password">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <strong>Confirm Password:</strong>
                <input type="text" name="confirm_password" id="confirm_password" value="" class = 'form-control' placeholder="Confirm Password">
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <strong>Employee Organization Name:</strong>
                <select name="organization_id" id="organization_id" class = 'form-control'>
                    <option value="">Select organization</option>
                    @if(!empty($organizations ))
                        @foreach($organizations as $org_key => $org_rows)
                            <option value="{{$org_rows['id']}}">{!! $org_rows['name'] !!}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <strong>Roles:</strong>
                <select name="role_id" id="role_id" class = 'form-control'>
                    <option value="">Select Gender</option>
                    @if(!empty($roles))
                        @foreach($roles as $role_key => $role_rows)
                            <option value="{{$role_rows['id']}}">{!! $role_rows['name'] !!}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="address" id="address" class = 'form-control' placeholder="Enter Complete Address">
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <strong>Employee Salary:</strong>
                <input type="number" name="salary" id="salary" value="" class = 'form-control' placeholder="Enter Salary">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <strong>Employee Age:</strong>
                <input type="number" name="age" id="age" value="" class = 'form-control' placeholder="Enter Age">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <strong>Gender:</strong>
                <select name="gender" id="gender" class = 'form-control'>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" id="add_employee" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    {{-- <script>
        $(document).on("click", "#add_employee", function(){
            alert();
        })
    </script> --}}

@endsection