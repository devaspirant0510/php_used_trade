<?php
require_once("../config.php");
$conn = mysqli_connect(
    host,
    user,
    password,
    database
);
// t3 판매자
// t4 구매자
$sql = "select t1.order_id,t1.order_quantity,t1.order_date,t2.goods_id,t2.goods_name,t2.price,t4.name as seller_name,t4.tell as seller_tell,t3.name as buyer_name,t3.tell as buyer_tell,t4.account_number as seller_account_number,t3.account_number as buyer_account_number from `order` t1 left join goods t2 on t1.goods_id=t2.goods_id left join member t3 on t1.member_id = t3.st_id left join member t4 on t2.seller_id = t4.st_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0){?>
<h1> 거래목록</h1>
<table border="1">
    <tr>
        <th>주문번호</th>
        <th>주문수량</th>
        <th>주문날짜</th>
        <th>물품번호</th>
        <th>물품명</th>
        <th>가격</th>
        <th>판매자이름</th>
        <th>판매자전화번호</th>
        <th>구매자이름</th>
        <th>구매자전화번호</th>
        <th>판매자회원계좌</th>
        <th>구매자회원계좌</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td>
                <?= $row['order_id'] ?>
            </td>
            <td>
                <?= $row['order_quantity'] ?>
            </td>
            <td>
                <?= $row['order_date'] ?>
            </td>
            <td>
                <?= $row['goods_id'] ?>
            </td>
            <td>
                <?= $row['goods_name'] ?>
            </td>
            <td>
                <?= $row['price'] ?>
            </td>
            <td>
                <?= $row['seller_name'] ?>
            </td>
            <td>
                <?= $row['seller_tell'] ?>
            </td>
            <td>
                <?= $row['buyer_name'] ?>
            </td>
            <td>
                <?= $row['buyer_tell'] ?>
            </td>
            <td>
                <?= $row['seller_account_number'] ?>
            </td>
            <td>
                <?= $row['buyer_account_number'] ?>
            </td>
        </tr>
        <?php
    }
    }
    ?>
</table>
<a href="../index.php">
    <button>
        돌아가기
    </button>
</a>