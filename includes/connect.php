<?php
$dsn = "mysql:host=localhost;dbname=newportfolio;charset=utf8mb4";

try {
$connection = new PDO($dsn, 'root', '');
} catch (Exception $e) {
    error_log($e->getMessage());
    exit('unable to connect');
}
// $host = 'localhost';  // WAMP의 기본 호스트
// $username = 'root';   // WAMP 기본 사용자
// $password = '';       // 기본 비밀번호는 빈 문자열
// $dbname = 'newportfolio'; // 데이터베이스 이름

// $conn = new mysqli($host, $username, $password, $dbname);

// 연결 확인
// if ($conn->connect_error) {
//  die("데이터베이스 연결 실패: " . $conn->connect_error);
// }

//$conn->set_charset("utf8"); // UTF-8 설정
?>
