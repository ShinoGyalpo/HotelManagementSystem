<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <?php require ('include/links.php'); ?>
    <title>
        <?php echo $settings_r['site_title'] ?> - ABOUT US
    </title>

    <style>
    .box:hover {
        border-top-color: var(--green_hues) !important;
        transform: scale(1.05);
        transition: all 0.2s;
    }
    </style>

</head>

<body class="bg-light">
    <?php require ('include/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">ABOUT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
            <br>Excepturi natus laborum fugiat velit atque ducimus,
            facilis ut at a quos?
        </p>
    </div>

    <!-- about profile -->
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Modi exercitationem nihil atque sunt ut!
                    Modi exercitationem nihil atque sunt ut!
                    Modi exercitationem nihil atque sunt ut!
                </p>
            </div>

            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-1 order-1">
                <img src="images/about/about1.jpg" class="about_img w-100">

            </div>
        </div>
    </div>

    <!-- information on number of staff and rooms -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/hotel.jpeg" width="70px">
                    <h4 class="mt-3">50+ Rooms</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/customer.jpeg" width="70px">
                    <h4 class="mt-3">5000+ Customers</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/review.png" width="70px">
                    <h4 class="mt-3">500+ Reviews</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/staff.jpeg" width="70px">
                    <h4 class="mt-3">100+ Staffs</h4>
                </div>
            </div>

        </div>
    </div>

    <!-- MANAGEMENT team -->
    <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>
    <div class="container px-4">
        <!-- Swiper -->
        <div class="swiper mySwiper mx-4">
            <div class="swiper-wrapper mb-5">

                <?php
                $about_r = selectAll('team_details');
                $path = ABOUT_IMG_PATH;

                while ($row = mysqli_fetch_assoc($about_r)) {
                    echo <<<data
                            <div class="swiper-slide bg-white overflow-hidden rounded text-center">
                                <img src="$path$row[picture]" class="w-100">
                                <h5 class="mt-2">{$row['name']}</h5>
                            </div>
                            data;
                }
                ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>



    <?php require ('include/footer.php'); ?>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 40,
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
    </script>

</body>

</html>