<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$url = $_POST['url'];
$comment = $_POST['comment'];
$id    = $_POST["id"];   //idを取得

//2. DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数


//３．データ登録SQL作成
$sql = "UPDATE gs_bm_table SET BookName=:name, BookURL=:url, Cpmment=:comment WHERE BookID=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',  $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',$id,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php");
}
// //1. POSTデータ取得
// $name   = $_POST["name"];
// $email  = $_POST["email"];
// $naiyou = $_POST["naiyou"];
// $age    = $_POST["age"];   //今回追加してます
// $***    = $_POST["***"];   //idを取得

// //2. DB接続します
// include("funcs.php");  //funcs.phpを読み込む（関数群）
// $pdo = db_conn();      //DB接続関数


// //３．データ登録SQL作成
// $sql = "**************";
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':name',  $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':email', $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':age',   $age,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':naiyou',$naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':******',$*****,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
// $status = $stmt->execute(); //実行


// //４．データ登録処理後
// if($status==false){
//     sql_error($stmt);
// }else{
//     redirect("***********");
// }

?>