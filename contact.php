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
<?php 
    $stmt = $pdo->query("select * from contact where contact_id = 1 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
<section class="container">
    <div class="contact">
        <div class="contact-map">
            <h3 class="contact-title">สถานที่</h3>
            <?php echo $row['iframe']  ; ?>
        </div>
        <div class="contact-detail">
            <h3 class="contact-title">ข้อมูลเพิ่มเติม</h3>
            <div class="contact-form-control">
                <h4>สถานที่</h4>
                <p><?php echo $row['name_address']  ; ?></p>
            </div>
            <div class="contact-form-control">
                <h4>เบอร์โทรศัพท์</h4>
                <p><?php echo $row['tel']  ; ?></p>
            </div>
            <div class="contact-form-control">
                <h4>อีเมล</h4>
                <p><?php echo $row['email']  ; ?></p>
            </div>
        </div>
    </div>
    
</section>
<?php 
}
    ?>
<?php include('footer.php'); ?>
    
</body>
</html>