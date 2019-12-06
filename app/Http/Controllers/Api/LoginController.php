<?php namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EmployeesModel;
use App\RolesModel;
use App\OrganizationModel;
use DB;
use Session;

class LoginController extends Controller {

    public function index()
    {
        return view('login');
    }

    public function validateUser(Request $request) {
        // print_r($request->all());
        $this->validate($request, [
            'user_name' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        if ($request->has("user_name") && $request->has("user_name") != null || $request->has("password") && $request->has("password") != null) {
            $rs_employee = EmployeesModel::where("email_id", $request->user_name)
                    ->where('password', md5($request->password))
                    ->first();
                // echo $request->user_name."====".md5($request->password);
                // print_r($rs_employee);

            if ($rs_employee) {

                $response = array(
                    "message" => "User validated successfully.",
                    "data" => $rs_employee
                );

                $user_rs = $rs_employee->toArray();

                Session::put(['user_name'=> $rs_employee->email_id,
                    "password"=> $request->password,
                    "role_id" => $rs_employee->role_id,
                    "organization_id" => $rs_employee->organization_id,
                    "user_data" => $rs_employee->toArray()
                ]);

                if($rs_employee->role_id == 1 || $rs_employee->role_id == 2){
                    return redirect()->route('employees.index');
                } else {
                    return redirect()->route('employees.show', $rs_employee->id);
                }
            } else {
                return response(array("message"=> "Invalid username or password"), 401)
                    ->header('Content-Type', 'application/json');
            }
        }else{
            return response(array("message"=> "Required input not found"), 406)
                ->header('Content-Type', 'application/json');
        }
    }

    public function getLogout(){
        // Auth::logout();
        Session::flush();
        return redirect()->route('login.index');
    }
}
