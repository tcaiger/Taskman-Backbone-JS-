
<div class="container">
	<div class="row">
		
		<?= Form::open('','post', ['class'=>'form-horizontal']) ?>
			<div class="form-group">
				<h3>Sign In</h3>
			</div>

			<div class="form-group">
				<?= Form::label('email', 'Email') ?>
				<?= Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'eg. john.smith@gmail.com', 'required'=>'true']) ?>
			</div>

			<div class="form-group">
				<?= Form::label('password', 'Password') ?>
				<?= Form::password('password', '', ['class' => 'form-control', 'placeholder' => 'eg. admin1234', 'required'=>'true', 'minlength'=>'2', 'maxlength'=>'10']) ?>
			</div>

			<div class="form-group">
				<? echo $msg;?>
				<?= Form::submit('Submit', ['class' => 'btn btn-primary']) ?>
			</div>

			<div class="form-group">
				<p>Don't have an account? <a href="register">Register</a></p>
			</div>

		<?= Form::close() ?>

	</div>
</div>
