# employee
CRUD Management of Employee

Installation Process:
-----------------------
1. Composer Update First.
    Command:
    > composer update
2. Create Database :
    employee_management
3. Run Migration scripts:
    Command:
    > php artisan migrate
4. Run Seeder from dummy Data and login
    > php artisan db:seed --class=RolesSeeder
    > php artisan db:seed --class=OrganizationsSeeder
    > php artisan db:seed --class=EmployeesSeeder
5. Run Command for server start:
    php artisan serve
6. Your Serve is run on URL:
    http://127.0.0.1:8000/
    User name: admin@gmail.com
    password: admin#2019

This Login task have Further Features:
---------------------------------------


1. Login Page
2. Employee List
3. Add Employee
4. Update Employee
5. Show Employee
6. Delete Employee

Roles Of Employees:
---------------------

1. Admin - Have complete access of projects [Add , Edit, Delete, change status]
2. Team Leader - Have access of only of there company employee list view and add edit employee of there company.
3. Team Member - He just view his profile thats it.

Please create a laravel project to accommodate all of below problem statements.
----------------------------------------------------------------------------------

1. Create a CRUD application for employees.

2. Use resource controller and its default methods for basic operations.
    > 2 controller are there LoginController and EmployeesController both we use resourse controller.


3. Integrate a middleware to check if logged in user has permission to see the page.
    > Here we use basicAuth Middleware for session user perpose
    > if session is active then user can view access of project if not then it will complete logged out.
4. Create a dynamic menu and use service provider / container to show menu items
    > Not Done
5. Use eloquent for database related actions.
    > Employee get list by using eloquents 3 models are there
        1. EmployeeModel, RoleModel, OrganizationModel all are connected relations.
        2. EmployeeModel relation between EmployeeModel => RoleModel and OrganizationModel

6. For CRUD use laravel's validations for email, unique email, mobile number with limitation of 10 digits,Address with limitation of 300 characters and salary with float value.
    All validation are done in both controller 
7. Use migrations for creating / modifying database tables.
    3 Tables are there in this project Users, Organization, Roles
        all 3 are creating using migrations


8. One integration of service provider and facade each.
    