
<?php require_once APPROOT . '/views/includes/header.php'; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="mystyle.css" rel="stylesheet">
<form id="regForm" action="<?php echo URLROOT; ?>Screening/response">
    <h1>COVID-19 Screening Tool</h1>
    <hr>
    <!-- One "tab" for each step in the form: -->
    <div class="row tab ">
        <h3>Start a screening test for COVID19 </h3><br>
        <label class=" form-control-label">Information regarding test :</label>

        <div class="col col-md-12 col-lg-12 ">
            <ol>
                <li>Select the appropriate option. </li>
                <li>Screen Test will suggest the action to take. </li>
                <li><b>None of your data will be made public.</b> </li>
                <li>Appropriate sugesstion will be given as per CDC guidelines for the COVID-19. </li>
            
                <li>Give test properly and don't get scared of results. </li>
             
            </ol>
        </div>
    </div>
    <div class="row tab form-group">

        <h3>How old are you ? </h3><br>

        <div class="col col-md-12 col-lg-12 ">
            <div class="form-check">
                <div class="radio">
                    <label for="radio1" class="form-check-label ">
                        <input type="radio" id="radio11" name="age_person" value="option1" class="form-check-input">Under 18
                    </label>
                </div>
                <div class="radio">
                    <label for="radio2" class="form-check-label ">
                        <input type="radio" id="radio21" name="age_person" value="option2" class="form-check-input">Between 18 and 64
                    </label>
                </div>
                <div class="radio">
                    <label for="radio3" class="form-check-label ">
                        <input type="radio" id="radio31" name="age_person" value="option3" class="form-check-input">65 or older
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row tab form-group">

        <h3>Are you experiencing fever, chills, or sweating ? </h3><br>


        <div class="col col-md-12 col-lg-12 ">
            <div class="form-check">
                <div class="radio">
                    <label for="radio1" class="form-check-label ">
                        <input type="radio" id="radio12" name="fever_person" value="option1" class="form-check-input">Yes
                    </label>
                </div>
                <div class="radio">
                    <label for="radio2" class="form-check-label ">
                        <input type="radio" id="radio22" name="fever_person" value="option2" class="form-check-input">No
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row tab form-group">

        <h3>Are you experiencing worsening coughing, or Sore throat? </h3><br>
        <div class="col col-md-12 col-lg-12 ">
            <div class="form-check">
                <div class="radio">
                    <label for="radio1" class="form-check-label ">
                        <input type="radio" id="radio13" name="dryCough_person" value="option1" class="form-check-input">Yes
                    </label>
                </div>
                <div class="radio">
                    <label for="radio2" class="form-check-label ">
                        <input type="radio" id="radio23" name="dryCough_person" value="option2" class="form-check-input">No
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row tab form-group">

        <h3>Are you feeling shortness of breath or having problem in breathing ? </h3><br>

        <div class="col col-md-12 col-lg-12 ">
            <div class="form-check">
                <div class="radio">
                    <label for="radio1" class="form-check-label ">
                        <input type="radio" id="radio14" name="breatheTrouble_person" value="option1" class="form-check-input">Yes
                    </label>
                </div>
                <div class="radio">
                    <label for="radio2" class="form-check-label ">
                        <input type="radio" id="radio24" name="breatheTrouble_person" value="option2" class="form-check-input">No
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row tab form-group">

        <h3>Are you having chest pain, vomiting or diarrhea? </h3><br>

        <div class="col col-md-12 col-lg-12 ">
            <div class="form-check">
                <div class="radio">
                    <label for="radio1" class="form-check-label ">
                        <input type="radio" id="radio15" name="chestPain_person" value="option1" class="form-check-input">Yes
                    </label>
                </div>
                <div class="radio">
                    <label for="radio2" class="form-check-label ">
                        <input type="radio" id="radio25" name="chestPain_person" value="option2" class="form-check-input">No
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row tab form-group">

        <h3>Do you have any of these conditions ?</h3><br>


        <div class="col col-md-12 col-lg-12 ">
            <ol>
                <li>Asthma or chronic lung disease. </li>
                <li>Pregnancy. </li>
                <li>Diabetes with complications. </li>
                <li>Diseases or conditions that make it harder to cough. </li>
                <li>Kidney Failure that needs dialysis. </li>
                <li>Cirrhosis of the liver. </li>
                <li>Weakened immune system. </li>
                <li>Congestive heart failure. </li>
                <li>Extreme obesity. </li>
            </ol>
            <div class="form-check">
                <div class="radio">
                    <label for="radio1" class="form-check-label ">
                        <input type="radio" id="radio16" name="conditions_person" value="option1" class="form-check-input">Yes
                    </label>
                </div>
                <div class="radio">
                    <label for="radio2" class="form-check-label ">
                        <input type="radio" id="radio26" name="conditions_person" value="option2" class="form-check-input">No
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row tab form-group">

        <h3>In the last Month, have you traveled internationally? </h3><br>

        <div class="col col-md-12 col-lg-12 ">
            <div class="form-check">
                <div class="radio">
                    <label for="radio1" class="form-check-label ">
                        <input type="radio" id="radio17" name="traveled_person" value="option1" class="form-check-input">Yes
                    </label>
                </div>
                <div class="radio">
                    <label for="radio2" class="form-check-label ">
                        <input type="radio" id="radio27" name="traveled_person" value="option2" class="form-check-input">No
                    </label>
                </div>
            </div>
        </div>
    </div>



    <div class="row tab form-group">

        <h3>In the last 14 days, have you been in an area where COVID-19 is widespread ? </h3><br>

        <div class="col col-md-12 col-lg-12 ">
            <div class="form-check">
                <div class="radio">
                    <label for="radio1" class="form-check-label ">
                        <input type="radio" id="radio18" name="covidCity_person" value="option1" class="form-check-input">Yes
                    </label>
                </div>
                <div class="radio">
                    <label for="radio2" class="form-check-label ">
                        <input type="radio" id="radio28" name="covidCity_person" value="option2" class="form-check-input">No
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row tab form-group">

        <h3>Do you live or work in care facility? </h3><br>

        <div class="col col-md-12 col-lg-12 ">
            <div class="form-check">
                <div class="radio">
                    <label for="radio1" class="form-check-label ">
                        <input type="radio" id="radio19" name="careFacility_person" value="option1" class="form-check-input">Yes
                    </label>
                </div>
                <div class="radio">
                    <label for="radio2" class="form-check-label ">
                        <input type="radio" id="radio29" name="careFacility_person" value="option2" class="form-check-input">No
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row tab form-group">

        <h3>Did you came in contact of any Positive COVID patient ?</h3><br>

        <div class="col col-md-12 col-lg-12 ">
            <div class="form-check">
                <div class="radio">
                    <label for="radio1" class="form-check-label ">
                        <input type="radio" id="radio110" name="covidContact_person" value="option1" class="form-check-input">Yes
                    </label>
                </div>
                <div class="radio">
                    <label for="radio2" class="form-check-label ">
                        <input type="radio" id="radio210" name="covidContact_person" value="option2" class="form-check-input">No
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm(currentTab)) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm(n) {
        if(n!=0 &&n!=1 && !(document.getElementById('radio1'+n.toString()).checked || document.getElementById('radio2'+n.toString()).checked))
        {
            document.getElementById('nextBtn').setAttribute('title','Please select one choice');
            return false;
        }
        if(n==1 && !(document.getElementById('radio1'+n.toString()).checked || document.getElementById('radio2'+n.toString()).checked || document.getElementById('radio3'+n.toString()).checked))
        {
            document.getElementById('nextBtn').setAttribute('title','Please select one choice');
            return false;
        }
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>
