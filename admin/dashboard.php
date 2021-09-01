<?php include('./session.php');  ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลระบบ</title>

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
            <h2 class="dashboard-title">ข้อมูลระบบ</h2>

            <!-- stat -->
            <div class="dashboard-stat">
                <!-- items -->
                <div class="dashboard-stat-items bg-li-blue">
                    <div class="dsi-count">
                        <div class="dsi-count-number">
                        <?php 
                        $count = 0 ;
                            $stmt = $pdo->query("select * from student  ");
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                $count++ ;
                            }
                        ?>
                            <p><?php echo $count; ?></p>
                        </div>
                        <div class="dsi-count-img">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                    <div class="dsi-title">
                        <p>ยอดจำนวนนักเรียน</p>
                    </div>
                </div>

                <!-- items -->
                <div class="dashboard-stat-items bg-li-orange">
                    <div class="dsi-count">
                        <div class="dsi-count-number">
                        <?php 
                        $count = 0 ;
                            $stmt = $pdo->query("select * from personal  ");
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                $count++ ;
                            }
                        ?>
                               <p><?php echo $count; ?></p>
                        </div>
                        <div class="dsi-count-img">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                    <div class="dsi-title">
                        <p>ยอดจำนวนบุคลากร</p>
                    </div>
                </div>

                <!-- items -->
                <div class="dashboard-stat-items bg-li-green">
                    <div class="dsi-count">
                        <div class="dsi-count-number">
                        <?php 
                        $count = 0 ;
                            $stmt = $pdo->query("select * from research  ");
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                $count++ ;
                            }
                        ?>
                               <p><?php echo $count; ?></p>
                        </div>
                        <div class="dsi-count-img">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                    <div class="dsi-title">
                        <p>บัณฑิตนิพนธ์ทั้งหมด</p>
                    </div>
                </div>

                <!-- items -->
                <div class="dashboard-stat-items bg-li-red">
                    <div class="dsi-count">
                        <div class="dsi-count-number">
                        <?php 
                        $count = 0 ;
                            $stmt = $pdo->query("select * from research where status4 = 2  ");
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                $count++ ;
                            }
                        ?>
                            <p><?php echo $count; ?></p>
                        </div>
                        <div class="dsi-count-img">
                            <i class="fas fa-bookmark"></i>
                        </div>
                    </div>
                    <div class="dsi-title">
                        <p>บัณฑิตนิพนธ์สมบูรณ์</p>
                    </div>
                </div>
            </div>

            <!-- list -->
            <div class="dashboard-list">
                <div class="dashboard-list-card">
                    <h4>บัณฑิตนิพนธ์รอการอนุมัติ</h4>
                    <div id="table_research" class="dashboard-list-card-case">
                        <div id="tbody_research" class="dashboard-list-card-show">
                            
                        </div>
                        <a href="research_approve.php">ดูทั้งหมด</a>
                    </div>
                    <div id="research_none" class="dashboard-list-card-case" style="color: #adadad; display: none; margin-top: 20px;">
                        <p>ไม่มีข้อมูลการอนุมัติบัณฑิตนิพนธ์</p>
                    </div>
                </div>

                <div class="dashboard-list-card">
                    <h4>บัณฑิตนิพนธ์รอการจัดสอบ</h4>
                    <div id="table_exam" class="dashboard-list-card-case">
                        <div id="tbody_exam" class="dashboard-list-card-show">
                            
                        </div>
                        <a href="exam.php">ดูทั้งหมด</a>
                    </div>
                    <div id="exam_none" class="dashboard-list-card-case" style="color: #adadad; display: none; margin-top: 20px;">
                        <p>ไม่มีข้อมูลการจัดสอบ</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var count = 0;
        var html = '';

        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "./../api/admin/get_exam.php",
            data: {},
            success: function(response) {
                console.log("good", response)
                for(var i=0; i<response.result.length; i++) {
                    if(response.result[i].status1 == '1' || response.result[i].status2 == '1' || response.result[i].status3 == '1' || response.result[i].status4 == '1') {
                        count++
                        html += `<p>${response.result[i].name_th}</p>`;
                    }
                }
                if(count <= 0) {
                    $("#research_none").show()
                    $("#table_research").hide()
                } else {
                    $("#tbody_research").html(html)
                }

                html = ''
                count = 0
                for(var i=0; i<response.result.length; i++) {
                    if((response.result[i].ex_status == '0' && response.result[i].status2 == '2') || 
                       ((response.result[i].ex_status == '3' || response.result[i].ex_status == '4') && response.result[i].status3 == '2')) {
                        count++
                        html += `<p>${response.result[i].name_th}</p>`;
                    }
                }
                if(count <= 0) {
                    $("#exam_none").show()
                    $("#table_exam").hide()
                } else {
                    $("#tbody_exam").html(html)
                }
            }, error: function(err) {
                console.log("bad", err)
            }
        })
    </script>

</body>
</html>