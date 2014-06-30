<script type="text/javascript">
function validatePass(p1, p2) {
    if (p1.value != p2.value || p1.value == '' || p2.value == '') {
        p2.setCustomValidity("Password doesn't match");
    } else {
        p2.setCustomValidity('');
    }
}

</script>

<div class="registerWrapper">
	<div class="inner">
		<div class="registerHeader">
			Register Here!
		</div>
		<div class="registerInfo">
			Register here to make us of one of the best Team and Duo searching website. The system provides an easy way to make a perfect match for you.
		</div>
		<div class="formStyleRegister">
			<form class="registerForm" method="post" action="register.php">
				<label class="formLabel">Summoner name*: </label>
				<input class="inputFields" type="text" name="summonername" value="<?php if(isset($summonerName)){echo $summonerName;} ?>" required/>
				<label class="formLabel">Main role:</label>						
				<select class="selectBox" name="roleSelect">
					<option value="Top" <?php if(isset($role)){ if($role == 'Top'){echo 'selected';}}?>>Top</option>
					<option value="Jungle" <?php if(isset($role)){ if($role == 'Jungle'){echo 'selected';}}?>>Jungle</option>
					<option value="Middle" <?php if(isset($role)){ if($role == 'Middle'){echo 'selected';}}?>>Middle</option>
					<option value="Marksman" <?php if(isset($role)){ if($role == 'Marksman'){echo 'selected';}}?>>Marksman</option>
					<option value="Support" <?php if(isset($role)){ if($role == 'Support'){echo 'selected';}}?>>Support</option>
				</select>
				<label class="formLabel">Second role:</label>						
				<select class="selectBox" name="roleSelectSecond">
					<option value="Top" <?php if(isset($secondRole)){ if($secondRole == 'Top'){echo 'selected';}}?>>Top</option>
					<option value="Jungle" <?php if(isset($secondRole)){ if($secondRole == 'Jungle'){echo 'selected';}}?>>Jungle</option>
					<option value="Middle" <?php if(isset($secondRole)){ if($secondRole == 'Middle'){echo 'selected';}}?>>Middle</option>
					<option value="Marksman" <?php if(isset($secondRole)){ if($secondRole == 'Marksman'){echo 'selected';}}?>>Marksman</option>
					<option value="Support" <?php if(isset($secondRole)){ if($secondRole == 'Support'){echo 'selected';}}?>>Support</option>
				</select>
				<label class="formLabel">Looking for:</label>						
				<select class="selectBox" name="lookingFor">
					<option value="duo" <?php if(isset($lookingFor)){ if($lookingFor == 'duo'){echo 'selected';}}?>>Duo Partner</option>
					<option value="threes" <?php if(isset($lookingFor)){ if($lookingFor == 'threes'){echo 'selected';}}?>>3v3 Team</option>
					<option value="fives" <?php if(isset($lookingFor)){ if($lookingFor == 'fives'){echo 'selected';}}?>>5v5 Team</option>

				</select>
				<label class="formLabel">Voice program:</label>
				<select class="selectBox" name="comSelect">
					<option value="yes" <?php if(isset($comSelect)){ if($comSelect == 'yes'){echo 'selected';}}?>>Yes</option>
					<option value="no" <?php if(isset($comSelect)){ if($comSelect == 'no'){echo 'selected';}}?>>No</option>
				</select>
				<label class="formLabel">Region:</label>						
				<select class="selectBox" name="region">
					<option value="euw" <?php if(isset($region)){ if($region == 'euw'){echo 'selected';}}?>>EUW</option>
					<option value="na" <?php if(isset($region)){ if($region == 'na'){echo 'selected';}}?>>NA</option>
					<option value="eune" <?php if(isset($region)){ if($region == 'eune'){echo 'selected';}}?>>EUNE</option>
					<option value="br" <?php if(isset($region)){ if($region == 'br'){echo 'selected';}}?>>BR</option>
					<option value="lan" <?php if(isset($region)){ if($region == 'lan'){echo 'selected';}}?>>LAN</option>
					<option value="las" <?php if(isset($region)){ if($region == 'las'){echo 'selected';}}?>>LAS</option>
					<option value="oce" <?php if(isset($region)){ if($region == 'oce'){echo 'selected';}}?>>OCE</option>
				</select>
		</div>
		<div class="formStyleRegister">
					<label class="formLabel">Language*:</label>
					<input class="inputFields" type="text" name="language" placeholder="English" value="<?php if(isset($language)){echo $language;} ?>" required/>
					<label class="formLabel">Second language:</label>
					<input class="inputFields" type="text" name="secondlanguage" placeholder="Dutch" value="<?php if(isset($secondlanguage)){echo $secondlanguage;} ?>"/>
					<label class="formLabel">Username*:</label>
					<input class="inputFields" type="text" name="username" value="<?php if(isset($username)){echo $username;} ?>" required/>
					<label class="formLabel">Password*:</label>
					<input class="inputFields" type="password" id="password" name="password" value="<?php if(isset($password)){echo $password;} ?>" required/>
					<label class="formLabel">Comfirm password*:</label>
					<input class="inputFields" type="password" name="confirmpassword" value="<?php if(isset($confirmPassword)){echo $confirmPassword;} ?>"  onfocus="validatePass(document.getElementById('password'), this);" oninput="validatePass(document.getElementById('password'), this);" required/>
					<label class="formLabel">E-mail*:</label>
					<input class="inputFields" type="text" name="email" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?"value="<?php if(isset($email)){echo $email;} ?>" required/>
				<input class="buttonForm" type="submit" value="REGISTER" name="submit"/>
			</form>
		</div>
	</div>
</div>