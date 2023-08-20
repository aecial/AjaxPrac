<?php
  include('./database.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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
      $(document).ready(function() {
        var commentsCount = 2;
        $("#btn").click(function() {
          commentsCount = commentsCount + 2;
          $("#comments").load("load-comments.php", {
            commentNewCount: commentsCount
          });
        });
      });
    </script>
  </head>
  <body>
    <div id="comments" class="w-25 h-50 bg-danger-subtle">
      <?php 
        $sql = "SELECT * FROM comments LIMIT 2";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo "<p>";
            echo $row["author"];
            echo "<br>"; 
            echo $row['message'];
            echo "</p>";
            
          }
        } else {
          echo "There are no comments!";
        }
      ?>
    </div>
    <button id="btn" class="btn btn-primary">Show more Comments!</button>
  </body>
</html>
