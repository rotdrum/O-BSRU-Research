<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข่าวประชาสัมพันธ์</title>
    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>

<?php include('navbar.php'); ?>
    

    <form action="postnews_add.php" method="post" class="main" enctype="multipart/form-data" >
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">เพิ่มข่าวประชาสัมพันธ์</h2>

            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type="file" name="name_file" required id="imageUpload" accept=".png, .jpg, .jpeg" class="txt-file">
                    <label for="imageUpload" class="label-upload">
                        <i id="camera" class="fas fa-camera"></i>
                    </label>
                </div>

                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url('../img/cover-main.png');"></div>
                </div>
            </div>


            <div class="form-control">
                <p>หัวข้อข่าว</p>
                <input required type="text" name="title" class="txt-input" placeholder="กรอกหัวข้อข่าว">
                <input required type="hidden" id="date" name="create_up" value="<?php echo date("M j, Y"); ?>">

            </div>

            <div class="form-control">
                <p>เนื้อหาข่าว</p>
                <textarea required id="summernote" name="comment" ></textarea>
            </div>


            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                <a href="news_manage.php" class="btn btn-danger"><i class="fas fa-times-circle"></i>ยกเลิก</a>
            </div>

        </div>
    </form>

</body>
</html>