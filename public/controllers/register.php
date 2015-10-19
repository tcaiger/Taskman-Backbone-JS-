<?php

# 1. Logic

if(Input::posted()){

	$user = new User();
	$user->name  	= $_POST['name'];
	$user->email  	= $_POST['email'];	
	$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	// If there is a file to upload
	if($_FILES){
		# Upload the file and...
		$files = UPLOAD::to_folder(ASSETS.'uploads/');
		# Put a link to it in the database
		$user->profile = $files[0]['filepath'];
	}

	$user->save();

	echo $user->username;
	Auth::log_in($user->id);
	URL::redirect('admin');
}


# 3. Load Views / Redirects

include VIEWS.'header.php';
include VIEWS.'register.php';
include VIEWS.'public_footer.php';
