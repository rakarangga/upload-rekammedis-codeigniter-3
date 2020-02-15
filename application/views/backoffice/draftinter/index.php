<?php if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_view"])){
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pesanan Tertunda <small>Daftar Pesanan Tertunda</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Pesanan Tertunda</li>
			<li class="active">Lihat Pesanan Tertunda</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				
				  <?php 
				  if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_create"])){
				  echo anchor('backoffice/draftinter/form','<i class="fa fa-plus"></i> ENTRY DATA','class="btn btn-primary"'); 
				  }
				  ?>
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Daftar Pesanan Tertunda</h3>
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
                                            <?php if($draftinters):foreach ($draftinters as $draftinter) : ?>
                                              <tr class="even pointer">

									<td><?php echo $draftinter->negaraPengirim.' - '. $draftinter->negaraTujuan. '</br>'.$draftinter->no_pesanan.'</br>    '; 
									if ($draftinter->idactiondom == '1' && $draftinter->idstatusdom == '1'){
									    echo '<span class="label label-danger">Status '.$draftinter->namastatusdom.' / '.$draftinter->namaaction.'</span>';
									}else if ($draftinter->idactiondom == '2' && $draftinter->idstatusdom == '1') {
									    echo '<span class="label label-info">Status '.$draftinter->namastatusdom.' / '.$draftinter->namaaction.' </span>';
									}else if ($draftinter->idstatusdom == '3') {
									    echo '<span class="label label-warning">Status '.$draftinter->namastatusdom.' / '.$draftinter->namaaction.'</span>';
									}else if ($draftinter->idactiondom == '1' && $draftinter->idstatusdom == '2') {
									        echo '<span class="label label-info">Status '.$draftinter->namastatusdom.' / '.$draftinter->namaaction.'</span> <span class="label label-warning">Unverificated</span>';
									}else if ($draftinter->idactiondom == '2' && $draftinter->idstatusdom == '2') {
									        echo '<span class="label label-info">Status '.$draftinter->namastatusdom.' / '.$draftinter->namaaction.'</span> <span class="label label-success">Pickup Processing</span> ';
									}else{
									    echo '<span class="label label-success">Status '.$draftinter->namastatusdom.' / '.$draftinter->namaaction.'</span>  <span class="label label-success">Shipped</span>';
									}
									?></td>
									<td><?php echo tgl_indo($draftinter->waktuorder).' || '. konversiTimeAgo( strtotime($draftinter->waktuorder)); ?>
									
									</td>
								
									<td class=" last">
										<div class="btn-group-vertical">
                                            <?php 
                                            if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_edit"])){
                                            echo btn_koreksi('backoffice/draftinter/form/'.$draftinter->id);
                                            }
                                            ?>
                                            <?php 
                                            if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_delete"])){
                                            echo btn_hapus('draftinter/hapus/'.$draftinter->id);
                                            }
                                            
                                            echo anchor('backoffice/draftinter/form/'.$draftinter->idinterorder, "Lihat Detail");
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

