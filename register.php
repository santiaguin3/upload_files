<?php


    include("database.php");
    $idNumber = $_POST['ide'];
    //Get file name
    $file_name = $_FILES['photo']['name'];
    //Get file type
    $file_type = $_FILES['photo']['type'];
    //Get file size (Default: KB)
    $file_size = $_FILES['photo']['size']/1024;
    //Get temp folder file
    $file_tmp = $_FILES['photo']['tmp_name'];

    //echo $idNumber."<br>".$file_name."<br>".$file_type."<br>"..$file_size."<br>.$file_tmp";
    move_uploaded_file($_FILES['photo']['tmp_name'],"photos/".$_FILES['photo']['name']);
    $photo_url_db = "photos/".$_FILES['photo']['name'];
    //Query
    $sql="INSERT INTO users(id_number,photo) VALUES ($idNumber,'$photo_url_db')";
    //Execute query
    $conn->query($sql);
    echo "<script language='javascript'>alert('::: User has been registered :::')</script>";
    header("Refresh:0:url=index.html");
?>
