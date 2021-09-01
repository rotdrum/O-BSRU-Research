<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มบัณฑิตนิพนธ์</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>
    

    <form class="main" action="postresearch_add.php" method="post"  enctype="multipart/form-data" >
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">เพิ่มบัณฑิตนิพนธ์</h2>

            <h4 class="title-main">เกี่ยวกับบัณฑิตนิพนธ์</h4>
            <div class="form-control">
                <p>ชื่อบัณฑิตนิพนธ์ (ภาษาไทย)</p>
                <input required name="name_th"  type="text" class="txt-input" placeholder="กรอกชื่อบัณฑิตนิพนธ์ภาษาไทย">
            </div>
            <div class="form-control">
                <p>ชื่อบัณฑิตนิพนธ์ (ภาษาอังกฤษ)</p>
                <input required name="name_eng"  type="text" class="txt-input" placeholder="กรอกชื่อบัณฑิตนิพนธ์ภาษาอังกฤษ">
            </div>
 
            <div class="form-control">
                <p>ประเภทบัณฑิตนิพนธ์</p>
                <select required name="types" class="sel sel-input">
                    <option value="">--- เลือก ---</option>
                    <?php 
    $stmt = $pdo->query("select * from selection where type_select = 1 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
                    <option value="<?php echo $row['data_select'] ?>"><?php echo $row['data_select'] ?></option>
                <?php 
    }
    ?>
                </select>
            </div>
            
            <div class="form-control">
                <p>ปีการศึกษา</p>
                <select required name="year" class="sel sel-input">
                    <option value="">--- เลือกปีการศึกษา ---</option>
                    <option value="2560">2560</option>
                    <option value="2561">2561</option>
                    <option value="2562">2562</option>
                    <option value="2563">2563</option>
                    <option value="2564">2564</option>
                    <option value="2565">2566</option>
                    <option value="2567">2567</option>
                    <option value="2568">2568</option>
                    <option value="2569">2569</option>
                    <option value="2570">2570</option>
                </select>
            </div>
            <div class="form-control">
                <p>ภาคเรียน</p>
                <select required name="term" class="sel sel-input">
                    <option value="">--- เลือกภาคเรียน ---</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>



            <h4 class="mt-50 title-main">อาจารย์ที่ปรึกษา</h4>

            <div class="form-control">
                <p>อาจารย์ที่ปรึกษาหลัก</p>
                <select id="personal_main" required name="personal_main"  class="sel sel-input">
                    <option value="">--- อาจารย์ที่ปรึกษาหลัก ---</option>
                    <?php 
    $stmt = $pdo->query("select * from personal ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
                    <option value="<?php echo $row['personal_id'] ?>"><?php echo $row['tname'] ?><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></option>
                    <?php 
            }
    ?>
 
                </select>
            </div>
            <div class="form-control">
                <p>อาจารย์ที่ปรึกษาร่วม</p>
                <select id="personal_sub" required name="personal_sup"  class="sel sel-input">
                    <option value="">--- อาจารย์ที่ปรึกษาร่วม ---</option>
                    <?php 
    $stmt = $pdo->query("select * from personal ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
                    <option value="<?php echo $row['personal_id'] ?>"><?php echo $row['tname'] ?><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></option>
                    <?php 
            }
    ?>

                </select>
            </div>
   
            <h4 class="mt-50 title-main">คณะผู้จัดทำ</h4>
            <div class="form-control">
                <p>คณะผู้จัดทำ</p>
                <input required name="student_one"  type="text" class="txt-input" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 1">
            </div>
            <div class="form-control">
                <p>คณะผู้จัดทำ</p>
                <input  name="student_two"  type="text" class="txt-input" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 2">
            </div>

            <h4 class="mt-50 title-main">ความคืบหน้าไฟล์</h4>
            <div class="form-control">
                <p>ประเภทไฟล์</p>
                <select required name="type_file"  class="sel sel-input">
                    <option value="4">บัณฑิตนิพนธ์ฉบับสมบูรณ์</option>
                </select>
            </div>

            <div class="form-upload">
                <label for="file-upload-1">อัพโหลดไฟล์
                <input required name="name_file" type="file" id="file-upload-1" class="file-upload" accept=".pdf">
                </label>
                <p id="filename-1" class="filename">อัพโหลดไฟล์บัณฑิตนิพนธ์ (.PDF)</p>
            </div>


            <h4 class="mt-50 title-main" >บทคัดย่อ</h4>
            <div class="form-control">
                <textarea required name="abstract" class="txt-textarea" placeholder="กรอกบทคัดย่อ"></textarea>
                <input required type="hidden" id="date" name="create_up" value="<?php echo date("M j, Y - H:i:s"); ?>">
                 <input required type="hidden" id="date" name="update_up" value="<?php echo date("M j, Y - H:i:s"); ?>">
            </div>

            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>เพิ่มบัณฑิตนิพนธ์</button>
                <a href="research_approve.php" class="btn btn-danger"><i class="fas fa-times-circle"></i>ยกเลิก</a>
            </div>

        </div>
    </form>

    <script>
    $("#personal_sub").blur(() => {
        if($("#personal_main").val() == $("#personal_sub").val()) {
          Swal.fire({
            icon: 'error',
            title: 'อาจารย์ที่ปรึกษาซ้ำกัน',
            text: 'โปรดเลือกอาจารย์ที่ปรึกษาร่วมใหม่'
          })
          $("#personal_sub").val("")
        }
    })
    </script>
</body>
</html>