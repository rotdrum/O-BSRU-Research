<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการรายอาจารย์/บุคลากร</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

    

    <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">จัดการรายอาจารย์/บุคลากร</h2>

            <!-- search & filter -->
            <div class="form-control-search">
                <div class="form-control-search-left">
                    <div class="form-control-search-left-top">
                        <input  id="myInput" onkeyup="myFunction()"  type="search" class="txt-search" placeholder="ค้นหาชื่ออาจารย์ หรือ บุคลากร" />
                        <i class="fas fa-search txt-i-search"></i>
                    </div>
                </div>
                <!--
                <div class="form-control-search-right">
                    <button class="btn btn-search">ค้นหา</button>
                </div>
                -->
            </div>

            <!-- table -->
            <div class="table-scroll">
                <table class="table table-research" id="myTable">
                    <thead>
                        <tr>
                            <th class="w-50">ลำดับ</th>
                            <th class="w-150">บัญชีผู้ใช้</th>
                            <th class="w-300">ชื่อ-สกุล</th>
                            <th class="w-150">เบอร์โทรศัพท์</th>
                            <th class="w-300">อีเมล</th>
                            <th class="w-100">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
             $count = 1 ;
    $stmt = $pdo->query("select * from personal ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $personal_id = $row['personal_id']; 
    ?>

                        <tr>
                            <td>
                                <p class="p-td-center"><?php echo $count ; ?></p>
                            </td>
                            <td>
                                <p><?php echo $row['username'] ; ?></p>
                            </td>
                            <td>
                                <p><?php echo $row['tname'] ; ?><?php echo $row['fname'] ; ?> <?php echo $row['lname'] ; ?></p>
                            </td>
                            <td>
                                <p class="p-td-center"><?php echo $row['tel'] ; ?></p>
                            </td>
                            <td>
                                <p class="p-td-center"><?php echo $row['email'] ; ?></p>
                            </td>
                            <td class="btn-td-control">
                                <a href="teacher_edit.php?personal_id=<?php echo $row['personal_id'] ; ?>"  class="btn btn-warning">แก้ไข</a>
                                <a onclick="del(<?php echo $row['personal_id'] ; ?>)" class="btn btn-danger">ลบ</a>
                            </td>
                        </tr>
                        <?php 
             $count++ ;
       }
    ?>       
                        
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <div id="overlayDelete" style="display: none; justify-content: center; align-items: center; z-index: 999; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); position: fixed; top: 0;">
      <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 500px; height: 300px; background: #fff; border-radius: 20px; padding: 50px;">
        <i class="fas fa-exclamation-triangle" style="font-size: 5rem; color: red; margin-bottom: 20px;"></i>
        <h1>คุณแน่ใจว่าต้องการจะลบ?</h1>
        <div style="display: flex; width: 100%; justify-content: center; margin-top: 30px;">
          <a class="btn btn-danger"  href="postteacher_delete.php?personal_id=<?php echo $row['personal_id'] ; ?>" style="margin-right: 20px;"><i class="fas fa-trash-alt"></i> ลบ</a>
          <a onclick="$('#overlayDelete').hide()" class="btn" style="background: #f7f7f7; border: 1px solid #e5e5e5; color: #333;">ยกเลิก</a>
        </div>
      </div>
    </div>

</body>
<?php
    if(isset($_SESSION['teacher_delete'])){
        if($_SESSION['teacher_delete']  == 9){
    ?>
    <script>
     Swal.fire({
                    icon: 'error',
                    title: 'ผิดพลาด',
                    text: 'อาจารย์มีปริญญานิพนธ์ค้างอยู่'
                })
    </script>
    <?php
        }
        elseif($_SESSION['teacher_delete']  == 5){
    ?>
    <script>
     Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ',
                })
    </script>
    <?php
        }

        unset($_SESSION['teacher_delete']);
    }
    ?>

<script>
    function del(del_id) {
        Swal.fire({
            icon: 'warning',
            title: 'คุณต้องการจะลบ?',
            showConfirmButton: false,
            showDenyButton: true,
            showCancelButton: true,
            denyButtonText: `ลบ`,
            cancelButtonText: `ยกเลิก `,
        }).then((result) => {
            if (result.isDenied) {
                location.href = "postteacher_delete.php?personal_id="+del_id ;
            }
        })
    }


    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }
        }
    }
</script>
</html>