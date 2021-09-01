<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการคณะ</title>
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
            <div class="moretype_title">
                <h2 class="dashboard-title">จัดการคณะ</h2>
                <a href="more_faculty_add.php" class="btn btn-addtype">
                    เพิ่มคณะ
                </a>
            </div>

            <!-- table -->
            <div class="table-scroll">
                <table class="table table-research" >
                    <thead>
                        <tr>
                            <th class="w-50">ลำดับ</th>
                            <th class="w-300">คณะ</th>
                            <th class="w-100">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
           
                    <?php 
    $count = 1 ;
    $stmt = $pdo->query("select * from selection where type_select = 2 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <tr>
                            <td>
                                <p class="p-td-center"><?php echo $count  ; ?></p>
                            </td>
                            <td>
                                <p><?php echo $row['data_select']  ; ?></p>
                            </td>
                            
                            <td class="btn-td-control">
                                <a  href="more_edit.php?selection_id=<?php echo $row['selection_id']  ; ?>&type_select=<?php echo $row['type_select']  ; ?>" class="btn btn-warning">แก้ไข</a>
                                <a onclick="delete_type(<?php echo $row['selection_id']  ; ?>)"  class="btn btn-danger">ลบ</a>
                            </td>
                        </tr>

                        <?php 
    $count++ ;
    }
            ?>

                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <script>
        var flag = 0;
        function delete_type(del_id) {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: './../api/admin/get_select_sup.php',
                success: function(response) {
                    console.log("good selection sup", response)
                    console.log("del_id", del_id)
                    for(var i=0; i<response.result.length; i++) {
                        console.log("res", response.result[i].selection_id, "del_id", String(del_id))
                        if(flag == 0) {
                            if(parseInt(del_id) == parseInt(response.result[i].selection_id)) {
                                console.log("fail")
                                flag = 1;
                            }
                        }
                    }

                    if(flag == 1) {
                        Swal.fire({
                            icon: "error",
                            title: 'ไม่สำเร็จ',
                            text: 'มีสาขาอยู่ในคณะนี้ ไม่สามารถลบได้'
                        })
                        flag = 0;
                    }
                    else if(flag == 0) {
                        Swal.fire({
                            icon: "success",
                            title: 'สำเร็จ',
                            text: 'ลบคณะสำเร็จ'
                        })
                        flag = 0;
                        $.ajax({
                            type: "POST",
                            dataType: "JSON",
                            url: './../api/admin/delete_faculty.php',
                            data: {
                                id: del_id
                            },
                            success: function(res) {
                                console.log("delete done", res) 
                                Swal.fire({
                                    icon: "success",
                                    title: 'สำเร็จ',
                                    text: 'ลบคณะสำเร็จ'
                                })
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }, error: function(er) {
                                console.log("bad del", er)
                            }
                        })

                    }
                    console.log("flag", flag)
                }, error: function(err) {
                    console.log("bad", err)
                }
            })
        }

        // Swal.fire({
        //                         icon: "error",
        //                         title: 'ไม่สำเร็จ',
        //                         text: 'มีสาขาอยู่ในคณะนี้ ไม่สามารถลบได้'
        //                     })




        // Swal.fire({
        //                         icon: "success",
        //                         title: 'สำเร็จ',
        //                         text: 'ลบคณะสำเร็จ'
        //                     })
                            // $.ajax({
                            //     type: "POST",
                            //     dataType: "JSON",
                            //     url: './../api/admin/delete_faculty.php',
                            //     data: {
                            //         id: select_id
                            //     },
                            //     success: function(res) {
                            //         console.log("delete done", res) 
                            //         Swal.fire({
                            //             icon: "success",
                            //             title: 'สำเร็จ',
                            //             text: 'ลบคณะสำเร็จ'
                            //         })
                            //         setTimeout(() => {
                            //             location.reload();
                            //         }, 1000);
                            //     }, error: function(er) {
                            //         console.log("bad del", er)
                            //     }
                            // })
    </script>


  
</body>
</html>