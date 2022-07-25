<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
// use App\Models\Karyawan;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Auth;

class UserController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['index','store']]);
         $this->middleware('permission:users', ['only' => ['create','edit','update','destroy','index','store']]);
        //  $this->middleware('permission:users-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:users-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(10);
        return view('backand.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('backand.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'required|mimes:jpg,png',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $image = $request->avatar;
        $img_new = time() . $image->getClientOriginalName();
        $image->move('images/icon/' , $img_new);
        $user = new User;
        $user->name = $request->name;
        $user->password  = Hash::make($request->password);
        $user->email     = $request->email;
        $user->avatar = 'images/icon/' .$img_new;
        $user->save();

        $user->assignRole($request->input('roles'));

        // $response = Karyawan::create([
        //     'id_user' => $user->id
        // ]);
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backand.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('backand.users.edit',compact('user','roles','userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);


        $user = User::find($id);
        // $user->update($input);
        if($request->hasFile('avatar'))
        {
            $foto = $request->avatar;
            $image_new = time() . $foto->getClientOriginalName();
            $foto->move('avatar' , $image_new);
            $user->avatar = 'avatar/' . $image_new;
        }
        $user->name = $request->name;
        $user->password  = Hash::make($request->password);
        $user->email     = $request->email;
        $user->save();
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function edit_profil($id)
    {
        $user = User::find($id);
        return view('backand.editprofil',compact('user'));
    }


    public function update_profil(Request $request, $id)
    {
        // return $request;
        $this->validate($request,[
            'avatar'=> 'max:3000|mimes:png,jpeg,jpg',
            'password'=> 'required',
        ],
		[
           
            'avatar.max' => 'file tidak bisa lebih dari 3MB',
            'avatar.mimes' => 'File yang dimasukkan harus jpg, png, jpeg'
		]
	);

        $profil= User::find(Auth::user()->id);

        if($request->hasFile('avatar'))
        {
            $filelm2= $profil->avatar;
            if ($filelm2) {
                @unlink($filelm2);
            }
            $file = $request->avatar;
            $file_new = time() . $file->getClientOriginalName();
            $file->move('avatar' , $file_new);
            $profil->avatar = 'avatar/'. $file_new;

        }
            $profil->name = $request->username;
            $profil->password = Hash::make($request->password);
            $profil->save();
          return redirect()->back()->with('success','Update');
    }

       public function autocomplete(Request $request)
    {
        $query = $request->get('query');
        $filterResult = User::where('name', 'LIKE', '%'. $query. '%')->get();
        return response()->json($filterResult);
            
    } 

}
