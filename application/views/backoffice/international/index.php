<?php if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_view"])){
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pesanan International <small>Daftar Pesanan International</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Pesanan International</li>
			<li class="active">Lihat Pesanan International</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				
				  <?php 
				  if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_create"])){
				  echo anchor('backoffice/international/form','<i class="fa fa-plus"></i> ENTRY DATA','class="btn btn-primary"'); 
				  }
				  ?>
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Daftar International</h3>
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
                                            <?php if($internationals):foreach ($internationals as $international) : if($international->idstatusdom != '3'):?>
                                              <tr class="even pointer">

									<td><?php echo $international->negaraPengirim.' - '. $international->negaraTujuan. '</br>'.$international->no_pesanan.'</br>    '; 
									if ($international->idactiondom == '1' && $international->idstatusdom == '1'){
									    echo '<span class="label label-danger">Status '.$international->namastatusdom.' / '.$international->namaaction.'</span>';
									}else if ($international->idactiondom == '2' && $international->idstatusdom == '1') {
									    echo '<span class="label label-info">Status '.$international->namastatusdom.' / '.$international->namaaction.' </span>';
									}else if ($international->idstatusdom == '3') {
									    echo '<span class="label label-warning">Status '.$international->namastatusdom.' / '.$international->namaaction.'</span>';
									}else if ($international->idactiondom == '1' && $international->idstatusdom == '2') {
									        echo '<span class="label label-info">Status '.$international->namastatusdom.' / '.$international->namaaction.'</span> <span class="label label-warning">Unverificated</span>';
									}else if ($international->idactiondom == '2' && $international->idstatusdom == '2') {
									        echo '<span class="label label-info">Status '.$international->namastatusdom.' / '.$international->namaaction.'</span> <span class="label label-success">Pickup Processing</span> ';
									}else if ($international->idactiondom == '2' && $international->idstatusdom == '4') {
									    echo '<span class="label label-success">Status '.$international->namastatusdom.' / '.$international->namaaction.'</span>  <span class="label label-success">Shipped</span>';
									}
									?></td>
									<td><?php echo tgl_indo($international->waktuorder).' || '. konversiTimeAgo( strtotime($international->waktuorder)); ?>
									
									</td>
						
									<td class=" last">
										<div class="btn-group-vertical">
                                            <?php 
                                            if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_edit"])){
                                            echo btn_koreksi('backoffice/international/form/'.$international->idinterorder);
                                            }
                                            ?>
                                            <?php 
                                            if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_delete"])){
                                            echo btn_hapus('international/hapus/'.$international->idinterorder);
                                            }
                                            
                                            echo anchor('backoffice/international/form/'.$international->idinterorder, "Lihat Detail");
                                            ?>
                                            
                                            <!-- <button class="btn btn-default" type="button">Koreksi</button> -->
										</div>
									</td>
								</tr>
                                           <?php  endif; endforeach; endif; ?>


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

