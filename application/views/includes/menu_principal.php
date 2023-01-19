 <?php 
 // echo $_SERVER['REMOTE_ADDR'];
  
 ?>

<!-- MODAL -->
<div class='modal fade' id='so' tabindex="-1">
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          
          <h3 class="modal-title">Authentification</h3>
          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
        </div>

        <div class="modal-body" id="dialog1" title="Authentification"   style="background-image: linear-gradient(0deg, rgba(255, 255, 255, .05), rgba(150, 150, 150, .05)), linear-gradient(90deg, rgba(255, 255, 255, .05), rgba(150, 150, 150, .05));
  height:100%;
  background-size:10px 10px;}">
          <span id="msg"></span>
          <!-- <h1 style="color: #266C67;"></h1> -->
          <!-- <div id=""  title="Authentification" style="display: none;"> -->
          <form action="<?= base_url('Login/do_login') ?>" method="POST">
                    <table class="table table-inverse">
                        <tr class="bg-" style="background-color:#266C67;">
                            <td>
                                <div class="input-group">
                                    <!-- <span class="input-group-addon"><i class="fas fa-user "></i></span> -->
                                    <input type="text" id="USERNAME" name="USERNAME" placeholder="Nom d'utilisateur" class="form-control" required  autocomplete="off">
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-" style="background-color:#266C67">   
                            <td>
                                <div class="input-group">
                                    <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->  
                                    <input type="password" id="PASSWORD" name="PASSWORD" placeholder="Mot de passe " class="form-control" required>
                                </div>
                            </td>
                        </tr>    
                        <tr class="bg-" style="background-color:#266C67;border-radius:0px 0px 10px 10px"><td ><button type="button" id="connexion" style="background-color:#266C67; color:white;border: 1px solid #D4F813" class="btn btn  form-control">CONNEXION</button></td></tr>
                        <tr class="bg-" style="background-color:#266C67;border-radius:0px 0px 10px 10px"><td ><a href="<?= base_url();?>Back_end1/mot_de_passe_oublier"><button type="button" value="" style="background-color:#266C67; color:white;border: 1px solid #D4F813" class="btn btn  form-control">MOT DE PASSE OUBLIE?</button></a></td></tr>
                    </table>    
                </form>
        <!-- </div> -->

      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

<div  id="bar_menu" class="row" style="padding-right:0;">
   <div class="col-4" style="background: ">
       <a href="<?= base_url();?>"><span style="font-size: 20px;margin-left: 10px;color:#EBF0EF ">CHUK</span></a>
   </div>
   <div class="col-8" style="background:;"><span class="adresse">Boulevard du 28 Novembre Kamenge, BP 2210 Bujumbura Burundi</span>
    
    <!-- <div class="" style="float: right;">  -->
      <!-- <span   class=" btn dropdown-toggle" data-toggle="dropdown"  > ici</span> -->
       <i class="fas fa-sign-in-alt  dropdown-toggle" data-toggle="dropdown"   style="float: right;color: #D4F813"></i>
    <ul class="dropdown-menu" id="dropdown-menu">
  <?php if($this->session->userdata('USERNAME')==NULL){ ?>       
 <li class="dropdown-item" id='' data-toggle="modal" data-target="#so" onmouseover="this.style.background='white';"> 
  <a  style="color:#266C67;margin-right:" > <i class="fas fa-sign-in-alt " ></i> Log-in</a>
</li>
  <?php } else{ ?>       
  
<a href="<?= base_url();?>Login/do_logout" ><li class="dropdown-item" style="color:red" onmouseover="this.style.background='white';">
  Log-out <i class="fas fa-sign-out-alt " ></i>
  </li></a>
  <a href="<?= base_url();?>Back_end" ><li class="dropdown-item" style="color:#266C67" onmouseover="this.style.background='white';">
  <i class="fas fa-sign-in-alt "></i> Back-end
  </li></a>
  <?php } ?>  
</ul>
   </div>
 <!-- </div> -->

</div>
<div class="container back" style="">
   <!-- <img src="<?= base_url();?>uploads/CHUK1.jpg" style="width:100%;height: 65vh;"/ >  -->
<center>
    <span style="color:#EBF0EF; font-size: 20px">CENTRE HOSPITALO-UNIVERSITAIRE DE KAMENGE ROI KHALED</span>
    
</center>
  </div>
 <div class="container " style="z-index: 1000 !important ;"> 

   <nav class="navbar navbar-expand-md navbar-dark  row " style="color: #EBF0EF;background: linear-gradient(180deg, #EBF0EF,#266C67 40%, #266C67  ); ">
    <button class="navbar-toggler " data-toggle="collapse" data-target="#collapse_target">
      <span class="navbar-toggler-icon" style="font-size: 14px"></span>
    </button>
    <div class="collapse navbar-collapse row" id="collapse_target" style="color: #EBF0EF;background: linear-gradient(180deg, #EBF0EF,#266C67 40%, #266C67  ); " >
    <ul class="nav navbar-nav container " style="color: #EBF0EF;background:#; ">
      <li class=" nav-item <?php echo $lien1 ?>" id="menu" style="min-width: auto"><a class="nav-link" href="<?= base_url('Service');?>" style="color:#EBF0EF;">Départements médicaux</a></li>
      <li class=" nav-item <?php echo $lien2 ?>"" id="menu" style="min-width: 13%"><a class="nav-link" href="<?= base_url('activites');?>" style="color:#EBF0EF;">Activités</a></li>
      
       <li class=" nav-item <?php echo $lien4 ?>"" id="menu" style="min-width: 13%"><a class="nav-link" href="<?= base_url('Actualite/read');?>" style="color:#EBF0EF;">Actualités</a></li>
       <li class="nav-item <?php echo $lien5 ?>"" id="menu" style="min-width: 17%"><a class="nav-link" href="<?= base_url('Emploi');?>" style="color:#EBF0EF;">Opportunités</a></li>
        <li class="nav-item <?php echo $lien3 ?>"" id="menu" style="min-width: 17%"><a class="nav-link" href="<?= base_url('Administration');?>" style="color:#EBF0EF;">Administration</a></li>
       <li class=" nav-item <?php echo $lien6 ?> no-padding" id="menu" style="min-width:auto"><a class="nav-link" href="<?= base_url('Universite');?>" style="color:#EBF0EF; ">Faculté de médecine</a></li>
      
    </ul>
    </div>
  </nav>  
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
     $('#USERNAME').focus();
   
     $(document).on('click','#connexion',function(){
// alert();
 // $("#dialog").dialog({modal: true, height: 290, width: 700 });
var username=$('#USERNAME').val();
var pwd=$('#PASSWORD').val();
if (username) {
if (pwd) {
 $.ajax({
              url:"<?php echo base_url()?>index.php/Login/do_login",
              method:"POST",
              async:false,
              data: {username:username,pwd:pwd},
                                
                                         
              success: function(data)
                            { 
                              if(data=="yes"){
                                alert("Merci de bien vous authentifier!");
                                location.reload();
                              }else{
                              $("#msg").html(data);
                              }
                             
                          }
                        });
 }else{
  alert("Vueillez repmlir votre mot de passe");
  $('#PASSWORD').focus();
}
}else{
  alert("Vueillez repmlir votre nom d'utilisateur");
  $('#USERNAME').focus();
}


     });
     });
  </script>
 