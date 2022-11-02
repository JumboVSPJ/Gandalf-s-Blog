<?php
require("connect.php");

$odeber=array(" ","*","/","|",'"\"',"'","");
$user_name = $heslo = $jmeno = $prijmeni = "";


//$user_name = mysqli_real_escape_string($spojeni,$_POST["user_name"]);\
//otrimovat user input
$user_name = ($_POST["user"]);
$user_name =str_replace($odeber,"",$user_name);
$heslo = ($_POST["password"]);
$jmeno = ($_POST["jmeno"]);
$prijmeni = ($_POST["prijmeni"]);

$sql = "INSERT INTO prihlas_db (user_name, heslo, jmeno, prijmeni, role)
values('$user_name','$heslo','$jmeno','$prijmeni','$_POST[role]')";

      

if (mysqli_query($spojeni, $sql)) {
    echo "REGISTRACE HOTOVSON PAVEL TO UPRAVÍ :)";
    header("Location: ../login.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($spojeni);
}
mysqli_close($spojeni);


function test_input($pole,$data) {
    $data=str_replace($pole,"",$data);
    return $data;
  }

?>
