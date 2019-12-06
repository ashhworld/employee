@extends('default')
 

@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employees Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Add New</a>
                <a class="btn btn-danger" href="{{ '/logout' }}"> logged Out</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <?php //echo "<pre>"; print_r($employees); ?>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Emp Name</th>
            <th>Email</th>
            <th>Organization</th>
            <th>Salary</th>
            <th>Role</th>
            <th>Status</th>
            <th width="280px">Delete</th>
            <th width="280px">Status Change</th>
            <th width="280px">Action</th>
        </tr>
        @if(isset($employees))
        <?php $i = 0;?>
            @foreach ($employees as $key => $employee)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $employee['full_name'] }}</td>
                <td>{{ $employee['email_id'] }}</td>
                <td>{{ $employee['organization']['name'] }}</td>
                <td>{{ $employee['salary'] }}</td>
                <td>{{ $employee['role']['name'] }}</td>
                <td>{{ $employee['is_active'] }}</td>
                <td>
                    <form action="{{'/employees/destroy/'}}{{$employee['id']}}" method="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</a>
                    </form>
                </td>
                <td>
                    <form action="{{'/employees/update_status/'}}{{$employee['id']}}" method="POST">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="is_active" value="@if($employee['is_active']) 0 @else 1 @endif">
                        <button type="submit" class="btn @if($employee['is_active']) btn-warning @else btn-info @endif">@if($employee['is_active']) Inactive @else Active @endif</a>
                    </form>
                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('employees.show', $employee['id']) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('employees.edit', $employee['id']) }}">Edit</a>
                </td>
            </tr>
            @endforeach
        
        @endif
    </table>


    {{-- {!! $employees->render() !!} --}}


@endsection