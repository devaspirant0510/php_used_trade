<h1>회원가입</h1>
<div>
    <span>
        <?php
        if ($_GET) {
            $msg = $_GET['msg'];
            echo "<h3>$msg</h3>";
        }
        ?>
    </span>
</div>
<form method="post" action="user_form.php">
    <div>
        <span>학번: </span>
        <input name="st-id" type="text">
    </div>
    <div>
        <span>이름: </span>
        <input name="name" type="text">
    </div>
    <div>
        <span>주소: </span>
        <input name="address" type="text">
    </div>
    <div>
        <span>이메일:</span>
        <input name="email" type="email">
    </div>
    <div>
        <span>계좌번호: </span>
        <input name="account-num" type="text">
    </div>
    <div>
        <span>전화번호: </span>
        <input name="tell" type="text">
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
