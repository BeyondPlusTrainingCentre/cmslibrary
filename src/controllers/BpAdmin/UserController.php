<?php
/**
 * Created by Beyond Plus <bplusmyanmar@hotmail.com>
 * User: Beyond Plus
 * Date: D/M/Y
 * Time: MM:HH PM
 */
namespace BeyondPlus\CmsLibrary\Controllers\BpAdmin;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

// use Illuminate\Foundation\Auth\ThrottlesLogins;
// use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class UserController extends Controller
{
    public function __construct()
    {
       $this->middleware('admins');
    }

     public function index(){
        $user = User::orderBy('id', 'DESC')
            ->groupBy('users.id')
            ->get();
        return view('bp-admin.user.index',array('user' => $user ));
    }

    public function create(){
      //  $user= User::lists('name','id');
        //$brand= Brand::lists('brand_name','id');
        //return view('dashboard.create')->with('category',$categories);
        $user = User::orderBy('id', 'DESC')->get();
        return view('bp-admin.user.add')->with(compact('user'));
    }

    public function store(Request $request){
        // $this->validate($request, [
        // 'title' => 'required',
        // 'description' => 'required'
        // ]);

        $inputs = $request->all();
        $inputs['api_token'] = str_random(60);
        $inputs['password'] = bcrypt($request->input('password'));
        User::create($inputs);
        return redirect()->to('bp-admin/user');
    }

    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return 'Product Not Found';
        }
       // $categories= User::lists('name','email');

        return view('bp-admin.user.edit')->with(compact('user'));
    }


    public function update($id, Request $request)
    {
        $inputs = $request->all();
     //   $inputs = $request->except('_token', '_method');
        $inputs['password'] = bcrypt($request->input('password'));
        User::findOrFail($id)->update($inputs);
        return redirect()->to('bp-admin/user');//return view
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        //return 1;
        return redirect()->back();
    }



}