<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <?php require ('include/links.php'); ?>
    <title>
        <?php echo $settings_r['site_title'] ?> - FACILITIES
    </title>
    <style>
        .pop:hover {
            border-top-color: var(--green_hues) !important;
            transform: scale(1.05);
            transition: all 0.2s;

        }
    </style>


</head>

<body class="bg-light">
    <?php require ('include/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Welcome to our hotel, where luxury meets convenience. Our facilities are designed to enhance your stay and
            provide you with the utmost comfort and satisfaction. From modern amenities like complimentary Wi-Fi and air
            conditioning to indulgent features such as a spa, pool, and mini bar, we offer everything you need for a
            memorable and relaxing experience. Explore our range of facilities designed to cater to your every need,
            ensuring a truly enjoyable stay from start to finish.
        </p>

    </div>

    <div class="container">
        <div class="row">
            <?php
            $res = selectAll('facilities');
            $path = FACILITIES_IMG_PATH;

            while ($row = mysqli_fetch_assoc($res)) {
                echo <<<data
                    <div class="col-lg-4 col-md-6 mb-5 px-4">
                        <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                            <div class="d-flex align-items-center mb-2">
                                <img src="$path$row[icon]" width="40px">
                                <h5 class="m-0 ms-4">$row[name]</h5>
                            </div>

                            <p>$row[description]</p>
                        </div>
                     </div>

                data;
            }

            ?>
        </div>

    </div>

    <?php require ('include/footer.php'); ?>



</body>

</html>