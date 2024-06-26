<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php require ('include/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <title>
        <?php echo $settings_r['site_title'] ?> - HOME
    </title>
    <style>
    .availability-from {
        margin-top: -50px;
        z-index: 2;
        position: relative;
    }

    @media screen and (max-width: 575px) {
        .availability-from {
            margin-top: 24px;
            padding: 0 36px;
        }
    }
    </style>

</head>

<body class="bg-light">
    <?php require ('include/header.php'); ?>


    <!-- Slider / Carousel-->
    <div id="home" class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">

                <?php
                $res = selectAll('carousel');
                while ($row = mysqli_fetch_assoc($res)) {

                    $path = CAROUSEL_IMG_PATH;
                    echo <<<data
                        <div class="swiper-slide">
                            <img src="$path$row[image]" class="w-100 d-block" />
                        </div>
                     data;

                }
                ?>
            </div>
        </div>
    </div>

    <!-- Check availability of booking for user-->
    <div class="container availability-from">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Booking Availability</h5>
                <form>
                    <div class="row align-items-center">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight:500">Check-In</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight:500">Check-Out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight:500">Adult</label>
                            <select class="form-select shadow-none">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight:500">Children</label>
                            <select class="form-select shadow-none">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Rooms -->
    <h2 id="rooms" class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
    <div class="container">
        <div class="row">
            <?php

            $room_res = select("SELECT * FROM  `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3", [1, 0], 'ii');

            while ($room_data = mysqli_fetch_assoc($room_res)) {
                //get features of room
            
                $fea_q = mysqli_query($con, "SELECT f.name FROM `features` f
                INNER JOIN `room_features` rfea ON f.id = rfea.features_id
                WHERE rfea.room_id = '$room_data[id]'");

                $features_data = "";
                while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                    $features_data .= "<span class='badge bg-light text-dark text-wrap mb-1 me-1'>
                    $fea_row[name]
                </span>";
                }


                //get Facilities of room
                $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities` f
                INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id
                WHERE rfac.room_id = '$room_data[id]'");


                $facilities_data = "";
                while ($fac_row = mysqli_fetch_assoc($fac_q)) {
                    $facilities_data .= "<span class='badge bg-light text-dark text-wrap mb-1 me-1'>
                    $fac_row[name]
                </span>";
                }

                //get thumbnail of image
                $room_thumb = ROOMS_IMG_PATH . "thumbde.png";
                $thumb_q = mysqli_query($con, "SELECT * FROM `room_images` 
                WHERE `room_id`='$room_data[id]' AND `thumb`='1'");


                if (mysqli_num_rows($thumb_q) > 0) {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
                }

                $book_btn = "";
                if (!$settings_r['shutdown']) {
                    $book_btn = " <a href='#' class='btn btn-sm text-white custom-bg shadow-none'>Book Now</a>";

                }


                //Print room card
                echo <<<data
                        <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                            <img src="$room_thumb" class="card-img-top">
                            <div class="card-body">
                                <h5>$room_data[name]</h5>
                                <h6 class="mb-4">$ $room_data[price]</h6>
                                <div class="features mb-4">
                                    <h6 class="mb-1 h-font">Features</h6>
                                    $features_data
                                    
                                </div>
                                <div class="facilities mb-4">
                                    <h6 class="mb-1 h-font">Facilities</h6>
                                    $facilities_data
                                    
                                </div>
                                <div class="guests mb-4">
                                    <h6 class="mb-1 h-font">Guests</h6>
                                    <span class="badge bg-light text-dark text-wrap">
                                        $room_data[adult] Adults
                                    </span>
                                    <span class="badge bg-light text-dark text-wrap">
                                        $room_data[children] Children
                                    </span>

                                </div>

                                <!-- Rating -->
                                <div class="rating mb-4">
                                    <h6 class="mb-1 h-font">Ratings</h6>
                                    <span class="badge bg-light text-dark text-wrap">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>

                                    </span>
                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                $book_btn
                                    <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark shadow-none">More Details...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    data;
            }
            ?>

            <div class="col-lg-12 text-center mt-5">
                <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none ">More Rooms .
                    .
                    .</a>
            </div>
        </div>
    </div>


    <!-- Our Features -->
    <h2 id="facilities" class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <?php
            $res = mysqli_query($con, "SELECT * FROM `facilities` ORDER BY `id`  LIMIT 5");
            $path = FACILITIES_IMG_PATH;

            while ($row = mysqli_fetch_assoc($res)) {
                echo <<<data
                    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                        <img src="$path$row[icon]" width="60px">
                        <h5 class="mt-2">$row[name]</h5>
                     </div>
                data;
            }

            ?>
            <div class="col-lg-12 text-center mt-5">
                <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none ">More
                    Facilities . . .</a>
            </div>

        </div>

    </div>

    <!-- Our Testimonial -->
    <h2 id="testimonials" class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>
    <div class="container mt-4">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/features/wifi.svg" width="32px">
                        <h6 class="m-0  ms-4">Some User eg 1</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus optio esse doloremque!
                        Culpa fuga incidunt numquam atque doloribus dolor, odio reprehenderit voluptatum,
                        consequuntur,
                        ipsam tenetur ullam enim dicta asperiores facilis!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>

                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/features/wifi.svg" width="32px">
                        <h6 class="m-0  ms-4">Some User eg 2</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus optio esse doloremque!
                        Culpa fuga incidunt numquam atque doloribus dolor, odio reprehenderit voluptatum,
                        consequuntur,
                        ipsam tenetur ullam enim dicta asperiores facilis!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>

                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/features/wifi.svg" width="32px">
                        <h6 class="m-0  ms-4">Some User eg 3</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus optio esse doloremque!
                        Culpa fuga incidunt numquam atque doloribus dolor, odio reprehenderit voluptatum,
                        consequuntur,
                        ipsam tenetur ullam enim dicta asperiores facilis!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>

                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="about.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none ">Know More . .
                .</a>
        </div>
    </div>

    <!-- Reach Us section -->

    <h2 id="contactus" class="mt-5 pt-4 mb-6 text-center fw-bold h-font">REACH US</h2>
    <div class="container">
        <div class="row">
            <!-- map -->
            <div class="col-lg-8 col-md-8 p-4 mb-lg-4 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="340px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>

            <!-- call -->
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Call US</h5>
                    <a href="tel: + <?php echo $contact_r['pn1'] ?>"
                        class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> + <?php echo $contact_r['pn1'] ?>
                    </a>
                    <br>

                    <?php
                    if ($contact_r['pn2'] != '') {
                        echo <<<data
                            <a href="tel: + $contact_r[pn2]" class="d-inline-block text-decoration-none text-dark">
                                <i class="bi bi-telephone-fill"></i> + $contact_r[pn2]
                            </a>
                        data;
                    }
                    ?>
                </div>

                <!-- Follow social media -->
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow US</h5>
                    <?php
                    if ($contact_r['tw'] != '') {
                        echo <<<data
                            <a href="$contact_r[tw]" class="d-inline-block mb-3">
                                <span class="badge bg-light text-dark fs-6 p-2">
                                <i class="bi bi-twitter-x me-1"></i> Twitter
                                </span>
                             </a>
                        <br>
                        data;
                    }
                    ?>
                    <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Password Reset modal -->
    <div class="modal fade" id="recoveryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="recovery-form">
                    <div class=" modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-shield-lock fs-3 me-2"></i>Set up a New Password
                        </h5>
                    </div>
                    <div class="modal-body">
                        <!-- form Body    -->
                        <div class="mb-4">
                            <label class="form-label">New Password</label>
                            <input type="password" name="pass" required class=" form-control shadow-none">
                            <input type="hidden" name="email">
                            <input type="hidden" name="token">
                        </div>
                        <div class=" mb-2 text-end">
                            <button type="button" class="btn shadow-none p-0  me-2" data-bs-dismiss="modal">
                                CANCEL
                            </button>
                            <button type="submit" class="btn btn-dark shadow-none">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php require ('include/footer.php'); ?>
    <?php
    if (isset($_GET['account_recovery'])) {
        $data = filteration($_GET);
        $t_date = date("y-m-d");
        $query = select(
            "SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? AND `t_expired`=? LIMIT 1",
            [$data['email'], $data['token'], $t_date],
            'sss'
        );

        if (mysqli_num_rows($query) == 1) {
            echo <<<showModal
            <script>
                var myModal = document.getElementById('recoveryModal');
                myModal.querySelector("input[name='email']").value = '$data[email]';
                myModal.querySelector("input[name='token']").value = '$data[token]';

                
                var modal = bootstrap.Modal.getOrCreateInstance(myModal);
                modal.show();     
            </script>
            showModal;
        } else {
            alert("error", "Invalid or expired Link !!!");

        }
    }

    ?>




    <script src=" https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        }
    });

    var swiper = new Swiper(".swiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        loop: true,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
        },
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });

    //Recover Account
    let recovery_form = document.getElementById('recovery-form');

    recovery_form.addEventListener('submit', (e) => {
        e.preventDefault();

        let data = new FormData();

        data.append('email', recovery_form.elements['email'].value);
        data.append('token', recovery_form.elements['token'].value);
        data.append('pass', recovery_form.elements['pass'].value);
        data.append('recover_user', '');

        var myModal = document.getElementById('recoveryModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);

        xhr.onload = function() {
            if (this.responseText == 'failed') {
                alert('error', "Account Reset failed!");
            } else {
                alert('success', "Account Reset Succcessful");
                recovery_form.reset();

            }

        }

        xhr.send(data);


    });
    </script>

</body>

</html>