<!-- About Us -->
<div id="aboutus" class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-4 mb-2"><?php echo $settings_r['site_title'] ?></h3>
            <p>
                <?php echo $settings_r['site_about'] ?>
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
    function alert(type, msg, position = 'body') {
        let bs_class = (type == 'success') ? "alert-success" : "alert-danger";

        let element = document.createElement('div');
        element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show " role="alert">
            <strong class="me-3">${msg}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    
    
    `;

        if (position == 'body') {
            document.body.append(element);
            element.classList.add('custom-alert');

        } else {
            document.getElementById(position).appendChild(element);
        }
        setTimeout(remAlert, 5000);
    }

    function remAlert() {
        document.getElementsByClassName('alert')[0].remove();
    }

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

    //User Registration
    let register_form = document.getElementById('register-form');

    register_form.addEventListener('submit', (e) => {
        e.preventDefault();

        let data = new FormData();

        data.append('name', register_form.elements['name'].value);
        data.append('email', register_form.elements['email'].value);
        data.append('phonenum', register_form.elements['phonenum'].value);
        data.append('address', register_form.elements['address'].value);
        data.append('pincode', register_form.elements['pincode'].value);
        data.append('dob', register_form.elements['dob'].value);
        data.append('pass', register_form.elements['pass'].value);
        data.append('cpass', register_form.elements['cpass'].value);
        data.append('profile', register_form.elements['profile'].files[0]);
        data.append('register', '');

        var myModal = document.getElementById('registerModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);
        xhr.onload = function () {
            if (this.responseText == 'pass_mismatch') {
                alert('error', "Password didn't match !");
            } else if (this.responseText == 'email_already') {
                alert('error', "Email already used !");
            } else if (this.responseText == 'phone_already') {
                alert('error', "Phone number already use !");
            } else if (this.responseText == 'inv_img') {
                alert('error', "Only jpg, png, webp images are allowed !")
            } else if (this.responseText == 'upd_failed') {
                alert('error', "Image upload failed ! Server Down")
            } else if (this.responseText == 'mail_failed') {
                alert('error', "Cannot send mail confirmation ! Server Down")
            } else if (this.responseText == 'ins_failed') {
                alert('error', "Registration Failed ! Server Down")
            } else {
                alert('success', "Registration successful. Confirmation link sent to mail!!!");
                register_form.reset();
            }

        }

        xhr.send(data);


    });


    //User Login
    let login_form = document.getElementById('login-form');

    login_form.addEventListener('submit', (e) => {
        e.preventDefault();

        let data = new FormData();

        data.append('email_mob', login_form.elements['email_mob'].value);
        data.append('pass', login_form.elements['pass'].value);
        data.append('login', '');

        var myModal = document.getElementById('loginModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);
        xhr.onload = function () {
            if (this.responseText == 'inv_email_mob') {
                alert('error', "invalid email !");
            } else if (this.responseText == 'not_verified') {
                alert('error', "Email  not verified !");
            } else if (this.responseText == 'inactive') {
                alert('error', "Account suspended! please contact admin  !");
            } else if (this.responseText == 'invalid_pass') {
                alert('error', "Invalid Password (Incorrect) !");
            } else {
                window.location = window.location.pathname;
            }

        }

        xhr.send(data);


    });

    //Forgot password
    let forgot_form = document.getElementById('forgot-form');

    forgot_form.addEventListener('submit', (e) => {
        e.preventDefault();

        let data = new FormData();

        data.append('email', forgot_form.elements['email'].value);
        data.append('forgot_pass', '');

        var myModal = document.getElementById('forgotModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);

        xhr.onload = function () {
            if (this.responseText == 'inv_email') {
                alert('error', "invalid email !");
            } else if (this.responseText == 'not_verified') {
                alert('error', "Email  not verified !");
            } else if (this.responseText == 'inactive') {
                alert('error', "Account suspended! please contact admin  !");
            } else if (this.responseText == 'mail_failed') {
                alert('error', "Cannot send mail ! SERVER DOWN");
            } else if (this.responseText == 'upd_failed') {
                alert('error', "Account Reset failed! SERVER DOWN");
            } else {
                alert('success', "Account Reset link send to your mail");
                forgot_form.reset();

            }

        }

        xhr.send(data);


    });





    setActive();
</script>