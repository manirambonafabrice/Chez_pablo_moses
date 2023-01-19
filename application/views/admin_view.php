<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php
       include 'includes/header.php';
        ?>

    </head>
	<body  style=" background: #c9dbe9">
		<!-- HEADER -->
		<?php
		$lien1="";
		$lien2="";
		$lien3="";
		$lien4="";



		?>
		<?php
       include 'includes/my_header.php';
        ?>
		<!-- /HEADER -->
		<div class="container">
		<div class="row" style="margin-top: 20px">
			<?php if($message) echo $message ?>

            
		<div class="col-md-3">
            <?= $this->session->flashdata('messages') ?>
		</div>
		<!-- <i class="fa fa-exclamation-triangle" style="color: red;font-size: 35px"> INTERFACE EN COURS DE CONSTUCTION</i> -->
		<div class="col-md-6">
		<form action="<?= base_url('Login/do_login') ?>" method="POST">
                    <table class="table table-inverse">
                    	<tr class="bg-" style="background-color:#01B7EF;">
                            <td colspan="2">
                               
                                    <h3 style="color: 04274A;text-align: center;">Authentifacation</h3>
                                
                            </td>
                        </tr>
                        <tr class="bg-" style="background-color:#01B7EF;">
                            <td colspan="2">
                               
                                    <input type="text" id="USERNAME" name="USERNAME" placeholder="Nom d'utilisateur" class="form-control" required  autocomplete="off">
                                
                            </td>
                        </tr>
                        <tr class="bg-" style="background-color:#01B7EF">   
                            <td colspan="2">
                                
                                    <input type="password" id="PASSWORD" name="PASSWORD" placeholder="Mot de passe " class="form-control" required>
                              
                            </td>
                        </tr>    
                        <tr class="bg-" style="background-color:#01B7EF;border-radius:0px 0px 10px 10px"><td ><button type="submit" id="connexion" style="background-color:#01B7EF; color:04274A;border: 1px solid #01B7EF" class="btn btn  form-control">CONNEXION</button></td>
                        	<td><a href="<?= base_url();?>Abone/mot_de_passe_oublier"><button type="button" value="" style="background-color:#01B7EF; color:04274A;border: 1px solid #01B7EF" class="btn btn  form-control">Mot de passe oublié?</button></a></td>

                        </tr>
                        
                    </table>    
                </form>
            </div>
            <div class="col-md-3">
            </div>
		</div>
		</div>
        
        <!-- jQuery Plugins -->
    <?php
       include 'includes/pied.php';
        ?>
		<!-- FOOTER -->
		<?php
       include 'includes/footer.php';
        ?>
		<!-- /FOOTER -->


	</body>
</html>
