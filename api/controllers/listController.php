<?php  

Class listController {

	public function __construct(){
		if(!Auth::is_logged_in()){
			http_response_code(401);
			echo json_encode([
				'error' => 'You are not logged in'
			]);
			exit;
		}
	}



	public function readLists(){
		$params = json_decode(file_get_contents('php://input'),true);
		$lists = new TaskList_Collection();
		$lists->where('deleted', '0');
		$lists->order_by('id');
		$lists->get();
		header('Content-Type: application/json');
		echo ($lists);
	}
	public function readList(){
		$list = new TaskList();
		$list->load(Route::param('id'));
		header('Content-Type: application/json');
		echo ($list);
	}
	public function createList(){
		$list = new TaskList();
		$list->name = Input::get('name');
		$list->save();
		header('Content-Type: application/json');
		echo $list;
	}
	public function updateList(){
		$list = new TaskList();
		$list->load(Route::param('id'));
		$list->name = Input::get('name');
		$list->save();
		echo $list;
	}
	public function deleteList(){
		$params = json_decode(file_get_contents('php://input'),true);
		$id = $params['id'];
		$list = new TaskList();
		$list->load(Route::param('id'));
		$list->deleted = 1;
		$list->save();
	}
	
}