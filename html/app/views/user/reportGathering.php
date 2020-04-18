<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="page-wrapper">
    <div class='text-center'>
        <h1>Report A Gathering</h1>
    </div>
    <div class="page-content--bgf7">
        <section class="statistic statistic2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-8">
                        <div class="card">
                            <div class="card-header">Gathering Info</div>
                            <div class="card-body card-block">
                                <?php if (!empty($data['err']))
                                    echo '<script>alert(' . $data["err"] . ');</script>';
                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-address-card"></i>
                                            </div>
                                            <input type="text" id="address" name="address" placeholder="Address*" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-comments"></i>
                                            </div>
                                            <input type="text" id="remarks" name="remarks" placeholder="Remarks" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-7">
                                            <label for="uploaded_file" class=" form-control-label">Attach a Photo of Gathering</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" name="uploaded_file" required>
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
                        <br>
                        <h1>Before You Report</h1><br>
                        <p>
                            All this information will be sent to Required authority. So please avoid giving wrong information. Its your and our duty to work together in this hour of need.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <?php require_once APPROOT . '/views/includes/footer.php'; ?>