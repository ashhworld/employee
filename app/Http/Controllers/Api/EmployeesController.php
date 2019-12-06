<?php namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EmployeesModel;
use App\RolesModel;
use App\OrganizationModel;
use DB;
use Session;

class EmployeesController extends Controller {

    public function index(){
        $organization_id = Session::get('organization_id');
        
        $query = EmployeesModel::with('organization', 'role')
                ->select();
        if($organization_id != 1){
            $query->where("organization_id", Session::get('organization_id'))
                    ->orderBy('created_at','desc');
        } else {
            $query->orderBy('created_at','desc');
        }

        $rs_employees = $query->get()->toArray();
                

        $response = array();
        if(!empty($rs_employees)){
          $response['status'] = 200;
          $response['msg'] = "Orders are available.";
          $response['data']['orders'] = $rs_employees;
        } else {
          $response['status'] = 404;
          $response['msg'] = "Users are not exists.";
          $employee_managementemployee_management['data']['orders'] = "";
        }

        return view('employee_list', ['employees'=> $rs_employees]);

        // return response($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['organizations'] = OrganizationModel::select()
                ->orderBy('name','ASC')->get()->toArray();
        $data['roles'] = RolesModel::select()
                ->orderBy('name','ASC')->get()->toArray();
        
        return view('create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array();
        $data['employee'] = EmployeesModel::select()
                    ->where("id", $id)
                    ->orderBy('created_at','desc')->first()->toArray();;
        $data['organizations'] = OrganizationModel::select()
                ->orderBy('created_at','desc')->get()->toArray();
        $data['roles'] = RolesModel::select()
                ->orderBy('created_at','desc')->get()->toArray();
        return view('edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array();
        $data['employee'] = EmployeesModel::with('organization', 'role')
                    ->select()
                    ->where("id", $id)
                    ->orderBy('created_at','desc')->first()->toArray();

        return view('show', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        extract($request->all());
        $this->validate($request, [
            'full_name' => 'required|string|max:255',
            'email_id' => 'required|string|email|max:255',
            'organization_id' => 'required|integer',
            'role_id' => 'required|integer',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'mobile_no' => 'required|string|min:10|max:10|unique:users'
        ]);

        EmployeesModel::find($id)->update($request->all());

        return redirect()->route('employees.index')
                        ->with('success','Employee updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status(Request $request, $id)
    {
        extract($request->all());
        // print_r($is_active);
        DB::table('users')->update(array('is_active' => $is_active));
        if($is_active == 1){
            $msg = "Employee is now activated.";
        } else {
            $msg = "Employee is now de-activated.";
        }
        
        return redirect()->route('employees.index')->with('success',$msg);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // extract($request->all());
        // print_r($request->all());
        $posted_data = $request->all();
        
        $this->validate($request, [
            'full_name' => 'required|string|max:255',
            'email_id' => 'required|string|email|max:255|unique:users',
            'password' => 'required_with:confirm_password|same:confirm_password|string|min:8',
            'confirm_password' => 'required|string|min:8',
            'organization_id' => 'required|integer',
            'role_id' => 'required|integer',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'mobile_no' => 'required|string|min:10|max:10|unique:users'
        ]);
        unset($posted_data['confirm_password']);
        $posted_data['password'] = md5($posted_data['password']);

        EmployeesModel::create($posted_data);

        return redirect()->route('employees.index')->with('success','Employee add successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployeesModel::find($id)->delete();
        return redirect()->route('employees.index')
                        ->with('success','Employees deleted successfully');
    }
}
