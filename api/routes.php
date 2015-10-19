<?php # Restful API

// ======= COMMENT ROUTES ==============

Route::get('/comments'			, 'commentsController->readComments');
Route::get('/comments/:id' 		, 'commentsController->readComment');
Route::post('/comments'			, 'commentsController->createComment');
Route::put('/comments/:id'		, 'commentsController->updateComment');
Route::delete('/comments/:id'	, 'commentsController->deleteComment');

// ======= TASK ROUTES ==============

Route::get('/tasks'				, 'taskController->readTasks');
Route::get('/tasks/:id' 		, 'taskController->readTask');
Route::post('/tasks'			, 'taskController->createTask');
Route::put('/tasks/:id'			, 'taskController->updateTask');
Route::delete('/tasks/:id'		, 'taskController->deleteTask');

// ======= LIST ROUTES ==============

Route::get('/lists'			, 'listController->readLists');
Route::get('/lists/:id'		, 'listController->readList');
Route::post('/lists'		, 'listController->createList');
Route::put('/lists/:id'		, 'listController->updateList');
Route::delete('/lists/:id'	, 'listController->deleteList');

// ======= USER ROUTES ==============
Route::get('/users'			, 'userController->readUsers');
Route::get('/users/:id'		, 'userController->readUser');
Route::post('/users'		, 'userController->createUser');


Route::fallback(VIEWS.'404.php');



