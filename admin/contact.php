<?php include('./session.php');  ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ติดต่อ</title>
    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

    
<?php 
            
    $stmt = $pdo->query("select * from contact where contact_id = 1 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

   
    ?>
    <form action="postcontact_edit.php" method="post" class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">ติดต่อ</h2>

            <h4 class="title-main">แผนที่</h4>
            <div class="form-control">
                <p>ฝังแผนที่ด้วย iframe<a class="info" href="iframeMap.php"><i id="info" class="fas fa-info-circle"></i> iframe คืออะไร?</a></p>
                <textarea name="iframe" class="txt-input" ><?php echo $row['iframe'] ; ?> </textarea>
            </div>

            <h4 class="mt-50 title-main">ติดต่อ</h4>
            <div class="form-control">
                <p>สถานที่</p>
                <input type="text" name="name_address" value="<?php echo $row['name_address'] ; ?>" class="txt-input" placeholder="กรอกสถานที่">
            </div>
            <div class="form-control">
                <p>เบอร์โทรศัพท์</p>
                <input type="text" name="tel" value="<?php echo $row['tel'] ; ?>" class="txt-input" placeholder="กรอกเบอร์โทรศัพท์">
            </div>
            <div class="form-control">
                <p>อีเมล</p>
                <input type="email" name="email"  value="<?php echo $row['email'] ; ?>" class="txt-input" placeholder="กรอกอีเมล">
            </div>

            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
            </div>

        </div>
    </form>
    <?php 
}
   
    ?>
</body>
</html>