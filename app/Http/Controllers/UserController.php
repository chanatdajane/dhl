<?php namespace App\Http\Controllers;
use App\User as User;

class UserController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = User::get();
		return view('user/index', ['user' => $user]);
	}

	public function delete($id){
		User::where('id', $id)->delete();
		return redirect('user')->with('message', 'ลบผู้ใช้เรียบร้อย');
	}
}
