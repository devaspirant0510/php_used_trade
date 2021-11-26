<?php
require_once ("../config.php");
$conn = mysqli_connect(
    host,
    user,
    password,
    database
);

$seller_id = $_POST['member-id'];
$goods_name = $_POST['goods-name'];
$inventory = $_POST['inventory'];
$price = $_POST['price'];
$category = $_POST['category'];
$status = $_POST['status'];
$sql = "insert into goods (goods_name,inventory,price,status,category,seller_id) values";
$sql .= "('$goods_name',$inventory,$price,'$status','$category',$seller_id);";
$result = mysqli_query($conn, $sql);
if ($result === false) {
    $msg = "오류입니다. 다시시도해주세요";
    $path = rawurlencode($msg);
    echo mysqli_error($conn);
    header("Location:/phpUsedTrade/transaction/selling.php?msg=$path");
} else {
    header("Location:/phpUsedTrade/index.php");
}
mysqli_close($conn);
