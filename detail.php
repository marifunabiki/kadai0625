<?php
//１．PHP
//select.phpの[PHPコードだけ！]をマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。

$id = $_GET["id"];

include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//２．データ登録SQL作成
$stmt   = $pdo->prepare("SELECT * FROM gs_bm_table WHERE BookID=:id"); //SQLをセット
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute(); //SQLを実行→エラーの場合falseを$statusに代入

//３．データ表示
$view=""; //HTML文字列作り、入れる変数
if($status==false) {
  //SQLエラーの場合
  sql_error($stmt);
}else{
  $row = $stmt->fetch();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
   <fieldset>
    <legend>ブック</legend>
    <table>
    <tr><td><label>書籍名：</td><td><input type="text" name="name" value="<?=$row["BookName"]?>"></label></td></tr>
    <tr><td> <label>書籍URL：</td><td><input type="text" name="url" value="<?=$row["BookURL"]?>"></label></td></tr>
    <tr><td><label>書籍コメント：</td><td><input type="text" name="comment" value="<?=$row["Cpmment"]?>"></label></td></tr>
    <!-- <tr><td></td><td class="text_center"> <input type="submit" value="送信"></td></tr> -->
    </table>
    </fieldset>
<!-- 
    <legend></legend>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$row["email"]?>"></label><br>
     <label>年齢：<input type="text" name="age" value="<?=$row["age"]?>"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"><?=$row["naiyou"]?></textArea></label><br> -->

     <!-- idを隠して送信 -->
     <input type="hidden" name="id" value="<?=$row["BookID"]?>">
     <!-- idを隠して送信 -->
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- <form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>名前：<input type="text" name="name" value="<?=$name?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$email?>"></label><br>
     <label>年齢：<input type="text" name="age" value="<?=$age?>"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"><?=$naiyou?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$id?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form> -->
<!-- Main[End] -->


</body>
</html>




