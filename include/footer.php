<!-- About Us -->
<div id="aboutus" class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-4 mb-2">HOTEL PG</h3>
            <p>
                Welcome to Hotel PG, where comfort meets luxury. Nestled in the heart of
                Kathmandu, our boutique hotel offers a serene retreat for travelers seeking sophistication and style.
                With personalized service and exquisite amenities,
                your stay at Hotel PG promises to be an unforgettable experience.
            </p>
        </div>

        <div class="col-lg-4 p-4">
            <H5 class="mb-3">Links</H5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">HOME</a><br>
            <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">FACILITIES</a><br>
            <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">ROOMS</a><br>
            <a href="contactus.php" class="d-inline-block mb-2 text-dark text-decoration-none">CONTACT US</a><br>
            <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">ABOUT US</a>
        </div>

        <div class="col-lg-4 p-4">
            <h5 class="mb-4">Follow US</h5>
            <?php
            if ($contact_r['tw'] != '') {
                echo <<<data
                    <a href="$contact_r[tw]" class="d-inline-block text-dark text-decoration-none
            mb-2">
            <i cLass="bi bi-twitter-x me-1"></i> Twitter
            </a><br>
            data;
            }
            ?>

            <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
                <i class="bi bi-facebook me-1"></i> Facebook
            </a><br>
            <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-dark text-decoration-none">
                <i class="bi bi-instagram me-1"></i> Instagram
            </a><br>
        </div>

    </div>
</div>

<h6 class="text-center bg-dark text-white p-4 m-0">Designed and Developed by Pema Gyalpo Tamang</h6>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

<script>
    function setActive() {
        let navbar = document.getElementById('nav-bar');
        let a_tags = navbar.getElementsByTagName('a');

        for (let i = 0; i < a_tags.length; i++) {
            let file = a_tags[i].href.split('/').pop();
            let file_name = file.split('.')[0];

            if (document.location.href.indexOf(file_name) >= 0) {
                a_tags[i].classList.add('active');
            }
        }
    }
    setActive();
</script>