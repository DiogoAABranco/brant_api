<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Validator;
class UserController extends Controller
{
public $successStatus = 200;
/**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        Log::info( "LOGIN");
        Log::info(  request('email').request('password'));

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            Log::info("dentro if");

            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            Log::info( $success );
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
/**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
                $input['password'] = bcrypt($input['password']);
                $user = User::create($input);
                $success['token'] =  $user->createToken('MyApp')->accessToken;
                $success['name'] =  $user->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }
/**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        try{
            $user = Auth::user();
            $user->role;
            return response()->json(['msg'=>'success','user' => $user], $this->successStatus);
        }catch(\Exception $e){
            Log::info($e);
            return response()->json(['msg'=>'error'], $this->successStatus);

        }




    }
}
