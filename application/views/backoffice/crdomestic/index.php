<?php
if (authorize($_SESSION["access"]["pesanan_domestik"]["buat_pesanan_domestik"]["ac_view"])) {
    ?>
<?php echo $sukses; echo $error;?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pesanan Domestik <small>Buat Pesanan Domestik</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Pesanan Domestik</li>
			<li class="active">Buat Pesanan Domestik</li>
		</ol>
	</section>



	<!-- Main content -->
	<section class="content">

		<div class="row">
			<div class="col-xs-12">

				<!-- Modal -->
				<div class="example-modal">
					<div class="modal  fade" id="FrmAlamat" tabindex="-1" role="dialog"
						aria-labelledby="myModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">


								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="box-title">Pilih Alamat Penjemputan</h4>
								</div>
								
								<div class="box box-primary">
									<div class="modal-body">
										<div class="box-body table-responsive">
											<table id="example"
												class="table table-striped  table-hover no-padding">
												<thead>
													<tr class="headings">
														<th class="no-sort">Provinsi</th>


														<th class="no-sort">Kota / Kabupaten</th>
														<th class="no-sort">Kecamatan</th>
														<th class="no-sort">Kelurahan</th>
														<th class="no-sort">Kode Pos</th>
														<th class="no-sort">Alamat</th>
														<th class=" no-link last no-sort"><span class="nobr">Aksi</span>
														</th>
													</tr>
												</thead>

												<tbody>

                                            <?php if ($crdomestics) : foreach ($crdomestics as $crdomestic) : ?>
                                              <tr class="even pointer">
														<td><?php echo $crdomestic->nama_propinsi; ?></td>

														<td><?php echo $crdomestic->nama_kotkab; ?></td>
														<td><?php echo $crdomestic->nama_kec; ?></td>
														<td><?php echo $crdomestic->nama_kel; ?></td>
														<td><?php echo $crdomestic->kodeposuser; ?></td>
														<td><?php echo anchor('backoffice/crdomestic/form/'.$crdomestic->idalamatusers, $crdomestic->alamatuser); ?></td>

														<td class=" last">
															<div class="btn-group-vertical">
										<?php echo btn_pilih('backoffice/crdomestic/form/'.$crdomestic->idalamatusers);  ?>
                                                                                    <?php
                                                    if (authorize($_SESSION["access"]["pesanan_domestik"]["buat_pesanan_domestik"]["ac_edit"])) {
                                                        echo btn_koreksi('backoffice/crdomestic/form/' . $crdomestic->idalamatusers);
                                                    }
                                                    ?>
                                                                                    <?php
                                                    if (authorize($_SESSION["access"]["pesanan_domestik"]["buat_pesanan_domestik"]["ac_delete"])) {
                                                        echo btn_hapus('crdomestic/hapus/' . $crdomestic->idalamatusers);
                                                    }
                                            ?>
                                            <!-- <button class="btn btn-default" type="button">Koreksi</button> -->
															</div>
														</td>
													</tr>
                                           <?php  endforeach; endif; ?>
                                     </tbody>
											</table>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<!-- //Modal -->


			</div>
		</div>
	</section>
</div>
<?php

} else {
    redirect('backoffice/user');
}
?>
