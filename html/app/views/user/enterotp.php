<?php require_once APPROOT . '/views/includes/header.php'; ?>

    <div class="page-wrapper">
        <div class='text-center'>
            <h1>Verify Yourself</h1>
        </div>
        <div class="page-content--bgf7">
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-8">
                            <div class="card">
                                <div class="card-header">Enter your details</div>
                                <div class="card-body card-block">
                                    <form action="<?php echo URLROOT;?>Authentication/verify" method="post" class="">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" id="otp" name="otp" placeholder="Enter OTP*" class="form-control" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <h1>Read this</h1><br>
                            <ul>
                                <li>
                                    <p>
                                        After filing you will receive an OTP in email to verify. </p>
                                </li>
                                <li>
                                    <p>
                                        Your data will be stored in NHM Database. Will be kept anonymous.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>