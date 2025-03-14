<?php

$login = true;

//TODO: Redirect to a requested URL instead of base path on login
if (isset($_POST['email_address']) and isset($_POST['password'])) {
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];

    $result = UserSession::authenticate($email_address, $password);
    $login = false;
}
if (!$login) {
    if ($result) {
        ?>
<script>
	window.location.href = "<?=get_config('base_path')?>"
</script>

<?php
    } else {
        ?>
<main class="container">
	<div class="bg-light p-5 rounded mt-3">
		<h1>Login Failed</h1>
		<p class="lead">This example is a quick exercise to do basic login with html forms.</p>
	</div>
</main>
<?php
    }
} else {
    ?>


<main class="form-signin">
	<form method="post" action="login.php">
	<center>
	<img style="margin-center:50px; margin-top:-50px" class="" src="/images/logo.gif" alt=""
			height="300">
			<input name="fingerprint" type="hidden" id="fingerprint" value="">
		<div class="form-floating">
			<input name="email_address" type="text" class="form-control" id="floatingInput"
				placeholder="name@example.com">
			<label for="floatingInput">Email address or Username</label>
		</div>
		<div class="form-floating">
			<input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
			<label for="floatingPassword">Password</label>
		</div>`

		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		<button class="w-100 btn btn-lg btn-primary hvr-grow-rotate" type="submit">Sign in</button>
		<p style="margin-left : 45px; position:absolute;">Don't have an account ? </p>
		<a style="margin:20px 10px 100px 190px; position:relative;  text-decoration: none;" href="/signup.php">&nbsp;Signup</a>
		<!-- <div class="feedback">
		<button class="btn">Submit</button>
		<script>
			var btn = document.querySelector('.btn');
			var position;
			btn.addEventListener("mouseover",function(){
				position ? (position = 0):(postion = 150);
				btn.style.transform = `translate(${position}px,0px)`;
				btn.style.transition = "all 0.3s ease";

			});
		</script>
		</div> -->	
	</form></center>
</main>

<?php
}
