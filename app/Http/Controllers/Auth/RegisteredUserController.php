<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Yajra\DataTables\Facades\Datatables;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'mobile'=>['required','numeric','min:10','unique:'.User::class],
            'address'=>['required','min:3'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username'=>explode('@',$request->email)[0].'_'.$request->mobile,
            'address'=>$request->address,
            'email' => $request->email,
            'mobile'=>$request->mobile,
            'password' => Hash::make($request->password),

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

      public function userList(Request $request){

        if ($request->ajax()) {
            $data =  User::whereStatus(true)->whereRole('User')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<button type="button" class="btn bg-primary" data-bs-toggle="modal" onclick="edit('.$row->id.')"  data-bs-target="#exampleModal">Edit</button> <a href="javascript:void(0)" onclick="deleteuser('.$row->id.')" class="delete btn btn-danger btn-sm" >Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
 
        return view('dashboard');

      }


      public function saveuser(Request $request){
        $user = User::create([
            'name' => $request->name,
            'username'=>explode('@',$request->email)[0].'_'.$request->mobile,
            'address'=>$request->address,
            'email' => $request->email,
            'mobile'=>$request->mobile,
            'password' => Hash::make($request->password),

        ]);
                
        return $user;



      }

      public function edituserdata(Request $request){

        $data =  User::whereStatus(true)->whereRole('User')->where('id',$request->id)->get();
        return $data;

      }


      public function deleteuserdata(Request $request){
        $company = User::where('id',$request->id)->delete();
        return Response()->json($company);

      }



}
