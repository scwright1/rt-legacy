<div id="signup" title="Signup to Journee">
	<p>Please use this form to sign up for access.  Traveller accounts will be reviewed on a per-signup basis.  All fields are required.</p>
	<form id="signupForm" action="secure-signup.php" method="post">
        <label for="firstName">First Name</label><br />
		<input type="text" size="40" id="firstName" name="firstName" class="required" minlength="2" style="text-align: center;"/><br /><br />
        <label for="lastName">Last Name</label><br />
		<input type="text" size="40" id="lastName" name="lastName" class="required" minlength="2" style="text-align: center;"/><br /><br />
        <label for="email">Email</label><br />
		<input type="text" size="40" id="email" name="email" class="required" minlength="6" style="text-align: center;"/><br /><br />
        <label for="userName">Username</label><br />
		<input type="text" size="40" id="userName" name="userName" class="required" minlength="2" style="text-align: center;"/><br /><br />
        <label for="password">Password</label><br />
		<input type="password" size="40" id="password" name="password" class="required" minlength="6" style="text-align: center;"/><br /><br />
        <label for="accountType">Account Type</label><br />
		<select id="accountType" name="accountType">
			<option>Traveller</option>
			<option>Observer</option>
		</select><br /><br />
        <input type="submit" id="submitSignup" value="Submit"/><br /><br />
	</form>
</div>

