<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/fileuploader/lib-signature.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/pdfObject/pdfobject.min.js"></script>
<!-- stylesheets -->
<style type="text/css">
	/* pdfobject (showing pdf viewer) */
	.pdfobject-container {
		height: 45rem;
		border: 1rem solid rgba(0, 0, 0, .1);
	}

	.description-date {
		color: #808080;
		font-size: 0.8em;
		font-weight: normal;
	}

	.supports-date .description-date {
		display: none;
	}



	.table thead,
	.table th {
		text-align: left;
	}

	.dataTables_filter {
		float: left !important;
	}

	th {
		font-size: 19px;
	}

	td {
		font-size: 18px;
	}

	.nav-pills>li.active>a,
	.nav-pills>li.active>a:focus,
	.nav-pills>li.active>a:hover {
		background: transparent;
		color: #444;
		border-top: 0;
		border-left-color: #3c8dbc;
	}

	/*
	 Errors data-validate
	*/
	.error {
		border-color: red;
	}

	.error-message {
		color: red;
		font-style: italic;
		margin-bottom: 1em;
	}

	/* MODAL MEDIA SCREEN SIZE*/
	@media screen and (min-width: 768px) {
		.modal-dialog {
			width: 700px;
			/* New width for default modal */
		}

		.modal-sm {
			width: 350px;
			/* New width for small modal */
		}
	}

	@media screen and (min-width: 1300px) {
		.modal-lg {
			width: 1316px;
			/* New width for large modal */
		}
	}
</style>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/button-shadow/btnShadow.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Berkas Tanggal : <strong><?php echo tgl_no_jam($direktori->tgldirectory) ?></strong>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Manajemen Berkas</li>
			<li class="active">Berkas</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">


			<div class="col-md-3">
				<?php
				/* 	if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_create"])) {

					// echo  anchor(base_url('backoffice/berkas/form/'.encrypting($iddirectory)),'<i class="fa fa-cloud-upload"></i> Upload Berkas</button>','class="btn btn-info btn-block margin-bottom"');
					echo '<button class="btn btn-info btn-block margin-bottom" id="upload_berkas"><i class="fa fa-cloud-upload"></i> Upload Berkas</button>';
					echo '<button class="btn btn-warning btn-block margin-bottom" data-toggle="modal" data-target="#scanberkas_modal"><i class="glyphicon glyphicon-print"></i> Scan Berkas</button>';
				} */
				?>
				<div class="v2-menu-wrapper">
					<ul id="v2-menu-full">
						<li style="width:100%;"> <a href="<?php echo base_url('backoffice/berkas') ?>">
								<div> <i class="fa fa-arrow-left fa-2x"></i> <span>Kembali</span> </div>
							</a> </li>
					</ul>
				</div>
				<div class="box box-primary" style="font-size: 19px;">
					<div class="box-header with-border">
						<h3 class="box-title">Manajemen Berkas</h3>

						<div class="box-tools">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="box-body no-padding">
						<ul class="nav nav-pills nav-stacked">
							<li class="nav-li active"><a class="nav-stacked" href="javascript:void(0);"><i class="fa fa-inbox"></i> Semua<?php /* count($cpasien) > 0 ? '<span class="label label-primary pull-right">' . count($cpasien) . '</span>' : ''; */ ?></a></li>
							<li class="nav-li"><a class="nav-stacked" href="#"><i class="fa fa-file-text-o"></i> Draf</a></li>
							<li class="nav-li"><a class="nav-stacked" href="#"><i class="fa fa-trash-o"></i> Sampah</a></li>
						</ul>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /. box -->
			</div>


			<div class="col-md-9">
				<div class="v2-menu-wrapper">
					<ul id="v2-menu-full">
						<?php if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_create"])) { ?>
							<li> <a href="#" class="upload_berkas">
									<div> <i class="fa fa-file-text fa-2x"></i> <span>Unggah Berkas</span> </div>
								</a> </li>
							<li> <a href="#">
									<div> <i class="fa fa-files-o fa-2x"></i> <span>Unggah Ganda</span> </div>
								</a> </li>

							<li> <a href="#">
									<div> <i class="fa fa-print fa-2x"></i> <span>Scan Berkas</span> </div>
								</a> </li>
						<?php } ?>
						<?php if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"])) { ?>
							<li> <a href="#">
									<div> <i class="fa fa-edit fa-2x"></i> <span>Kelola Berkas Yang Ditandai</span> </div>
								</a> </li>
						<?php } ?>
					</ul>
					<div id="v2-menu-dropdown" class="btn-group-img btn-group"> <a class="dropdown-toggle" data-toggle="dropdown" data-close-others="true" style="width: auto;">
							<div> <i class="fa fa-align-left fa-2x"></i> <span>Menu</span> </div>
						</a>
						<ul class="dropdown-menu pull-left" role="menu2">
							<li> <a href="#" class="upload_berkas"> <i class="fa fa-file-text fa-1x"></i> <span>Unggah Berkas</span> </a> </li>
							<li> <a href="#"> <i class="fa fa-files-o fa-1x"></i> <span>Unggah Ganda</span></a> </li>
							<li> <a href="#"> <i class="fa fa-print fa-1x"></i> <span>Scan Berkas</span> </a> </li>
							<li> <a href="#"> <i class="fa fa-edit fa-1x"></i> <span>Kelola Berkas Yang Ditandai</span> </a> </li>
						</ul>
					</div>
				</div>

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class=" table-title">Semua</h3>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding">
						<div class="mailbox-controls">
							<div class="btn-group btn-pulih">
								<?php if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"])) { ?>
									<button type="button" id="btn_hapus_multi" class="btn btn-danger btn-sm btn_hapus_multi" data-toggle="tooltip" data-original-title="Hapus Yang Ditandai"><i class="fa fa-trash-o"></i></button>
								<?php } ?>
							</div>
							<button type="button" class="btn btn-info btn-sm refresh" data-toggle="tooltip" data-original-title="Segarkan"><i class="fa fa-refresh"></i></button>
							<!-- <div class="btn-group btn-pulih"></div> -->
							<fieldset>
								<!-- /.btn-group -->
								<div class="mailbox-messages table-responsive" style="margin-top:10px">
									<?php
										/* $this->datatables->generate('dt_pasien') */;
									?>
									<table id="example23" class="table table-hover table-striped">
										<thead>
											<tr class="headings">
												<th class="no-sort" style="width:20px">
													<div align="center">
														<?php echo form_checkbox('btn_chk_all', " ", FALSE, 'class="icheckbox_flat-green checkall"'); ?>
													</div>
												</th>
												<th><i class="fa fa-file"></i></th>
												<th>No. Rekam Medis</th>
												<th>Nama Pasien</th>
												<th>Jenis Kelamin</th>
												<?php if ($this->data['u_an_id'] == 'super_admin') { ?>
													<th>Penanggung Jawab</th>
												<?php } ?>
												<th></th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</div>
								<!-- /.pull-right -->
						</div>
						<!-- /.mail-box-messages -->
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /. box -->
			</div>
			<!-- Modal Unggah Berkas -->

			<div class="example-modal">
				<div class="modal fade" id="uploadberkas_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog  modal-lg" role="document">
						<div class="modal-content ">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Pastikan <strong>Nomor Rekam Medis</strong> dan File Yang Diupload Sama</h4>

							</div>
							<?php echo form_open_multipart('', 'id="form-single" data-parsley-validate data-validate'); ?>
							<div class="modal-body">
								<div class="col-md-3">
									<div class="form-group">
										<label for="norm">Nomor Rekam Medis<span class="required">*</span>
										</label>
										<?php echo form_input('norm', set_value('norm', $pasien->norm), 'class="form-control tab-input" required'); ?>
									</div>

									<div class="form-group">
										<label for="tgldirectory">Tanggal Rekam Medis<span class="required">*</span>
											<div class="input-group ">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<?php echo form_input('tgl_directory', set_value('tgl_directory', $direktori->tgldirectory), 'class="form-control pull-right " readonly pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"'); ?>
												<!-- <input type="text" class="form-control pull-right datepicker_me" id="tgl_directory" name="tgl_directory" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"> -->
											</div>
									</div>
									<div class="form-group">
										<label for="namapasien">Nama Lengkap Pasien<span class="required">*</span>
										</label>
										<?php echo form_input('namapasien', set_value('namapasien', $pasien->namapasien), 'class="form-control tab-input" required'); ?>
									</div>
									<div class="form-group">
										<label for="jeniskelamin">Jenis Kelamin<span class="required">*</span></label>
										<?php
										$options = array(
											'' => 'Pilih Jenis Kelamin',
											'L' => 'Laki-Laki',
											'P' => 'Perempuan'
										);
										echo form_dropdown('jeniskelamin', $options, $this->input->post('jeniskelamin') ? $this->input->post('jeniskelamin') : $pasien->jeniskelamin,  'class="form-control"');
										?>
									</div>
									<div class="form-group" style="display:none;">
										<p class="help-block">Format File .PDF</p>
										<?php
										$data_upload = array(
											'name' => 'fileberkas',
											'id' => 'fileberkas',
											'class' => 'form-control',
											'style' => 'width:250px;',
										);
										echo form_upload($data_upload);
										?>
									</div>
								</div>
								<div class="col-md-9">
									<div id="form-pdf" class="pdfobject-container">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info pull-left" id="sbm-upload">Submit</button>
							</div>
							<?php echo form_close(); ?>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
			</div>
			<!-- /.example-modal -->

		</div>
	</section>
</div>
<?php /* $this->datatables->jquery('dt_pasien'); */ ?>
<script>
	const fileSelect = document.getElementsByClassName("upload_berkas");
	const fileElem = document.getElementById("fileberkas");
	const fileList = document.getElementById("form-pdf");

	for (var i = 0; i < fileSelect.length; i++) {
		fileSelect[i].addEventListener("click", function(e) {
			e.preventDefault(); // prevent navigation to "#"
			if (fileElem) {
				fileElem.click();
			}
		}, false);
	}
	/* 
	 * # Sign the signatures array in lib-signature.js
	 * signature_pdf[ext]
	 * signature_pdfimg [ext]
	 * signature_alldoc [ext]
	 * # Get expanded-name of a file */
	function getFileExtension(fileName) {
		var matches = fileName && fileName.match(/\.([^.]+)$/);
		if (matches) {
			return matches[1].toLowerCase();
		}
		return '';
	}
	$('.modal').on('hidden.bs.modal', function() {
		$('#form-single').trigger("reset");
	})


	$(document).ready(function() {
		/* Sending Request POST data to datatable */
		function ajaxPost(data = null) {
			var dataItem = data;
			var dataTable_pasien = $('#example23').DataTable({
				"processing": true,
				"serverSide": true,
				"order": [],
				"ordering": false,
				"ajax": {
					url: "<?php echo base_url('backoffice/berkas/fetch_ajax1'); ?>",
					type: "POST",
					data: {
						'iddirectory': '<?php echo $iddirectory; ?>',
						'kategori': dataItem,
					},
					error: function(xhr) {
						$.toast({
							heading: "Error",
							text: xhr.responseText,
							showHideTransition: "fade",
							icon: "error",
							hideAfter: 3000,
						});
						window.location = '<?php echo base_url('backoffice/user'); ?>';
					}
				},
				"language": {
					processing: '<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>',
					search: '_INPUT_',
					searchPlaceholder: 'Pencarian...'
				},
				"sDom": '<\"top\"lfprtip><\"bottom\"><\"clear\">',
				"bLengthChange": false,
				// "searching": true,
				"columnDefs": [{
					"targets": [0], //kolom ceklis
					"orderable": false,
					"className": "text-left",
					"width": "2%"
				}, {
					"targets": [1], //kolom icon
					"orderable": false,
					"className": "text-left",
					"width": "1%"
				}, {
					"targets": [<?php echo $u_an_id == 'super_admin' ? 5 : 4 ?>], //kolom aksi
					"orderable": false,
					"width": "20%"
				}, {
					"targets": [<?php echo $u_an_id == 'super_admin' ? 6 : 5 ?>], //kolom aksi
					"orderable": false,
					"className": "text-left",
					"width": "14%"
				}, ],
			});
			$(document).on('click', '.refresh', function() {
				if ($('.checkall').is(':checked')) {
					$('.checkall').prop('checked', '');
				}
				dataTable_pasien.ajax.reload();
			});
		};
		ajaxPost();
		// $('.dataTables_filter input').unbind().keyup(function(e) {
		// 	var value = $(this).val();
		// 	if (value.length > 3) {
		// 		dataTable_pasien.search(value).draw();
		// 	} else {
		// 		dataTable_pasien.search('').draw();
		// 	}
		// });

		// UPLOAD SINGLE
		$(document).on('change', '#fileberkas', function(event) {
			event.preventDefault(); // prevent navigation to "#"
			const files = this.files;

			if (!files.length) {
				fileList.innerHTML = "<p>Tidak ada File yang Dipilih!</p>";
			} else {
				var ext = getFileExtension(files[0].name) || 'none',
					fileSign = signatures_pdf[ext] || {
						offset: 0,
						sizet: 4
					},
					slice = files[0].slice(fileSign.offset, fileSign.offset + fileSign.sizet), // slice file from offset to sizet
					reader = new FileReader();
				reader.onload = function(e) {
					var buffer = reader.result, // The result ArrayBuffer
						view = new DataView(buffer), // Get access to the result bytes
						signature, // Read 4 or 8 bytes, big-endian
						isMatch = false; // whether file signature match with the source file type

					// get Hex String of file Signatrue, 32bit only contain 4 bytes
					if (view.byteLength == 8) {
						signature = view.getUint32(0, false).toString(16) + view.getUint32(4, false).toString(16);
					} else {
						signature = view.getUint32(0, false).toString(16);
					}
					signature = signature.toUpperCase();

					// check signature in file signatures
					if (!jQuery.isArray(fileSign.signature)) {
						fileSign.signature = [fileSign.signature];
					}
					if (jQuery.inArray(signature, fileSign.signature) !== -1) {
						showLoading();
						$('#uploadberkas_modal').modal('show');
						fileList.innerHTML = "";
						const list = document.createElement("div");
						fileList.appendChild(list);
						const obj_url = URL.createObjectURL(files[0]);
						PDFObject.embed(obj_url, list, {
							forcePDFJS: true
						});
						URL.revokeObjectURL(this.src);
						isMatch = true;
					} else {
						$.toast({
							heading: "Error",
							text: "File Yang Di Pilih Tidak Valid.",
							showHideTransition: "fade",
							icon: "error",
							hideAfter: 3000,
						});
						isMatch = false;
					}
					// console.log(isMatch, signature);
					return isMatch;
				};
				reader.readAsArrayBuffer(slice); // Read the slice of the file
			}
		});

		$(".datepicker_me").datepicker({
			autoclose: true,
			changeMonth: true,
			changeYear: true,
			format: 'yyyy-mm-dd',

		});

		$(document).on('click', '#sbm-upload', function(e) {
			e.preventDefault(); // prevent navigation to "#"
			var myForm = document.getElementById('form-single');
			var formData = new FormData(myForm);
			formData.append('iddirectory', '<?php echo $iddirectory ?>');
			// debug console formdata
			// for (let [name, value] of formData) {
			// 	console.log(`${name} = ${value}`);
			// }
			//untuk upload multiple
			var ins = document.getElementById('fileberkas').files.length;
			for (var x = 0; x < ins; x++) {
				formData.append("fileberkas[]", document.getElementById('fileberkas').files[x]);
			}
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('backoffice/berkas/upload_single'); ?>",
				data: formData,
				// dataType: 'application/json; charset=utf-8',
				processData: false,
				contentType: false,
				success: function(msg) {
					// alert(msg);
					$(".refresh").trigger("click");
					if (msg.save_msg == true && msg.success_msg_upload == true) {
						$('.modal').modal('hide');
						swal({
							title: "Data Berhasil Disimpan...",
							type: "success",
							closeOnConfirm: false,
							showConfirmButton: false,
							timer: 2000
						});
					} else {
						if (msg.save_msg == true) {
							$('.modal').modal('hide');
							swal({
								title: "Upload Dibatalkan",
								text: "Ulangi Proses Upload ",
								type: "error",
								closeOnConfirm: false,
								showConfirmButton: false,
								timer: 5000
							});
						}
						$.toast({
							heading: "<strong>PERINGATAN</strong>",
							text: msg.error_msg,
							showHideTransition: "fade",
							icon: "error",
							position: 'top-right',
							stack: false,
							hideAfter: 5000,
						});
					}
					// console.log(msg);
				}
			});

		});
		<?php
		if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"])) {
		?> $(document).on('click', '.btn_hapus_multi', function(e) {
				e.preventDefault(); // prevent navigation to "#"
				var chk = $('.chk:checked');
				var idElm = $(this).attr('id');
				let notif = [];
				if (idElm === 'btn_hapus_multi') {
					notif = {
						title: "Anda Yakin Ingin Menghapus?",
						text: "Item yang sudah di hapus tidak dapat di kembalikan!",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'Ya, Hapus Item!',
						cancelButtonText: 'Batal',
						closeOnConfirm: true,
						showLoaderOnConfirm: true,
					};
				} else {
					notif = {
						title: "Pulihkan Data ini..?",
						text: "Item yang dipulihkan akan kembali, dan hilang dari daftar sampah",
						type: "info",
						showCancelButton: true,
						confirmButtonColor: '#269abc',
						confirmButtonText: 'Pulihkan Item!',
						cancelButtonText: 'Batal',
						closeOnConfirm: true,
						showLoaderOnConfirm: true,
					};
				}
				if (chk.length > 0) {
					var chk_val = [];
					$(chk).each(function() {
						chk_val.push($(this).val());
					});
					swal(notif,
						function() {
							$.ajax({
								method: "POST",
								url: "<?php echo base_url('backoffice/berkas/multi_edit_status'); ?>",
								data: {
									chk_val: chk_val
								},
								success: function(msg) {
									// jika tidak ada data
									$(".removeRow").fadeOut(500);
									setTimeout(function() {
										$(".refresh").trigger("click");
									}, 700);
								}
							});
						});
				} else {
					swal({
						title: "Mohon untuk memilih Data",
						type: "error",
					});
				}
			});


		<?php } ?>
		$(document).on('click', '.chk', function() {
			if ($(this).is(':checked')) {
				$(this).closest('tr').addClass('removeRow');
			} else {
				$(this).closest('tr').removeClass('removeRow');
			}
		});
		$(document).on('click', '.checkall', function() {
			$(this).parents('fieldset:eq(0)').find('.chk').prop('checked', this.checked);
			if ($('.chk').is(':checked')) {
				$('.chk').closest('tr').addClass('removeRow');
			} else {
				$('.chk').closest('tr').removeClass('removeRow');
			}

			// $.uniform.update();
		});



		$(document).on('click', 'a.nav-stacked', function(e) {
			e.preventDefault();
			$('.nav-li').removeClass('active');
			let li = $(this).parent('li:eq(0)');
			li.addClass('active');
			let kategori = $.trim($(this).text()).toLowerCase();

			// console.log(kategori);
			if (kategori === 'semua') {
				$('h3.table-title').html(capitalize(kategori));
				$('#example23').DataTable().clear();
				$('#example23').DataTable().destroy();
				ajaxPost(kategori);
				<?php if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"])) { ?>
					$('.btn-pulih').html('<button type="button" id="btn_hapus_multi" class="btn btn-danger btn-sm btn_hapus_multi" data-toggle="tooltip" data-original-title="Hapus Yang Ditandai"><i class="fa fa-trash-o"></i></button>');
				<?php } ?>
				return
			}
			if (kategori === 'draf') {
				$('h3.table-title').html(capitalize(kategori)); //erTable_dt_pasien adalah variable di DatatablesBuilder khusus halaman ini
				$('#example23').DataTable().clear();
				$('#example23').DataTable().destroy();
				ajaxPost(kategori);
				<?php if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"])) { ?>
					$('.btn-pulih').html('<button type="button" id="btn_hapus_multi" class="btn btn-danger btn-sm btn_hapus_multi" data-toggle="tooltip" data-original-title="Hapus Yang Ditandai"><i class="fa fa-trash-o"></i></button>');
				<?php } ?>
				return
			}
			if (kategori === 'sampah') {
				$('h3.table-title').html(capitalize(kategori)); //erTable_dt_pasien adalah variable di DatatablesBuilder khusus halaman ini
				$('#example23').DataTable().clear();
				$('#example23').DataTable().destroy();
				ajaxPost(kategori);
				<?php if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"])) { ?>
					$('.btn-pulih').html('<button type="button" id="btn_pulih_multi" class="btn btn-primary btn-sm btn_hapus_multi" data-toggle="tooltip" data-original-title="Pulihkan Yang Ditandai"><i class="fa fa-arrow-up"></i></button>');
				<?php } ?>
				return
			}

		});
	});
</script>