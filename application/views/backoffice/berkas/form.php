<?php
if (authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_view"])) {
?>
	<style>
		.jq-password-validator__popover {
			background: #fff;
			border-radius: 3px;
			box-shadow: 0 1px 0 rgba(0, 0, 0, 0.3);
			color: #CC0000;
		}
		/**
		* Errors
		*/
		.error {
			border-color: red;
		}

		.error-message {
			color: red;
			font-style: italic;
			margin-bottom: 1em;
		}
	</style>
	<?php echo $sukses; ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Pengaturan Umum <small> <?php echo empty($user->id) ? 'Tambah Setting User' :  'Update Setting User : <strong>' . $user->namalengkap . '</strong>'; ?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url('backoffice/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li>Pengaturan umum</li>
				<li>Setting User</li>
				<li class="active"><?php echo empty($user->id) ? 'Tambah Setting User' :  'Update Setting User '; ?></li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<?php echo form_open_multipart('', 'id="demo-form" data-parsley-validate class="form-horizontal" data-validate'); ?>
				<div class="box-header with-border">
					<?php echo form_submit('submit', 'Simpan', 'class="btn btn-success btn-save"'); ?>
					<?php echo anchor('backoffice/settuser', 'Kembali', 'class="btn btn-warning"'); ?>
				</div>
				<div class="col-xs-6">
					<div class="box box-info">
						<div class="box-body">
							<div class="col-md-12">

								<div class="form-group">
									<label for="iduserlevel">Hak Akses<span class="required">*</span></label>
									<?php echo form_dropdown('iduserlevel', $hakakses_dropdown, $this->input->post('iduserlevel') ? $this->input->post('iduserlevel') : $user->iduserlevel.':'.$user->u_an_id, 'class="form-control select2" style="width: 100%;" required'); ?>

								</div>

								<div class="form-group">
									<label for="namalengkap">Nama Lengkap<span class="required">*</span>
									</label>
									<?php echo form_input('namalengkap', set_value('namalengkap', $user->namalengkap), 'class="form-control tab-input" required'); ?>
								</div>



								<div class="form-group">
									<label for="namauser">Username<span class="required">*</span>
									</label>
									<?php echo form_input('namauser', set_value('namauser', $user->namauser), 'class="form-control tab-input"  required'); ?>
								</div>



								<div class="form-group">
									<label for="email">Email<span class="required">*</span>
									</label>

									<?php echo form_input(
												'email', 
												set_value('email', $user->email), 
												'class="form-control tab-input" title="Mohon untuk menggunakan format email yang benar (ex. a@a.com)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$"  required '); ?>
								</div>


								<div class="form-group">
									<label for="nomorhp">No. HP<span class="required">*</span>
									</label>
									<div class="input-group">
										<div class="input-group-btn">
											<button type="button" class="btn btn-primary">+62</button>
										</div>
										<?php echo form_input('nomorhp',  set_value('nomorhp', str_replace('+62', '', $user->nomorhp)), 'class="form-control tab-input" placeholder="No. Telp" onkeypress="return isNumberKey(event)" '); ?>
										<span class="fa fa-phone form-control-feedback"></span>
									</div>
								</div>

								<?php /* <div class="form-group">
								<label for="namabisnis">Nama Toko Online<span class="required">*</span>
								</label>
									<?php echo form_input ( 'namabisnis', set_value ( 'namabisnis', $user->namabisnis ), 'class="form-control tab-input"  required' ); ?>
							</div><?php */ ?>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="logo">Logo / Foto Toko Online<span class="required">*</span></label>
											<?php
											$data_upload = array(
												'name' => 'logo',
												'id' => 'logo',
												'class' => 'form-control',
												'style' => 'width:250px;',
												'onChange' => "previewImg(event)",
												
											);
											echo form_upload($data_upload);
											?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<p class="help-block">Format Gambar JPG / JPEG / PNG</p>
											<div id="form-img">
												<img id="img" class="img-responsive" style="margin-top:10px;width:250px;" src="<?php echo $user->logo == NULL ? base_url() . 'assets/dist/img/user.png' : base_url() . $user->logo; ?>">
											</div>
										</div>
									</div>

								</div>
								<?php echo validation_errors(); ?>
							</div>

							<!-- /.box-body -->
							<div class="box-footer">
								<?php echo form_submit('submit', 'Simpan', 'class="btn btn-success btn-save"'); ?>
								<?php echo anchor('backoffice/settuser', 'Kembali', 'class="btn btn-warning"'); ?>
							</div>
						</div>

					</div>

				</div>

				<div class="col-xs-6">
					<div class="box box-info">
						<div class="box-body">
							<div class="col-md-12">

								<div class="form-group">
									<label for="userpass">Password<span class="required">*</span>
									</label>
									<div class="input-group">
										<?php
										$data_password = array(
											'name' => 'userpass',
											'id' => 'userpass',
											'class' => 'form-control ',
											'title' => "Password Kurang Kuat Gunakan Kombinasi Huruf Besar, Kecil, Angka Serta Gunakan Simbol.",
											'pattern' => "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$",
											// 'required' => "required"
										);
										echo form_password($data_password);
										?>
										<span toggle="#userpass" class="input-group-addon showhide_pw"><i class="fa fa-eye toggle-password"></i></span>
									</div>
								</div>


								<div class="form-group">
									<label for="u_pass_confirm">Ulangi Password<span class="required">*</span>
									</label>
									<div class="input-group">
										<?php
										$data_password = array(
											'name' => 'u_pass_confirm',
											'id' => 'u_pass_confirm',
											'class' => 'form-control ',
										);
										echo form_password($data_password);
										?>
										<span toggle="#u_pass_confirm" class="input-group-addon showhide_pw"><i class="fa fa-eye toggle-password"></i></span>
									</div>
								</div>
								<!-- <div id="errors1"></div> -->
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
		</section>
	</div>
	<script>

		
				function previewImg(event) {
					$("#form-img").html('<img id="img" class="img" style="margin-top:10px;width:250px;">');
					var reader = new FileReader();
					var imageField = document.getElementById("img");

					reader.onload = function() {
						if (reader.readyState == 2) {

							imageField.src = reader.result;
						}
					}
					reader.readAsDataURL(event.target.files[0]);
				};


//password strength untuk ganti password
		//   $(function () {
$(document).ready(function() {
	
		// 	var options = {
		// 		// confirmField:'#u_pass_confirm',
		// 		// Minimum Length of password
		// 		minLength: 12,
		// 		// Minimum number of Upper Case Letters characters in password
		// 		minUpperCase: 0,
		// 		// Minimum number of Lower Case Letters characters in password
		// 		minLowerCase: 2,
		// 		// Minimum number of digits characters in password
		// 		minDigits: 2,
		// 		// Minimum number of special characters in password
		// 		minSpecial: 2,
		// 		// Maximum number of repeated alphanumeric characters in password dhgurAAAfjewd <- 3 A's
		// 		maxRepeats: 12,
		// 		// Maximum number of alphanumeric characters from one set back to back
		// 		maxConsecutive: 12,
		// 		// Disallow Upper Case Lettera
		// 		noUpper: false,
		// 		// Disallow Lower Case Letters
		// 		noLower: false,
		// 		// Disallow Digits
		// 		noDigit: false,
		// 		// Disallow Special Characters
		// 		noSpecial: false,
		// 		// Disallow user to have x number of repeated alphanumeric characters ex.. ..A..a..A.. <- fails if maxRepeats <= 3 CASE INSENSITIVE
		// 		failRepeats: true,
		// 		// Disallow user to have x number of consecutive alphanumeric characters from any set ex.. abc <- fails if maxConsecutive <= 3 
		// 		failConsecutive: true,
		// 		// selector of confirm field
		// 		confirmField: undefined
		// 	}
		// 	$("#userpass").passwordValidation(options, function(element, valid, match, failedCases) {
		// 		$('#errors1').html('<div class="jq-password-validator__popover">' + failedCases.join("\n") + '</div>');
		// 		if (valid) {
		// 			$(element).css('border', '1px solid green');
		// 			$('#errors1').html('<div></div>');
		// 			// document.getElementById('errors1').classList.remove('jq-password-validator__popover');
		// 			// $('#errors1').closest('div').removeClass('jq-password-validator__popover');
		// 		}

		// 		if (!valid) {
		// 			$(element).css('border', '1px solid red');

		// 		}
				// if(valid && match) {
				// 	$('#u_pass_confirm').css('border','1px solid green');
				// }
				// if(!valid || !match) {
				// 	$('#u_pass_confirm').css('border','1px solid red');
				// }

			// });


		});
	</script>
<?php   } else {
	redirect('backoffice/user');
}
?>