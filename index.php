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

<script>
    var authen = "" ;
</script>

    <?php 
        if(isset($_REQUEST['student_id'])){
            include('session_student.php'); 
            include('student_navbarLogin.php'); 
            echo "<script> authen = '&student_id=".$_REQUEST['student_id']."' ;</script>" ;
        }
        else if(isset($_REQUEST['personal_id'])){
            include('session_personal.php'); 
            include('teacher_navbarLogin.php'); 
            echo "<script> authen = '&personal_id=".$_REQUEST['personal_id']."' ;</script>" ;
        }
        else{
            include('navbarNotLogin.php'); 
        }
    ?>

<script>
/*
    var authen = "" ;
    const student = "<?php echo isset($_REQUEST['student_id']) ; ?>";
    const personal = "<?php echo isset($_REQUEST['personal_id']) ; ?>";

    if(student == 1){
       authen = "&student_id=<?php echo $_REQUEST['student_id'] ; ?>" ;
    }
    else if(personal == 1){
       authen = "&personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" ;
    }
*/
</script>
    <section class="container">
        <h3 class="text-header">ค้นหาบัณฑิตนิพนธ์</h3>
        <div id="search_main_control" class="form-control-search-new">
            <select id="sel_filter_status" class="sel-new sel-new-filter">
                <option value="ชื่องานบัณฑิตนิพนธ์">ชื่องานบัณฑิตนิพนธ์</option>
                <option value="นักศึกษา">นักศึกษา</option>
                <option value="อาจารย์ที่ปรึกษา">อาจารย์ที่ปรึกษา</option>
                <option value="ปีการศึกษา">ปีการศึกษา</option>
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
        <form id="search_condition_control" method="get" action="postindex.php" class="form-control-search-condition" style="display: none;  ">
                <div class="form-control-search-condition-row">
                    <div class="form-control-search-condition-items">
                        <span>ชื่องานบัณฑิตนิพนธ์</span> 
                        <input required name="name_th" type="text" class="txt-condition" placeholder="ชื่องานบัณฑิตนิพนธ์">
                    </div>
                    <div class="form-control-search-condition-items">
                        <span>นักศึกษาที่จัดการข้อมูลบนระบบ</span> 
                        <input required name="student_one"  type="text" class="txt-condition" placeholder="นักศึกษา">
                    </div>
                    <div class="form-control-search-condition-items">
                        <span>ปีการศึกษา</span> 
                        <select required name="year" class="txt-condition">
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
                </div>
                <div class="form-control-search-condition-row">
                    <div class="form-control-search-condition-items">
                        <span>อาจารย์ที่ปรึกษา (หลัก)</span> 
                        <select  required name="personal_main" class="txt-condition" >
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
                    <div class="form-control-search-condition-items">
                        <span>สถานะบัณฑิตนิพนธ์</span> 
                        <select  name="status" class="txt-condition" >
                <option value="">--- เลือกประเภทไฟล์ ---</option>
                <option value="status1">หัวข้อบัณฑิตนิพนธ์</option>
                <option value="status2">ก้าวหน้าบัณฑิตนิพนธ์</option>
                <option value="status3">ป้องกันบัณฑิตนิพนธ์</option>
                <option value="status4">บัณฑิตนิพนธ์ฉบับสมบูรณ์</option>
            </select>
                    </div>
                    <div class="form-control-search-condition-items">
                        <button required class="btn btn-info" >ค้นหา</button>
                        <span></span> 
                    </div>
                </div>
            </form>

       

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
    $stmt = $pdo->query("select * from research where status1 = 2 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   
     $flag = 1 ;    
    }

    $stmt = $pdo->query("select * from research where status2 = 2 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   
     $flag = 1 ;    
    }

    $stmt = $pdo->query("select * from research where status3 = 2 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   
     $flag = 1 ;    
    }

    $stmt = $pdo->query("select * from research where status4 = 2 ");
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
                        <th class="w-300">อาจารย์ที่ปรึกษา</th>
                        <th>ปีการศึกษา</th>
                        <th class="w-300">สถานะ</th>
                    </tr>
                </thead>
                <tbody id="tbody_control">
              
                </tbody>
            </table>

            <ul id="pagination_control" class="pagination">
                
            </ul>

        </div>
<?php 
    }
?>

    </section>

    <?php include('footer.php'); ?>

</body>
<script>
    var html = '';
    var data = [];
    var dataFilt = [];
    var pagination = '';
    var totalpage = 0;
    var page = 1;
    var teacher = '';

    


    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "api/index/get_research.php",
        data: {

        }, success: function(response) {
            var data = response.result;
            console.log("success", data);
            for(var i=0; i<data.length; i++) {
                if(data[i].status1 == 2 || data[i].status2 == 2 || data[i].status3 == 2 || data[i].status4 == 2 ){
                    dataFilt.push(data[i]);
                }
            }
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: './api/index/get_teacher.php',
                success: function(response) {
                    teacher = response.result;
                    console.log("filter", dataFilt);
                    query_research();
                }
                ,error: function(err) {
                    console.log("bad teacher", err)
                }
            })

            

            totalpage = Math.ceil(dataFilt.length / 10);
            pagination += ` <li onclick="page_down()" id="page_back"><i class="fas fa-chevron-circle-left"></i></li>`;
            for (var i = 1; i <= totalpage; i++) {
                pagination += `<li onclick="page_current(${i})" id="page_${i}">${i}</li>`;
            }
            pagination += ` <li onclick="page_up()" id="page_up"><i class="fas fa-chevron-circle-right"></i></li>`;

            // render
            $("#pagination_control").html(pagination);
            $("#page_1").addClass("pagination-active");

            // log
            console.log("page: "+page);
            console.log("totalpage: "+totalpage);
            console.log("----");

        }, error: function(err) {
            console.log("reject", err);
        }
    });

    function page_up() {
        if(page != totalpage) {
            $("#page_"+page).removeClass("pagination-active");
            page += 1;
            $("#page_"+page).addClass("pagination-active");
            console.log("page: "+page);

            html = '';
            query_research();
            console.log(dataFilt);
        }
    }

    function page_down() {
        if(page != 1) {
            $("#page_"+page).removeClass("pagination-active");
            page -= 1;
            $("#page_"+page).addClass("pagination-active");

            html = '';
            query_research();
            console.log(dataFilt);
        }
    }

    function page_current(pages) {
        $("#page_"+page).removeClass("pagination-active");
        $("#page_"+pages).addClass("pagination-active");
        page = pages;
        
        html = '';
        query_research();
        console.log(dataFilt);
    }

    function query_research() {
        for (var i = (page - 1) * 10, j=1; i < page * 10; i++, j++) {
            if (i < dataFilt.length) {
            html += `
                <tr>
                    <td>
                        <p class="p-td-center">${(i+1)}</p>
                    </td>
                    <td>
                        <a href="researchDetail.php?research_id=${dataFilt[i].research_id}${authen}" style="color: #3498db; text-decoration: underline;">
                        ${dataFilt[i].name_th}
                        </a>
                    </td>
                    <td>
                        <p>${dataFilt[i].student_one}</p>
                        <p>${dataFilt[i].student_two}</p>
           
                    </td>
                    <td>
            `
            for(var j=0; j<teacher.length; j++) {
                if(dataFilt[i].personal_main == teacher[j].personal_id) {
                    html += `<p>${teacher[j].name}</p>`;
                }
            }
            for(var j=0; j<teacher.length; j++) {
                if(dataFilt[i].personal_sub == teacher[j].personal_id) {
                    html += `<p>${teacher[j].name}</p>`;
                }
            }
            
            html += `
                    </td>
                    <td>
                        <p class="p-td-center">${dataFilt[i].year}</p>
                    </td>
                    <td>
                `;
                if(dataFilt[i].status4 == 2) {
                    html += `
                        <p class="color-success">
                            <i class="fas fa-circle"></i> ผ่านบัณฑิตนิพนธ์สมบูรณ์
                        </p>
                        </td>
                    `;
                }
                else if(dataFilt[i].status3 == 2) {
                    html += `
                        <p class="color-success">
                            <i class="fas fa-circle"></i> ผ่านป้องกันบัณฑิตนิพนธ์
                        </p>
                        </td>
                    `;
                }
                else if(dataFilt[i].status2 == 2) {
                    html += `
                        <p class="color-success">
                            <i class="fas fa-circle"></i> ผ่านก้าวหน้าบัณฑิตนิพนธ์
                        </p>
                        </td>
                    `;
                }
                else if(dataFilt[i].status1 == 2 ) {
                    html += `
                        <p class="color-success">
                            <i class="fas fa-circle"></i> ผ่านหัวข้อบัณฑิตนิพนธ์
                        </p>
                        </td>
                    `;
                }
                html += `</tr>`;
            }
        }
        $("#tbody_control").html(html);

    }

    var status_search = '';

    $( document ).ready(function() {
        status_search = "ชื่องานบัณฑิตนิพนธ์";
    });

    $("#sel_filter_status").change(function() {
        $("#myInput_new").val('');
        status_search = $("#sel_filter_status").val();
        console.log(status_search);
    });

    function search_system() {
        if(status_search == "ชื่องานบัณฑิตนิพนธ์") {
            search_prototype(1);
        }
        else if(status_search == "นักศึกษา") {
            search_prototype(2);
        }
        else if(status_search == "อาจารย์ที่ปรึกษา") {
            search_prototype(3);
        }
        else if(status_search == "ปีการศึกษา") {
            search_prototype(4);
        }
        else if(status_search == "สถานะบัณฑิตนิพนธ์") {
            search_prototype(5);
        }
    }

    function search_prototype(id_sel) {
        var input, filter, table, tr, td, i, txtValue, td_main;
        input = document.getElementById("myInput_new");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td_main = tr[i].getElementsByTagName("td")[id_sel];
            if (td_main) {
            txtValue = td_main.textContent || td_main.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }
        
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
</script>
</html>