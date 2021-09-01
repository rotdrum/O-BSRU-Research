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

    

    <form class="main" action="poststudent_add.php" method="post" >
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">เพิ่มข้อมูลนักศึกษา</h2>

            <h4 class="mt-50 title-main">ข้อมูลส่วนตัว</h4>
            <div class="form-control">
                <p>คำนำหน้า</p>
                <select class="sel sel-input" name="tname" required>
                    <option value="">--- เลือก ---</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>ชื่อ</p>
                    <input required name="fname" type="text" class="txt-input" placeholder="กรอกชื่อ">
                </div>
                <div class="form-control-items">
                    <p>นามสกุล</p>
                    <input required name="lname" type="text" class="txt-input" placeholder="กรอกนามสกุล">
                </div>
            </div>
            <div class="form-control">
                <p>เดือน/วัน/ปี เกิด</p>
                <input type="date" required name="dateofbirth" class="txt-input" >
            </div>
            
            <div class="form-control">
                <p>รหัสนักศึกษา</p>
                <input required id="student_card" name="student_card"  onchange="myFunction()" type="number" class="txt-input" placeholder="กรอกรหัสนักศึกษา" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13">
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>คณะ</p>
                    <select id="sel_faculty" required name="faculty" class="txt-input">
               
                    </select>
                    <!-- <input required name="faculty" type="text" class="txt-input" placeholder="กรอกคณะ"> -->
                </div>
                <div class="form-control-items">
                    <p>สาขาวิชา</p>
                    <select id="sel_department" required name="field" class="txt-input" disabled>
                        <option value=''>--- โปรดเลือกคณะก่อน ---</option>
                    </select>
                    <!-- <input required name="field" type="text" class="txt-input" placeholder="กรอกสาขาวิชา"> -->
                </div>
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>อีเมล</p>
                    <input required id="email" name="email" type="email" class="txt-input" placeholder="กรอกอีเมล">
                </div>
                <div class="form-control-items">
                    <p>เบอร์โทรศัพท์</p>
                    <input required name="tel" id="tel" type="text" class="txt-input" placeholder="กรอกเบอร์โทรศัพท์">
                    <input required type="hidden" id="date" name="create_up" value="<?php echo date("M j, Y"); ?>">
                </div> 
            </div>

            <h4 class="title-main">บัญชีผู้ใช้</h4>
            <div class="form-control">
                <p>บัญชีผู้ใช้ (รหัสนักศึกษา)</p>
                <input type="text" required id="username"  name="username" class="txt-input" placeholder="กรอกบัญชีผู้ใช้" readonly>
            </div>
            <div class="form-control">
                <p>รหัสผ่าน</p>
                <input type="password" required name="password" class="txt-input" placeholder="กรอกรหัสผ่าน">
                <p>*** หมายเหตุ ตั้งรหัสผ่านกลาง เพื่อให้นักศึกษาตั้งรหัสเพื่อเข้าใช้งานอีกรอบ</p>
           </div>
            


            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                <a href="student_manage.php" class="btn btn-danger"><i class="fas fa-times-circle"></i>ยกเลิก</a>
            </div>

        </div>
    </form>


    <script>
        $("#student_card").blur(() => {
            getusername()
        })
        $("#email").blur(() => {
            getusername()
        })

        $("#tel").mask("999-999-9999")

        var faculty_id = 0;
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./../api/admin/get_faculty.php",
                data: {},
                success: function(response) {
                    console.log("good", response)
                    var html = `<option value=''>--- เลือกคณะ ---</option>`;
                    for(var i=0; i<response.result.length; i++) {
                        console.log(response.result[i].data_select)
                        html += `<option value="${response.result[i].selection_id}">${response.result[i].data_select}</option>`;
                    }
                    $("#sel_faculty").html(html)
                }, error: function(err) {
                    console.log("bad", err)
                }
            })
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

        function getusername() {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./../api/admin/get_username.php",
                data: {}, success: function(response) {
                    console.log("good", response)
                    for(var i=0; i<response.result.length; i++) {
                        if(response.result[i].username == $("#student_card").val()) {
                            Swal.fire({
                                icon: 'error',
                                title: 'รหัสนักศึกษาซ้ำ',
                                text: 'โปรดตรวจสอบอีกครั้ง'
                            })
                            $("#student_card").val("")
                            $("#username").val("")
                        }
                        if(response.result[i].email == $("#email").val()) {
                            Swal.fire({
                                icon: 'error',
                                title: 'อีเมลซ้ำ',
                                text: 'โปรดตรวจสอบอีกครั้ง'
                            })
                            $("#email").val("")
                        }
                    }
                }, error: function(err) {
                    console.log("bad", err)
                }
            })
        }

        function myFunction() {
            var x = document.getElementById("student_card").value;
            document.getElementById("username").value = document.getElementById("student_card").value;
        }
    </script>

</body>
</html>