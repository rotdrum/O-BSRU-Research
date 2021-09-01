<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ตารางสอบ</title>
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

    <script>
        const personal_id = "<?php echo $_GET['personal_id']; ?>";
    </script>

    <section class="container" id="section_main">
        <div style="width: 100%; display: flex; align-items: center; color: #adadad; margin-top: 5px; margin-bottom: 20px; cursor: pointer;">
            <p style="color: #601648;">อนุมัติผลการสอบ</p>
        </div>

        

        <!-- <div style="width: 100%; display: flex; align-items: center; justify-content: space-between;">
            <h3 class="text-header">อนุมัติผลการสอบ</h3>
            <div onclick="section_view()" style="width: 150px; height: 40px; border-radius: 5px; cursor: pointer; display: flex; align-items: center; justify-content: center; background: #3498db; color: #fff; margin-left: 10px;">ผลการสอบ</div>
        </div> -->
        <div class="txt-header-manage">
            <h3 class="text-header">อนุมัติผลการสอบก้าวหน้าบัณฑิตนิพนธ์</h3>
            <div class="report-header">
                <a href="examapprove.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select rp-active">ก้าวหน้าบัณฑิตนิพนธ์</a>
                <a href="examapprove_final.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select">ป้องกันบัณฑิตนิพนธ์</a>
                <a onclick="section_view()" class="rp-select" style="cursor: pointer;">รายละเอียดการสอบก้าวหน้า</a>
            </div>
        </div>
        <p id="shownone" style="display: none; width: 100%; text-align: center;">ไม่มีบัณฑิตนิพนธ์ให้อนุมัติผลการสอบ</p>

        <!-- table -->
        <div class="table-scroll" id="table">
            <table class="table table-research">
                <thead>
                    <tr>
                        <th class="w-100">ลำดับ</th>
                        <th class="w-300">ชื่อบัณฑิตนิพนธ์</th>
                        <th class="w-300">นักศึกษา</th>
                        <th class="w-100">ปีการศึกษา</th>
                        <th class="w-200">รายละเอียด</th>
                        <th class="w-200">ติดสินผลสอบ</th>
                    </tr>
                </thead>
                <tbody id="tbody2">
            
                    
                </tbody>
            </table>
        </div>
    </section>

    <section class="container" id="section_view" style="display: none;">
        <div style="width: 100%; display: flex; align-items: center; color: #adadad; margin-bottom: 20px; cursor: pointer;">
            <p onclick="section_main()">อนุมัติผลการสอบ</p>
            <i class="fas fa-chevron-right" style="margin: 10px;"></i>
            <p style="color: #601648;">รายละเอียดการสอบ</p>
        </div>
        <div style="width: 100%; display: flex; align-items: center; justify-content: space-between;">
            <h3 class="text-header">รายละเอียดการสอบ</h3>
        </div>
        <p id="shownone3" style="display: none; width: 100%; text-align: center;">ไม่มีบัณฑิตนิพนธ์สำหรับผลการสอบก้าวหน้า</p>

        <!-- table -->
        <div class="table-scroll" id="table3">
            <table class="table table-research">
            <thead>
                <tr>
                    <th class="w-100">ลำดับ</th>
                    <th class="w-300">ชื่อบัณฑิตนิพนธ์</th>
                    <th class="w-300">นักศึกษา</th>
                    <th class="w-200">วันที่จัดสอบ</th>
                    <th class="w-100">ปีการศึกษา</th>
                    <th class="w-300">ผลการสอบ</th>
                </tr>
            </thead>
            <tbody id="tbody3">
        
                
            </tbody>
            </table>
        </div>
    </section>

    <div id="modal_detail" style="position: fixed; top: 0; left: 0; width: 100%; height: 100vh; display: none; justify-content: center; align-items: center; z-index: 99;">
        <div onclick="$('#modal_detail').hide()"  style="position: fixed; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7);"></div>
        <div style="position: relative; display: flex-direction: column; width: 50%; background: #fff; z-index: 100; padding: 20px; overflow: scroll;">
            <div onclick="$('#modal_detail').hide()" style="position: absolute; top: 5px; right: 15px; font-size: 1.5rem;">
                <i class="fas fa-times"></i>
            </div>
            <p style="font-size: 22px; font-weight: bold; margin-bottom: 10px;">รายละเอียดการสอบก้าวหน้า</p>
            <div style="width: 100%; display: flex; align-items: center; margin: 10px 0;">
                <p style="font-weight: bold; font-size: 18px; width: 200px;">ประธาน</p>
                <div id="view_teacher1" style="width: 400px; padding: 10px; border-radius: 10px; outline: none; border: none; background: #f2f2f2; font-size: 16px;">
                    นายทดสอบ
                </div>
            </div>
            <div style="width: 100%; display: flex; align-items: center; margin: 10px 0;">
                <p style="font-weight: bold; font-size: 18px; width: 200px;">กรรมการ</p>
                <div id="view_teacher2" style="width: 400px; padding: 10px; border-radius: 10px; outline: none; border: none; background: #f2f2f2; font-size: 16px;">
                    นายทดสอบ
                </div>
            </div>
            <div style="width: 100%; display: flex; align-items: center; margin: 10px 0;">
                <p style="font-weight: bold; font-size: 18px; width: 200px;">เลขานุการ</p>
                <div id="view_teacher3" style="width: 400px; padding: 10px; border-radius: 10px; outline: none; border: none; background: #f2f2f2; font-size: 16px;">
                    นายทดสอบ
                </div>
            </div>
            <div style="width: 100%; display: flex; align-items: center; margin: 10px 0;">
                <p style="font-weight: bold; font-size: 18px; width: 200px;">ห้องสอบ</p>
                <div id="view_room" style="width: 400px; padding: 10px; border-radius: 10px; outline: none; border: none; background: #f2f2f2; font-size: 16px;">
                    นายทดสอบ
                </div>
            </div>
            <div style="width: 100%; display: flex; align-items: center; margin: 10px 0;">
                <p style="font-weight: bold; font-size: 18px; width: 200px;">วันที่สอบ</p>
                <div id="view_date" style="width: 400px; padding: 10px; border-radius: 10px; outline: none; border: none; background: #f2f2f2; font-size: 16px;">
                    นายทดสอบ
                </div>
            </div>
            <div style="width: 100%; display: flex; align-items: center; margin: 10px 0;">
                <p style="font-weight: bold; font-size: 18px; width: 200px;">เวลา</p>
                <div id="view_time" style="width: 400px; padding: 10px; border-radius: 10px; outline: none; border: none; background: #f2f2f2; font-size: 16px;">
                    นายทดสอบ
                </div>
            </div>

        </div>
    </div>
  

    <?php include('footer.php'); ?>

    <script>
  


        var xml = '';
        var count = 0;
        midterm = []
        $.ajax({
            type: "POST",
            dataType: "JSON", 
            url: "./api/index/get_exam_by_id.php",
            data: {
                personal_id: personal_id
            }, success: function(response) {
                console.log("list", response)
                var count = 0;
                for(var i=0; i<response.result.length; i++) {
                    if(response.result[i].ex_status == '2') {
                        midterm.push(response.result[i])
                        count++;
                    }
                }
                if(count <= 0 ) {
                    console.log("2 none")
                    $("#table").hide()
                    $("#shownone").show()
                }
                for(var i=0; i<midterm.length; i++) {
                    xml += `
                    <tr>
                        <td>
                            <p class="p-td-center">${i+1}</p>
                        </td>
                        <td>
                            <p>${midterm[i].name_th}</p>
                        </td>
                        <td>
                            <p>${midterm[i].student_one}</p>
                    `;
                        if(midterm[i].student_two == "" || midterm[i].student_two == null) {
                            xml += ``;
                        } else { xml+= `<p>${midterm[i].student_two}</p>`; }
                            xml += `
                        </td>
                        <td>
                            <p class="p-td-center">${midterm[i].year}</p>
                        </td>
                        <td>
                            <a onclick="modal_detail(${i})" href="#" class="btn btn-info">รายละเอียด</a>
                        </td>
                        <td>
                            <a onclick="midterm_exam(${midterm[i].research_id})" href="#" class="btn btn-success">ตัดสินผลสอบ</a>
                        </td>
                    </tr>
                    `;
                }
                $("#tbody2").html(xml)
                console.log("midterm", midterm)
            }, error: function(err) {
                console.log("bad", err)
            }
        })

        function modal_detail(index) {
            $("#modal_detail").css("display", "flex")
            $("#view_teacher1").text(midterm[index].teacher1)
            $("#view_teacher2").text(midterm[index].teacher2)
            $("#view_teacher3").text(midterm[index].teacher3)
            $("#view_room").text(midterm[index].room)
            $("#view_date").text(midterm[index].ex_date1)
            $("#view_time").text(midterm[index].ex_time1)
        }

        function midterm_exam(id) {
            research_id = id
            Swal.fire({
                icon: 'info',
                html: `
                    <h1>ตัดสินผลการสอบ</h1>
                    <div style="width: 100%; display: flex; align-items: center; justify-content: space-between; margin-top: 20px;">
                        <div onclick="exam_pass()" style="width: 130px; height: 40px; border-radius: 5px; cursor: pointer; display: flex; justify-content: center; align-items: center; background: #1abc9c; color: #fff;"><i class="fas fa-check" style="margin-right: 10px;"></i> ผ่าน</div>
                        <div onclick="exam_condition()" style="width: 170px; height: 40px; border-radius: 5px; cursor: pointer; display: flex; justify-content: center; align-items: center; background: #f1c40f; color: #fff;"><i class="fas fa-exclamation" style="margin-right: 10px;"></i> ผ่านแบบมีเงื่อนไข</div>
                        <div onclick="exam_fail()" style="width: 130px; height: 40px; border-radius: 5px; cursor: pointer; display: flex; justify-content: center; align-items: center; background: #e74c3c; color: #fff;"><i class="fas fa-times" style="margin-right: 10px;"></i> ไม่ผ่าน</div>
                    </div>
                `
            })
        }

        function exam_pass() {
        $.ajax({
            type: "POST",
            dataType: "JSON", 
            url: "./api/admin/update_midterm.php",
            data: {
                research_id: research_id,
                ex_status: '4'
            }, success: function(response) {
                console.log("good", response)
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ',
                    text: 'โปรดตรวจสอบข้อมูลที่หน้าผลการสอบ'
                })
                setTimeout(() => {
                    location.reload()
                },1000)
            }, error: function(err) {
                console.log("bad", err)
            }
        })
    }
    function exam_condition() {
        $.ajax({
            type: "POST",
            dataType: "JSON", 
            url: "./api/admin/update_midterm.php",
            data: {
                research_id: research_id,
                ex_status: '3'
            }, success: function(response) {
                console.log("good", response)
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ',
                    text: 'โปรดตรวจสอบข้อมูลที่หน้าผลการสอบ'
                })
                setTimeout(() => {
                    location.reload()
                },1000)
            }, error: function(err) {
                console.log("bad", err)
            }
        })
    }
    function exam_fail() {
        $.ajax({
            type: "POST",
            dataType: "JSON", 
            url: "./api/admin/update_midterm.php",
            data: {
                research_id: research_id,
                ex_status: '0'
            }, success: function(response) {
                console.log("good", response)
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ',
                    text: 'โปรดตรวจสอบข้อมูลที่หน้าผลการสอบ'
                })
                setTimeout(() => {
                    location.reload()
                },1000)
            }, error: function(err) {
                console.log("bad", err)
            }
        })
    }

        function section_view() {
            $("#section_main").css("display", 'none');
            $("#section_view").css("display", 'block');
            var http = '';
            var view = []
            $.ajax({
                type: "POST",
                dataType: "JSON", 
                url: "./api/admin/get_exam_step1_done.php",
                data: {
                }, success: function(response) {
                    console.log("done", response)
                    for(var i=0; i<response.result.length; i++) {
                        if(response.result[i].ex_status != '0' && response.result[i].ex_status != '2') {
                            view.push(response.result[i])
                        }
                    }
                    console.log("view", view)
                    var count = 0;
                    for(var i=0; i<view.length; i++) {
                        count++;
                        http += `
                        <tr>
                            <td>
                                <p class="p-td-center">${i+1}</p>
                            </td>
                            <td>
                                <p>${view[i].name_th}</p>
                            </td>
                            <td>
                                <p>${view[i].student_one}</p>
                        `;
                            if(view[i].student_two == "" || view[i].student_two == null) {
                                http += ``;
                            } else { http += `<p>${view[i].student_two}</p>`; }
                                http += `
                            </td>
                            <td>
                                <p class="p-td-center">${view[i].ex_date1}</p>
                                <p class="p-td-center">เวลา ${view[i].ex_time1} น.</p>
                            </td>
                            <td>
                                <p class="p-td-center">${view[i].year}</p>
                            </td>
                            <td>
                        `;
                            if(view[i].ex_status >= "4") {
                                http += `<p class="color-success p-td-center" style="font-weight: bold;"><i class="fas fa-check"></i> ผ่านการสอบ</p>`;
                            } else if(view[i].ex_status == "3") {
                                http += `<p class="color-warning p-td-center" style="font-weight: bold;"><i class="fas fa-check"></i> ผ่านแบบมีเงื่อนไข <span onclick="approvelater(${view[i].research_id})" style="color: #fff; padding: 5px 5px; border-radius: 5px; background: #3498db; cursor: pointer; margin-left: 10px;">อนุมัติ</span> </p>`;
                            }
                            http += `
                            </td>
                        </tr>
                        `;
                    }
                    if(count <= 0 ) {
                            console.log("3 none")
                            $("#table3").hide()
                            $("#shownone3").show()
                        }
                    $("#tbody3").html(http)
                    console.log("midterm_done", view)
                }, error: function(err) {
                    console.log("bad", err)
                }
            })
        }

        function section_main() {
            $("#section_main").css("display", 'block');
            $("#section_view").css("display", 'none');
        }

        function approvelater(id) {
            Swal.fire({
                icon: 'warning',
                title: 'ต้องการจะอนุมัติ?',
                showDenyButton: false,
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: `อนุมัติ`,
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "./api/admin/update_midterm_approvelater.php",
                        data: {
                            research_id: id,
                            ex_status: '4'
                        }, success: function(response) {
                            console.log("good", response)
                            Swal.fire({
                                icon: 'success',
                                title: 'อนุมัติสำเร็จ',
                                text: 'โปรดตรวจสอบสถานะการสอบได้ที่เมนูผลสอบ'
                            })
                            setTimeout(() => {
                                location.reload()
                            }, 1000);
                        }, error: function(err) {
                            console.log("err", err)
                        }
                    })
                } 
            })
        }
    </script>

</body>

</html>