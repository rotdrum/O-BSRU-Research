
  <?php 
    $stmt = $pdo->query("select * from personal where personal_id = ".$_REQUEST['personal_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  ?>

<script>
    const personal_id = "<?php echo $_REQUEST['personal_id']; ?>";
</script>
<nav>
    <div class="nav-container">
        <a href="index.php?personal_id=<?php echo $row['personal_id'] ; ?>" class="nav-logo">
            <div class="nav-logo-img">
                <img src="img/logo-main.png" />
            </div>
            <div class="nav-logo-title">
                <p>ระบบสารสนเทศเพื่อการบริหารจัดการบัณฑิตนิพนธ์</p>
                <p>มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา</p>
            </div>
        </a>
        <div class="nav-login">
            <a href="teacher_profile.php?personal_id=<?php echo $row['personal_id'] ; ?>" class="user-has-login"><i class="fas fa-user"></i><?php echo $row['tname'].$row['fname'] ; ?> <?php echo $row['lname'] ; ?></a>
            <a href="login.php" class="btn btn-login">ออกจากระบบ</a>
            <button id="btn-hamburger" class="btn btn-hamburger">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</nav>
<script>
    const personal_name = "<?php echo $row['tname'].$row['fname']." ".$row['lname'];  ?>";
</script>
<section class="nav-menu">
    <ul class="nav-menu-container">
        <li class="user-has-login-li">
            <a href="#"><i class="fas fa-user"></i><?php echo $row['tname'].$row['fname'] ; ?> <?php echo $row['lname'] ; ?></a>
        </li>
        <li>
            <a href="index.php?personal_id=<?php echo $row['personal_id'] ; ?>"><i class="fas fa-home"></i> หน้าแรก</a>
        </li>
        <li>
            <a href="teacher_researchMyself.php?personal_id=<?php echo $row['personal_id'] ; ?>"><i class="fas fa-book"></i> จัดการบัณฑิตนิพนธ์</a>
        </li>
        <!-- <li>
            <a href="news.php?personal_id=<?php echo $row['personal_id'] ; ?>"><i class="far fa-newspaper"></i> ข่าวประชาสัมพันธ์</a>
        </li> -->
        <li>
            <a href="examapprove.php?personal_id=<?php echo $row['personal_id'] ; ?>"><i class="far fa-newspaper"></i> อนุมัติผลการสอบ</a>
        </li>
        <li>
            <a href="paper.php?personal_id=<?php echo $row['personal_id'] ; ?>"><i class="fas fa-file-download"></i> ดาวน์โหลดเอกสาร</a>
        </li>
        <li>
            <a href="exam.php?personal_id=<?php echo $row['personal_id'] ; ?>"><i class="fas fa-table"></i> ตารางสอบ</a>
        </li>
        <li>
            <a href="report_research.php?personal_id=<?php echo $row['personal_id'] ; ?>"><i class="fas fa-bookmark"></i> รายงาน</a>
        </li>
        <li>
            <a href="contact.php?personal_id=<?php echo $row['personal_id'] ; ?>"><i class="fas fa-phone-square"></i> ติดต่อ</a>
        </li>
        <li class="ul-login">
            <a href="login.php"><i class="fas fa-sign-in-alt"></i> ออกจากระบบ</a>
        </li>
    </ul>
</section>
<?php 
   }
  ?>