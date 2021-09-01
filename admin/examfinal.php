<?php include('./session.php'); ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดตารางสอบ</title>


    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://รับเขียนโปรแกรม.net/jquery_datepicker_thai/jquery-ui.js"></script>



</head>
<body>
    <?php include('navbar.php'); ?>
    

    <section  class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div id="section_main" class="dashboard">
            <div style="width: 100%; display: flex; align-items: center; justify-content: space-between;">
                <h2 class="dashboard-title">จัดตารางสอบสอบป้องกันบัณฑิตนิพนธ์</h2>
                <div style="display: flex; align-items: center;">
                    <div onclick="section_detail()" style="width: 150px; height: 40px; border-radius: 5px; cursor: pointer; display: flex; align-items: center; justify-content: center; background: #1abc9c; color: #fff;">รายละเอียดการสอบ</div>
                    <div onclick="section_view()" style="width: 150px; height: 40px; border-radius: 5px; cursor: pointer; display: flex; align-items: center; justify-content: center; background: #3498db; color: #fff; margin-left: 10px;">ผลการสอบ</div>
                </div>
            </div>
            <p id="shownone" style="width: 100%; text-align: center; display: none; ">ไม่มีบัณฑิตนิพนธ์สำหรับการจัดสอบสอบป้องกันบัณฑิตนิพนธ์</p>
            
            <!-- table -->
            <div class="table-scroll" id="show2">
                <table class="table table-research" id="myTable">
                    <thead>
                        <tr>
                            <th class="w-100">ลำดับ</th>
                            <th class="w-300">ชื่อบัณฑิตนิพนธ์</th>
                            <th class="w-300">นักศึกษา</th>
                            <th class="w-100">ปีการศึกษา</th>
                            <th class="w-200">รายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                
                        
                    </tbody>
                </table>
            </div>
        </div>

        <div id="section_detail" class="dashboard" style="display: none;">
            <div style="display: flex; align-items: center; margin-bottom: 20px;">
                <i onclick="section_main()" class="fas fa-chevron-left" style="cursor: pointer; font-size: 1.3rem; margin-right: 10px;"></i>
                <h2 class="dashboard-title" style="margin: 0; margin-bottom: 5px;">รายละเอียดการสอบสอบป้องกันบัณฑิตนิพนธ์</h2>
            </div>
            <p id="shownone2" style="width: 100%; text-align: center; display: none; ">ไม่มีบัณฑิตนิพนธ์การสอบสอบป้องกันบัณฑิตนิพนธ์</p>
           
            <!-- table -->
            <div class="table-scroll" id="table2">
                <table class="table table-research" >
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

        </div>

        <div id="section_view" class="dashboard" style="display: none;">
            <div style="display: flex; align-items: center; margin-bottom: 20px;">
                <i onclick="section_main()" class="fas fa-chevron-left" style="cursor: pointer; font-size: 1.3rem; margin-right: 10px;"></i>
                <h2 class="dashboard-title" style="margin: 0; margin-bottom: 5px;">ผลการสอบสอบป้องกันบัณฑิตนิพนธ์</h2>
            </div>
            <p id="shownone3" style="width: 100%; text-align: center; display: none;">ไม่มีบัณฑิตนิพนธ์สำหรับผลการสอบสอบป้องกันบัณฑิตนิพนธ์</p>
           
            <!-- table -->
            <div class="table-scroll" id="table3">
                <table class="table table-research" >
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

        </div>
    </section>

    <div id="modal_detail" style="position: fixed; top: 0; left: 0; width: 100%; height: 100vh; display: none; justify-content: center; align-items: center; z-index: 99;">
        <div onclick="$('#modal_detail').hide()"  style="position: fixed; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7);"></div>
        <div style="position: relative; display: flex-direction: column; width: 50%; background: #fff; z-index: 100; padding: 20px; overflow: scroll;">
            <div onclick="$('#modal_detail').hide()" style="position: absolute; top: 5px; right: 15px; font-size: 1.5rem;">
                <i class="fas fa-times"></i>
            </div>
            <p style="font-size: 22px; font-weight: bold; margin-bottom: 10px;">รายละเอียดการสอบป้องกัน</p>
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


    <div id="modal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100vh; display: none; justify-content: center; align-items: center; z-index: 99;">
    <div onclick="$('#modal').hide()"  style="position: fixed; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7);"></div>
        <div style="position: relative; display: flex-direction: column; width: 50%; height: 80%; background: #fff; z-index: 100; padding: 20px; overflow: scroll;">
            <div onclick="$('#modal').hide()" style="position: absolute; top: 5px; right: 15px; font-size: 1.5rem;">
                <i class="fas fa-times"></i>
            </div>


            <p style="font-size: 22px; font-weight: bold; margin-bottom: 10px;">จัดตารางสอบ</p>
            <hr style="margin-bottom: 20px;">
            <div style="width: 100%; display: flex; align-items: center; margin: 10px 0;">
                <p style="font-weight: bold; font-size: 18px; width: 200px;">ประธาน</p>
                <select id="set_teacher1" style="width: 200px; padding: 10px; border-radius: 10px; outline: none; border: none; background: #f2f2f2; font-size: 16px;">
                </select>
            </div>
            <div style="width: 100%; display: flex; align-items: center; margin: 10px 0;">
                <p style="font-weight: bold; font-size: 18px; width: 200px;">กรรมการ</p>
                <select id="set_teacher2" style="width: 200px; padding: 10px; border-radius: 10px; outline: none; border: none; background: #f2f2f2; font-size: 16px;">
                </select>
            </div>
            <div style="width: 100%; display: flex; align-items: center; margin: 10px 0;">
                <p style="font-weight: bold; font-size: 18px; width: 200px;">เลขานุการ</p>
                <select id="set_teacher3" style="width: 200px; padding: 10px; border-radius: 10px; outline: none; border: none; background: #f2f2f2; font-size: 16px;">
                </select>
            </div>
            <div style="width: 100%; display: flex; align-items: center; margin: 10px 0;">
                <p style="font-weight: bold; font-size: 18px; width: 200px;">เลือกห้องสอบ</p>
                <select id="set_room" style="width: 200px; padding: 10px; border-radius: 10px; outline: none; border: none; background: #f2f2f2; font-size: 16px;">
                   
                </select>
            </div>
            <div style="width: 100%; display: flex; align-items: center; margin: 10px 0;">
                <p style="font-weight: bold; font-size: 18px; width: 200px;">เลือกวันที่จัดสอบ</p>
                <input type="text" id="dateexam" placeholder="DD/MM/YYYY" style="width: 200px; padding: 10px; border-radius: 10px; outline: none; border: none; background: #f2f2f2; font-size: 16px;">
            </div>
            <div style="width: 100%; display: flex; align-items: center; margin: 10px 0;">
                <p style="font-weight: bold; font-size: 18px; width: 200px;">เลือกเวลา</p>
                <input type="time" id="timeexam" placeholder="00:00" style="width: 200px; padding: 10px; border-radius: 10px; outline: none; border: none; background: #f2f2f2; font-size: 16px;">
            </div>
            <div style="width: 100%; display: flex; align-items: center; margin-top: 20px;">
                <div onclick="save_exam()" style="margin-left: 200px; width: 95px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 5px; cursor: pointer; font-size: 16px; background: #1abc9c; color: #fff; margin-right: 10px;">ยืนยัน</div>
                <div onclick="$('#modal').hide()" style="width: 95px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 5px; cursor: pointer; font-size: 16px; background: #f2f2f2; color: #000;">ยกเลิก</div>
            </div>

<br><br>

            <p style="font-size: 22px; font-weight: bold; margin-bottom: 10px;">รายละเอียด</p>
            <hr>
            <h4 class="title-main" style="margin-top: 30px;">เกี่ยวกับบัณฑิตนิพนธ์</h4>
            <div class="approve-control">
                <div class="approve-control-items">
                    <h4>ชื่อบัณฑิตนิพนธ์ (ภาษาไทย)</h4>
                    <p id="research_th">-</p>
                </div>
                <div class="approve-control-items">
                    <h4>ชื่อบัณฑิตนิพนธ์ (ภาษาอังกฤษ)</h4>
                    <p id="research_en">-</p>
                </div>
            </div>
            <div class="approve-control">
                <div class="approve-control-items">
                    <h4>ประเภทบัณฑิตนิพนธ์</h4>
                    <p id="research_type">-</p>
                </div>
                <div class="approve-control-items">
                    <h4>ภาคเรียน</h4>
                    <p id="research_term">-</p>
                </div>
            </div>
            <div class="approve-control">
                <div class="approve-control-items">
                    <h4>ปีการศึกษา</h4>
                    <p id="research_year">-</p>
                </div>
            </div>

            <h4 class="title-main" style="margin-top: 50px;">อาจารย์ที่ปรึกษา</h4>
            <div class="approve-control">
                <div class="approve-control-items">
                    <h4>อาจารย์ที่ปรึกษาหลัก</h4>
                    <p id="research_personal_main">-</p>
                </div>
                <div class="approve-control-items">
                    <h4>อาจารย์ที่ปรึกษาร่วม</h4>
                    <p id="research_personal_sub">-</p>
                </div>
            </div>

            <h4 class="title-main" style="margin-top: 50px;">คณะผู้จัดทำ</h4>
            <div class="approve-control">
                <div class="approve-control-items">
                    <h4>คณะผู้จัดทำคนที่ 1</h4>
                    <p id="research_student_main">-</p>
                </div>
                <div id="student_two" class="approve-control-items">
                    <h4>คณะผู้จัดทำคนที่ 2</h4>
                    <p id="research_student_sub">-</p>
                </div>
            </div>
           
        </div>
    </div>
</body>


<script>
    var teacher;
    var examall = '';
    var examdata = [];
    var resall = '';
    var resdata = [];
    var superdata = [];
    var midterm = [];
    var html = '';
    var xml = ''
    var option = '<option value="">--- เลือก ---</option>';
    var counter = 0;
    var now_date;
    $(document).ready(function() {
        now_date = new Date().getDate()+'/'+(new Date().getMonth()+1)+'/'+new Date().getFullYear();
        new_date = '';
        set_cal( $("#dateexam"), new_date);

        $.ajax({
            type: "POST", 
            dataType: "JSON",
            url: "./../api/admin/get_teacher.php",
            data: {},
            success: function(response) {
                teacher = response.result
                console.log("teacher", teacher)
                for(var i=0; i<teacher.length; i++) {
                    option += `
                        <option value="${teacher[i].name}">${teacher[i].name}</option>
                    `;
                }
                $("#set_teacher1").html(option)
                $("#set_teacher2").html(option)
                $("#set_teacher3").html(option)
            }, error: function(err) {
                console.log("error", err)
            }
        })

        $.ajax({
            type: "POST", 
            dataType: "JSON",
            url: "./../api/admin/get_exam.php",
            data: {},
            success: function(response) {
                for(var i=0; i<response.result.length; i++) {
                    if(response.result[i].status3 == "2" && (response.result[i].ex_status == "3" || response.result[i].ex_status == "4")) {
                        superdata.push(response.result[i])
                        counter++;
                    }
                }
                console.log("superdata", superdata)
                if(counter <= 0) {
                    $("#show1").hide()
                    $("#show2").hide()
                    $("#shownone").show()
                } else {
                    render()
                }
            }, error: function(err) {
                console.log("error", err)
            }
        })

        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "./../api/admin/get_roomexam.php",
            data: {},
            success: function(response) {
                var selection = '<option value="">--- เลือก ---</option>';
                console.log("good", response)
                for(var i=0; i<response.result.length; i++) {
                    selection += `<option value="${response.result[i].data_select}">${response.result[i].data_select}</option>`;
                }
                $("#set_room").html(selection)
            }, error: function(err) {
                console.log("bad", err)
            }
        })


    })

    function render() {
        html = '';
        for(var i=0; i<superdata.length; i++) {
            html += `
            <tr>
                <td>
                    <p class="p-td-center">${i+1}</p>
                </td>
                <td>
                    <p>${superdata[i].name_th}</p>
                </td>
                <td>
                    <p>${superdata[i].student_one}</p>
            `;
                if(superdata[i].student_two == "" || superdata[i].student_two == null) {
                    html += ``;
                } else { html+= `<p>${superdata[i].student_two}</p>`; }
                    html += `
                </td>
                <td>
                    <p class="p-td-center">${superdata[i].year}</p>
                </td>
                <td>
                    <a onclick="modal_setexam(${superdata[i].research_id})" href="#" class="btn btn-success">จัดตารางสอบ</a>
                </td>
            </tr>
            `;
        }
        $("#tbody").html(html)
    }
    var research_id = 0;
    function modal_setexam(id) {
        research_id = id
        $("#set_teacher1").val("")
        $("#set_teacher2").val("")
        $("#set_teacher3").val("")
        
        $("#modal").css("display", "flex")
        $.ajax({
            type: "POST",
            dataType: "JSON", 
            url: "./../api/admin/get_exam_step1_detail.php",
            data: {
                id: id
            }, success: function(response) {
                console.log("good", response)
                // $("#set_teacher1").val(response.result[0].personal_main)
                // $("#set_teacher2").val(response.result[1].personal_sub)
                $("#research_th").text(response.result[0].name_th)
                $("#research_en").text(response.result[0].name_eng)
                $("#research_type").text(response.result[0].types)
                $("#research_term").text(response.result[0].term)
                $("#research_year").text(response.result[0].year)
                $("#research_personal_main").text(response.result[0].personal_main)
                $("#research_personal_sub").text(response.result[1].personal_sub)
                $("#research_student_main").text(response.result[0].student_one)
                response.result[0].student_two == "" ? $("#student_two").hide() : $("#research_student_sub").text(response.result[0].student_two);
            }, error: function(err) {
                console.log("bad", err)
            }
        })
    }

    function section_main() {
        $(".dashboard").css("display", "none")
        $("#section_main").css("display", "block")
    }
    function section_detail() {
        xml = '';
        midterm = []
        console.log("clear data")
        $("#section_main").css("display", "none")
        $("#section_detail").css("display", "block")
        $.ajax({
            type: "POST",
            dataType: "JSON", 
            url: "./../api/admin/get_exam.php",
            data: {
            }, success: function(response) {
                console.log("good", response)
                var count = 0;
                for(var i=0; i<response.result.length; i++) {
                    if(response.result[i].ex_status == '5') {
                        midterm.push(response.result[i])
                        count++;
                    }
                }
                if(count <= 0 ) {
                    console.log("2 none")
                    $("#table2").hide()
                    $("#shownone2").show()
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
    }
    function section_view() {
        var http = '';
        var view = []
        $(".dashboard").css("display", "none")
        $("#section_view").css("display", "block")
        $.ajax({
            type: "POST",
            dataType: "JSON", 
            url: "./../api/admin/get_exam_step1_done.php",
            data: {
            }, success: function(response) {
                console.log("done", response)
                for(var i=0; i<response.result.length; i++) {
                    if(response.result[i].ex_status == '6' || response.result[i].ex_status == '7') {
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
                            <p class="p-td-center">${view[i].ex_date2}</p>
                            <p class="p-td-center">เวลา ${view[i].ex_time2} น.</p>
                        </td>
                        <td>
                            <p class="p-td-center">${view[i].year}</p>
                        </td>
                        <td>
                    `;
                        if(view[i].ex_status >= "7") {
                            http += `<p class="color-success p-td-center" style="font-weight: bold;"><i class="fas fa-check"></i> ผ่านการสอบ</p>`;
                        } else if(view[i].ex_status == "6") {
                            http += `<p class="color-warning p-td-center" style="font-weight: bold;"><i class="fas fa-check"></i> ผ่านแบบมีเงื่อนไข <span onclick="approvelater(${view[i].research_id})" style="color: #fff; padding: 5px 5px; border-radius: 5px; background: #3498db; cursor: pointer; margin-left: 10px;">อนุมัติ</span></p>`;
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
                    url: "./../api/admin/update_midterm_approvelater.php",
                    data: {
                        research_id: id,
                        ex_status: '7'
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
            url: "./../api/admin/update_midterm.php",
            data: {
                research_id: research_id,
                ex_status: '7'
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
            url: "./../api/admin/update_midterm.php",
            data: {
                research_id: research_id,
                ex_status: '6'
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
            url: "./../api/admin/update_midterm.php",
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
    
    function modal_detail(index) {
        $("#modal_detail").css("display", "flex")
        $("#view_teacher1").text(midterm[index].teacher1)
        $("#view_teacher2").text(midterm[index].teacher2)
        $("#view_teacher3").text(midterm[index].teacher3)
        $("#view_room").text(midterm[index].room)
        $("#view_date").text(midterm[index].ex_date2)
        $("#view_time").text(midterm[index].ex_time2)
    }

    function validate() {
        var pass = true
        if($("#set_teacher1").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'โปรดเลือกประธาน'
            })
            pass = false
        } else if($("#set_teacher2").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'โปรดเลือกกรรมการ'
            })
            pass = false
        } else if($("#set_teacher3").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'โปรดเลือกเลขานุการ'
            })
            pass = false
        } else if($("#set_teacher1").val() == $("#set_teacher2").val()) {
            Swal.fire({
                icon: 'error',
                title: 'อาจารย์ซ้ำกันโปรดเลือกใหม่'
            })
            $("#set_teacher2").val("")
            pass = false
        } else if($("#set_teacher1").val() == $("#set_teacher3").val()) {
            Swal.fire({
                icon: 'error',
                title: 'อาจารย์ซ้ำกันโปรดเลือกใหม่'
            })
            $("#set_teacher3").val("")
            pass = false
        } else if($("#set_teacher2").val() == $("#set_teacher3").val()) {
            Swal.fire({
                icon: 'error',
                title: 'อาจารย์ซ้ำกันโปรดเลือกใหม่'
            })
            $("#set_teacher3").val("")
            pass = false
        } else if($("#set_room").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'โปรดเลือกห้องสอบ'
            })
            pass = false
        } else if($("#dateexam").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'โปรดเลือกวันสอบ'
            })
            pass = false
        } else if($("#timeexam").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'โปรดกรอกเวลาสอบ'
            })
            pass = false
        }
        return pass
    }

    function save_exam() {
        if(validate()) {
            $.ajax({
                type: "POST",
                dataType: "JSON", 
                url: "./../api/admin/update_examfinal.php",
                data: {
                    research_id: research_id,
                    room: $("#set_room").val(),
                    ex_date: $("#dateexam").val(),
                    ex_time: $("#timeexam").val(),
                    teacher1: $("#set_teacher1").val(),
                    teacher2: $("#set_teacher2").val(),
                    teacher3: $("#set_teacher3").val()
                }, success: function(response) {
                    console.log("good", response)
                    Swal.fire({
                        icon: 'success',
                        title: 'สำเร็จ'
                    })
                    setTimeout(() => {
                        location.reload()
                    }, 1000);
                    $("#modal").css('display','none')
                }, error: function(err) {
                    console.log("bad", err)
                }
            })
        }
    }

    var arr = [], date_text, new_date, flag=0;

    function set_cal(ele) {
    console.log("ele", $(ele).val())
    $( ele ).datepicker({
        onSelect:(date_text) => {
            console.log("onSelect")
            arr=date_text.split("/");
            new_date=arr[0]+"/"+arr[1]+"/"+(parseInt(arr[2])+543).toString();
            $(ele).val(new_date);
            $(ele).css("color","");
        },
        beforeShow:() => {
            console.log("beforeShow")
            if(new_date == '') {
            console.log("null active");
            if($(ele).val()!="") {
                console.log("beforeShow")
                arr=$(ele).val().split("/");
                new_date=arr[0]+"/"+arr[1]+"/"+(parseInt(arr[2])).toString();
                $(ele).val(new_date);
            }
            }
            else {
            console.log("active");
            if($(ele).val()!="") {
                console.log("beforeShow")
                arr=$(ele).val().split("/");
                new_date=arr[0]+"/"+arr[1]+"/"+(parseInt(arr[2])-543).toString();
                $(ele).val(new_date);
            }
            }
            $(ele).css("color","white");
        },
        onClose:() => {
            $(ele).css("color","");
            if($(ele).val()!="") {
                console.log("onClose")
                arr=$(ele).val().split("/");
                if(parseInt(arr[2])<2500)
                {
                    new_date=arr[0]+"/"+arr[1]+"/"+(parseInt(arr[2])+543).toString();
                    $(ele).val(new_date);
                }
                console.log("arr[0]", parseInt(arr[0]), "arr[1]", parseInt(arr[1]), "arr[2]", (parseInt(arr[2])))
                console.log("getDate", new Date().getDate(), "getMonth", (new Date().getMonth()+1), "getFullYear", new Date().getFullYear()+543)
                if((parseInt(arr[2])) > (new Date().getFullYear()+543)) {
                    
                } 
                else if((parseInt(arr[2])) == (new Date().getFullYear()+543)) {
                    console.log("year pass")
                    if(parseInt(arr[1]) < (new Date().getMonth()+1)) {
                        console.log("month <")
                        Swal.fire({
                            icon:'error',
                            title: 'ไม่สำเร็จ',
                            text: 'ไม่สามารถเลือกวันที่ย้อนหลังได้'
                        })
                        $("#dateexam").val("")
                        console.log("3")
                    } else if(parseInt(arr[1]) == (new Date().getMonth()+1)) {
                        console.log("month pass")
                        if(parseInt(arr[0]) < new Date().getDate()) {
                            console.log("date <")
                            Swal.fire({
                                icon:'error',
                                title: 'ไม่สำเร็จ',
                                text: 'ไม่สามารถเลือกวันที่ย้อนหลังได้'
                            })
                            $("#dateexam").val("")
                            console.log("2")
                        }
                    } 
                }
                else {
                    console.log("year <")
                    Swal.fire({
                        icon:'error',
                        title: 'ไม่สำเร็จ',
                        text: 'ไม่สามารถเลือกวันที่ย้อนหลังได้'
                    })
                    $("#dateexam").val("")
                    console.log("1")
                }
                
                // if(parseInt(arr[0]) >= new Date().getDate() && parseInt(arr[1]) >= (new Date().getMonth()+1) && (parseInt(arr[2])) >= (new Date().getFullYear()+543)) {
                //     console.log("good")
                // } else {
                //     Swal.fire({
                //         icon:'error',
                //         title: 'ไม่สำเร็จ',
                //         text: 'ไม่สามารถเลือกวันที่ย้อนหลังได้'
                //     })
                //     $("#dateexam").val("")
                // }
            }
        },
        dateFormat:"dd/mm/yy", //กำหนดรูปแบบวันที่เป็น วัน/เดือน/ปี
        changeMonth:true,//กำหนดให้เลือกเดือนได้
        changeYear:true,//กำหนดให้เลือกปีได้
        showOtherMonths:true,//กำหนดให้แสดงวันของเดือนก่อนหน้าได้
    });
    $(ele).val(new_date);
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