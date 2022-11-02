<?php 
require "connect.php";


if(isset($_POST["user"]))
{
	//$uzivatel = mysqli_real_escape_string($spojeni,$_POST["user"]) ;
    //$heslo = mysqli_real_escape_string($spojeni,$_POST["password"]);
    $uzivatel=$_POST["user"];
    $heslo=$_POST["passwd"];
    $sql = "SELECT * FROM prihlas_db WHERE user_name='$uzivatel' AND heslo='$heslo'";
	$result = mysqli_query($spojeni, $sql);

    if (mysqli_num_rows($result) >0) {    
	    $zaznam = mysqli_fetch_assoc($result);    

        if($zaznam["user_name"] === $uzivatel && $zaznam["heslo"] === $heslo)
        {
            session_start(); 
            $_SESSION["jmeno"] = $zaznam["jmeno"];
            $_SESSION["prijmeni"] = $zaznam["prijmeni"];
            $_SESSION["usrn"] = $zaznam["user_name"];
            $_SESSION["heslo"] = $zaznam["heslo"];
            $_SESSION["role"] = $zaznam["role"];
            header("Location: smerovani.php");
		    exit();
        }
        else
        {
            header("Location: index.html?error=Chybný login nebo heslo");
            exit();                    
        
        }
    }
    else
    {
        header("Location: index.html?error=Neplatné údaje");
        exit(); 
    }
}
?>