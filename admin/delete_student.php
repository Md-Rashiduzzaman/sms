<?php 
	require 'dbcon.php';
	$id = base64_decode($_GET['id']);   //id receive hosse all-student.php theke
//GET page er url er variable dhorte use kora hoi r ai function er karon ja te delete er jonne j id ta dhora hosse ta jeno decode kore; 
//all student.php page a base64_encode er dara student id ti encode kora hoise jate j keu delete a hover korle id number ta dekhte na pai
// r jokhon delete a click korbe tokhon delete.php page a base64_decode er dara id ta again numerically dekha jabe ai delete ta sudhu admin er kace decode hobe ba user er kace

	mysqli_query($link, "DELETE FROM `student_info` WHERE `id` = '$id'");
	header("location: index.php?page=all-students");
?>