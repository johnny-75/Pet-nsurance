<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<?php
    include "header.php";
?>

<div class="container-fluid content-model my-4">
    <img class="img-fluid" src="assets/img/contact.jpg" width="100%">

    <div class="container my-4">

<div class="row">

    <div class="col-lg-12 border rounded">
        <form id="contact-form needs-validation" method="post" action="_contact_us.php" role="form">
        <div class="modal-header mb-3">
              <h4 class="modal-title" id="myModalLabel">Stay Connected</h4>
          </div>

            <div class="controls">
            <div id="alert_placeholder">
            </div>
            <div id="alertdiv" <?php if(!isset($_GET['status'])) echo'hidden'; ?> class="alert alert-success alert-dismissible fade show"><a class="close" data-dismiss="alert">×</a><strong>Success!</strong> Your message has been received.!  We will contact you soon..</div>        
            <?php
            if(!isset($_SESSION['userid']))
            echo'
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Firstname *</label>
                            <input id="form_name" name="fname" type="text" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required." oninvalid="this.setCustomValidity(\'Enter your firstname\')"
    oninput="this.setCustomValidity(\'\')" >
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Lastname *</label>
                            <input id="form_lastname" type="text" name="lname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." oninvalid="this.setCustomValidity(\'Enter your lastname\')"
    oninput="this.setCustomValidity(\'\')">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Email *</label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required." oninvalid="this.setCustomValidity(\'Enter valid email address\')"
    oninput="this.setCustomValidity(\'\')">
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_phone">Phone</label>
                            <input id="form_phone" type="tel" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" maxlength="10" name="phone" class="form-control" placeholder="Please enter your phone" >
                            </div>
                    </div>
                </div>'; ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message." oninvalid="this.setCustomValidity('Leave us a message')"
    oninput="this.setCustomValidity('')"></textarea>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-dark btn-send" id="btn" value="Send message">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted"><strong>*</strong> These fields are required.</p>
                    </div>
                </div>
            </div>

        </form>

    </div><!-- /.8 -->

</div> <!-- /.row-->

</div> <!-- /.container-->
</div>

<?php
include "footer.php";
?>
</html>