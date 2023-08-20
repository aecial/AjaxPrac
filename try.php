<?php
  include('./database.php');
?>
<?php 
  if(isset($_POST['submit'])) {
    $author = $_POST['name'];
    $message = $_POST['message'] ;

    $insertSql = "INSERT INTO comments (author, message) VALUES ('$author', '$message');";
    $resultInsert = mysqli_query($conn, $insertSql);
}
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY</title>
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.7.0.min.js"
      integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
      crossorigin="anonymous"
    ></script>
    <script>
      function loadSite() {
        $("#users").load("load-users.php")
      }
      $(document).ready(function(){
        setInterval(function() {
          loadSite()
        }, 60) 
      })
    </script>
</head>
<body>
  <div class="bg-secondary mb-5">
    <form action="try.php" method="post">
      <label for="name" class="form-label">Enter Name: </label>
      <input class="form-control w-25 mb-2" type="text" name="name" id="name" required>
      <label for="name" class="form-label">Enter message: </label>
      <input class="form-control w-25 mb-2" type="text" name="message" id="message" required>
      <button class="btn btn-success" id="btn" type="submit" name="submit">Submit</button>
    </form>
  </div>
  <div id="users" class="w-50 bg-success-subtle">
    <?php
      $sql = "SELECT * from comments ORDER BY id DESC";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<p>";
          echo $row['author'];
          echo "<br>";
          echo $row['message'];
          echo "<p>";
        }
      }
    ?>
  </div>
</body>
</html>
