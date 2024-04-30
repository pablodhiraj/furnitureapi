<?php
include 'config.php';

if (!isset($_FILES['image']['tmp_name'])) {
    echo "";
} else {
    $file = $_FILES['image']['tmp_name'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);

    move_uploaded_file($_FILES["image"]["tmp_name"], "products/" . time() . $_FILES["image"]["name"]);
    $name = addslashes($_POST['product']);
    $location = "products/" . time() . $_FILES["image"]["name"];
    $category = $_POST['category'];
    $discount = $_POST['discount'];
    $price = $_POST['price'];
    $description = addslashes($_POST['description']);
    $userid = $_POST['userid'];
    $storename = addslashes($_POST['store']);
    $soldout = "1";
    if (mysqli_query($conn, "INSERT INTO products (name,location,category,discount,price,description,userid,storename,soldout) VALUES ('$name','$location','$category','$discount','$price','$description','$userid','$storename','$soldout')")) {
        header("location: userproducts.php?alert=inserted");
    } else {
        header("location: userproducts.php?alert=not_inserted");
        exit();
    }

}
?>