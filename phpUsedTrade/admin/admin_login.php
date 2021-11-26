<h4>
    <?php
    if($_GET){
        echo $_GET['msg'];
    }
    ?>
</h4>
<h1>관리자 로그인</h1>
<form method="post" action="index.php">
    <input name="admin-code" type="text">
    <button type="submit">
        관리자 로그인
    </button>
</form>
