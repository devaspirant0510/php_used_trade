<?php
$admin_code = $_POST['admin-code'];
$name = $_POST['name'];
$tell = $_POST['tell'];
$admin_id = $_POST['admin-id'];


require_once ("../config.php");
$conn = mysqli_connect(
    host,
    user,
    password,
    database
);
$sql = "insert into admin(admin_code,admin_id,name,tell) values";
$sql.= "('$admin_code',$admin_id,'$name','$tell')";
$result = mysqli_query($conn,$sql);
if ($result===false){
    $msg = "관리자 등록 오류입니다.";
    $path = rawurlencode($msg);
    header("Location:/phpUsedTrade/register/admin.php?msg=$path");
}else{
    header("Location:/phpUsedTrade/index.php");
}