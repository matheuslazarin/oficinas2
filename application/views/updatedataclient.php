<!DOCTYPE html>
<html>
	<head>
		<?php
			$iconSource = base_url("images/icons/despachama_favicon.ico");
			echo "<link rel='shortcut icon' href='". $iconSource ."'>";
		?>
		<meta charset="UTF-8">
		<title>Registro - Despachama</title>
		<!--Import Google Icon Font-->
  		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Let browser know website is optimized for mobile-->
		<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	  	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/materialize.min.css" media="screen,projection">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/register.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<?php
			$this->load->view('navbarclient');
		?>

    	<form action="<?=base_url('UpdateDataClient/Update')?>"
			onsubmit="return validateDataClientForm()" class="boxLogin container col s12 row"
			method="post" id="updateForm">

			<div class="row">
				<h1 class="center-align indigo-text accent-4 titleLogin">ALTERAR DADOS CADASTRAIS</h1>
			</div>

			<!-- CPF block -->
            <div class="row valign-wrapper">
                <div class="input-field col s12">
                    <?php
                        $currentCPF = $this->session->userdata('userCPF');
                        echo "<input id='cpfUser' name='CPF' type='text' class='disabled' value='$currentCPF' readonly>
                        <label for='cpfUser'>CPF</label>"
                    ?>
                </div>
            </div>

			<!-- Name block -->
			<div class="row valign-wrapper">
                <div class="input-field col s12">
                    <?php
						$currentName = $this->session->userdata('userName');
                        echo "<input id='nameUser' name='NOME' type='text' class='validate' value='$currentName'>
                        <label for='nameUser'>Nome</label>"
                    ?>
                </div>
            </div>

			<!-- Register the user -->
            <div class="center-align row">
				<input type="submit" value="Alterar" class="indigo accent-4 waves-effect waves-light btn"/>
			</div>

    	</form>

		<?php
			$this->load->view('footer');
		?>

    	<script type="text/javascript">
      		function validateDataClientForm() {
				let cpfUser, passwordUser, nameUser, registerForm = document.getElementById("registerForm");
				cpfUser = registerForm.cpfUser.value;
				passwordUser = registerForm.passwordUser.value;
				nameUser = registerForm.nameUser.value;
        		if (cpfUser != "" && passwordUser != "" && nameUser !="") {
          			if (passwordUser.length < 6) {
            			Materialize.toast('Informe uma senha com no mínimo 6 caracteres', 3000, 'red black-text');
          			} else {
            			if (cpfUser.length < 14) {
              				Materialize.toast('Informe um CPF válido', 3000, 'red black-text');
              				return false;
            			}
            			return true;
          			}
        		} else {
          			if (cpfUser == "") {
						Materialize.toast('Informe o CPF', 3000, 'red black-text');
          			} else if (passwordUser == "") {
            			Materialize.toast('Informe a senha', 3000, 'red black-text');
          			} else if (nameUser == "") {
            			Materialize.toast('Informe o nome', 3000, 'red black-text');
          			}
    			}
        		return false;
      		}
    	</script>

		<!--Import jQuery before materialize.js-->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
	    <script src="<?php echo base_url();?>js/materialize.min.js"></script>
	    <script type="text/javascript">
	    	$(document).ready(function() {
	        	$('select').material_select();
	        	var $fieldCPF = $("#cpfUser");
	        	$fieldCPF.mask('000.000.000-00', {reverse: true});
	      	});
		</script>
	</body>
</html>
