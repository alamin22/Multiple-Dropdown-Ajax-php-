<?php

try {
$sourch="mysql:dbname=address;dbhost=localhost";
$user="root";
$password="";
$DB=new pdo($sourch,$user,$password);

} catch (PDOException $e) {
	echo"failed<br>".$e->getMessage();
}

?>