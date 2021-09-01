<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ข่าวประชาสัมพันธ์</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

    <div id="fb-root"></div>

    <div id="fb-root"></div>

    <!-- SDK facebook button share -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v10.0" nonce="O91MSeqC"></script>

  </head>
  <body>
  
  <?php 
        if(isset($_REQUEST['student_id'])){
            include('student_navbarLogin.php'); 
        }
        else if(isset($_REQUEST['personal_id'])){
            include('teacher_navbarLogin.php'); 
        }
        else{
            include('navbarNotLogin.php'); 
        }
    ?>
  <?php 
    $stmt = $pdo->query("select * from news where news_id = ".$_REQUEST['news_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>

    <section class="container">
      <div class="newsDetail">
        <h1 class="newsDetail-title"><?php echo $row['title'] ; ?></h1>
        <div class="newsDetail-cover">
          <img src="news/<?php echo $row['news_id'] ; ?>/<?php echo $row['pic_file'] ; ?>">
        </div>
        <div class="newsDetail-read">
        <?php echo $row['comment'] ; ?>
        </div>
        <div class="btn-news-control">
        <?php 
        if(isset($_REQUEST['student_id'])){
        ?>
          <div class="btn-news-control">
            <a href="news.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>" class="btn btn-primary"><i class="fas fa-chevron-left"></i> ย้อนกลับ</a>
          </div>
        <?php 
        }
        else if(isset($_REQUEST['personal_id'])){
          ?>
          <div class="btn-news-control">
            <a href="news.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="btn btn-primary"><i class="fas fa-chevron-left"></i> ย้อนกลับ</a>
          </div>
        <?php 
        }
        else{
          ?>
          <div class="btn-news-control">
            <a href="news.php" class="btn btn-primary"><i class="fas fa-chevron-left"></i> ย้อนกลับ</a>
          </div>
        <?php 
        }
    ?>
        </div>
      </div>
    </section>
    <?php 
    }
    ?>

  <?php include('footer.php'); ?>

  </body>
</html>
