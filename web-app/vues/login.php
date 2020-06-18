<div id="accueil">
<?php
	if (ISSET($_REQUEST["global_message"]))
	   $msg="<span class=\"warningMessage\">".$_REQUEST["global_message"]."</span>";
	$adresse = "";
	if (ISSET($_REQUEST["adresse"]))
		$adresse = $_REQUEST["adresse"];
?>
	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-6">
			<div id="loginForm">
			<div id=titre>Connexion</div>
				<br />
				
				<form action="" method="post">
					<div class="form-group">
						<label for="adresse">Nom utilisateur:</label>
						<br /> 
						<input id="adresse" name="adresse" class="form-control" type="text" value="<?php echo $adresse?>" />
						<?php if (ISSET($_REQUEST["field_messages"]["adresse"])) 
								echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["adresse"]."</span>";
						?>
					</div>
					<div class="form-group">
						<label for="password">Mot de passe    :</label>
						<br /> 
						<input class="form-control" id="password" name="password" type="password"/>
						<?php if (ISSET($_REQUEST["field_messages"]["password"])) 
								echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["password"]."</span>";
						?>
					</div>

					<input name="action" value="loginAction" type="hidden" />
					
					<input value="Enter" type="submit" class="btn btn-light"></input>
				</form>
			</div>
		</div>
	</div>
</div>