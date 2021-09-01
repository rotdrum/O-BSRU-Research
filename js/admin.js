$(document).ready(function() {
    
    $(".sb-ul li").click(function() {
        $(".sb-sub-ul").slideUp();

        if($(this).children(".sb-sub-ul").is(":visible")) {
            $(this).children(".sb-sub-ul").slideUp();
            $(".chev-pos").removeClass("chev-rotate");
        }
        else {
            $(this).children(".sb-sub-ul").slideDown();
            $(".sb-ul li a").on("click", function() {
                $(".chev-pos").removeClass("chev-rotate");
                $(this).find(".chev-pos").toggleClass("chev-rotate");
            });
        }
    });

    $('.sb-ul li a').click(function(){
        $('.sb-ul li a').removeClass("sb-ul-active");
        $(this).addClass("sb-ul-active");
    });

    //### responsive
    $(".btn-hamburger").click(function() {
        $(".sidebar").toggleClass("sidebar-active");
    });

    // $(window).resize(function() {
    //     var width = $(window).width();
    //     if (width > 500){
    //       $(".sidebar").addClass("sidebar-active");
    //     }
    // });




    // ### Upload file preview name
    $('#file-upload-1').change(function() {
        var filepath = this.value;
        var m = filepath.match(/([^\/\\]+)$/);
        var filename = m[1];
        $('#filename-1').html(filename);
    });


    // ### Upload image preview
    function readURL(input) {
        if(input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result+')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
            readURL(this);
    });


    //Summernote
    $('#summernote').summernote({
        placeholder: 'กรอกข้อความ',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });


    // ### teacher_add and teacher_edit pages
    $("#title-sw").click(function() {
        $("#txt-title-main").slideUp();
        $("#txt-title").slideDown();
    });



});