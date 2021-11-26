<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h4>
    <?php
    if($_GET){
        echo $_GET['msg'];
    }?>
</h4>
<h1>물품등록</h1>

<form method="post" action="selling_form.php">
    <div>
        <span>회원번호: </span>
        <input name="member-id" type="number">
    </div>
    <div>
        <span>물품평: </span>
        <input name="goods-name" type="text">
    </div>
    <div>
        <span>수량: </span>
        <input name="inventory" type="number">
    </div>
    <div>
        <span>가격: </span>
        <input name="price"  type="number">
        원(￦)
    </div>
    <div>
        <span>카테고리: </span>
        <select name="category">
            <option value="책">
                책
            </option>
            <option value="cd">
                cd
            </option>
            <option value="dvd">
                dvd
            </option>
            <option value="모자">
                모자
            </option>
            <option value="핸드폰">
                핸드폰
            </option>
        </select>
    </div>
    <div>
        <span>상태: </span>
        <select name="status">
            <option value="상">
                상
            </option>
            <option value="중">
                중
            </option>
            <option value="하">
                하
            </option>
        </select>
    </div>
    <div>
        <span>판매날짜 </span>
        <input name="sell-date" type="date">
    </div>
    <div>
        <button type="submit">
            Enter
        </button>
    </div>
</form>
<a href="../index.php">
    <button >
        back
</button>
</a>
</body>
</html>
