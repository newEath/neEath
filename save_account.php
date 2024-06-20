<?php
// フォームから送信されたデータを受け取る
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームから送信されたデータの取得
    $user_name = $_POST['user_name'];
    $user_mail = $_POST['user_mail']; // 正しい変数名に修正
    $password = $_POST['password'];
    
    // データベースに接続するための設定
    $servername = "localhost"; // MySQLサーバーのアドレス
    $username = "root"; // データベースにアクセスするユーザー名
    $password_db = "Eath@3923"; // データベースにアクセスするパスワード
    $dbname = "emp"; // 使用するデータベース名
    
    // データベースに接続
    $conn = new mysqli($servername, $username, $password_db, $dbname);
    
    // 接続をチェック
    if ($conn->connect_error) {
        die("データベース接続エラー: " . $conn->connect_error);
    }
    
    // INSERT文を作成
     $sql = "INSERT INTO users (name, mail, password) VALUES ('$user_name', '$user_mail', '$password')";
    
    // クエリを実行して結果をチェック
    if ($conn->query($sql) === TRUE) {
        echo "登録が完了しました";
    } else {
        echo "エラー: " . $sql . "<br>" . $conn->error;
    }
    
    // データベース接続を閉じる
    $conn->close();
}
?>