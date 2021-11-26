<?php
$st_id = $_POST['st-id'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$account_num = $_POST['account-num'];
$tell = $_POST['tell'];
require_once ("../config.php");
$conn = mysqli_connect(
    host,
    user,
    password,
    database
);
// 입력칸에 하나라도 빈칸이 있으면 실패
if($name=="" || $address=="" || $email==""||$account_num==""||$tell==""){
    $msg = "회원가입 실패입니다";
    $path = rawurlencode($msg);
    header("Location:/phpUsedTrade/register/user.php?msg=$path");
    return;
}
// 테이블 전체 조회해서 row 값을 구함
$sql = "select st_id from member";
$result = mysqli_query($conn, $sql);
echo mysqli_num_rows($result);
// 유저 데이터베이스가 비어있으면 그냥 넣기 (비교할 필요없음)
if (mysqli_num_rows($result) == 0) {
    $sql = "insert into member (st_id,name ,address,email,account_number,tell) values";
    $sql .= "($st_id,'$name','$address','$email','$account_num','$tell');";
    $result = mysqli_query($conn, $sql);
    if ($result === false) {
        $msg = "회원가입 실패입니다";
        $path = rawurlencode($msg);
        header("Location:/phpUsedTrade/register/user.php?msg=$path");
    } else {
        header("Location:/phpUsedTrade/index.php");
    }
    return;
}

$sql = "select * from member where st_id=$st_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
// 아이디 중복 체크
if ($row) {
    $msg = "아이디 중복입니다.";
    $path = rawurlencode($msg);
    header("Location:/phpUsedTrade/register/user.php?msg=$path");

} else {
    $sql = "insert into member (st_id,name ,address,email,account_number,tell) values";
    $sql .= "($st_id,'$name','$address','$email','$account_num','$tell');";
    $result = mysqli_query($conn, $sql);
    echo mysqli_error($conn);
    echo "$sql";
    if ($result === false) {
        $msg = "회원가입 실패입니다";
        $path = rawurlencode($msg);
        header("Location:/phpUsedTrade/register/user.php?msg=$path");
    } else {
        header("Location:/phpUsedTrade/index.php");
    }

}
mysqli_close($conn);



