<!-- 역할: project_list.php 페이지 에서 delete 버튼 누르면 바로 지워지게 해주는 코드
form을 보여줄 필요가 없으므로 이 페이지 하나만 존재.
-->
<?php
require_once('../includes/connect.php');
$query = 'DELETE FROM projects WHERE projects.id = :projectId';
$stmt = $connection->prepare($query);
$projectId = $_GET['id'];
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();
$stmt = null;
header('Location: project_list.php');
?>