<?php  

Class taskController {

	public function __construct(){
		if(!Auth::is_logged_in()){
			http_response_code(401);
			echo json_encode([
				'error' => 'You are not logged in'
			]);
			exit;
		}
	}


	public function readTasks(){
		$params = json_decode(file_get_contents('php://input'),true);
		$tasks = new Tasks_Collection();
		$tasks->where('deleted', '0');
		if($_GET['list_id']) $tasks->where('list_id', $_GET['list_id']);
		$tasks->order_by('id');
		$tasks->get();
		header('Content-Type: application/json');
		echo ($tasks);
	}

	public function readTask(){
		$task = new Task();
		$task->load(Route::param('id'));
		header('Content-Type: application/json');
		echo ($task);
	}

	public function createTask(){
		$task = new Task();
		$task->name = Input::get('name');
		$task->list_id = Input::get('list_id');
		$task->description = Input::get('description');
		$task->save();
		header('Content-Type: application/json');
		echo $task;
	}

	public function updateTask(){
		$task = new Task();
		$task->load(Route::param('id'));
		$task->name = Input::get('name');
		$task->description = Input::get('description');
		$task->list_id = Input::get('list_id');
		$task->save();
		header('Content-Type: application/json');
		echo $task;
	}

	public function deleteTask(){
		$params = json_decode(file_get_contents('php://input'),true);
		$id = $params['id'];
		$task = new Task();
		$task->load(Route::param('id'));
		$task->deleted = 1;
		$task->save();
		header('Content-Type: application/json');
		echo $task;
	}
	
}
