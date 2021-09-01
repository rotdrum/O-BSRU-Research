
  <?php 
    $stmt = $pdo->query("select * from student where student_id = ".$_REQUEST['student_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  ?>
<nav>
    <div class="nav-container">
        <a href="index.php?student_id=<?php echo $row['student_id'] ; ?>" class="nav-logo">
            <div class="nav-logo-img">
                <img src="img/logo-main.png" />
            </div>
            <div class="nav-logo-title">
                <p>ระบบสารสนเทศเพื่อการบริหารจัดการบัณฑิตนิพนธ์</p>
                <p>มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา</p>
            </div>
        </a>
        <div class="nav-login">
            <a href="student_profile.php?student_id=<?php echo $row['student_id'] ; ?>" class="user-has-login"><i class="fas fa-user"></i><?php echo $row['tname'] ; ?><?php echo $row['fname'] ; ?> <?php echo $row['lname'] ; ?></a>
            <a onclick="logout()" class="btn btn-login">ออกจากระบบ</a>
            <button id="btn-hamburger" class="btn btn-hamburger">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</nav>
<section class="nav-menu">
    <ul class="nav-menu-container">
        <li class="user-has-login-li">
            <a href="#"><i class="fas fa-user"></i><?php echo $row['tname'] ; ?><?php echo $row['fname'] ; ?> <?php echo $row['lname'] ; ?></a>
        </li>
        <li>
            <a href="index.php?student_id=<?php echo $row['student_id'] ; ?>"><i class="fas fa-home"></i> หน้าแรก</a>
        </li>
        <li>
            <a href="student_research.php?student_id=<?php echo $row['student_id'] ; ?>"><i class="fas fa-book"></i> จัดการบัณฑิตนิพนธ์</a>
        </li>
        <li>
            <a href="news.php?student_id=<?php echo $row['student_id'] ; ?>"><i class="far fa-newspaper"></i> ข่าวประชาสัมพันธ์</a>
        </li>
        <li>
            <a href="paper.php?student_id=<?php echo $row['student_id'] ; ?>"><i class="fas fa-file-download"></i> ดาวน์โหลดเอกสาร</a>
        </li>
        <li>
            <a href="exam.php?student_id=<?php echo $row['student_id'] ; ?>"><i class="fas fa-table"></i> ตารางสอบ</a>
        </li>
        <li>
            <a href="contact.php?student_id=<?php echo $row['student_id'] ; ?>"><i class="fas fa-phone-square"></i> ติดต่อ</a>
        </li>
        <li class="ul-login">
            <a onclick="logout()"><i class="fas fa-sign-in-alt"></i> ออกจากระบบ</a>
        </li>
    </ul>
</section>

<?php 
   }
  ?>

  <script>
      function logout() {
        sessionStorage.clear();
        // sessionStorage.removeItem("autu");
        // sessionStorage.removeItem("student_id");
        // sessionStorage.removeItem("status");
        // sessionStorage.removeItem("flag");
        location.href = `index.php`;
      }
  </script>