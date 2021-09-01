<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงาน</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

    <!-- <script>
        const personal_id = 
    </script> -->

</head>
<body>

<?php include('teacher_navbarLogin.php'); ?>
<section class="container">
      <div class="txt-header-manage">
        <h3 class="text-header">รายงานภาระอาจารย์ที่ปรึกษา</h3>
        <div class="report-header">
          <a href="report_research.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select">บัณฑิตนิพนธ์</a>
          <a href="report_teacher.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select rp-active">ภาระอาจารย์ที่ปรึกษา</a>
          <a href="report_exam.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select">งานการจัดสอบ</a>
          <a href="report_user.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select">ผู้ใช้ระบบ</a>
        </div>
      </div>

      <div class="report-filter">
        <!-- filter main -->
        <div class="report-filter-control">
          <p>ตัวกรอง</p>
          <select class="sel sel-report-filter" id="ft-main">
            <option value="none">--- เลือก ---</option>
            <option value="ft-year">ปีการศึกษา</option>
            <option value="ft-status">สถานะบัณฑิตนิพนธ์</option>
            <option value="ft-teacher">อาจารย์ที่ปรึกษา</option>
          </select>
        </div>

        <!-- filter 1 -->
        <div id="ft-year" class="report-filter-control" style="display: none;">
          <p>ปีการศึกษา</p>
          <select id="year"  onchange="myFunction1()"  class="sel sel-report-filter">
            <option value="">--- เลือก ---</option>
            <option value="2570">2570</option>
            <option value="2569">2569</option>
            <option value="2568">2568</option>
            <option value="2567">2567</option>
            <option value="2566">2566</option>
            <option value="2565">2565</option>
            <option value="2564">2564</option>
            <option value="2563">2563</option>
            <option value="2562">2562</option>
            <option value="2561">2561</option>
            <option value="2560">2560</option>
          </select>
        </div>

        <!-- filter 2 -->
        <div id="ft-status" class="report-filter-control" style="display: none;">
          <p>สถานะบัณฑิตนิพนธ์</p>
          <select id="status"  onchange="myFunction2()"   class="sel sel-report-filter">
            <option value="">--- เลือก ---</option>
            <option value="ผ่าน">ผ่าน</option>
            <option value="ผ่านมีเงื่อนไข">ผ่านมีเงื่อนไข</option>
            <option value="ไม่ผ่าน">ไม่ผ่าน</option>
          </select>
        </div>

        <!-- filter 5 -->
        <div id="ft-teacher" class="report-filter-control" style="display: none;">
          <p>อาจารย์ที่ปรึกษา</p>
          <select id="teacher"   onchange="myFunction3()"  class="sel sel-report-filter">
            <option value="">--- เลือก ---</option>
            <?php 
                        $stmt = $pdo->query("select * from personal  ");
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
            <option value="<?php echo $row['tname'] ; ?><?php echo $row['fname'] ; ?> <?php echo $row['lname'] ; ?>"><?php echo $row['tname'] ; ?><?php echo $row['fname'] ; ?> <?php echo $row['lname'] ; ?></option>
            <?php 
            }
            ?>
          </select>
        </div>
        

        <div class="report-filter-control report-filter-control-special">
          <div class="report-m"></div>
          <a onclick="window.print()" class="btn btn-warning"><i class="fas fa-print"></i>พิมพ์เอกสาร</a>
        </div>
      </div>

      <h1 class="title-print">รายงานภาระอาจารย์ที่ปรึกษา</h1>
        
      <p id="shownone" style="display: none; width: 100%; text-align: center;">ไม่มีรายงานภาระอาจารย์ที่ปรึกษา</p>
      
      <!-- table -->
      <div id="table" class="table-scroll">
        <table class="table table-research" id="myTable">
            <thead>
              <tr>
                <th class="w-100">ปีการศึกษา</th>
                <th>หัวข้อบัณฑิตนิพนธ์</th>
                <th class="w-250">อาจารย์ที่ปรึกษา</th>
                <th class="w-200">สถานะบัณฑิตนิพนธ์</th>
              </tr>
            </thead>
            <tbody id="tbody">
               
            </tbody>
        </table>
      </div>
    </section>
    <?php include('footer.php'); ?>



  <script>
    var teacher = '';
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "./api/index/get_teacher.php",
        data: {},
        success: function(response) {
            teacher = response.result;
            console.log("good", response)
        }, error: function(err) {
            console.log("err", err)
        }
    })

    setTimeout(() => {
        var count = 0;
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "./api/index/get_teacher_on_research.php",
            data: {
                personal_id: personal_id
            }, success: function(response) {
                console.log("good", response)
                var html = '';
                for(var i=0; i<response.result.length; i++, count++) {
                
                    html += `
                        <tr>
                            <td>
                                <p class="p-td-center">${response.result[i].year}</p>
                            </td>
                            <td>
                                <p>${response.result[i].name_th}</p>
                            </td>
                            <td>`;
                    for(var j=0; j<teacher.length; j++) {
                        if(response.result[i].personal_main == teacher[j].personal_id) {
                            html += `<p>${teacher[j].name}</p>`
                        }
                    }
                    for(var j=0; j<teacher.length; j++) {
                        if(response.result[i].personal_sub == teacher[j].personal_id) {
                            html += `<p>${teacher[j].name}</p>`
                        }
                    }
                    html += `
                            </td>
                            <td>`;
                    if(response.result[i].status4 == "2") {
                        html += `<p class="color-success p-td-center"><i class="fas fa-circle"></i> บัณฑิตนิพนธ์ฉบับสมบูรณ์</p>`;
                    } else if(response.result[i].status4 == "1") {
                        html += `<p class="color-danger p-td-center"><i class="fas fa-circle"></i> รออนุมัติป้องกันบัณฑิตนิพนธ์</p>`;
                    } else if(response.result[i].status3 == "2") {
                        html += `<p class="color-success p-td-center"><i class="fas fa-circle"></i> ผ่านป้องกันบัณฑิตนิพนธ์</p>`;
                    } else if(response.result[i].status3 == "1") {
                        html += `<p class="color-danger p-td-center"><i class="fas fa-circle"></i> รออนุมัติป้องกันบัณฑิตนิพนธ์</p>`;
                    } else if(response.result[i].status2 == "2") {
                        html += `<p class="color-success p-td-center"><i class="fas fa-circle"></i> ผ่านก้าวหน้าบัณฑิตนิพนธ์</p>`;
                    } else if(response.result[i].status2 == "1") {
                        html += `<p class="color-danger p-td-center"><i class="fas fa-circle"></i> รออนุมัติก้าวหน้าบัณฑิตนิพนธ์</p>`;
                    } else if(response.result[i].status1 == "2") {
                        html += `<p class="color-success p-td-center"><i class="fas fa-circle"></i> ผ่านหัวข้อบัณฑิตนิพนธ์</p>`;
                    } else if(response.result[i].status1 == "1") {
                        html += `<p class="color-danger p-td-center"><i class="fas fa-circle"></i> รออนุมัติหัวข้อบัณฑิตนิพนธ์</p>`;
                    }
                    html += `
                            </td>
                        </tr>
                    `;
                }
                if(count <= 0) {
                    $("#shownone").show()
                    $("#table").hide()
                } 
                else {
                    $("#tbody").html(html)
                }
            }, error: function(err) {
                console.log("err", err)
            }
        })
    }, 100);


    function myFunction1() {
        
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("year");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
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

    function myFunction2() {
        
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("status");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
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

    function myFunction3() {
        
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("teacher");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
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
</body>
</html>