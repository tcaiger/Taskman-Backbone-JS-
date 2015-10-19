<?php  

Class commentsController {

	public function __construct(){
		if(!Auth::is_logged_in()){
			http_response_code(401);
			echo json_encode([
				'error' => 'You are not logged in'
			]);
			exit;
		}
	}

	public function readComments(){
		$params = json_decode(file_get_contents('php://input'),true);
		$comments = new Comments_Collection();
		$comments->where('deleted', '0');
		if($_GET['task_id']) $comments->where('task_id', $_GET['task_id']);
		$comments->order_by('id');
		$comments->get();
		header('Content-Type: application/json');
		echo ($comments);
	}

	public function readComment(){
		$comment = new Comment();
		$comment->load(Route::param('id'));
		header('Content-Type: application/json');
		echo ($comment);
	}

	public function createComment(){
		$comment = new Comment();
		$comment->content = Input::get('content');
		$comment->list_id = Input::get('list_id');
		$comment->task_id = Input::get('task_id');
		$comment->save();
		header('Content-Type: application/json');
		echo $comment;
	}

	public function updateComment(){
		$comment = new Comment();
		$comment->load(Route::param('id'));
		$comment->content = Input::get('content');
		$comment->list_id = Input::get('list_id');
		$comment->save();
	}

	public function deleteComment(){
		$params = json_decode(file_get_contents('php://input'),true);
		$id = $params['id'];
		$comment = new Comment();
		$comment->load(Route::param('id'));
		$comment->deleted = 1;
		$comment->save();
	}
	
}
