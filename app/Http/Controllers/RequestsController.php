<?php namespace App\Http\Controllers;
use App\Models\Requests as Requests;
use App\Models\RequestsChoice as RequestsChoice;
use App\Models\Category as Category;
use App\Models\Organization as Organization;
use App\User as User;
use Request;
use File;

class RequestsController extends Controller {

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
		$requests = Requests::get();

		foreach($requests as $key => $value){
			$user = User::where('id',$requests[$key]['userID'])->get();
			$requests[$key]['user'] = $user[0]['name'];
			
			// $organization = Organization::where('id',$requests[$key]['organizationID'])->get();
			// $requests[$key]['organization'] = $organization[0]['name'];

		}
		// print_r(json_encode($requestscate[0]));
		return view('requests/index', ['requests' => $requests]);
	}

	public function manage($id = '')
	{	

		// $organization = Organization::where('parentID',0)->get();
		
		if(!empty($id)){
			$requests = Requests::where('id',$id)->get();
			$requests_choice = RequestsChoice::where('requestID',$id)->get();
			$requests['requests_choice'] = $requests_choice;

			return view('requests/edit', ['requests' => $requests]);
		}else{
			return view('requests/add');
		}
		
	}

	public function getIndex(){
		$requests = Requests::get();
		return $requests ? 'Model Profile Connect Yes!' : 'Error! Model Profile Connect False!!!';
	}

	public function save(){
		$data = Request::all();
		
		if(!empty($data['ID'])){
			$requests = Requests::find($data['ID']);
		}else{
			$requests = new Requests;
		}

		$requests->staffID = $data['staffID'];
		$requests->Firstname = $data['Firstname'];
		$requests->Lastname = $data['Lastname'];
		$requests->Nickname = $data['Nickname'];
		$requests->Position = $data['Position'];
		$requests->Department = $data['Department'];
		$requests->Location = $data['Location'];
		$requests->yearservice = $data['yearservice'];
		$requests->userID = \Auth::user()->id;
		$requests->Photo = 'thumbnail.png';

		
		//cover,recommend
		if(!empty($data['ID'])){
			$requests::where('ID', $data['ID'])->update($requests['attributes']);
			RequestsChoice::where('requestID', $data['ID'])->delete();
			$requestsid = $data['ID'];
		}else{
			$requests->save();
			$requestsid = $requests->id;
		}

		if(!empty($data['Photo']))
			$data['Photo']->move('uploads/requests/'.$requestsid.'/','thumbnail.png');

		if(!empty($data['choice_name'])){
			foreach($data['choice_name'] as $key=>$value){
				$requests_choice = new RequestsChoice;
				$requests_choice->requestID = $requestsid;
				$requests_choice->name = $value;
				$requests_choice->save();
			}
		}

		return redirect('requests')->with('message', 'บันทึกข้อมูลเรียบร้อย');
	}

	public function delete($id){
		Requests::where('ID', $id)->delete();
		RequestsChoice::where('requestID', $id)->delete();
		File::deleteDirectory('uploads/requests/'.$id);
		return redirect('requests')->with('message', 'ลบสถานที่เรียบร้อย');
	}

}
