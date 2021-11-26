<h1>
    회원
</h1>
<?php
require_once("../config.php");
$conn = mysqli_connect(
    host,
    user,
    password,
    database
);
?>
<table border="1">
    <tr>
        <th>학번</th>
        <th>이름</th>
        <th>주소</th>
        <th>이메일</th>
        <th>계좌</th>
        <th>전화번호</th>
    </tr>
    <?php
    $sql = "select * from member";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?= $row['st_id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['account_number'] ?></td>
            <td><?= $row['tell'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
<a href="../index.php">
    <button>
        back
    </button>
</a>
