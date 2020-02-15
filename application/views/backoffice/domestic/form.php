<?php if(authorize($_SESSION["access"]["pesanan_domestik"]["lihat_pesanan_domestik"]["ac_view"])){
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pesanan Domestik <small>Daftar Pesanan Doemstik</small>
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
				  if(authorize($_SESSION["access"]["pengaturan_umum"]["domestic"]["ac_create"])){
				  echo anchor('backoffice/domestic/form','<i class="fa fa-plus"></i> ENTRY DATA','class="btn btn-primary margin-bottom"'); 
				  }
				  ?>
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Detail Data No.Pesanan : <?php echo $domestic->no_pesanan; ?></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example"
							class="table table-bordered table-striped">
							
								<tr class="headings">
									<th class="no-sort">Data Pengiriman</th>
									<th class="no-sort"></th>
								</tr>
						
                                
                                    <tr class="even pointer">
									<td> Tanggal Pesanan</td>
									<td><?php echo $domestic->waktuorder; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> No.Resi</td>
									<td><b><?php $noresi = $domestic->no_resi == NULL ? 'Menunggu Proses Input Resi' . PHP_EOL : $domestic->no_resi . PHP_EOL;
									          echo $noresi;?></b></td>
									</tr>
									
									<tr class="even pointer">
									<td> Kode Pesanan</td>
									<td><?php echo $domestic->no_pesanan; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Jenis Layanan</td>
									<td><?php echo $domestic->jenislayanan; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Nama Layanan</td>
									<td><?php echo $domestic->namalayanan; ?> </td>
									</tr>
									
									<tr class="even pointer">
									<td> Status</td>
									<td><b><?php echo $domestic->namastatusdom; ?></b></td>
									</tr>
									
									<tr class="even pointer">
									<td> Action </td>
									<td><b><?php echo $domestic->namaaction; ?></b></td>
									</tr>
										<!-- DETAIL PAKET -->		
									<tr class="headings">
									<th class="no-sort">Detail Paket </th>
									<th class="no-sort"></th>
									</tr>
								
									<tr class="even pointer">
									<td> Panjang Paket </td>
									<td><?php echo   $domestic->panjangpaket.' m'; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Lebar Paket </td>
									<td><?php echo   $domestic->lebarpaket.' m'; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Tinggi Paket </td>
									<td><?php echo   $domestic->tinggipaket.' m'; ?></td>
									</tr>
									
									
									<tr class="even pointer">
									<td> Berat </td>
									<td><?php echo   $domestic->beratpaket.' kg'; ?></td>
									</tr>
									
									
									<tr class="even pointer">
									<td> Biaya Tarif </td>
									<td><b><?php echo  'Rp.  '. number_format ($domestic->biaya_tarif, 2, ',', '.') ; ?></b></td>
									</tr>
									
									<tr class="even pointer">
									<td> Harga Promo </td>
									<td><b><?php echo  'Rp.  '. number_format ($domestic->biaya_promo, 2, ',', '.') ; ?></b></td>
									</tr>
									
									
							<!-- ALAMAT PENGIRIM -->		
									<tr class="headings">
									<th class="no-sort">Alamat Pengirim</th>
									<th class="no-sort"></th>
									</tr>
									
									<tr class="even pointer">
									<td> Provinsi </td>
									<td><?php echo $get_pengirim->nama_propinsi;?>
									</tr>
									
									<tr class="even pointer">
									<td> Kota / Kabupaten </td>
									<td><?php echo  $get_pengirim->nama_kotkab; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Kecamatan </td>
									<td><?php echo  $get_pengirim->nama_kec; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Kelurahan </td>
									<td><?php echo  $get_pengirim->nama_kel; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Kode Pos </td>
									<td><?php echo   $domestic->kodeposuser; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Alamat Lengkap </td>
									<td><?php echo  $get_pengirim->alamatuser; ?></td>
									</tr>
									
									
							<!-- ALAMAT PENERIMA -->		
									<tr class="headings">
									<th class="no-sort">Alamat Penerima</th>
									<th class="no-sort"></th>
									</tr>
									
									<tr class="even pointer">
									<td> Provinsi </td>
									<td><?php echo $get_penerima->nama_propinsi;?>
									</tr>
									
									<tr class="even pointer">
									<td> Kota / Kabupaten </td>
									<td><?php echo  $get_penerima->nama_kotkab; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Kecamatan </td>
									<td><?php echo  $get_penerima->nama_kec; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Kelurahan </td>
									<td><?php echo  $get_penerima->nama_kel; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Kode Pos </td>
									<td><?php echo   $domestic->kodeposuser; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Alamat Lengkap</td>
									<td><?php echo  $get_penerima->alamatreceiver; ?></td>
									</tr>
									
						
									
									
									
									<tr class="even pointer">
									<td></td>
									<td class=" last">
										<div class="btn-group-vertical">
                                            <?php 
                                            if(authorize($_SESSION["access"]["pengaturan_umum"]["domestic"]["ac_edit"])){
                                            echo btn_koreksi('backoffice/domestic/form/'.$domestic->id);
                                            }
                                            ?>
                                            <?php 
                                            if(authorize($_SESSION["access"]["pengaturan_umum"]["domestic"]["ac_delete"])){
                                            echo btn_hapus('domestic/hapus/'.$domestic->id);
                                            }
                                            
                                           echo anchor ( 'backoffice/domestic', 'Kembali', 'class="btn btn-warning"' ); 
                                            ?>
                                            <!-- <button class="btn btn-default" type="button">Koreksi</button> -->
										</div>
									</td>
							


                                    

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
