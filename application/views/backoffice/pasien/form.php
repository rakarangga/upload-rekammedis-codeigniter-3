<?php echo $sukses; ?>
<?php
if (validation_errors() != "") { ?>
	<script>
		$(document).ready(function() {
			$.toast({
				heading: "<strong>PERINGATAN</strong>",
				text: "<?php echo clean_str_end(validation_errors()); ?>",
				showHideTransition: "fade",
				icon: "error",
				position: "top-right",
				hideAfter: 5000,
			});
		});
	</script>
<?php } ?>

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

	/* CARD-DECK */
	.card-deck {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		-ms-flex-direction: column;
		flex-direction: column;

	}

	.card-deck .card {
		margin-bottom: 15px;
		min-width: 100px;

	}

	.card {
		position: relative;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		-ms-flex-direction: column;
		flex-direction: column;
		word-wrap: break-word;
		background-color: #fff;
		background-clip: border-box;
		border: 1px solid rgba(0, 0, 0, .125);
		border-radius: .25rem;


	}

	.card-body {
		-webkit-box-flex: 1;
		-ms-flex: 1 1 auto;
		flex: 1 1 auto;
		padding: 1.25rem;
	}

	.card-title {
		margin-bottom: .75rem;
	}

	.card-text:last-child {
		margin-bottom: 0;
	}

	.card-footer:last-child {
		border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);
	}

	.card-footer {
		padding: .75rem 1.25rem;
		background-color: rgba(0, 0, 0, .03);
		border-top: 1px solid rgba(0, 0, 0, .125);

	}

	.card-img-top {
		width: 100%;
		border-top-left-radius: calc(.25rem - 1px);
		border-top-right-radius: calc(.25rem - 1px);
		height: 180px;
		width: 100%;
		display: block;
		border-style: none;
	}

	.card-icon {
		margin: 75px 50px 50px 200px;
	}

	@media screen and (min-width: 576px) {
		.card-deck {
			-webkit-box-orient: horizontal;
			-webkit-box-direction: normal;
			-ms-flex-flow: row wrap;
			flex-flow: row wrap;
			flex-direction: row;
			flex-wrap: wrap;
			margin-right: -15px;
			margin-left: -15px;
		}

		.card-deck .card {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-flex: 1;
			-ms-flex: 1 0 0%;
			flex: 1 0 0%;
			-webkit-box-orient: vertical;
			-webkit-box-direction: normal;
			-ms-flex-direction: column;
			flex-direction: column;
			margin-right: 15px;
			margin-bottom: 0;
			margin-left: 15px;
			min-width: 215px;
			max-width: 215px;
			margin-bottom: 15px;
		}

		.card-icon {
			margin: 75px 50px 50px 75px;
		}
	}

	/* CUSTOM FILEUPLOAD CSS */
	.ajax-upload-dragdrop {
		width: 100% !important;
	}

	.ajax-file-upload {
		/* 	float: left !important;
		margin-right: 8px !important;
		margin: 0 18px 0 12px !important; */
		padding: 2px 5px 2px 5px !important;
		padding-left: 0px !important;
		min-width: 130px;
		/* cursor: pointer !important; */
		list-style: none !important;
		/* border: 1px solid #E9E9E9; */
		/* height: 35px !important; */
		border-right: 1px solid #D8D8D8 !important;
		text-decoration: none !important;
		font-size: 15px !important;
		font-family: 'Oxygen', sans-serif !important;
		/* color: #505A68 !important; */
		/* border-radius: 4px !important; */
		/* background-color: #FFFFFF !important; */
		overflow: hidden !important;
		-webkit-transition: ease-out .2s !important;
		-moz-transition: ease-out .2s !important;
		-o-transition: ease-out .2s !important;
		transition: ease-out .2s !important;
		-webkit-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, 0.2) !important;
		-moz-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, 0.2) !important;
		box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .2) !important;

		text-align: center !important;
	}

	.ajax-file-upload:hover {
		/* box-shadow: 0px 2px 20px 0px rgba(33, 33, 33, .2); */
		box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3) !important;
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
<link href="<?php echo base_url() ?>assets/plugins/fileuploader/uploadfile.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/plugins/fileuploader/jquery.uploadfile.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Nomor Rekam Medis : <strong><?php echo strtoupper($pasien->norm) ?></strong>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Manajemen Berkas</li>
			<li class="active">Pasien</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">


			<div class="col-md-4">
				<div class="v2-menu-wrapper">
					<ul id="v2-menu-full">
						<li style="width:100%;"> <a href="<?php echo base_url('backoffice/berkas/list_berkas/' . encrypting($pasien->iddirectory)) ?>">
								<div> <i class="fa fa-arrow-left fa-2x"></i> <span>Kembali</span> </div>
							</a> </li>
					</ul>
				</div>
				<div class="box box-primary" style="font-size: 19px;">
					<div class="box-header with-border">
						<h3 class="box-title">Form Pasien</h3>

						<div class="box-tools">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="box-body">
						<?php echo form_open_multipart('', 'id="demo-form" data-parsley-validate data-validate'); ?>
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
						<?php /* <div class="form-group" style="display:none;">
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
						</div><?php  */ ?>

						<?php echo form_submit('submit', 'Submit', 'class="btn btn-success btn-save pull-right"'); ?>
						<?php echo form_close(); ?>

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /. box -->
			</div>


			<div class="col-md-8">
				<div class="v2-menu-wrapper">
					<ul id="v2-menu-full"></ul>
					<div id="v2-menu-dropdown" class="btn-group-img btn-group"> <a class="dropdown-toggle" data-toggle="dropdown" data-close-others="true" style="width: auto;">
							<div> <i class="fa fa-align-left fa-2x"></i> <span>Menu</span> </div>
						</a>
						<ul class="dropdown-menu pull-left" role="menu2">
							<li> <a href="<?php echo base_url('backoffice/berkas') ?>" class="btn_kelola"> <i class="fa fa-edit fa-1x"></i> <span>Kembali</span> </a> </li>
						</ul>
					</div>
				</div>

				<div class="box box-primary">
					<div class="box-header with-border">
						<div class="v2-menu-wrapper" id="multipleupload">Telusuri Berkas</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding">
						<div class="mailbox-controls">

							<button type="button" class="btn btn-primary btn-sm" id="startupload" data-toggle="tooltip" data-original-title="Start Upload"><i class="fa fa-play"></i> </button>
							<button type="button" class="btn btn-danger btn-sm cancel" data-toggle="tooltip" data-original-title="Batalkan Upload"><i class="fa fa-eject"></i></button>
							<button type="button" class="btn btn-info btn-sm refresh" data-toggle="tooltip" data-original-title="Refresh Berkas"><i class="fa fa-refresh"></i></button>

							<!-- /.btn-group -->
							<div class="mailbox-messages" style="margin-top:10px">
								<div class="card-deck">

								</div>

							</div>
							<!-- /.pull-right -->
						</div>
						<!-- /.mail-box-messages -->
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /. box -->
			</div>


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

	function _validMimeType(files, callback) {
		var isMatch = false;
		var ext = getFileExtension(files.name) || 'none',
			fileSign = signatures_pdfimg[ext] || {
				offset: 0,
				sizet: 4
			},
			slice = files.slice(fileSign.offset, fileSign.offset + fileSign.sizet), // slice file from offset to sizet
			printEventType = function(event) {
				var buffer = reader.result, // The result ArrayBuffer
					view = new DataView(buffer), // Get access to the result bytes
					signature; // Read 4 or 8 bytes, big-endian
				// get Hex String of file Signatrue, 32bit only contain 4 bytes
				if (view.byteLength == 8) {
					signature = view.getUint32(0, false).toString(16) + view.getUint32(4, false).toString(16);
				} else {
					signature = view.getUint32(0, false).toString(16);
				}
				signature = signature.toUpperCase();
				// console.log('got event: ' + event.type);
				// check signature in file signatures
				if (!jQuery.isArray(fileSign.signature)) {
					fileSign.signature = [fileSign.signature];
				}
				if (jQuery.inArray(signature, fileSign.signature) !== -1) {
					// showLoading();
					isMatch = true;
				} else {
					$.toast({
						heading: "Error",
						text: "Terdapat File Yang tidak diizinkan.",
						showHideTransition: "fade",
						icon: "error",
						hideAfter: 5000,
						stack: false
					});
					isMatch = false;
					// if (event.type === 'loadstart') {
					// 	reader.abort();
					// }
				}
				// console.log(isMatch, signature);

				return callback(isMatch);
			};
		var reader = new FileReader();
		reader.onload = printEventType;
		/* reader.onabort = function() {
			return false
		};
		reader.onerror = printEventType;
		reader.onloadend = function() {
			return false
		}; */
		reader.readAsArrayBuffer(slice); // Read the slice of the file

	};

	$(document).ready(function() {
		var jqUploadFile = $("#multipleupload").uploadFile({
			url: "<?php echo base_url('backoffice/pasien/upload_multiple'); ?>",
			formData: {
				"id": "<?= encrypting($pasien->id) ?>"
			},
			cache: false,
			fileName: "fileberkas",
			autoSubmit: false,
			multiple: true,
			dragDrop: true,
			returnType: "json",
			uploadStr: "Telusuri Berkas",
			maxFileCount: 5,
			cancelStr: "Batal",
			showProgress: true,
			statusBarWidth: "100%",
			// allowDuplicates: false,
			sequential: true,
			sequentialCount: 1,
			showStatusAfterSuccess: false,
			showError: false,
			onSelect: function(files) {
				var ins = files.length;
				for (var x = 0; x < ins; x++) {
					_validMimeType(files[x], function(result) { //validMimeType with callback
						if (result == false) {
							// jqUploadFile.reset();
							jqUploadFile.stopUpload();
						}
						return result
					});
				}
			},
			onLoad: function(obj) {
				$(".card-deck").html('');
				_loadFiles();
			},
			onSubmit: function(files) {},
			onSuccess: function(files, data, xhr, pd) {
				// alert("Success for:" + JSON.stringify(files));
				$.toast({
					heading: "<strong>Success</strong>",
					text: "File " + JSON.stringify(files) + " Telah Berhasil diunggah",
					showHideTransition: "slide",
					icon: "success",
					stack: 7
				});
			},
			afterUploadAll: function(obj) {
				// alert("all files are uploaded");
				$.toast({
					heading: "<strong>Info</strong>",
					text: "Semua File Telah diProses",
					showHideTransition: "slide",
					icon: "info",
					hideAfter: 4000,
					stack: 7
				});
				$(".card-deck").html('');
				_loadFiles();
				jqUploadFile.cancelAll();
			},
			onError: function(files, status, errMsg, pd) {
				$.toast({
					heading: "<strong>Error</strong>",
					text: JSON.stringify(files) + errMsg,
					showHideTransition: "slide",
					icon: "error",
					stack: 7
				});
				jqUploadFile.stopUpload();
				jqUploadFile.cancelAll();
				return false;
			},
			onCancel: function(files, pd) {
				$.toast({
					heading: "<strong>Peringatan</strong>",
					text: JSON.stringify(files) + " telah dibatalkan",
					showHideTransition: "slide",
					icon: "warning",
					stack: 7
				});
			}
		});
		$("#startupload").click(function() {
			jqUploadFile.startUpload();
		});
		$(".cancel").click(function() {
			//reload ajax
			//reload jqUploadFile
			$(".card-deck").html('');
			_loadFiles();
			jqUploadFile.stopUpload();
			jqUploadFile.cancelAll();
			jqUploadFile.reset();
		});

		$(".refresh").click(function() {
			//reload ajax
			//reload jqUploadFile
			$(".card-deck").html('');
			_loadFiles()
		});

		function _loadFiles() {

			$.ajax({
				cache: false,
				method: 'GET',
				url: "<?php echo base_url('backoffice/pasien/fetch_berkas'); ?>",
				data: {
					'id': '<?= encrypting($pasien->id); ?>',
				},
				dataType: "json",
				success: function(data) {
					for (var i = 0; i < data.length; i++) {
						console.log(data[i]);
						$(".card-deck").append('<div class="card">' + data[i].files + '<div class="card-body"><h5 class="card-title">' + data[i].namaberkas + '</h5><p class="card-text"></p></div><div class="card-footer"><small class="text-muted">tgl : ' + data[i].tgl + ' </small>'+data[i].btndelete+'</div></div>')
					}
					// console.log(data);
				}
			});
		}

		<?php
		if (authorize($_SESSION["access"]["manajemen_berkas"]["pasien"]["ac_edit"])) {
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
				// CHECK MULTI HAPUS
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

			//KELOLA BY CEKLIS
			$(document).on('click', '.btn_kelola', function(e) {
				e.preventDefault(); // prevent navigation to "#"
				var chk = $('.chk:checked');
				if (chk.length > 1) {
					$.toast({
						heading: "<strong>PERINGATAN</strong>",
						text: "Tidak dapat kelola lebih dari 1 data",
						showHideTransition: "fade",
						icon: "warning",
						position: 'top-right',
						stack: false,
						hideAfter: 5000,
					});
					return false;
				}
				if (chk.length > 0) {
					var chk_val = [];
					$(chk).each(function() {
						chk_val.push($(this).val());
					});
					setTimeout(function() {
						window.location = '<?php echo base_url(); ?>backoffice/pasien/form/' + chk_val;
					}, 700);
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
				<?php if (authorize($_SESSION["access"]["manajemen_berkas"]["pasien"]["ac_edit"])) { ?>
					$('.btn-pulih').html('<button type="button" id="btn_hapus_multi" class="btn btn-danger btn-sm btn_hapus_multi" data-toggle="tooltip" data-original-title="Hapus Yang Ditandai"><i class="fa fa-trash-o"></i></button>');
				<?php } ?>
				return
			}
			if (kategori === 'draf') {
				$('h3.table-title').html(capitalize(kategori)); //erTable_dt_pasien adalah variable di DatatablesBuilder khusus halaman ini
				$('#example23').DataTable().clear();
				$('#example23').DataTable().destroy();
				ajaxPost(kategori);
				<?php if (authorize($_SESSION["access"]["manajemen_berkas"]["pasien"]["ac_edit"])) { ?>
					$('.btn-pulih').html('<button type="button" id="btn_hapus_multi" class="btn btn-danger btn-sm btn_hapus_multi" data-toggle="tooltip" data-original-title="Hapus Yang Ditandai"><i class="fa fa-trash-o"></i></button>');
				<?php } ?>
				return
			}
			if (kategori === 'sampah') {
				$('h3.table-title').html(capitalize(kategori)); //erTable_dt_pasien adalah variable di DatatablesBuilder khusus halaman ini
				$('#example23').DataTable().clear();
				$('#example23').DataTable().destroy();
				ajaxPost(kategori);
				<?php if (authorize($_SESSION["access"]["manajemen_berkas"]["pasien"]["ac_edit"])) { ?>
					$('.btn-pulih').html('<button type="button" id="btn_pulih_multi" class="btn btn-primary btn-sm btn_hapus_multi" data-toggle="tooltip" data-original-title="Pulihkan Yang Ditandai"><i class="fa fa-arrow-up"></i></button>');
				<?php } ?>
				return
			}

		});
	});
</script>