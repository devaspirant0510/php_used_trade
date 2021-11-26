<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h4>
    <?php
    if (isset($_GET['msg'])) {
        echo $_GET['msg'];
    } ?>
</h4>
<h1>물품주문</h1>
<form method="get">
    품목별로 검색 :
    <?php
    if (isset($_GET['query'])) {
        $query_data = $_GET['query'];
        ?>
        <select name="query">
            <!-- 기본적으로 첫번째 아이템이 기본값 !-->
            <option value="all">
                전체
            </option>
            <!-- 쿼리 데이터에 따라 디폴트 selected 아이템 설정 !-->
            <option value="book" <?= $query_data !== "book" ?: "selected" ?> >책</option>
            <option value="cd" <?= $query_data !== "cd" ?: "selected" ?>>cd</option>
            <option value="dvd" <?= $query_data !== "dvd" ?: "selected" ?>>dvd</option>
            <option value="핸드폰" <?= $query_data !== "핸드폰" ?: "selected" ?>>핸드폰</option>
            <option value="모자" <?= $query_data !== "모자" ?: "selected" ?>>모자</option>
        </select>
        <?php
    } else {
        ?>
        <select name="query">
            <!-- 기본적으로 첫번째 아이템이 기본값 !-->
            <option value="all">
                전체
            </option>
            <!-- 쿼리 데이터에 따라 디폴트 selected 아이템 설정 !-->
            <option value="book">책</option>
            <option value="cd">cd</option>
            <option value="dvd">dvd</option>
            <option value="핸드폰">핸드폰</option>
            <option value="모자">모자</option>
        </select>
        <?php
    }
    ?>
    <button type="submit">
        검색
    </button>

</form>
<?php
require_once("../config.php");
$conn = mysqli_connect(
    host,
    user,
    password,
    database,
);
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    // 쿼리할때 상품의 개수가 0개 이상일경우 보여줌
    // all 일경우 전체 보여주고 나머지는 해당키워드만 보여줌
    if ($query == "all") {
        $sql = "select * from goods where inventory>0";
    } else {
        $sql = "select * from goods where category='$query' and inventory>0";
    }
    $result = mysqli_query($conn, $sql);
} // 기본적으로 전체 다 보여줌`
else {
    $sql = "select * from goods where inventory>0";
    $result = mysqli_query($conn, $sql);
}
?>
<table border="1">
    <tr>
        <th>물품번호</th>
        <th>물품명</th>
        <th>재고</th>
        <th>가격</th>
        <th>상태</th>
        <th>카테고리</th>
    </tr>
    <?php

    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?= $row['goods_id'] ?></td>
            <td><?= $row['goods_name'] ?></td>
            <td><?= $row['inventory'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['category'] ?></td>
        </tr>
        <?php
    }
    ?>


</table>
<form method="post" action="order_form.php">
    <div>
        <span>주문량: </span>
        <input name="order-quantity" type="text">
    </div>
    <div>
        <span>전화번호: </span>
        <input name="tell" type="tel">
    </div>
    <div>
        <span>주문날짜: </span>
        <input name="order-date" type="date">
    </div>
    <div>
        <span>물품번호: </span>
        <input name="goods-id" type="number">
    </div>
    <div>
        <span>회원번호: </span>
        <input name="member-id" type="number">
    </div>
    <div>
        <button type="submit">
            주문
        </button>
    </div>
</form>
<a href="../index.php">
    <button>
        back
</button>
</a>
</body>
</html>
