<?php if(authorize($_SESSION["access"]["pesanan_domestik"]["lihat_pesanan_domestik"]["ac_view"])){
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pesanan Domestic <small>Daftar Pesanan Doemstik</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Pesanan Domestik</li>
			<li class="active">Lihat Pesanan Domestik</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				
				  <?php 
				  if(authorize($_SESSION["access"]["pesanan_domestik"]["lihat_pesanan_domestik"]["ac_create"])){
				  echo anchor('backoffice/domestic/form','<i class="fa fa-plus"></i> ENTRY DATA','class="btn btn-primary"'); 
				  }
				  ?>
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Daftar Domestik</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="example"
							class="table table-striped  table-hover no-padding">
							<thead>
								<tr class="headings">
									<th class="no-sort">Tanggal Pesanan</th>
									
									<th class="no-sort">No. Pesanan</th>
									
									
									<th class="no-sort">Action</th>
									<th class=" no-link last no-sort"><span class="nobr">Proses</span>
									</th>
								</tr>
							</thead>
							<tbody>
                                            <?php if($domestics):foreach ($domestics as $domestic) : ?>
                                              <tr class="even pointer">

									<td><?php echo tgl_indo($domestic->waktuorder); ?></td>
									
									<td><?php echo $domestic->no_pesanan; ?></td>
									
									<td><?php echo $domestic->namaaction; ?></td>

									<td class=" last">
										<div class="btn-group-vertical">
                                            <?php 
                                            if(authorize($_SESSION["access"]["pesanan_domestik"]["lihat_pesanan_domestik"]["ac_edit"])){
                                            echo btn_koreksi('backoffice/domestic/form/'.$domestic->id);
                                            }
                                            ?>
                                            <?php 
                                            if(authorize($_SESSION["access"]["pesanan_domestik"]["lihat_pesanan_domestik"]["ac_delete"])){
                                            echo btn_hapus('domestic/hapus/'.$domestic->id);
                                            }
                                            
                                            echo anchor('backoffice/domestic/form/'.$domestic->iddomorder, "Lihat Detail");
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

