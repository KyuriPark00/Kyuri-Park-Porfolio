<!-- 로그인 요청을 처리 -->

<?php
session_start();
require_once('../includes/connect.php');

$query = 'SELECT * FROM users WHERE username = ? AND password = ?';
$stmt = $connection->prepare($query);
$stmt->bindParam(1, $_POST['username'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['password'], PDO::PARAM_STR);
$stmt->execute();

if($stmt->rowCount() == 1){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['username'] = $row['username'];

    // 문자열로 감싸야 함
    header('Location: project_list.php');
    exit(); // 추가: header() 이후에는 exit() 호출 권장
}else{
    header('Location: login_form.php');
    exit();
}

$stmt = null;
?>
