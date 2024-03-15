<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel PG - Contact</title>


    <?php require('include/links.php');?>

</head>

<body class="bg-light">
    <?php require('include/header.php');?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
            <br>Excepturi natus laborum fugiat velit atque ducimus,
            facilis ut at a quos?
        </p>

    </div>

    <div class="container">
        <div class="row">
            <!-- Left side -->
            <div class="col-lg-6 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4">
                    <!-- map -->
                    <iframe class="w-100 rounded mb-4" height="340px"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.31397712411!2d85.3261328!3d27.70896035000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1709045502042!5m2!1sen!2snp"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <h5>Address</h5>
                    <a href="https://maps.app.goo.gl/rZ99N1XzWff2PjV87" target="_blank"
                        class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class=" bi bi-geo-alt-fill"></i>Hotel PG, Boudha KTM
                    </a>

                    <!-- contacts -- social, mail and number section -->
                    <h5 class="mt-4">Call US</h5>
                    <a href=" tel: +981312312" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +977 9876504321
                    </a>
                    <br>
                    <a href="tel: +981312312" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +977 9876504321
                    </a>

                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: gyalpo2001@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-envelope-at"></i> gyalpo2001@gmail.com</a>


                    <h5 class="mt-4">Follow Us</h5>
                    <a href="#" class="d-inline-block  text-dark fs-4 me-2">
                        <i class="bi bi-twitter-x me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block text-dark fs-4 me-2">
                        <i class="bi bi-instagram me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block text-dark fs-4">
                        <i class="bi bi-facebook me-1"></i>
                    </a>


                </div>
            </div>
            <!-- Right side -->
            <div class=" col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form>
                        <h5>Send Messages</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input type="text" class="form-control shadow-none">
                        </div>

                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input type="mail" class="form-control shadow-none">
                        </div>

                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input type="text" class="form-control shadow-none">
                        </div>

                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea class="form-control shadow-none" rows="6" style="resize:none;"></textarea>
                        </div>

                        <button type="submit" class="btn text-white custom-bg mt-3"
                            style="width:140px; margin:0 auto;">SEND</button>

                    </form>


                </div>
            </div>

        </div>
    </div>

    <?php require('include/footer.php');?>



</body>

</html>