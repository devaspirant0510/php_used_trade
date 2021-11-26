<?php
if($_POST){
    require_once ("../config.php");
    $conn = mysqli_connect(
        host,
        user,
        password,
        database,
    );
    $admin_code = $_POST['admin-code'];
    $sql = "select * from admin where admin_code='$admin_code';";
    $result = mysqli_query($conn,$sql);
    if($result===false){
        $msg ="로그인 실패입니다.";
        $path = rawurlencode($msg);
        header("Location:/phpUsedTrade/admin/admin_login.php?msg=$path");
    }else{
        $row = mysqli_fetch_array($result);
        if($row['admin_code']){
            echo "<a href='transaction_list.php'><button>거래목록</button></a>";
            echo "<br>";
            echo "<a href='member.php'><button>회원목록</button></a>";
        }else{
            $msg ="로그인 실패입니다.";
            $path = rawurlencode($msg);
            header("Location:/phpUsedTrade/admin/admin_login.php?msg=$path");
        }
    }
    mysqli_close($conn);
}
else{
    echo "로그인을 해주세요";
    echo "<button><a href='admin_login.php'>로그인하러가기</a></button>";
}
