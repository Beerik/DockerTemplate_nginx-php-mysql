<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1>container test</h1>
    
    <!-- check basic navigation -->
    <a href="./ciao.html" target="_self">cliccami</a>
    <!-- <a href="../app/phpinfo.php" target="_self">phpinfo</a> --> <!--this shouldnt be allowed -->
    
    <?php 
      # test if php is configured correctly
      // phpinfo();
      
      #if it does also try if database setup works
      include "../config/db_connection.php";

      $conn = OpenCon();

      $sql = "SELECT animali.name, animali.race
              FROM animali;";

      $output = [];
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
          $output[$row['name']][] = $row['race'];
      }

      foreach ($output as $name => $races) {
          echo "<h1>$name</h1>";
          foreach ($races as $races) {
              echo "<span>$races</span>";
          }
      }

      #check if element from app can be loaded
      include "../app/phpinfo.php"; 

    ?>

  </body>
</html>
