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
          include('session_student.php'); 

            include('student_navbarLogin.php'); 
        }
        else if(isset($_REQUEST['personal_id'])){
          include('session_personal.php'); 

            include('teacher_navbarLogin.php'); 
        }
        else{
            include('navbarNotLogin.php'); 
        }
    ?>

  <section class="container">
        <div class="txt-header-manage">
            <h3 class="text-header">ตารางสอบ</h3>
            <div class="report-header">
            <?php 
                if(isset($_REQUEST['personal_id'])) {
            ?>
                <a href="exam.php?personal_id=<?php echo $_REQUEST['personal_id']; ?>" class="rp-select rp-active" style="cursor: pointer;">ก้าวหน้าบัณฑิตนิพนธ์</a>
                <a href="examfinal.php?personal_id=<?php echo $_REQUEST['personal_id']; ?>" class="rp-select" style="cursor: pointer;">ป้องกันบัณฑิตนิพนธ์</a>
            <?php } else if (isset($_REQUEST['student_id'])) { ?>
                <a href="exam.php?student_id=<?php echo $_REQUEST['student_id']; ?>" class="rp-select rp-active" style="cursor: pointer;">ก้าวหน้าบัณฑิตนิพนธ์</a>
                <a href="examfinal.php?student_id=<?php echo $_REQUEST['student_id']; ?>" class="rp-select" style="cursor: pointer;">ป้องกันบัณฑิตนิพนธ์</a>
            <?php } ?>

            </div>
        </div>

        <p id="shownone" style="display: none; width: 100%; text-align: center;">ไม่มีตารางสอบป้องกันบัณฑิตนิพนธ์</p>

        <!-- table -->
        <div id="table" class="table-scroll">
            <table class="table table-research">
                <thead>
                    <tr>
                        <th class="w-50">ลำดับ</th>
                        <th class="w-150">ชื่อบัณฑิตนิพนธ์</th>
                        <th class="w-200">นักศึกษา</th>
                        <th class="w-200">คณะกรรมการสอบ</th>
                        <th class="w-200">วันเวลาสอบ</th>
                        <th class="w-150">สถานที่สอบ</th>
                    </tr>
                </thead>
                <tbody id='tbody'>
                    
                </tbody>
            </table>
        </div>
    </section>

  

    <?php include('footer.php'); ?>

    <script>
        var data = [];
        var count = 0;
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/index/get_exam.php",
                data: {

                }, success: function(response) {
                    console.log("good", response)
                    for(var i=0; i<response.result.length; i++) {
                        if(response.result[i].ex_status == '2') {
                            data.push(response.result[i])
                            count++;
                        }
                    }
                    if(count <= 0) {
                        $("#shownone").show()
                        $("#table").hide()
                    }
                    console.log("filter", data)
                    render(data)
                }, error: function(err) {
                    console.log("bad", err)
                }
            })
        })

        function render(list) {
            var html = '';
            
            for(var i=0; i<list.length; i++) {
                var dateexam = list[i].ex_date1;
                console.log("step1", dateexam)
                var datearray = dateexam.split("/");
                datearray[2] = String(parseInt(datearray[2]) - 543)
                datearray = `${datearray[1]}/${datearray[0]}/${datearray[2]}`
                console.log("step2", datearray)
                datearray = new Date(datearray)+' '
                console.log("step3", datearray)
                datearray = datearray.split(" ")
                console.log("step4", datearray)
                console.log("-----------------")
                html += `
                    <tr>
                        <td>
                            <p class="p-td-center">${i+1}</p>
                        </td>
                        <td>
                            <p>${list[i].name_th}</p>
                        </td>
                        <td>
                            <p>${list[i].student_one}</p>`;
                            list[i].student_two != "" ? html += `<p>${list[i].student_two}</p>` : "" ;
                html += `
                        </td>
                        <td>
                            <p>${list[i].teacher1}</p>
                            <p>${list[i].teacher2}</p>
                            <p>${list[i].teacher3}</p>
                        </td>
                        <td>
                            <p class="p-td-center">${supernewdateToWordTH(datearray[0], datearray[2], datearray[1], datearray[3])}</p>
                            <p class="p-td-center">เวลา ${list[i].ex_time1} น.</p>
                        </td>
                        <td>
                            <p class="p-td-center">ห้อง ${list[i].room}</p>
                        </td>
                    </tr>
                `;
            }
            $("#tbody").html(html)

        }

        function supernewdateToWordTH(day, date, month, year) {
            if(day == "Sun") day = "วันอาทิตย์"
                else if(day == "Mon") day = "วันจันทร์"
                else if(day == "Tue") day = "วันอังคาร"
                else if(day == "Wed") day = "วันพุธ"
                else if(day == "Thu") day = "วันพฤหัสบดี"
                else if(day == "Fri") day = "วันศุกร์"
                else if(day == "Sat") day = "วันเสาร์"

                if(date == "01") date = "1"
                else if(date == "02") date = "2"
                else if(date == "03") date = "3"
                else if(date == "04") date = "4"
                else if(date == "05") date = "5"
                else if(date == "06") date = "6"
                else if(date == "07") date = "7"
                else if(date == "08") date = "8"
                else if(date == "09") date = "9"

                if(month == "Jan") month = "มกราคม"
                else if(month == "Feb") month = "กุมภาพันธ์"
                else if(month == "Mar") month = "มีนาคม"
                else if(month == "Apr") month = "เมษายน"
                else if(month == "May") month = "พฤษภาคม"
                else if(month == "Jun") month = "มิถุนายน"
                else if(month == "Jul") month = "กรกฎาคม"
                else if(month == "Aug") month = "สิงหาคม"
                else if(month == "Sep") month = "กันยายน"
                else if(month == "Oct") month = "ตุลาคม"
                else if(month == "Nov") month = "พฤศจิกายน"
                else if(month == "Dec") month = "ธันวาคม"

                return `${day}ที่ ${date} ${month} ${year}`
        }
    </script>

</body>

</html>