<?php
include 'connect.php'; // 데이터베이스 연결

// 페이지 로딩 시 프로젝트 목록을 불러옵니다.
$sql = "SELECT id, title FROM Projects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Media</title>
</head>
<body>

  <h1>Upload Media (Image or Video)</h1>

  <form action="upload_media.php" method="POST" enctype="multipart/form-data">
    <label for="media_file">Select media (Image or Video):</label>
    <input type="file" name="media_file" id="media_file" required>

    <label for="media_type">Select media type:</label>
    <select name="media_type" id="media_type" required>
      <option value="image">Image</option>
      <option value="video">Video</option>
    </select>

    <label for="project_id">Select Project:</label>
    <select name="project_id" id="project_id" required>
      <?php
      // 프로젝트 목록을 불러와서 옵션을 추가
      while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
      }
      ?>
    </select>

    <button type="submit" name="upload_media">Upload</button>
  </form>

</body>
</html>

<?php
$conn->close();
?>
