


	<script src="<?php echo base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/jQueryUI/jquery-ui.min.js"></script>


	<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->

<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>


<script src="<?php echo base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/app.min.js"></script>
<!--<script src="<?php //echo base_url()?>assets/dist/js/pages/dashboard.js"></script>
<script src="<?php //echo base_url()?>assets/dist/js/demo.js"></script>-->
<!-- Autocomplete -->
<script type="text/javascript"
	src="<?php echo base_url()?>assets/dist/js/autocomplete/data.js"></script>
<script
	src="<?php echo base_url()?>assets/dist/js/autocomplete/jquery.autocomplete.js"></script>

 <?php echo $valid_forgot_tab; ?>
<script type="text/javascript">

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    //document.getElementById("prevBtn").style.display = "inline";
	
	document.getElementById("prevBtn").style.display = "none";
  } /*else {
    //document.getElementById("prevBtn").style.display = "inline";
	document.getElementById("prevBtn").disabled = false;
  }
   if (n == 0) {
	document.getElementById("nextBtn").innerHTML = 'Lupa Password';
   }else*/ if (n == (x.length - 1)) {
   	document.getElementById("prevBtn").style.display = "inline";
    document.getElementById("nextBtn").style.display = 'none';
  } else {
    document.getElementById("nextBtn").innerHTML = 'Lupa Password';
    document.getElementById("nextBtn").style.display = "inline";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
};

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
 	 document.getElementById("demo-form").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
};

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByClassName("tab-input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
};

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
};


function isNumberKey(event){
	  var charCode = (event.which) ? event.which : event.keyCode;
	 if (charCode != 46 && charCode != 45 && charCode > 31 && (charCode < 48 || charCode > 57))
			 return false;
	  return true;
	};
          $(function () {

        	 //$('#adModal-Log').modal('show');
        	  //$(".select2").select2();
        	  $("#adModal-Log").on('shown.bs.modal', function () {
      	        window.location.reload();
      	    });
        	
        	
          });
      </script>

<!-- Fullscreen -->
<script src="<?php echo base_url()?>assets/dist/js/fullscreen/screenfull.js"></script>

</body>

</html>
