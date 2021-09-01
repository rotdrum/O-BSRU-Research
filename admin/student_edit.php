<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการรายชื่อนักศึกษา</title>
    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

<script>
    const student_id = "<?php echo $_REQUEST['student_id'] ?>";
</script>

    
<?php 
    $stmt = $pdo->query("select * from student where student_id = ".$_REQUEST['student_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <form action="poststudent_edit.php" method="post" class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">แก้ไขข้อมูลนักศึกษา</h2>

            <h4 class="title-main">บัญชีผู้ใช้ (รหัสนักศึกษา)</h4>
            <!-- <div class="form-control">
                <p>บัญชีผู้ใช้</p>
                <input type="hidden" value="<?php echo $row['student_id'] ; ?>" name="student_id" class="txt-input" placeholder="กรอกบัญชีผู้ใช้">
                <input type="text" value="<?php echo $row['username'] ; ?>" name="username" class="txt-input" placeholder="กรอกบัญชีผู้ใช้">
            </div> -->

            <div class="form-control">
                <p>รหัสนักศึกษา</p>
                <input type="hidden" value="<?php echo $row['student_id'] ; ?>" name="student_id" class="txt-input" placeholder="กรอกบัญชีผู้ใช้" >
                <input type="text" value="<?php echo $row['username'] ; ?>" name="username" class="txt-input" placeholder="กรอกบัญชีผู้ใช้" required readonly>
            </div>

            <div class="form-control">
                <p>รหัสผ่าน</p>
                <input type="password"   name="password" class="txt-input" placeholder="กรอกรหัสผ่าน">
            </div>


            <h4 class="mt-50 title-main">ข้อมูลส่วนตัว</h4>
            <div class="form-control">
                <p>คำนำหน้า</p>
                <select class="sel sel-input" name="tname" required>
                    <option value="<?php echo $row['tname'] ; ?>"><?php echo $row['tname'] ; ?></option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>ชื่อ</p>
                    <input required name="fname" value="<?php echo $row['fname'] ; ?>"  type="text" class="txt-input" placeholder="กรอกชื่อ">
                </div>
                <div class="form-control-items">
                    <p>นามสกุล</p>
                    <input required name="lname" value="<?php echo $row['lname'] ; ?>"  type="text" class="txt-input" placeholder="กรอกนามสกุล">
                </div>
            </div>
            <div class="form-control">
                <p>วัน/เดือน/ปี เกิด</p>
                <input required type="date" value="<?php echo $row['dateofbirth'] ; ?>" name="dateofbirth" class="txt-input" placeholder="กรอกบัญชีผู้ใช้">
            </div>
            <div class="form-control">
                <p>รหัสนักศึกษา</p>
                <input required type="text" value="<?php echo $row['student_card'] ; ?>" name="student_card" class="txt-input" placeholder="รหัสนักศึกษา" readonly>
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>คณะ</p>
                    <select id="sel_faculty" name="faculty" required class="sel sel-input" style="width: 100%;">

                    </select>
                </div>
                <div class="form-control-items">
                    <p>สาขาวิชา</p>
                    <select id="sel_department" required name="field" class="sel sel-input" style="width: 100%;">
                        <option value=''>--- โปรดเลือกคณะก่อน ---</option>
                    </select>
                </div>
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>อีเมล</p>
                    <input name="email" required value="<?php echo $row['email'] ; ?>" type="email" class="txt-input" placeholder="กรอกอีเมล">
                </div>
                <div class="form-control-items">
                    <p>เบอร์โทรศัพท์</p>
                    <input name="tel" required value="<?php echo $row['tel'] ; ?>"  type="text" class="txt-input" placeholder="กรอกเบอร์โทรศัพท์">
                </div>
            </div>


            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                <a href="student_manage.php" class="btn btn-danger"><i class="fas fa-times-circle"></i>ยกเลิก</a>
            </div>

        </div>
    </form>
    <?php 
    }
    ?>

    <script>
        var fac = 0;
        var field = 0;
        var data_fac = ''
        var data_field = '';
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./../api/admin/get_student.php",
                data: {
                    student_id: student_id
                },
                success: function(response) {
                    console.log("good stu", response)
                    fac = response.result[0].faculty;
                    field = response.result[0].field;
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "./../api/admin/get_faculty.php",
                        data: {},
                        success: function(response) {
                            console.log("good fac", response)
                            data_fac = response.result;
                            var html = `<option value=''>--- เลือกคณะ ---</option>`;
                            for(var i=0; i<data_fac.length; i++) {
                                html += `<option value="${data_fac[i].selection_id}">${data_fac[i].data_select}</option>`;
                            }
                            $("#sel_faculty").html(html)
                            $("#sel_faculty").val(fac)
                        }, error: function(err) {
                            console.log("bad", err)
                        }
                    })

                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "./../api/admin/get_department.php",
                        data: {
                            faculty_id: fac
                        },
                        success: function(response) {
                            console.log("good dep", response)
                            data_field = response.result;
                            var html = `<option value=''>--- เลือกสาขา ---</option>`;
                            for(var i=0; i<data_field.length; i++) {
                                html += `<option value="${data_field[i].selection_sup_id}">${data_field[i].data_select}</option>`;
                            }
                            $("#sel_department").html(html)
                            $("#sel_department").val(field)
                        }, error: function(err) {
                            console.log("bad", err)
                        }
                    })
                }, error: function(err) {
                    console.log("bad", err)
                }
            })

            // setTimeout(() => {
            //     $.ajax({
            //         type: "POST",
            //         dataType: "JSON",
            //         url: "./../api/admin/get_faculty.php",
            //         data: {},
            //         success: function(response) {
            //             console.log("good fac", response)
            //             var html = `<option value=''>--- เลือกคณะ ---</option>`;
            //             for(var i=0; i<response.result.length; i++) {
            //                 html += `<option value="${response.result[i].selection_id}">${response.result[i].data_select}</option>`;
            //             }
            //             $("#sel_faculty").html(html)
            //             $("#sel_faculty").val(fac)
            //         }, error: function(err) {
            //             console.log("bad", err)
            //         }
            //     })

            //     $.ajax({
            //         type: "POST",
            //         dataType: "JSON",
            //         url: "./../api/admin/get_department.php",
            //         data: {
            //             faculty_id: fac
            //         },
            //         success: function(response) {
            //             console.log("good dep", response)
            //             var html = `<option value=''>--- เลือกสาขา ---</option>`;
            //             for(var i=0; i<response.result.length; i++) {
            //                 html += `<option value="${response.result[i].selection_sup_id}">${response.result[i].data_select}</option>`;
            //             }
            //             $("#sel_department").html(html)
            //             $("#sel_department").val(field)
            //         }, error: function(err) {
            //             console.log("bad", err)
            //         }
            //     })
            // }, 1000);

            
        })

        $("#sel_faculty").change(() => {
            if($("#sel_faculty").val() != "") {
                $("#sel_department").removeAttr("disabled")
                faculty_id = $("#sel_faculty").val()
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: "./../api/admin/get_department.php",
                    data: {
                        faculty_id: faculty_id
                    },
                    success: function(response) {
                        console.log("good", response)
                        var html = `<option value=''>--- เลือกสาขา ---</option>`;
                        for(var i=0; i<response.result.length; i++) {
                            console.log(response.result[i].data_select)
                            html += `<option value="${response.result[i].selection_sup_id}">${response.result[i].data_select}</option>`;
                        }
                        $("#sel_department").html(html)
                    }, error: function(err) {
                        console.log("bad", err)
                    }
                })
            }
            else {
                $("#sel_department").attr("disabled", "disabled")
            }
            
        })
    </script>
</body>
</html>