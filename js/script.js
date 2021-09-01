$(document).ready(function() {
    // --------------------
    // Menu button for mobile responsive

    $("#btn-hamburger").click(function() {
       $(".nav-menu").slideToggle(); 
    });

    // $(".nav-menu").mouseleave(function() {
    //     $(this).slideUp();
    // });
    $(window).resize(function() {
        var width = $(window).width();
        if (width > 1100){
          console.log("free");
          $(".nav-menu").show();
        }
    });

    // --------------------
    // Upload file preview name

    $('#file-upload-1').change(function() {
        var filepath = this.value;
        var m = filepath.match(/([^\/\\]+)$/);
        var filename = m[1];
        $('#filename-1').html(filename);
    });
    

    // --------------------
    // Switcher for news page

    $("#sw-list").click(function() {
        $(".filter-show-list").show();
        $(".filter-show-card").hide();
        $(this).addClass("filter-switcher-active");
        $("#sw-card").removeClass("filter-switcher-active");
    });
    $("#sw-card").click(function() {
        $(".filter-show-list").hide();
        $(".filter-show-card").show();
        $(this).addClass("filter-switcher-active");
        $("#sw-list").removeClass("filter-switcher-active");
    });

    // --------------------
    // Filter for report page
    $("#ft-main").change(function() {
        var selected = $(this).children("option:selected").val();
        if(selected == "none") {
            $("#ft-year").slideUp();
            $("#ft-status").slideUp();
            $("#ft-name").slideUp();
            $("#ft-id").slideUp();
            $("#ft-teacher").slideUp();
        } 
        else if(selected == "ft-year") {
            $("#ft-year").slideDown();
            $("#ft-status").slideUp();
            $("#ft-name").slideUp();
            $("#ft-id").slideUp();
            $("#ft-teacher").slideUp();
        }
        else if(selected == "ft-status") {
            $("#ft-year").slideUp();
            $("#ft-status").slideDown();
            $("#ft-name").slideUp();
            $("#ft-id").slideUp();
            $("#ft-teacher").slideUp();
        }
        else if(selected == "ft-name") {
            $("#ft-year").slideUp();
            $("#ft-status").slideUp();
            $("#ft-name").slideDown();
            $("#ft-id").slideUp();
            $("#ft-teacher").slideUp();
        }
        else if(selected == "ft-id") {
            $("#ft-year").slideUp();
            $("#ft-status").slideUp();
            $("#ft-name").slideUp();
            $("#ft-id").slideDown();
            $("#ft-teacher").slideUp();
        }
        else if(selected == "ft-teacher") {
            $("#ft-year").slideUp();
            $("#ft-status").slideUp();
            $("#ft-name").slideUp();
            $("#ft-id").slideUp();
            $("#ft-teacher").slideDown();
        }
    });
    
});



