<?php 
if(authorize($_SESSION["access"]["akun_saya"]["daftar_alamat"]["ac_view"])){
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Akun Saya <small>Buku Alamat</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Akun Saya</li>
			<li class="active">Buku Alamat</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box-header with-border">
				  <?php 
				  if(authorize($_SESSION["access"]["akun_saya"]["daftar_alamat"]["ac_create"] )){
				  echo anchor('backoffice/bukualamat/form','<i class="fa fa-plus"></i> Entry Data','class="btn btn-primary"'); 
				  }
				  ?>
				  <?php  echo anchor('backoffice/crinter/','<i class="fa fa-dropbox"></i> Mulai Order','class="btn btn-danger"');?>
				  </div>
				<div class="box box-primary">
					<div class="box-header">
						<h1 class="box-title">Buku Alamat</h1>
						
					</div>
					
					<!-- /.box-header -->
					<div class="box-body table-responsive ">
					
						<table id="example"
							class="table table-hover no-padding">
							<thead>
								<tr class="headings">
									<th class="no-sort">Alamat</th>
									<th class="no-sort">Provinsi</th>
									<th class="no-sort">Kota / Kabupaten</th>
									<th class="no-sort">Kecamatan</th>
									<th class="no-sort">Kelurahan</th>
									<th class="no-sort">Kode Pos</th>
									<th class=" no-link last no-sort"><span class="nobr">Aksi</span>
									</th>
								</tr>
							</thead>

							<tbody>

                                            <?php if($bukualamats):foreach ($bukualamats as $bukualamat) : ?>
                                              <tr class="even pointer">
                                  
                                           
                                        
									<td><?php 
									if(authorize($_SESSION["access"]["akun_saya"]["daftar_alamat"]["ac_edit"])){
									echo anchor('backoffice/bukualamat/form/'.$bukualamat->idalamatusers, $bukualamat->alamatuser); 
									}else{
									    echo $bukualamat->$bukualamat->alamatuser;
									}
									?></td>
									
									<td><?php echo $bukualamat->nama_propinsi; ?></td>
									<td><?php echo $bukualamat->nama_kotkab; ?></td>
									<td><?php echo $bukualamat->nama_kec; ?></td>
									<td><?php echo $bukualamat->nama_kel; ?></td>
									<td><?php echo $bukualamat->kodeposuser; ?></td>
								
									<td class=" last">
										<div class="btn-group-vertical">
                                            <?php 
                                            if(authorize($_SESSION["access"]["akun_saya"]["daftar_alamat"]["ac_edit"])){
                                            echo btn_koreksi('backoffice/bukualamat/form/'.$bukualamat->idalamatusers);
                                            }
                                            ?>
                                            <?php 
                                            if(authorize($_SESSION["access"]["akun_saya"]["daftar_alamat"]["ac_delete"])){
                                            echo btn_hapus('bukualamat/hapus/'.$bukualamat->idalamatusers);
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
	</section>
</div>

<?php   }else{
    redirect('backoffice/user');
}
?>