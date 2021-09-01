<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข่าวประชาสัมพันธ์</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

</head>
<body>

<?php include('navbar.php'); ?>

<?php 
    $stmt = $pdo->query("select * from news where news_id =".$_REQUEST['news_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <form action="postnews_edit.php" method="post" class="main"  enctype="multipart/form-data">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">แก้ไขข่าวประชาสัมพันธ์</h2>

            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type="file" name="name_file"  id="imageUpload" accept=".png, .jpg, .jpeg" class="txt-file">
                    <label for="imageUpload" class="label-upload">
                        <i id="camera" class="fas fa-camera"></i>
                    </label>
                </div>

                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url('../news/<?php echo $row['news_id'] ; ?>/<?php echo $row['pic_file'] ; ?>');"></div>
                </div>
            </div>


            <div class="form-control">
                <p>หัวข้อข่าว</p>
                <input type="hidden" name="news_id" value="<?php echo $row['news_id'] ; ?>" class="txt-input" >
                <input type="text" name="title" value="<?php echo $row['title'] ; ?>" class="txt-input" >
            </div>

            <div class="form-control">
                <p>เนื้อหาข่าว</p>
                <textarea name="comment" id="summernote"><?php echo $row['comment'] ; ?></textarea>
            </div>


            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                <a href="news_manage.php" class="btn btn-danger"><i class="fas fa-times-circle"></i>ยกเลิก</a>
            </div>

        </div>
    </form>
    <?php 
    }
    ?>
</body>
</html>