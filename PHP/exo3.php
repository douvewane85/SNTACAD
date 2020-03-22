<?php
     require_once('string.php');
     $cpt=0;
     $ok=false;
     $nbreParMot=[];
     if(isset($_POST['btn_valider'])){
        $ok=true;
        for ($i=1; $i <=$_POST['nbre'] ; $i++) { 
              if(bbw_is_alphabetique($_POST['nbre'.$i])){
                $nbreParMot[$i]=bbw_count_char_in_string('M',$_POST['nbre'.$i]);
                $cpt+= $nbreParMot[$i];
                
              }else{
                  $ok=false;
                 break;
              }
        }

     }
    
?>



<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <form class="form-inline m-5" method="post" action="">
      <div class="form-group">
          <label for="">Entrer le Nombre de Mot</label>
          <input type="text" name="nbre" id="" class="form-control ml-3" placeholder="" aria-describedby="helpId" value="<?php if(isset($_POST['nbre'])) echo $_POST['nbre']; ?>">
         <input name="" id="" class="btn btn-primary ml-3" type="submit" value="Valider">
      </div>
  </form>


 
 <form class="m-5" method="post" action="">

 <?php  if(isset($_POST['nbre'])) {

     for ($i=1; $i <=$_POST['nbre'] ; $i++) { 
     ?>
   <div class="form-group">
   <label for="">Mot Numero <?=$i?> </label>
   <input type="text" name="nbre<?=$i?>" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php if(isset($_POST['nbre'.$i])) echo $_POST['nbre'.$i]; ?>">
    <?php  
        if(isset($_POST['nbre'.$i]) && !bbw_is_alphabetique($_POST['nbre'.$i])){
    ?>
            <small id="helpId" class="text-danger">Le Mot <?=$_POST['nbre'.$i]?> n'est pas Alphabétique   </small>

    <?php 
            
        } 
    ?>
</div>


<?php 

}
?>
  <input type="hidden" name="nbre" id="" class="form-control ml-3" placeholder="" aria-describedby="helpId" value=" <?=$_POST['nbre']?> ">
<input name="btn_valider" id="" class="btn btn-primary float-right" type="submit" value="Valider">
<?php
 } ?>

 </form>

 <?php

        if(isset($_POST['nbre']) && $ok){
            echo '  <ul class="list-group " style="margin-top:50px;">';
                for ($i=1; $i <=$_POST['nbre'] ; $i++) { 
               ?>
                    <li class="list-group-item ">Le Mot <?=$_POST['nbre'.$i]?> contient <?=$nbreParMot[$i]?> M  </li>
                <?php
                }
        echo '<li class="list-group-item bg-warning">Total M est   '.  $cpt.'</li>';
        echo '</ul>';
    } 
 ?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

