<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มประเภทบัณฑิตนิพนธ์</title>
    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

    
    <form method="post" action="postmore_add.php" class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">เพิ่มประเภทบัณฑิตนิพนธ์</h2>

            <div class="form-control">
                <p>ประเภทบัณฑิตนิพนธ์</p>
                <input onkeydown="check_select()" required id="txt_type" type="text" name="data_select" class="txt-input" placeholder="กรอกประเภทบัณฑิตนิพนธ์">
                <input required type="hidden" name="type_select" value="1">
                <input required type="hidden" id="date" name="create_up" value="<?php echo date("M j, Y"); ?>">
            </div>
            

            <div class="btn-control mt-50">
                <button  class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                <a href="more_type.php" class="btn btn-danger"><i class="fas fa-times"></i>ยกเลิก</a>
            </div>

        </div>
    </form>
    
    <script>
        var data_select = []
        
        function check_select() {
            data_select = [];
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./../api/admin/get_select.php",
                success: function(response) {
                    for(var i=0; i<response.result.length; i++) {
                        if(response.result[i].type_select == "1") {
                            data_select.push(response.result[i])
                        }
                    }
                    console.log(data_select)
                    for(var i=0; i<data_select.length; i++) {
                        if($("#txt_type").val() == data_select[i].data_select) {
                            pass = false;
                            Swal.fire({
                                icon: 'error',
                                title: 'ประเภทบัณฑิตนิพนธ์ซ้ำ',
                                text: 'โปรดตรวจสอบใหม่อีกครั้ง'
                            })
                            $("#txt_type").val("")
                        }
                    }
                }, error: function(err) {
                    console.log("bad", err)
                }
            })
        }
    </script>
</body>
</html>