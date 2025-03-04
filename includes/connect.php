<!-- opperation가서 collation 바꾸기 -->
<!-- 도메인에서 정해준 데이터베이스이름, 유저이름, 패스워드(아마 없을수도) 로 바꿔야함함 -->
<?php
$dsn = "mysql:host=localhost;dbname=afgmsu91_portfolio;charset=utf8";

try {
$connection = new PDO($dsn, 'afgmsu91', '');
} catch (Exception $e) {
    error_log($e->getMessage());
    exit('unable to connect');
}


?>