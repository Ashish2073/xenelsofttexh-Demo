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
use Illuminate\Validation\Rule;

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
            'email' => ['required', 'string', 'email', 'max:255','unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'mobile'=>['required','numeric','digits:11','unique:'.User::class],
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
            // $data =  User::whereStatus(true)->whereRole('User')->get();
            $data =  User::whereRole('User')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<button type="button" class="btn bg-primary" data-bs-toggle="modal" onclick="edit('.$row->id.')"  data-bs-target="#exampleModal1">Edit</button> <a href="javascript:void(0)" onclick="deleteuser('.$row->id.')" class="delete btn btn-danger btn-sm" >Delete</a>';
                    return $actionBtn;
                })->addColumn('status',function($row){
                  if($row->status==1){
                    $satusColum='Active';
                    return $satusColum;
                  }else{
                    $satusColum='InActive';
                    return $satusColum;
                  }
                  
                })->addIndexColumn()
                ->rawColumns(['action','status'])
                ->make(true);
        }
 
        return view('dashboard');

      }


      public function saveuser(Request $request){
     

        if(isset($request->id)){
          $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore($request->id)],
            
            'mobile'=>['required','numeric','digits:11',Rule::unique('users')->ignore($request->id)],
            'address'=>['required','min:3'],
            'status'=>['required','in:0,1'],
          ]);
          User::where('id',$request->id)->update([
            'name' => $request->name,
            'username'=>explode('@',$request->email)[0].'_'.$request->mobile,
            'address'=>$request->address,
            'email' => $request->email,
            'mobile'=>$request->mobile,
            'status'=>$request->status,
          ]);




        }else{

        $request->validate([
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255','unique:'.User::class],
          'password' => ['required', 'confirmed', Rules\Password::defaults()],
          'mobile'=>['required','numeric','digits:11','unique:'.User::class],
          'address'=>['required','min:3'],
          'status'=>['required','in:0,1'],
      ]);

        $user = User::create([
            'name' => $request->name,
            'username'=>explode('@',$request->email)[0].'_'.$request->mobile,
            'address'=>$request->address,
            'email' => $request->email,
            'mobile'=>$request->mobile,
            'status'=>$request->status,
            'password' => Hash::make($request->password),

        ]);
                
        }



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
