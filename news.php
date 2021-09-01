<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ข่าวประชาสัมพันธ์</title>
    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

  </head>
  <body>
  
  <?php 
        if(isset($_REQUEST['student_id'])){
          include('session_student.php'); 

            include('student_navbarLogin.php'); 
        }
        else if(isset($_REQUEST['personal_id'])){
          include('session_personal.php'); 

            include('teacher_navbarLogin.php'); 
        }
        else{
            include('navbarNotLogin.php'); 
        }
    ?>


    <section class="container">

        <div class="filter-title">
          <h3 class="text-header">ข่าวประชาสัมพันธ์</h3>
          <div class="filter-switch">
            <i id="sw-list" class="fas fa-th-list filter-switcher"></i>
            <div class="filter-bar"></div>
            <i id="sw-card" class="fas fa-th filter-switcher filter-switcher-active"></i>
          </div>
        </div>

        <div class="filter-show-list" style="display: none;">
        <?php 
    $stmt = $pdo->query("select * from news ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
          <!-- items -->
          <?php 
        if(isset($_REQUEST['student_id'])){
        ?>
          <a href="newsDetail.php?news_id=<?php echo $row['news_id'] ; ?>&student_id=<?php echo $_REQUEST['student_id'] ; ?>" class="filter-show-list-items">
        <?php 
        }
        else if(isset($_REQUEST['personal_id'])){
          ?>
          <a href="newsDetail.php?news_id=<?php echo $row['news_id'] ; ?>&personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="filter-show-list-items">
        <?php 
        }
        else{
          ?>
          <a href="newsDetail.php?news_id=<?php echo $row['news_id'] ; ?>" class="filter-show-list-items">
        <?php 
        }
    ?>

            <div class="fsli-img">
              <img src="news/<?php echo $row['news_id'] ; ?>/<?php echo $row['pic_file'] ; ?>">
            </div>
            <div class="fsli-detail">
              <p class="fsli-header"><?php echo $row['title'] ; ?></p>
              <p class="fsli-date"><?php echo $row['create_up'] ; ?></p>
            </div>
          </a>
          <?php 
            }
    ?>
        </div>

        <div class="filter-show-card" >

        <?php 
    $stmt = $pdo->query("select * from news ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
          <!-- items -->

          <?php 
        if(isset($_REQUEST['student_id'])){
        ?>
          <a href="newsDetail.php?news_id=<?php echo $row['news_id'] ; ?>&student_id=<?php echo $_REQUEST['student_id'] ; ?>" class="filter-show-card-items">

        <?php 
        }
        else if(isset($_REQUEST['personal_id'])){
          ?>
          <a href="newsDetail.php?news_id=<?php echo $row['news_id'] ; ?>&personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="filter-show-card-items">
        <?php 
        }
        else{
          ?>
          <a href="newsDetail.php?news_id=<?php echo $row['news_id'] ; ?>" class="filter-show-card-items">
        <?php 
        }
    ?>
            <div class="fsci-img">
              <img src="news/<?php echo $row['news_id'] ; ?>/<?php echo $row['pic_file'] ; ?>">
            </div>
            <div class="fsci-detail">
              <p class="fsci-header"><?php echo $row['title'] ; ?></p>
              <p class="fsci-date"><?php echo $row['create_up'] ; ?></p>
            </div>
          </a>
          <?php 
            }
    ?>
        
        </div>


    </section>


  <?php include('footer.php'); ?>

  </body>
</html>
