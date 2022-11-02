<?php
    session_start();
    if(!isset($_SESSION['role']))
   {
    header("location: index.html");
    exit();
   }   
   else
   {
   $user = $_SESSION['role'];
   switch($user){
    case "autor":
        header("location:Autor/index.html");
        exit();
    case "redaktor":
        header("location:Redaktor/index.html");
        exit();
    case "recenzent":
        header("location:Recenzet/index.html");
        exit();
    case "sefredaktor":
        header("location:Sefredaktor/index.html");
        exit();
    case "ctenar":
        header("location:Ctenar/index.html");
        exit();

   }
   exit();
    }
    ?>