<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<?php
    include "header.php";
?>


    <div class="jumbotron jumbotron-bg img-fluid my-0">
        <div class="container animate">
            <h1 class="display-4">Insure Your Pet</h1>
            <p class="lead">The world would be a nicer place if everyone had the ability to love as unconditionally as a dog.</p>
            <hr class="my-4 p_hide">
            <p class="p_hide">Sometimes losing a pet is more painful than losing a human because in the case of the pet, you were not pretending
                to love it.</p>
            <p class="lead">
                <a class="btn btn-outline-light btn-lg btn-text" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid bg-light mx-0 text-center py-5px my-0 animate">
        <div class="container mx-auto">
            <h1 class="display-4">Get Quote Now</h1>
            <p class="lead">Compare the policies and start Insuring your pets.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 py-4  divide ">
                <div class="row animate">
                    <div class="col-md-4 col-sm-12 px-0 ">
                        <img src="./assets/img/dog.jpg" alt="dog Image" width="30%" class="img-fluid d-md-none ml-5 mx-auto d-block">
                        <img src="./assets/img/dog.jpg" alt="dog Image" width="100%" class="img-fluid d-none d-md-block ">
                    </div>
                    <div class="col-md-8 col-sm-12 px-0 my-auto d-flex justify-content-center">
                        <div class="jumbotron pl-4 pr-2 py-2 mb-0 bg-white">
                            <h3 class="display-10">Insure Dog</h3>
                            <p>Click here to continue with dog insurance</p>
                            <p class="lead">
                                <a class="btn btn-outline-primary btn-sm mb-0" href="buy_policy.php?pet_type=dog" role="button">Get a Quote</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 py-4 ">
                <div class="row pl-lg-4 animate">
                    <div class="col-md-4 col-sm-12 px-0 bg-white">
                        <img src="./assets/img/cat.jpg" alt="dog Image" width="30%" class="img-fluid d-md-none mx-auto d-block">
                        <img src="./assets/img/cat.jpg" alt="dog Image" width="100%" class="img-fluid d-none d-md-block">
                    </div>
                    <div class="col-md-8 col-sm-12 px-0 my-auto d-flex justify-content-center">
                        <div class="jumbotron px-4 py-2 mb-0 bg-white">
                            <h3 class="display-10">Insure Cat</h3>
                            <p>Click here to continue with cat insurance</p>
                            <p class="lead">
                                <a class="btn btn-outline-primary btn-sm mb-0" href="buy_policy.php?pet_type=cat" role="button">Get a Quote</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="carouselExampleControls" class="carousel slide animate" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="./assets/img/carousel1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./assets/img/carousel2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./assets/img/carousel3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<?php
    include "footer.php";
?>
</html>