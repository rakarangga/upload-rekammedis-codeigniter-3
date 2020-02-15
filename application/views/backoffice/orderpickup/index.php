<?php if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_view"])){
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Ajukan Penjemputan
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Ajukan Penjemputan</li>
			<li class="active">>Daftar Pesanan Menunggu Proses</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				
				  <?php 
				  if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_create"])){
				  echo anchor('backoffice/orderpickup/form','<i class="fa fa-plus"></i> ENTRY DATA','class="btn btn-primary"'); 
				  }
				  ?>
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Daftar Pesanan Menunggu Proses</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="example"
							class="table table-striped  table-hover no-padding">
							<thead>
								<tr class="headings">
									<th class="no-sort">No. Pesanan</th>
									<th class="no-sort">Tanggal Pesanan</th>
									
								
									
									
									
									<th class=" no-link last no-sort"><span class="nobr">Proses</span>
									</th>
								</tr>
							</thead>
							<tbody>
                                    <?php if($orderpickups):foreach ($orderpickups as $orderpickup) : ?>
                                    <tr class="even pointer">
								 <td><?php echo $orderpickup->negaraPengirim.' - '. $orderpickup->negaraTujuan. '</br>'.$orderpickup->no_pesanan.'</br>    '; 
									if ($orderpickup->idactiondom == '1' && $orderpickup->idstatusdom == '1'){
									    echo '<span class="label label-danger">Status '.$orderpickup->namastatusdom.' / '.$orderpickup->namaaction.'</span>';
									}else if ($orderpickup->idactiondom == '2' && $orderpickup->idstatusdom == '1') {
									    echo '<span class="label label-info">Status '.$orderpickup->namastatusdom.' / '.$orderpickup->namaaction.' </span>';
									}else if ($orderpickup->idstatusdom == '3') {
									    echo '<span class="label label-warning">Status '.$orderpickup->namastatusdom.' / '.$orderpickup->namaaction.'</span>';
									}else if ($orderpickup->idactiondom == '1' && $orderpickup->idstatusdom == '2') {
									        echo '<span class="label label-info">Status '.$orderpickup->namastatusdom.' / '.$orderpickup->namaaction.'</span> <span class="label label-warning">Unverificated</span>';
									}else if ($orderpickup->idactiondom == '2' && $orderpickup->idstatusdom == '2') {
									        echo '<span class="label label-info">Status '.$orderpickup->namastatusdom.' / '.$orderpickup->namaaction.'</span> <span class="label label-success">Pickup Processing</span> ';
									}else{
									    echo '<span class="label label-success">Status '.$orderpickup->namastatusdom.' / '.$orderpickup->namaaction.'</span>  <span class="label label-success">Shipped</span>';
									}
									?></td>
										<td><?php echo tgl_indo($orderpickup->waktuorder).' || '. konversiTimeAgo( strtotime($orderpickup->waktuorder)); ?></td>
									

									<td class=" last">
										<div class="btn-group-vertical">
                                            <?php 
                                            if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_edit"])){
                                            echo btn_koreksi('backoffice/orderpickup/form/'.$orderpickup->idinterorder);
                                            }
                                            ?>
                                            <?php 
                                            if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_delete"])){
                                            echo btn_hapus('orderpickup/hapus/'.$orderpickup->idinterorder);
                                            }
                                            echo btn_pilih('backoffice/orderpickup/form/'.$orderpickup->no_pesanan, "Ajukan Penjemputan");
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
	</section>
</div>
<?php   }else{
    redirect('backoffice/user');
}
?>

