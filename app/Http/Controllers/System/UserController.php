<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use DB;
use Validator;

class UserController extends Controller
{
    public function index()
    {
         $user = DB::table('users')
            ->join('roles','roles.id','=','users.role_id')
            ->select('users.id',
            'users.firstname',
            'users.lastname',
            'users.email',
            'users.username',
            'users.phone_number',
            'users.dninumber',
            'users.role_id',
            'roles.name')
            ->whereNull('users.deleted_at')
            ->paginate(5);

         return view('user.index',compact('user'));
    }

    public function create()
    {
        $rol = Role::select('id','name')->get();
        return view('user.create', compact('rol'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'firstname'   => 'required',
            'lastname' => 'required',
            'dninumber' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'phone_number'=> 'required|unique:users|numeric|digits_between:9,9',
            'password'=> 'required|min:4',
            'cpassword'=> 'required|same:password',
            'role_id'=> 'required'
            ];
        $messages = [
            'firstname.required'   => 'Campo requerido',
            'lastname.required' => 'Campo requerido',
            'dninumber.required' => 'Campo requerido',
            'dninumber.numeric' => 'El campo solo debe contener números',
            'email.required' => 'Campo requerido',
            'email.email' => 'Formato de correo invalido',
            'email.unique' => 'Este dato ya existe en los registros guardados',
            'phone_number.required' => 'Campo requerido',
            'phone_number.unique' => 'Este dato ya existe en los registros guardados',
            "phone_number.numeric" => "El campo solo debe contener números",
            "phone_number.digits_between" => "El campo debe contener 9 digitos",
            'password.required' => 'Campo requerido',
            'password.min' => 'El campo debe contener mas de 3 digitos',
            'cpassword.required' => 'Campo requerido',
            'cpassword.same' => 'El campo Password debe ser igual a este campo',
            'role_id.required' => 'Campo requerido'
            ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {

            return redirect('user/create')
                ->withErrors($validator)
                ->withInput();
        }

        $request->request->add(['password' => Hash::make('password')]);
        $request->request->add(['remember_token' => $request->_token]);

        $input = $request->all();

        User::create($input);
        return redirect()->route('user.index')->with('success', 'user created successfully.');

    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $rol = Role::select('id','name')->get();

        return view('user.edit', compact('user','rol'));
    }

    public function update(Request $request, User $user)
    {

        $input = $request->all();

        $rules = [
            'firstname'   => 'required',
            'lastname' => 'required',
            'dninumber' => 'required|numeric',
            'email' => [
                'required',
                'email',
                Rule::unique('users','email')->ignore($user->id),
            ],
            'phone_number' => [
                'required',
                'numeric',
                'digits_between:9,9',
                Rule::unique('users','phone_number')->ignore($user->id),
            ],
            ];
        $messages = [
            'firstname.required'   => 'Campo requerido',
            'lastname.required' => 'Campo requerido',
            'dninumber.required' => 'Campo requerido',
            'dninumber.numeric' => 'El campo solo debe contener números',
            'email.required' => 'Campo requerido',
            'email.email' => 'Formato de correo invalido',
            'email.unique' => 'Este dato ya existe en los registros guardados',
            'phone_number.required' => 'Campo requerido',
            'phone_number.unique' => 'Este dato ya existe en los registros guardados',
            "phone_number.numeric" => "El campo solo debe contener números",
            "phone_number.digits_between" => "El campo debe contener 9 digitos",
            ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {

            return redirect('user/'.$user->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

       /*  if ($request->hasFile('imagename')) {

            Storage::delete($user->imagename);

            $user->imagename = $request->imagename->store('img_user', 'public');
        } */
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->dninumber = $request->dninumber;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->role_id = $request->role_id;

        $user->save();

        return redirect()->route('user.index')->with('success', 'user updated successfully.');
    }

    public function destroy(User $user)
    {
       // Storage::delete($category->imagename);

        $user->delete();

        return redirect()->route('user.index')->with('success', 'Successful removal.');
    }
}
