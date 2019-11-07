<footer class="footer-basic text-light" style="background-color:#0f292f">
        <div class="container-fluid mt-2"style="height:20px;background-color:#14a098"></div>
        <div class="container px-5 pt-5">
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-12 d-flex justify-content-center animate">
                    <section>
                        <h5 class="text-center">Proposer Links</h5>
                        <ul class="fa-ul">
                            <li class="py-1">
                                <a href="my_policies.php" class=" text-white"><i class="fa-li fa fa-check-circle py-1"></i>Claim Policy</li></a>
                            <li class="py-1">
                                <a href="buy_policy.php" class=" text-white"><i class="fa-li fa fa-check-circle py-1"></i>Buy Policy</li></a>
                            <li class="py-1">
                                <a href="user_panel.php" class=" text-white"><i class="fa-li fa fa-check-circle py-1"></i>Proposer Panel</li></a>
                        </ul>
                    </section>
                </div>
                <div class="col-md-3 col-sm-12 d-flex justify-content-center animate">
                    <section>
                        <h5 class="text-center">Agent Links</h5>
                        <ul class="fa-ul">
                            <li class="py-1">
                                <i class="fa-li fa fa-check-circle py-1"></i>Join Us</li>
                            <li class="py-1">
                                <i class="fa-li fa fa-check-circle py-1"></i>View Agents</li>
                        </ul>
                    </section>
                </div>
                <div class="col-md-3 col-sm-12 d-flex justify-content-center animate">
                    <section>
                        <h5 class="text-center">About Links</h5>
                        <ul class="fa-ul">
                            <li class="py-1">
                                <i class="fa-li fa fa-check-circle py-1"></i>T & C's</li>
                            <li class="py-1">
                                <i class="fa-li fa fa-check-circle py-1"></i>About Us</li>
                            <li class="py-1">
                            <a href="contact_us.php" class=" text-white"><i class="fa-li fa fa-check-circle py-1"></i>Contact Us</li></a>
                        </ul>
                    </section>
                </div>
                
                <div class="col-md-3 col-sm-12 social px-sm-0 animate">
                    <div class="container-fluid text-center">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-whatsapp"></i>
                    <i class="fa fa-youtube"></i>
                    <i class="fa fa-linkedin"></i>
                </div>
                </div>
                </div>
            <div class="row text-center text-secondary animate">
                <div class="col-12">© 2018 - PetInsurance, Inc. All rights reserved</div>
            </div>
            </div>
    </footer>


    <!-- <img src="index_pic.jpg" class="img-fluid" style="width: 100%"> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/vendor/jquery-slim.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
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
</body>