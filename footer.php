<footer>
    <!-- <i class="fas fa-copyright"></i>
    <p> Copyright 2020. All Rights Reserved. </p>
    <a href="admin/admin_login.php">Bansomdejchaopraya Rajabhat University</a> -->
    <div class="footer-container">
        <a href="https://www.bsru.ac.th/" class="footer-logo">
            <img src="img/footer_logo.png">
        </a>
        <ul class="footer-ul">
            <li>มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา</li>
            <li id="footer_name"></li>
            <li id="footer_tel"></li>
            <li><a style="font-size: 1rem; cursor: default;" href="./admin/admin_login.php">Email</a> : <span id="footer_email"></span></li>
        </ul>
    </div>
</footer>

<script>
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "./api/index/get_footer.php",
        data: {},
        success: function(res) {
            console.log("good addr", res)
            $("#footer_name").text(res.result[0].name_address)
            $("#footer_tel").text(res.result[0].tel)
            $("#footer_email").text(res.result[0].email)
        },error: function(err) {
            console.log("bad", err)
        }
    })
</script>