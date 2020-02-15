<?php if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_view"])){
?>
<?php echo $sukses; echo $error;?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Ajukan Jemputan <small>Segera Lanjut Pembayaran</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Penjemputan</li>
			<li>Ajukan Penjemputan</li>
			<li class="active">Detail No. Pesanan  <?php echo $orderpickup->no_pesanan; ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				
				  <?php 
				  if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_create"])){
				  echo anchor('backoffice/orderpickup/form','<i class="fa fa-plus"></i> ENTRY DATA','class="btn btn-primary margin-bottom"'); 
				  }
				  ?>
				<div class="box box-primary">
							

					<div class="box-header">
						<h3 class="box-title">Detail Data No.Pesanan : <?php echo $orderpickup->no_pesanan; ?></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
	 <?php echo validation_errors(); ?>
						<table id="example"
							class="table table-bordered table-striped">
							
								<tr class="headings">
									<th class="no-sort">Data Pengiriman</th>
									<th class="no-sort">
									<button type="button" class="btn btn-primary" id="payment"
            								name="payment" 
            								style="font-weight: bold;" data-toggle="modal"
            								data-target="#paymentModal"  >Lanjut Pembayaran
											</button>
									<?php  
									echo ' '.anchor ( 'backoffice/orderpickup', 'Batal', 'class="btn btn-warning"' ); ?></th>
								</tr>
						
                                
                                    <tr class="even pointer">
									<td> Tanggal Pesanan</td>
									<td><?php echo $orderpickup->waktuorder; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> No.Resi</td>
									<td><b><?php $noresi = $orderpickup->no_resi == NULL ? '<span class="label label-danger">Belum diproses resi</span>' . PHP_EOL : $orderpickup->no_resi . PHP_EOL;
									          echo $noresi;?></b></td>
									</tr>
									
									<tr class="even pointer">
									<td> Kode Pesanan</td>
									<td><?php echo $orderpickup->no_pesanan; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Jenis Layanan</td>
									<td><?php echo $orderpickup->jenislayanan; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Nama Layanan</td>
									<td><?php echo $orderpickup->namalayananex; ?> </td>
									</tr>
									
									<tr class="even pointer">
									<td> Status</td>
									<td><b><?php 	if ($orderpickup->idstatusdom == '1' || $orderpickup->idstatusdom == '3'){
									echo '<span class="label label-warning">'.$orderpickup->namastatusdom.'</span>';
									}else {
								    echo '<span class="label label-success">'.$orderpickup->namastatusdom.' </span>';
									} ?></b></td>
									</tr>
									
									<tr class="even pointer">
									<td> Action </td>
									<td><b><?php echo $orderpickup->namaaction; ?></b></td>
									</tr>
									
										<!-- NEGARA TUJUAN-->	
									<tr class="headings">
									<th class="no-sort">NEGARA PENGIRIMAN</th>
									<th class="no-sort"><?php echo  $orderpickup->negaraPengirim.' - '. $orderpickup->negaraTujuan; ?></th>
									</tr>
				
										<!-- DETAIL PAKET -->		
									<tr class="headings">
									<th class="no-sort">Detail Paket </th>
									<th class="no-sort"></th>
									</tr>
								
									<tr class="even pointer">
									<td> Panjang Paket </td>
									<td><?php echo   $orderpickup->panjangpaket.' m'; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Lebar Paket </td>
									<td><?php echo   $orderpickup->lebarpaket.' m'; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Tinggi Paket </td>
									<td><?php echo   $orderpickup->tinggipaket.' m'; ?></td>
									</tr>
									
									
									<tr class="even pointer">
									<td> Berat </td>
									<td><?php echo   $orderpickup->beratpaket.' kg'; ?></td>
									</tr>
									
									
									<tr class="even pointer">
									<td> Biaya Tarif </td>
									<td><b><?php echo  $orderpickup->curr_tarif.' '. number_format ($orderpickup->biaya_tarif, 2, ',', '.') ; ?></b></td>
									</tr>
									
									<tr class="even pointer">
									<td> Harga Promo </td>
									<td><b><?php echo  $orderpickup->curr_tarif.' '. number_format ($orderpickup->biaya_promo, 2, ',', '.') ; ?></b></td>
									</tr>
									
									<tr class="even pointer">
									<td> Detail Item</td>
									<td><div id="detailItem"></div><button class="btn btn-sm btn-default" data-dismiss="modal" onclick="setItemDetail('<?php echo $orderpickup->no_pesanan; ?>');">Lihat Item</button></td>
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
									<td><?php echo   $orderpickup->kodeposuser; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Alamat Lengkap </td>
									<td><?php echo  $get_pengirim->alamatuser; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Nama Pengirim</td>
									<td><?php echo  $orderpickup->namapengirim; ?> (CP: <?php echo  $orderpickup->notelppengirim; ?>)</td>
									</tr>
									
										<!-- DATA PENERIMA-->		
									<tr class="headings">
									<th class="no-sort">Data Penerima</th>
									<th class="no-sort"></th>
									</tr>
								
									<tr class="even pointer">
									<td>Nama Penerima</td>
									<td><?php echo   $orderpickup->namapenerima; ?> (CP: <?php echo  $orderpickup->notelppenerima; ?>)</td>
									</tr>
									
									<tr class="even pointer">
									<td> Alamat Lengkap </td>
									<td><?php echo   $orderpickup->alamatlengkappenerima; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Negara </td>
									<td><?php echo  $orderpickup->negaraTujuan.' ('. $orderpickup->kodeposnegara.')'; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td></td>
									<td class=" last">
										<div class="btn-group-horisontal">
                                            <?php 
                                            if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_edit"])){
                                            echo btn_koreksi('backoffice/orderpickup/form/'.$orderpickup->idinterorder);
                                            }
                                            ?>
                                            <?php 
                                            if(authorize($_SESSION["access"]["pesanan_international"]["lihat_pesanan"]["ac_delete"])){
                                            echo btn_hapus('orderpickup/hapus/'.$orderpickup->idinterorder);
                                            }
                                            echo ' '.anchor ( 'backoffice/orderpickup', 'Batal', 'class="btn btn-warning"' ); 
                                            ?>
                                            <!-- <button class="btn btn-default" type="button">Koreksi</button> -->
										</div>
									</td>
						</table>
					</div>
				</div>
			</div>
					
            <!-- Modal Payment-->
            		<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog"
            			aria-labelledby="paymentLabel">
            			<div class="modal-dialog modal-lg" role="document">
            				<div class="modal-content">
            				
            					
            				
            				<div class="modal-body nav-tabs-custom no-border" id="pembayaran" >
						<button type="button" class="close" data-dismiss="modal"
            							aria-label="Close">
            							<span aria-hidden="true">&times;</span>
            						</button>
            			
			 			
            				<?php echo $get_dropdown_mp; ?>
	            			
            				</div>
            					
            				
            				
            				</div>
            			</div>
            		</div>
            <!-- /Modal Payment -->

		</div>
	</section>
</div>
<script type="text/javascript">
function previewImg(event){
	$("#form-img").html('<img id="img" class="img" style="margin-top:10px;width:250px;">');
	var reader = new FileReader();
	var imageField = document.getElementById("img");
	
	reader.onload = function(){
		if(reader.readyState == 2){
		
			imageField.src = reader.result;
		}
	}
		reader.readAsDataURL(event.target.files[0]);
}
function setItemDetail(no_pesanan) {
	  var no_pesanan = no_pesanan;
						$.ajax({
				           type: "POST",
				           dataType: "html",
				           url: "<?php echo base_url('backoffice/orderpickup/itemdetail_ajax'); ?>",
				           data: {no_pesanan: no_pesanan},
				           success: function(msg){
				           // jika tidak ada data
				           if(msg == ''){
				        	swal({ title: "Item tidak tersedia"});
				            }else{// jika dapat mengambil data,, tampilkan di combo box 
							$("#detailItem").html(msg);
							}
				           }
				         });
};	

</script>
<?php   }else{
    redirect('backoffice/user');
}
?>
