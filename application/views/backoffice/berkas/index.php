		<!-- stylesheets -->
		<style type="text/css">
			.description-date {
				color: #808080;
				font-size: 0.8em;
				font-weight: normal;
			}

			.supports-date .description-date {
				display: none;
			}


			.button {
				background-color: #0088cc;
				border: 1px solid #0088cc;
				border-radius: 1px;
				color: #ffffff;
				display: inline-block;
				font-size: 0.9375em;
				font-weight: normal;
				line-height: 1.2;
				margin-right: 0.3125em;
				margin-bottom: 0.3125em;
				padding: 0.5em 0.6875em;
				width: auto;
			}

			.button:active,
			.button:focus,
			.button:hover {
				background-color: #005580;
				border-color: #005580;
				color: #ffffff;
				text-decoration: none;
			}

			.button:active {
				box-shadow: inset 0 0.15625em 0.25em rgba(0, 0, 0, 0.15), 0 1px 0.15625em rgba(0, 0, 0, 0.05);
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
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Manajemen Berkas
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
						if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_create"])) {

							echo '<button class="btn btn-primary btn-block margin-bottom" data-toggle="modal" data-target="#tgldirectory_modal"><i class="fa fa-plus"></i> Buat Berkas Baru</button>';
						}
						?>
						<div class="box box-solid">
							<div class="box-header with-border">
								<h3 class="box-title">Manajemen Berkas </h3>

								<div class="box-tools">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							</div>
							<div class="box-body no-padding">
								<ul class="nav nav-pills nav-stacked">
									<li class="active"><a href="#"><i class="fa fa-inbox"></i> Semua
											<span class="label label-primary pull-right">12</span></a></li>
									<li><a href="#"><i class="fa fa-file-text-o"></i> Draf</a></li>
									<li><a href="#"><i class="fa fa-trash-o"></i> Sampah</a></li>
								</ul>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /. box -->

						<!-- /.box -->
					</div>


					<div class="col-md-9">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Semua</h3>
								<!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body no-padding">
								<div class="mailbox-controls">
									<div class="btn-group">

										<?php
										if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_delete"])) {
											echo '<button type="button" id="btn_hapus_multi" class="btn btn-danger btn-sm btn_hapus_multi" data-toggle="tooltip" data-original-title="Hapus Yang Ditandai"><i class="fa fa-trash-o"></i></button>';
											echo "";
										}
										?> </div>
									<button type="button" class="btn btn-info btn-sm refresh" data-toggle="tooltip" data-original-title="Segarkan"><i class="fa fa-refresh"></i></button>
									<fieldset>
										<!-- /.btn-group -->
										<div class="mailbox-messages" style="margin-top:10px">
											<table id="example2" class="table table-hover table-striped">
												<thead>
													<tr class="headings">

														<?php
														if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_delete"])) {
														?>
															<!-- Check all button -->
															<th class="no-sort" style="width:20px">
																<div align="center">
																	<?= form_checkbox('btn_chk_all', " ", FALSE, 'class="icheckbox_flat-green checkall"'); ?>
																</div>
															</th>
														<?php } ?>

														<th class="no-sort" style="width:10px"></th>
														<th class="no-sort">Direktori / Tanggal </th>
														<th class="no-sort">Terakhir diperbarui </th>
														<th class=" no-link last no-sort"><span class="nobr">Aksi</span></th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
											<!-- /.table -->
										</div>
										<!-- /.pull-right -->
								</div>

								<!-- /.mail-box-messages -->
							</div>
							<!-- /.box-body -->

						</div>
						<!-- /. box -->
					</div>

					<!-- MODAL Direktori -->
					<div class="example-modal">
						<div class="modal fade" id="tgldirectory_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" align="center">Masukkan Tanggal, Bulan, dan Tahun Dokumen / Berkas</h4>
									</div>
									<form id="demo-form" data-parsley-validate data-validate>
										<div class="modal-body">

											<div class="form-group">


												<div class="input-group ">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input type="text" class="form-control pull-right datepicker_me" id="tgldirectory" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">
												</div>
												<!-- /.input group -->
											</div>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-info " id="sbm-tgl">Submit</button>
										</div>
									</form>
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

		<script>
			$(document).ready(function() {

				var dataTable = $('#example2').DataTable({
					"processing": true,
					"serverSide": true,
					"order": [],
					"ordering": false,
					"ajax": {
						url: "<?php echo base_url('backoffice/direktori/fetch_ajax'); ?>",
						type: "POST",
					},
					"language": {
						processing: '<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>'
					},
					"columnDefs": [{
						"targets": [0, 2, 3, 4],
						"orderable": false,
						"searchable": false,
					}, ],
					// "oSearch": {
					// 	"bSmart": false
					// }, // disable smart search
					// columnDefs: [{
					// 	orderable: false,
					// 	targets: [2]
					// }],
					// "columnDefs": [{
					// 	"searchable": false,
					// 	"targets": [0, 3]
					// }],
				});
				$('#example2 input[type=search]').on('keyup click', function() {
					dataTable.column('2').search("^" + this.value, true, false, true).draw();
				});
				// $('.datepicker_me').pickadate();
				$(".datepicker_me").datepicker({
					autoclose: true,
					changeMonth: true,
					changeYear: true,
					format: 'yyyy-mm-dd',
					// toggleActive: true,
				});
				// const loading = document.createElement('<i class="fa fa-refresh fa-spin fa-3x fa-fw">');
				// loading.innerHTML = '<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>';

				$(document).on('click', '#sbm-tgl', function() {
					var tgl = $('#tgldirectory').val();
					var isValid = true;
					if (tgl === '') {
						$.toast({
							heading: "Error",
							text: "Masukkan Tanggal Terlbih Dahulu.",
							showHideTransition: "fade",
							icon: "error",
							hideAfter: 5000,
						});
						isValid = false;
						return isValid;
					}
					if (isValid) {
						showLoading();
						//do search direktori by ajax
						//if direktori count 1, just go to berkas with direktori primary key
						// else insert direktori and go to berkas with direktori lastinsertID();
						$.ajax({
							method: "POST",
							url: "<?php echo base_url('backoffice/direktori/chk_dir'); ?>",
							data: {
								tgl: tgl
							},
							success: function(data) {
								data = JSON.parse(data);
								console.log(data[0].id);
								// jika tidak ada data
								// $(".removeRow").fadeOut(300);
								dataTable.ajax.reload();
							}
						});
					}
				});
				<?php
				if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_delete"])) {
				?>
					$(document).on('click', '.btn_hapus_multi', function() {
						// $('.btn_hapus_multi').click(function () { 
						var chk = $('.chk:checked');
						if (chk.length > 0) {
							var chk_val = [];
							$(chk).each(function() {
								chk_val.push($(this).val());
							});

							swal({
									title: "Anda Yakin Ingin Menghapus?",
									text: "Item yang sudah di hapus tidak dapat di kembalikan!",
									type: "warning",
									showCancelButton: true,
									confirmButtonColor: '#DD6B55',
									confirmButtonText: 'Ya, Hapus Item!',
									cancelButtonText: 'Batal',
									closeOnConfirm: true,
									showLoaderOnConfirm: true,
								},
								function() {
									$.ajax({
										method: "POST",
										url: "<?php echo base_url('backoffice/berkas/multi_delete'); ?>",
										data: {
											chk_val: chk_val
										},
										success: function(msg) {
											// jika tidak ada data
											$(".removeRow").fadeOut(300);
											dataTable.ajax.reload();
										}
									});
								});
						} else {
							swal({
								title: "Mohon untuk memilih Data yang ingin dihapus",
								type: "error",
							});
						}
					});

					$(document).on('click', '.chk', function() {
						// $('.chk').click(function () {
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
				<?php } ?>

				$(document).on('click', '.refresh', function() {
					dataTable.ajax.reload();
				});
			});
		</script>