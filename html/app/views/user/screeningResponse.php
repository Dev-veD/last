<?php require_once APPROOT . '/views/includes/header.php'; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?= URLROOT ?>mystyle.css" rel="stylesheet">
<form id="regForm">
    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" style="border-radius:30px;background:blue;" onClick="window.print()">Print this page</button>
        </div>
    </div>
    <h1><?= !empty($data['message']) ? $data['message'] : "Your testing report" ?></h1></br>
    <p style="text-align:center;"><?= !empty($data['note']) ? $data['note'] : "" ?></p>
    <hr>
    <div class='text-left'>
        <section class="p-t-20">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8">
                        <h3>Your next step</h3></br>
                        <?php if (!empty($data['step'])) {
                            $steps = $data['step'];
                            foreach ($steps as $key => $value) { ?>
                                <h4>
                                    <?= $key ?>
                                </h4>
                                <p><?= $value ?></p>
                                <br>
                        <?php  }
                        }
                        ?>
                    </div>
                    <div class="col col-md-4 text-center">

                        <?php if (!empty($data['test'])) {
                            $tests = $data['test'];
                            foreach ($tests as $key => $value) {
                        ?>
                                <h3><?= $key; ?> </h3>
                                <div class="text-left">
                                    <p><?= $value ?></p>
                                </div>
                                <hr>
                        <?php }
                        }; ?><br>
                        <div class="text-left">
                            <h3>Your Responses</h3></br>
                            <ul>
                                <li>Your age is <?= $data['responses']['age']; ?></li>
                                <li>
                                    <?php
                                    if ($data['responses']['fever'] == "yes") {
                                    ?>
                                        You are experiencing fever, chills, or sweating.
                                    <?php
                                    } else {
                                    ?>
                                        You are not experiencing fever, chills, or sweating
                                    <?php
                                    }

                                    ?>
                                </li>
                                <li>
                                    <?php
                                    if ($data['responses']['dryCough'] == "yes") {
                                    ?>
                                        You are experiencing worsening coughing, or Sore throat.
                                    <?php
                                    } else {
                                    ?>
                                        You are not experiencing worsening coughing, or Sore throat
                                    <?php
                                    }

                                    ?>
                                </li>
                                <li>
                                    <?php
                                    if ($data['responses']['breatheTrouble'] == "yes") {
                                    ?>
                                        You are feeling shortness of breath or having problem in breathing
                                    <?php
                                    } else {
                                    ?>
                                        You are not feeling shortness of breath or having problem in breathing
                                    <?php
                                    }

                                    ?>
                                </li>
                                <li>
                                    <?php
                                    if ($data['responses']['chestPain'] == "yes") {
                                    ?>
                                        You are having chest pain, vomiting or diarrhea.
                                    <?php
                                    } else {
                                    ?>
                                        You are not having chest pain, vomiting or diarrhea
                                    <?php
                                    }

                                    ?>
                                </li>
                                <li>
                                    <?php
                                    if ($data['responses']['conditions'] == "yes") {
                                    ?>
                                        You are suffering from past diseases.
                                    <?php
                                    } else {
                                    ?>
                                        You are not suffering chronic diseases.
                                    <?php
                                    }

                                    ?>
                                </li>
                                <li>
                                    <?php
                                    if ($data['responses']['traveled'] == "yes") {
                                    ?>
                                        You have traveled internationally.
                                    <?php
                                    } else {
                                    ?>
                                        You have not traveled internationally.
                                    <?php
                                    }

                                    ?>
                                </li>
                                <li>
                                    <?php
                                    if ($data['responses']['covidCity'] == "yes") {
                                    ?>
                                        You have been in an area where COVID-19 is widespread.
                                    <?php
                                    } else {
                                    ?>
                                        You have not been in an area where COVID-19 is widespread
                                    <?php
                                    }

                                    ?>
                                </li>
                                <li>
                                    <?php
                                    if ($data['responses']['careFacility'] == "yes") {
                                    ?>
                                        You work or live in care facility.
                                    <?php
                                    } else {
                                    ?>
                                        You didn't work or live in care facility.
                                    <?php
                                    }

                                    ?>
                                </li>
                                <li>
                                    <?php
                                    if ($data['responses']['covidContact'] == "yes") {
                                    ?>
                                        You have came in contact with postive COVID-19 patient.
                                    <?php
                                    } else {
                                    ?>
                                        You haven't came in contact with postive COVID-19 patient.
                                    <?php
                                    }

                                    ?>
                                </li>
                            </ul>
                        </div>

                        <p><br>Goverment website and Links Provided :
                            <p>
                                <div class="text-center">
                                    <a href="http://health.uk.gov.in/pages/display/140-novel-corona-virus-guidelines-and-advisory-">Uttarakhand Health advisory</a><br>
                                    <a href="mygov.in/covid-19">COVID19 INDIA</a><br>
                                    <a href="https://www.apple.com/covid19/">COVID19 Apple Screening</a>
                                </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
    <div class="row">
        <div class="col col-md-6 text-left">
            <ul>
                <li>
                    <b>STATE HELPLINE NO : </b> 104 <br>
                </li>
                <li>
                    <b>CENTER HELPLINE NO : </b> +91-11-23978046 <br>
                </li>
                <li>
                    <b>WEBSITE : </b><a href="https://www.mygov.in/covid-19/">https://www.mygov.in/covid-19/<a><br>
                </li>
            </ul>
        </div>
        <div class="col col-md-6">

        </div>
    </div>
    </div>
    <hr>
    <p><b>
            <p style="text-align: center">Please Note</p>
            </base64_decode><br> The test results and suggestions are completely based on guidelines provided by CDC. We do not hold any responsibility of the result and its following consequences.Please be carefull, and take action according to your conscience. Results are just an advice, based on CDC guidelines for screening.</p>

</form>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>
