<?php
    session_start();
    include("connection.php");

    //CREATE
    if(isset($_POST["add"]) )  {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
        $address = $_POST['address'];
		$job = $_POST['job'];

        $query = "INSERT INTO members (firstname, lastname, address, job) VALUES ('$firstname', '$lastname','$address', '$job')";
        $con-> query($query);
        $_SESSION['message'] = "Member successfully added!";
        header("location:index.php");


    }

   
    //UPDATE
    if(isset($_POST["update"])) {
        $id = $_POST["id"];
        $firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
        $address = $_POST['address'];
		$job = $_POST['job'];

        $sql = "UPDATE members SET firstname='$firstname', lastname='$lastname',address='$address', job='$job' WHERE id=$id";
        $con-> query($sql);
        $_SESSION['message'] = "Member details updated!"; 
        header("location:index.php");
    }


    //DELETE
    if(isset($_GET["action"]) and $_GET["action"] == "del"){
        $id=$_GET["id"];
        $sql = "DELETE FROM members WHERE id=$id";
        $con-> query($sql);
        $_SESSION['message'] = "Member deleted successfully!"; 
        header("location:index.php");

    }

?>