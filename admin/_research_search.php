<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหาบัณฑิตนิพนธ์</title>

    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>

    

    <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">ค้นหาบัณฑิตนิพนธ์</h2>
            <div id="search_main_control" class="form-control-search-new">
                <select id="sel_filter_status" class="sel-new sel-new-filter">
                    <option value="ชื่องานบัณฑิตนิพนธ์">ชื่องานบัณฑิตนิพนธ์</option>
                    <option value="นักศึกษา">นักศึกษา</option>
                    <option value="ปีการศึกษา">ปีการศึกษา</option>
                    <option value="อาจารย์ที่ปรึกษา">อาจารย์ที่ปรึกษา</option>
                    <option value="สถานะบัณฑิตนิพนธ์">สถานะบัณฑิตนิพนธ์</option>
                </select>
                <input type="search" id="myInput_new" onkeyup="search_system()"  class="txt-search-new" placeholder="ค้นหา..." />
            </div>
            <div id="search_condition_system" class="form-control-search-detail">
                <div onclick="search_condition()" class="search-detail-items">
                    <i style="margin-right: 10px;" class="fas fa-cog"></i>
                    <span id="text_condition">ค้นหาแบบละเอียด</span>
                </div>
            </div> 
            <div id="search_condition_control" class="form-control-search-condition" style="display: none;  ">
                <div class="form-control-search-condition-row">
                    <div class="form-control-search-condition-items">
                        <span>ชื่องานบัณฑิตนิพนธ์</span> 
                        <input type="text" class="txt-condition" placeholder="ชื่องานบัณฑิตนิพนธ์">
                    </div>
                    <div class="form-control-search-condition-items">
                        <span>นักศึกษา</span> 
                        <input type="text" class="txt-condition" placeholder="นักศึกษา">
                    </div>
                    <div class="form-control-search-condition-items">
                        <span>ปีการศึกษา</span> 
                        <input type="text" class="txt-condition" placeholder="ปีการศึกษา">
                    </div>
                </div>
                <div class="form-control-search-condition-row">
                    <div class="form-control-search-condition-items">
                        <span>อาจารย์ที่ปรึกษา</span> 
                        <input type="text" class="txt-condition" placeholder="อาจารย์ที่ปรึกษา">
                    </div>
                    <div class="form-control-search-condition-items">
                        <span>สถานะบัณฑิตนิพนธ์</span> 
                        <input type="text" class="txt-condition" placeholder="สถานะบัณฑิตนิพนธ์">
                    </div>
                    <div class="form-control-search-condition-items">
                        <span></span> 
                    </div>
                </div>
            </div>

            <br><br><br><br>

            <!-- search & filter -->
            <form action="postresearch_search.php" method="post" class="form-control-search">
                <div class="form-control-search-left">
                    <div class="form-control-search-left-top">
                        <input type="search"   id="myInput" onkeyup="myFunction()"  class="txt-search" placeholder="ค้นบัณฑิตนิพนธ์ หรือ ชื่อนักศึกษา" />
                        <i class="fas fa-search txt-i-search"></i>
                    </div>
                    <div class="form-control-search-left-bottom">
                        <select required name="status" class="sel sel-filter">
                            <option value="">--- สถานะบัณฑิตนิพนธ์ ---</option>
                            <option value="1">สถานะผ่านหัวข้อบัณฑิตนิพนธ์</option>
                        <option value="2">สถานะผ่านก้าวหน้าบัณฑิตนิพนธ์</option>
                        <option value="3">สถานะผ่านป้องกันบัณฑิตนิพนธ์</option>
                        <option value="4">สถานะผ่านบัณฑิตนิพนธ์สมบูรณ์</option>
                        </select>
                        <select required name="personal" class="sel sel-filter">
                            <option value="">--- อาจารย์ที่ปรึกษา ---</option>
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
                    </div>
                </div>
            </form>

            <!-- table -->
            <div class="table-scroll">
                <table class="table table-research" id="myTable">
                    <thead>
                        <tr>
                            <th class="w-50">ลำดับ</th>
                            <th class="w-350">ชื่อบัณฑิตนิพนธ์</th>
                            <th class="w-200">นักศึกษา</th>
                            <th class="w-100">ปีการศึกษา</th>
                            <th class="w-150">สถานะ</th>
                            <th class="w-150">อัพเดทล่าสุด</th>
                            <th class="w-150">รายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
    $count  = 1 ;
    $stmt = $pdo->query("select * from research  ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        if(($row['status1']==2) || ($row['status2']==2) || ($row['status3']==2) || ($row['status4']==2)  ){
        ?>
                   <tr>
                        <td>
                            <p class="p-td-center"><?php echo $count ; ?></p>
                        </td>
                        <td>
                            <p>
                            <?php echo $row['name_th'] ; ?>
                            </p>
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
                        <td>
                            <p class="p-td-center"><?php echo $row['update_up'] ; ?></p>
                        </td>
                        <td>
                        <a href="research_searchDetail.php?research_id=<?php echo $row['research_id'] ; ?>"  class="btn btn-primary">เพิ่มเติม</a>
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

        </div>
    </section>
</body>
<script>
var status_search = 'ชื่องานวิจัย';
    $("#sel_filter_status").change(function() {
        status_search = $("#sel_filter_status").val();
        console.log(status_search);
    });

    function search_system() {
        if(status_search == "ชื่องานวิจัย") {
            search_prototype(1);
        }
        else if(status_search == "นักศึกษา") {
            search_prototype(2);
        }
        else if(status_search == "ปีการศึกษา") {
            search_prototype(3);
        }
        else if(status_search == "อาจารย์ที่ปรึกษา") {
            search_prototyep(4);
        }
    }

    var condition = true;
    function search_condition() {
        condition = !condition;
        if(condition) {
            $("#search_main_control").slideDown();
            $("#search_condition_control").slideUp();
            $("#text_condition").text("ค้นหาแบบละเอียด");
        }
        else {
            $("#search_main_control").slideUp();
            $("#search_condition_control").slideDown();
            $("#text_condition").text("ค้นหาแบบปกติ");
        }
        
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
    td1 = tr[i].getElementsByTagName("td")[1];
    td2 = tr[i].getElementsByTagName("td")[2];
    if (td1 || td2) {
      txtValue1 = td1.textContent || td1.innerText;
      txtValue2 = td2.textContent || td2.innerText;
      if ((txtValue1.toUpperCase().indexOf(filter) > -1) || (txtValue2.toUpperCase().indexOf(filter) > -1)) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
 
  }
}
</script>
</html>