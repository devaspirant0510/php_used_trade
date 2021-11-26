<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>관리자 등록</h1>
<div>
    <?php
    if ($_GET) {
        echo "<h5>" . $_GET['msg'] . "</h5>";
    }
    ?>
</div>
<form method="post" action="admin_form.php">
    <div>
        <span>관리자 코드: </span>
        <input name="admin-code" type="text">
    </div>
    <div>
        <span>이름: </span>
        <input name="name" type="text">
    </div>
    <div>
        <span>전화번호: </span>
        <input name="tell" type="text">
    </div>
    <div>
        <span>관리자 ID: </span>
        <input name="admin-id" type="text">
    </div>
    <div>
        <button type="submit">
            Enter
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

