<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>อาจารย์ - จัดการบัณฑิตนิพนธ์</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

  </head>
  <body>
  <?php include('teacher_navbarLogin.php'); ?>

    <section class="container">
      <h3 class="text-header">จัดการบัณฑิตนิพนธ์</h3>

      <!-- search & filter -->
      <div class="form-control-search">
        <div class="form-control-search-left">
          <div class="form-control-search-left-top">
            <input
              type="search"
              class="txt-search"
              placeholder="ค้นบัณฑิตนิพนธ์ หรือ ชื่อนักศึกษา"
            />
            <i class="fas fa-search txt-i-search"></i>
          </div>
          <div class="form-control-search-left-bottom">
            <select ect class="sel sel-filter">
              <option value="">--- สถานะบัณฑิตนิพนธ์ ---</option>
              <option value="">สถานะ</option>
              <option value="">สถานะ</option>
            </select>
            <select class="sel sel-filter">
              <option value="">--- อาจารย์ที่ปรึกษา ---</option>
              <option value="">อาจารย์ที่ปรึกษาหลัก</option>
              <option value="">อาจารย์ที่ปรึกษาร่วม</option>
            </select>
          </div>
        </div>
        <div class="form-control-search-right">
          <button class="btn btn-search">ค้นหา</button>
        </div>
      </div>

      <!-- table -->
      <div class="table-scroll">
        <table class="table table-research">
            <thead>
              <tr>
                <th>ลำดับ</th>
                <th class="w-300">ชื่อบัณฑิตนิพนธ์</th>
                <th class="w-200">นักศึกษา</th>
                <th>ปีการศึกษา</th>
                <th class="w-150">สถานะ</th>
                <th class="w-100">อัพเดทล่าสุด</th>
                <th class="w-150">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><p class="p-td-center">1</p></td>
                <td>
                  <p>
                    ถังขยะหมักปุ๋ยอัตโนมัติ โดยใช้ระยะเวลาอันสั้น
                    โดยใช้วิธีการย่อยสลายด้วยจุลินทรีย์
                  </p>
                </td>
                <td>
                  <p>นายณัฐเกียรติ ขุนแก้ว</p>
                  <p>นายณัฐเกียรติ ขุนแก้ว</p>
                </td>
                <td><p class="p-td-center">2564</p></td>
                <td>
                  <p class="color-danger p-td-center">
                    <i class="fas fa-circle"></i> ผ่านหัวข้อบัณฑิตนิพนธ์
                  </p>
                </td>
                <td>
                  <p class="p-td-center">2021-01-12</p>
                  <p class="p-td-center">22:07:52</p>
                </td>
                <td>
                  <a href="researchDetail.php" class="btn btn-primary">เพิ่มเติม</a>
                </td>
              </tr>
              <tr>
                <td><p class="p-td-center">1</p></td>
                <td>
                  <p>
                    ถังขยะหมักปุ๋ยอัตโนมัติ โดยใช้ระยะเวลาอันสั้น
                    โดยใช้วิธีการย่อยสลายด้วยจุลินทรีย์
                  </p>
                </td>
                <td>
                  <p>นายณัฐเกียรติ ขุนแก้ว</p>
                  <p>นายณัฐเกียรติ ขุนแก้ว</p>
                </td>
                <td><p class="p-td-center">2564</p></td>
                <td>
                  <p class="color-success p-td-center">
                    <i class="fas fa-circle"></i> ผ่านหัวข้อบัณฑิตนิพนธ์
                  </p>
                </td>
                <td>
                  <p class="p-td-center">2021-01-12</p>
                  <p class="p-td-center">22:07:52</p>
                </td>
                <td>
                  <a href="researchDetail.php" class="btn btn-primary">เพิ่มเติม</a>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
    </section>

    <?php include('footer.php'); ?>
    
  </body>
</html>
