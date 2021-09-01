<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>บัณฑิตนิพนธ์</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>
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

    <section class="container">
        <h3 class="text-header">ค้นหาบัณฑิตนิพนธ์แบบละเอียด</h3>
      
        <!-- search & filter -->
        <?php 
                        if(isset($_REQUEST['student_id'])){
                    ?>
        <form action="postsearch_index.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>" method="post" class="form-control-search">

                    <?php 
                        }
                        else if(isset($_REQUEST['personal_id'])){
                    ?>
        <form action="postsearch_index.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" method="post" class="form-control-search">

                    <?php 
                        }
                        else{
                    ?>
        <form action="postsearch_index.php" method="post" class="form-control-search">

                    <?php 
                        }
                    ?>
            <div class="form-control-search-left">
                <!-- <div class="form-control-search-left-top">
                    <input type="search" id="myInput" onkeyup="myFunction()"  class="txt-search" placeholder="ค้นหาจากชื่อบัณฑิตนิพนธ์ หรือ ชื่อนักศึกษา" />
                    <i class="fas fa-search txt-i-search"></i>
                </div>
                <div class="form-control-search-left-bottom">
                    <select required name="status"  class="sel sel-filter">
                        <option value="">--- สถานะบัณฑิตนิพนธ์ ---</option>
                        <option value="1">สถานะผ่านหัวข้อบัณฑิตนิพนธ์</option>
                        <option value="2">สถานะผ่านก้าวหน้าบัณฑิตนิพนธ์</option>
                        <option value="3">สถานะผ่านป้องกันบัณฑิตนิพนธ์</option>
                        <option value="4">สถานะผ่านบัณฑิตนิพนธ์สมบูรณ์</option>
                    </select>
                    <select required name="personal"  class="sel sel-filter">
                        <option  value="">--- อาจารย์ที่ปรึกษา ---</option>
                        <?php 
                        $stmt = $pdo->query("select * from personal  ");
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <option value="<?php echo $row['personal_id'] ; ?>"><?php echo $row['tname'] ; ?><?php echo $row['fname'] ; ?> <?php echo $row['lname'] ; ?></option>
                        <?php 
                        }
                        ?>
                       
                    </select>
                    <div class="form-control-search-right">
                        <button class="btn btn-search">ค้นหา</button>
                    </div>
                </div> -->
            </div>
            
        </form>


        <?php 
    $flag = 0 ;
    $stmt = $pdo->query("select * from research where name_th = '".$_GET['name_th']."' and  ".$_GET['status']." = 2  and  student_one = '".$_GET['student_one']."'  and  personal_main = '".$_GET['personal_main']."'  and  year = '".$_GET['year']."' ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   
     $flag = 1 ;    
    }
    ?>

    
<?php 
    if($flag == 0){
?>
<p style="width: 100%; text-align: center;">ไม่มีบัณฑิตนิพนธ์</p>
<?php 
    } else {
?>

        <!-- table -->
        <div class="table-scroll">

            <table class="table table-research" id="myTable">
                <thead>
                    <tr>
                        <th class="w-50">ลำดับ</th>
                        <th class="w-300">ชื่อบัณฑิตนิพนธ์</th>
                        <th class="w-300">นักศึกษา</th>
                        <th>ปีการศึกษา</th>
                        <th class="w-300">สถานะ</th>
                    </tr>
                </thead>
            

                 <tbody>
    <?php 
    $count  = 1 ;
    $stmt = $pdo->query("select * from research where name_th = '".$_GET['name_th']."' and  ".$_GET['status']." = 2  and  student_one = '".$_GET['student_one']."'  and  personal_main = '".$_GET['personal_main']."'  and  year = '".$_GET['year']."' ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        if(($row['status1']==2) || ($row['status2']==2) || ($row['status3']==2) || ($row['status4']==2)  ){
        ?>
                   <tr>
                        <td>
                            <p class="p-td-center"><?php echo $count ; ?></p>
                        </td>
                        <td>
                        <a href="researchDetail.php?research_id=<?php echo $row['research_id'] ; ?>" style="color: #3498db; text-decoration: underline;">
                            <?php echo $row['name_th'] ; ?>
                            </a>
                        </td>
                        <td>
                            <p><?php echo $row['student_one'] ; ?></p>
                            <p><?php echo $row['student_two'] ; ?></p>
                        </td>
                        <td>
                            <p class="p-td-center"><?php echo $row['year'] ; ?></p>
                        </td>
                        <td>
                        <?php 
                            if($row['status4'] == 2){
                        ?>
                            <p class="color-success p-td-center">
                                <i class="fas fa-circle"></i> ผ่านบัณฑิตนิพนธ์สมบูรณ์
                            </p>
                        <?php 
                            }
                            else if ($row['status3'] == 2){
                        ?>
                            <p class="color-success p-td-center">
                                <i class="fas fa-circle"></i> ผ่านป้องกันบัณฑิตนิพนธ์
                            </p>
                        <?php 
                            }
                            else if ($row['status2'] == 2){
                        ?>
                            <p class="color-success p-td-center">
                                <i class="fas fa-circle"></i> ผ่านก้าวหน้าบัณฑิตนิพนธ์
                            </p>
                        <?php 
                            }
                            else if ($row['status1'] == 2){
                        ?>
                            <p class="color-success p-td-center">
                                <i class="fas fa-circle"></i> ผ่านหัวข้อบัณฑิตนิพนธ์
                            </p>
                        <?php 
                            }
                        ?>
                        </td>
                    </tr>
                        <?php 
                    $count++;
    }
    }
    ?>
                    </tbody>
                </table>

        </div>
<?php 
    }
?>



    </section>

    <?php include('footer.php'); ?>

</body>

</html>