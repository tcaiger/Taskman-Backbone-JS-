<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TASK</title>

	<link rel="stylesheet" href="<?= ASSETS . 'css/style.css'?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	
</head>
<body> 

<!-- =========== Bootstrap NAVBAR ================ -->
<nav id="navbar" class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span> 
     		 </button>
			<a class="navbar-brand" href='/'>
				<span class="glyphicon glyphicon-tree-conifer" aria-hidden="true"></span> 
				task manager
			</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<? if(Auth::is_logged_in()): ?>

				<?  $user = new User();
					$user->load(Auth::user_id()); ?>
				
					<li><a href="admin"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?= $user->name ?></a></li>
					<li><a href="signout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sign Out</a></li>
				
				<? else: ?>
			
					<li><a href="register"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Register</a></li>
					<li><a href="signin"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Sign In</a></li>
				
				<? endif; ?>
			</ul>
		</div>
	</div>
</nav>