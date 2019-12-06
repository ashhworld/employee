@extends('default')


@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ '/employees' }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee Name:</strong>
                {!! $employee['full_name'] !!}
                {{-- <input type="text" name="full_name" id="full_name" value="{!! $employee['full_name'] !!}" class = 'form-control' placeholder="Enter Employee Full Name"> --}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">
            <strong>Email ID:</strong>
            {!! $employee['email_id'] !!}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <strong>Mobile Number:</strong>
            {!! $employee['mobile_no'] !!}
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <strong>Employee Organization Name:</strong>
            {!! $employee['organization']['name'] !!}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <strong>Roles:</strong>
            {!! $employee['role']['name'] !!}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                {!! $employee['address'] !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <strong>Employee Salary:</strong>
            {!! $employee['salary'] !!} Rs
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <strong>Employee Age:</strong>
            {!! $employee['age'] !!} 
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <strong>Gender:</strong>
            {!! $employee['gender'] !!} 
        </div>
    </div>

@endsection