<!-- /.content-wrapper -->
<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> <?php echo $version; ?>
	</div>
	<strong>Copyright &copy; <?php echo date('Y'); ?> <?php echo $copyright; ?>.</strong>
</footer>

<!-- Autocomplete -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/dist/js/autocomplete/data.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/autocomplete/jquery.autocomplete.js"></script>

<script type="text/javascript">
	<?php /*	 $(function () {
		// 'use strict';
         var return_first = function () {
         var tmp = null;
         $.ajax({
             'async': false,
             'type': "POST",
             'global': false,
             'dataType': 'json',
             'url': "<?php echo base_url('backoffice/crdomestic/suggestions'); ?>",
             'data': { area_tujuan: $("#area_tujuan").val()},
             'success': function (data) {
                 tmp = data;
             }
         });
         return tmp;
     }();
  
 // var data =["1206486", "222222","33333"];
 // Initialize autocomplete with custom appendTo:
   $('#area_tujuan').autocomplete({
       lookup: return_first,
        appendTo: '#autoComplete',
   });
   });
    <?php */ ?>
	$.widget.bridge('uibutton', $.ui.button);
	//INI PENTING UNTUK DINAMIS SELECT2
</script>

<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->

<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/raphael-min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- daterangepicker -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>

<!-- Password Validator -->
<!-- <script src="<?php //echo base_url()
					?>assets/plugins/validator/underscore-min.js"></script> -->
<!-- <script src="<?php //echo base_url()
					?>assets/plugins/validator/jquery.password-validator.js"></script> -->
<!-- <script src="<?php // echo base_url()
					?>assets/plugins/validator/jquery.password-validation.js"></script> -->
<script src="<?php echo base_url() ?>assets/plugins/validator/validate.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/validator/validate.polyfills.js"></script>
<!-- TOAST -->
<script src="<?php echo base_url() ?>assets/plugins/toast/jquery.toast.js"></script>

<!--<script src="<?php //echo base_url()
					?>assets/dist/js/pages/dashboard.js"></script>
<script src="<?php //echo base_url()
				?>assets/dist/js/demo.js"></script>-->
<!-- Demo JS-->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

<script type="text/javascript">
	$(document).ready(function() {

		var i = 0;
		$('#addMoreItem').click(function() {
			i++;
			$('#item_list').append(
				'<div class="row itemdetail" id="item' + i + '"><div class="col-md-2"><input type="text" class="form-control" name="namaitem[]" id="namaitem_0" placeholder="Name" value="" required=""></div><div class="col-md-2"><select class="form-control select2" name="currency[]" id="currency_0"><option value="IDR" selected="selected">IDR</option><option value="USD">USD</option></select></div><div class="col-md-2"><input type="text" class="form-control" name="priceitem[]"id="priceitem_' + i + '" placeholder="Price" value=""onkeypress="return isNumberKey(event)" oninput="return countItemDetail()" required=""></div><div class="col-md-2"><input type="number" min="1" max="40" class="form-control"name="qty[]" id="qty_' + i + '" placeholder="QTY" value="1" oninput="return countItemDetail()" onkeypress="return isNumberKey(event)" required=""></div><div class="col-md-2"><input type="text" class="form-control" name="totalprice[]" id="totalprice_' + i + '" placeholder="total" value="" onkeypress="return isNumberKey(event)" required=""></div><div class="col-md-2"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="font-weight:bold;">Del</button></div></div>');

		});
		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#item' + button_id + '').remove();
		});
	});


	$('#cekTarif').on('hidden.bs.modal', function() {
		// Load up a new modal...
		// $('#myModalNew').modal('show')
		$('#jenisLayanan_item').remove();
		$('#tabContent_item').remove();
	});

	$('#FrmAlamat').on('hidden.bs.modal', function(e) {
		$("#loadPage").show();
		window.location.replace("<?php echo base_url('backoffice/international'); ?>");
	});

	function isNumberKey(event) {
		var charCode = (event.which) ? event.which : event.keyCode;
		if (charCode != 46 && charCode != 45 && charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
	$(function() {
		// $(".textarea").wysihtml5();
		$('#FrmAlamat').modal('show');
		$('#paymentModal').modal('show');
		$('#adModal-Log').modal('show');


		$(".select2").select2();
		$("#layananTerpilih").hide();
		$("#kotkabuser").attr("disabled", "disabled");
		$("#kecuser").attr("disabled", "disabled");
		$("#keluser").attr("disabled", "disabled");
		$("#loadPage").hide();
		//$("#loadCekTarif").hide();
		$("#animation").hide();
		$("#check-tarif").attr("disabled", "disabled");

		$("#country_codetujuan").change(function() {
			var country_codetujuan = $("#country_codetujuan").val();
			if (country_codetujuan == "") {
				$("#check-tarif").attr("disabled", "disabled");
			} else {
				$("#check-tarif").removeAttr("disabled");
			}
		});


		$("#propuser").change(function() {

			var kodepropusers = $("#propuser").val();
			// mengirim dan mengambil data
			$("#animation").show();
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "<?php echo base_url('backoffice/bukualamat/propinsi_ajax'); ?>",
				data: {
					kodepropuser: kodepropusers
				},
				success: function(msg) {
					// jika tidak ada data
					$("#animation").hide();
					if (msg == '') {
						alert('Tidak ada data');
					}
					// jika dapat mengambil data,, tampilkan di combo box desa
					else {
						$("#kotkabuser").html(msg),
							$("#kotkabuser").removeAttr("disabled");
						$("#kotkabuser").val("");
						$("#kecuser").html(""),
							$("#kecuser").attr("disabled", "disabled");
						$("#keluser").html(""),
							$("#keluser").attr("disabled", "disabled"),
							$("#kodeposuser").val("");
					}
				}
			});
		});

		$("#kotkabuser").change(function() {
			var kodekotkabusers = $("#kotkabuser").val();
			$("#animation").show();
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "<?php echo base_url('backoffice/bukualamat/kotkab_ajax'); ?>",
				data: {
					kodekotkabuser: kodekotkabusers
				},
				success: function(msg) {
					$("#animation").hide();
					// jika tidak ada data
					if (msg == '') {
						alert('Tidak ada data');
					}
					// jika dapat mengambil data,, tampilkan di combo box 
					else {
						$("#kecuser").html(msg);
						$("#kecuser").removeAttr("disabled");
						$("#kecuser").val("");
						$("#keluser").html(""),
							$("#keluser").attr("disabled", "disabled");
						$("#kodeposuser").val("");
					}
				}
			});
		});


		$("#kecuser").change(function() {
			var kodekecamatanusers = $("#kecuser").val();
			$("#animation").show();
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "<?php echo base_url('backoffice/bukualamat/kecamatan_ajax'); ?>",
				data: {
					kodekecamatanuser: kodekecamatanusers
				},
				success: function(msg) {
					$("#animation").hide();
					// jika tidak ada data
					if (msg == '') {
						alert('Tidak ada data');
					}
					// jika dapat mengambil data,, tampilkan di combo box 
					else {
						$("#keluser").html(msg);
						$("#keluser").removeAttr("disabled");
						$("#keluser").val("");
						$("#kodeposuser").val("");
					}
				}
			});
		});

		$("#keluser").change(function() {
			var kodekelurahanusers = $("#keluser").val();
			$("#animation").show();
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "<?php echo base_url('backoffice/bukualamat/kelurahan_ajax'); ?>",
				data: {
					kodekelurahanuser: kodekelurahanusers
				},
				success: function(msg) {
					$("#animation").hide();
					// jika tidak ada data
					if (msg == '') {
						$("#kodeposuser").val("");
					}
					// jika dapat mengambil data,, tampilkan di combo box 
					else {
						$("#kodeposuser").val(msg);
						//$("#kodeposuser").val("");  

					}
				}
			});
		});

	});
</script>

<!--<script src="<?php //echo base_url()
					?>assets/dist/js/custom.js"></script>-->

<!-- Fullscreen -->
<script src="<?php echo base_url() ?>assets/dist/js/fullscreen/screenfull.js"></script>

<!-- Going to Fullscreen page-->
<script>
	function hapus(id) {
		swal({
				title: "Anda Yakin Ingin Menghapus?",
				text: "Item yang sudah di hapus tidak dapat di kembalikan!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Ya, Hapus Item!',
				cancelButtonText: 'Batal',
				closeOnConfirm: false,
				showLoaderOnConfirm: true,
			},
			function() {
				setTimeout(function() {
					swal({
						title: "Data Berhasil Dihapus",
						type: "success",
						closeOnConfirm: false,
						showConfirmButton: false,
					});
				}, 2000);
				setTimeout(function() {
					window.location.replace(id);
				}, 3000);
			})
	};

	const showLoading = function() {
		swal({
			title: 'Sedang Memeriksa Data...',
			text: '<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>',
			html: true,
			allowEscapeKey: false,
			allowOutsideClick: false,
			showConfirmButton: false,
			showLoading: true,
			timer: 2000,
			onOpen: () => {
				swal.showLoading();
			}
		}, function() {
			swal({
				title: "Proses Selesai...",
				type: "success",
				closeOnConfirm: false,
				showConfirmButton: false,
				timer: 2000
			});
		});
	};
</script>
<!--end fullscreen-->

<!-- select2 -->
<script>
	// Feature Test
	var getInputTypeSupport = function() {

		'use strict';

		var types = {
			color: 'a',
			date: 'b',
			time: 'c',
			month: 'd',
			number: 'e'
		};

		var supports = {};

		var test = function(type, value) {
			var input = document.createElement('input');
			input.setAttribute('type', type);
			input.setAttribute('value', value);
			return (input.value !== value);
		};

		for (var key in types) {
			if (types.hasOwnProperty(key)) {
				if (test(key, types[key])) {
					supports[key] = true;
				}
			}
		}

		return supports;

	};

	var supports = getInputTypeSupport();
	if ('color' in supports) {
		document.documentElement.classList.add('supports-color');
	}
	if ('date' in supports) {
		document.documentElement.classList.add('supports-date');
	}
	if ('time' in supports) {
		document.documentElement.classList.add('supports-time');
	}
	if ('month' in supports) {
		document.documentElement.classList.add('supports-month');
	}
	validate.init({
		// Classes and Selectors
		selector: '[data-validate]', // The selector for forms to validate
		fieldClass: 'error', // The class to apply to fields with errors
		errorClass: 'error-message', // The class to apply to error messages

		// Messages
		messageValueMissing: 'Field ini wajib diisi.', // Displayed when a required field is left empty
		messageValueMissingCheckbox: 'Field ini wajib dipilih.', // Displayed when a required checkbox isn't checked
		messageValueMissingRadio: 'Mohon pilih opsi yang tersedia.', // Displayed when a required radio button isn't selected
		messageValueMissingSelect: 'Mohon pilih opsi yang tersedia.', // Displayed when an option from a required select menu isn't selected
		messageValueMissingSelectMulti: 'Please select at least one value.', // Displayed when an option from a require multi-select menu isn't selected
		messageTypeMismatchEmail: 'Silahkan gunakan format email.', // Displayed when a `type="email"` field isn't a valid email
		messageTypeMismatchURL: 'Mohon untuk mengisi format URL.', // Displayed when a `type="url"` field isn't a valid URL
		messageTooShort: 'Please lengthen this text to {minLength} characters or more. You are currently using {length} characters.', // Displayed with the `minLength` attribute is used and the input value is too short
		messageTooLong: 'Please shorten this text to no more than {maxLength} characters. You are currently using {length} characters.', // Displayed with the `maxLength` attribute is used and the input value is too long
		messagePatternMismatch: 'Mohon untuk menyesuakan format.', // Displayed with the `pattern` attribute is used and the pattern doesn't match (if a `title` attribute is used, that's displayed instead)
		messageBadInput: 'Mohon untuk mengisi Angka.', // Displayed when the field is numeric (ex. `type="number"`) but the value is not a number
		messageStepMismatch: 'Mohon pilih opsi yang Benar.', // Displayed when the `step` attribute is used and the value doesn't adhere to it
		messageRangeOverflow: 'Mohon pilih opsi yang tersedia that is no more than {max}.', // Displayed with the `max` attribute is used and the input value is too hight
		messageRangeUnderflow: 'Mohon pilih opsi yang tersedia that is no less than {min}.', // Displayed with the `mind` attribute is used and the input value is too low
		messageGeneric: 'Data yang dimasukkan tidak valid.', // A catchall error, displayed when the field fails validation and none of the other conditions apply

		// Form Submission
		disableSubmit: false, // If true, don't submit the form to the server (for Ajax for submission)
		onSubmit: function(form, fields) {

		}, // Function to run if the form successfully validates

		// Callbacks
		beforeShowError: function(field, error) {}, // Function to run before an error is display
		afterShowError: function(field, error) {}, // Function to run after an error is display
		beforeRemoveError: function(field) {}, // Function to run before an error is removed
		afterRemoveError: function(field) {}, // Function to run after an error is removed
	});

	$(".showhide_pw").click(function() {
		$(this).find("i.toggle-password").toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});

	const capitalize = (s) => {
		if (typeof s !== 'string') return ''
		return s.charAt(0).toUpperCase() + s.slice(1)
	}
	$(document).ready(function() {

		// //iCheck for checkbox and radio inputs
		// $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		//   checkboxClass: 'icheckbox_minimal-blue',
		//   radioClass: 'iradio_minimal-blue'
		// });
		// //Red color scheme for iCheck
		// $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
		//   checkboxClass: 'icheckbox_minimal-red',
		//   radioClass: 'iradio_minimal-red'
		// });
		//Flat red color scheme for iCheck
		// $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		//   checkboxClass: 'icheckbox_flat-green',
		//   radioClass: 'iradio_flat-green'
		// });
		//delete by check

		$('#example').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});

		$(".select2_single").select2({
			placeholder: "Pilih Hak Akses",
			allowClear: true
		});

	});
</script>
<!-- /select2 -->
</body>

</html>