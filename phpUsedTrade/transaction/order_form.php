<?php
$order_quantity = $_POST['order-quantity'];
$tell = $_POST['tell'];
$order_date = $_POST['order-date'];
$goods_id = $_POST['goods-id'];
$member_id = $_POST['member-id'];

require_once ('../config.php');
$conn = mysqli_connect(
    host,
    user,
    password,
    database
);
$sql = "select inventory from goods where goods_id=$goods_id";
$result = mysqli_query($conn,$sql);
if($result===false){
    $msg = "입력폼의 칸을 모두 채워주세요";
    $path = rawurlencode($msg);
    header("Location:/phpUsedTrade/transaction/order.php?msg=$path");
    return;
}
$row = mysqli_fetch_array($result);
if($row['inventory']-$order_quantity<0){
    $msg = "등록된 상품의 개수보다 많이 구매하실수 없습니다.";
    $path = rawurlencode($msg);
    header("Location:/phpUsedTrade/transaction/order.php?msg=$path");
}
else{
    // 물품에 데이터 추가
    $sql = "insert into `order` (order_quantity,tell,order_date,member_id,goods_id)";
    $sql.="values($order_quantity,'$tell','$order_date',$member_id,$goods_id);";
    $result = mysqli_query($conn,$sql);

    if($result===false){
        $msg = "오류입니다. 다시시도해주세요";
        $path = rawurlencode($msg);
        header("Location:/phpUsedTrade/transaction/order.php?msg=$path");
    }
    else{
        $sql = "insert into selling(member_id,goods_id) values";
        $sql.="($member_id,$goods_id)";
        $result = mysqli_query($conn,$sql);
        $cnt = intval($row['inventory'])-intval($order_quantity);
        // goods 테이블의 개수 - 구매한 항목의 개수 의 결과를 goods 테이블에 업데이트
        $sql = "update goods set inventory=".$cnt." where goods_id=$goods_id";
        $result = mysqli_query($conn,$sql);
        if($result===false){
            $msg = "오류입니다. 다시시도해주세요";
            $path = rawurlencode($msg);
            header("Location:/phpUsedTrade/transaction/order.php?msg=$path");
        }else{
            // 결제화면으로 이동하기위해 쿼리
            $sql = "select seller_id from goods where goods_id=$goods_id";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            header("Location:/phpUsedTrade/transaction/deposit.php?user=".$row['seller_id']);
        }
    }
    mysqli_close($conn);

}
