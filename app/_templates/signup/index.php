<?php

$signup = false;
if (isset($_POST['username']) and isset($_POST['password']) and !empty($_POST['password']) and isset($_POST['email_address']) and isset($_POST['phone'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email_address'];
    $phone = $_POST['phone'];
    $error = User::signup($username, $password, $email, $phone);
    $signup = true;
}
?>

<?php
if ($signup) {
    if (!$error) {
        ?>
<main class="container">
	<div class="bg-light p-5 rounded mt-3">
		<h1>Signup Success</h1>
		<p class="lead">Now you can login from <a
				href="<?=get_config('base_path')?>login.php">here</a>.
		</p>

	</div>
</main>
<?php
    } else {
        ?>
<main class="container">
	<div class="bg-light p-5 rounded mt-3">
		<h1>Signup Fail</h1>
		<p class="lead">Something went wrong, <?= $error ?>
		</p>
	</div>
</main>
<?php
    }
} else {
    ?>
<main class="form-signup">
	<form method="post" action="signup.php">
	<center><img style="margin-center:50px; margin-top:-10px" class="" src="/images/logo.gif" alt=""
			height="250"></center>
		<!-- <h1 style="text-align:center;" class="h3 fw-normal">Create Your Account</h1> -->
		<div class="form-floating">
			<input name="username" type="text" class="form-control" id="floatingInputUsername"
				placeholder="name@example.com">
			<label for="floatingInputUsername">Username</label>
		</div>
		<div class="form-floating">
			<input name="phone" type="text" class="form-control" id="floatingInputUsername"
				placeholder="name@example.com">
			<label for="floatingInputUsername">Phone</label>
		</div>
		<div class="form-floating">
			<input name="email_address" type="email" class="form-control" id="floatingInput"
				placeholder="name@example.com">
			<label for="floatingInput">Email address</label>
		</div>
		<div class="form-floating">
			<input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
			<label for="floatingPassword">Password</label>
		</div>
		<button class="w-100 btn btn-lg btn-primary hvr-grow-rotate" type="submit">Sign up</button>
		<p style="margin-left : 60px; position:absolute;">Have an account ?</p>
		<a style="margin:20px 10px 100px 190px; position:relative;  text-decoration: none;" href="/login.php">&nbsp;Log in</a>
	</form>
</main>
<?php
}
