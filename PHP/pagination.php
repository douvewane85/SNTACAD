<?php

//CONCEPTS
   //1)VARIABLES
   //2)CONSTANTES
   //3)TABLEAUX
   //4)$_GET:permet de recuperer les variables passer par URL ou par lien
      //a)Definition
            /*
                   <a href="index.php?nomvar1=valeur1">NomLien</a>
                   <a href="index.php?nomvar1=valeur1&nomvar2=valeur2">NomLien</a>

            */
      //b)Recuperation
      /*
        $_GET['nomvar1']=>valeur1
        $_GET['nomvar2']=>valeur2
      */

   //Faire la pagination d'un tableau d'entiers par page de 2   

   $tab=[12,34,45,46,78,11,100,334,2,0,12];
    /*
        NbreValeurParPage:constante egal à 2
        totalValeur: taille du tableau => count( $tab)
        nbrePage:ceil(totalValeur/NbreValeurParPage)
        indiceDepart:Position de Départ pour chaque Page
        indiceFin:Position de Fin pour chaque Page
        Exemple:
        Page 1   indiceDepart=0 et indiceFin=1
        Page 2   indiceDepart=2 et indiceFin=3

     */

     define("NBREVALEURPARPAGE",2);
     $totalValeur=count($tab);
     $nbrePage=ceil($totalValeur/NBREVALEURPARPAGE);
  




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  

  <?php
//Clique d'un numero de page
  if(isset($_GET['page'])){
      $pageActuelle=$_GET['page'];
      if($pageActuelle> $nbrePage){
        $pageActuelle=$nbrePage;
      }

  }else{
       $pageActuelle=1;

  }
  $indiceDepart=($pageActuelle-1)*NBREVALEURPARPAGE;
  $indiceDeFin=$indiceDepart+NBREVALEURPARPAGE-1;

  for ($i=$indiceDepart; $i <= $indiceDeFin ; $i++) { 
               echo $tab[$i]."  ";
  }

  //Affiche les pages
  for ($page=1; $page <=$nbrePage ; $page++) { 
     echo ' <a href="pagination.php?page='.$page.'">['.$page.']</a>';
  }
  ?>
</body>
</html>