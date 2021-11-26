<?php
$user_id = $_GET['user'];
require_once("../config.php");
$conn = mysqli_connect(
    host,
    user,
    password,
    database
);
$sql = "select account_number from member where st_id=$user_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo "<h1>계좌 : " . $row['account_number'] . "</h1>";

?>
<ul>
    <li>
        물품가격을 입력해주세요
    </li>
    <li>
        입금액은 모두 판매자에게 전달됩니다.
    </li>
    <li>
        취소 및 문의사항 : 관리자 전화번호 0107498723
    </li>
</ul>
<a href="../index.php">
    <button>
        뒤로가기
    </button>
</a>
