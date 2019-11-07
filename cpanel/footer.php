</div>
    



    <!-- <img src="index_pic.jpg" class="img-fluid" style="width: 100%"> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/vendor/jquery-slim.min.js"></script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
       (function($) {
            $.fn.visible = function(partial) {
            
                var $t            = $(this),
                    $w            = $(window),
                    viewTop       = $w.scrollTop(),
                    viewBottom    = viewTop + $w.height(),
                    _top          = $t.offset().top,
                    _bottom       = _top + $t.height(),
                    compareTop    = partial === true ? _bottom : _top,
                    compareBottom = partial === true ? _top : _bottom;
            
            return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

            };
            
            })(jQuery);

            var win = $(window);

            var allMods = $(".animate");

            allMods.each(function(i, el) {
            var el = $(el);
            if (el.visible(true)) {
            el.addClass("already-visible"); 
            } 
            });

            win.scroll(function(event) {

            allMods.each(function(i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("come-in"); 
            } 
            });

            });
    </script>

    <script>

    $('#btn').on('click', function() {
        if($(document).find("input.error"))
        {
            //$(document.activeElement).css('border-color','red');
            showalert("Please enter valid information","alert-warning");
        }
});


    function showalert(message,alerttype) {
        $(".alert").removeClass('fade');
        $(".alert").alert('close');
        $('#alert_placeholder').append('<div id="alertdiv" class="alert ' +  alerttype + ' alert-dismissible fade show"><a class="close" data-dismiss="alert">×</a><strong>Alert!</strong> '+message+'</div>')

        // setTimeout(function() { // this will automatically close the alert and remove this if the users doesnt close it in 5 secs


        //     $("#alertdiv").remove();

        // }, 5000);
    }
    
    </script>
    <script>
    $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>