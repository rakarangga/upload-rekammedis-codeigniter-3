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
				  echo anchor('backoffice/international/form','<i class="fa fa-plus"></i> ENTRY DATA','class="btn btn-primary margin-bottom"'); 
				  }
				  ?>
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Detail Data No.Pesanan : <?php echo $international->no_pesanan; ?></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example"
							class="table table-bordered table-striped">
							
								<tr class="headings">
									<th class="no-sort">Data Pengiriman</th>
									<th class="no-sort pull-right">
									<div id="paymentDetail"></div>
									<button type="button" class="btn btn-info" id="payment"
            								name="payment" 
            								style="font-weight: bold;" onclick="setPayment('<?php echo $international->no_pesanan; ?>');">Lihat Pembayaran
											</button>
									<?php echo ' '.anchor ( 'backoffice/international/label/'. $international->idinterorder, '<i class="fa fa-print"></i> Cetak Label', 'class="btn btn-primary" target="_blank"' ); ?>
        							<?php echo ' '.anchor ( 'backoffice/international', 'Kembali', 'class="btn btn-warning"' ); ?>
									</th>
								</tr>
						
                                
                                    <tr class="even pointer">
									<td> Tanggal Pesanan</td>
									<td><?php echo $international->waktuorder;?></td>
									</tr>
									<tr class="even pointer">
									<td> No.Resi</td>
									<td><b><?php $noresi = $international->no_resi == NULL ? '<span class="label label-danger">Belum diproses resi</span>' . PHP_EOL : $international->no_resi . PHP_EOL;
									          echo $noresi;?></b></td>
									</tr>
									
									<tr class="even pointer">
									<td> Kode Pesanan</td>
									<td><?php echo $international->no_pesanan; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Jenis Layanan</td>
									<td><?php echo $international->jenislayanan; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Nama Layanan</td>
									<td><?php echo $international->namalayananex; ?> </td>
									</tr>
									
									<tr class="even pointer">
									<td> Status</td>
									<td><b><?php if ($international->idstatusdom == '1' || $international->idstatusdom == '3'){
									echo '<span class="label label-warning">'.$international->namastatusdom.'</span>';
									}else {
								    echo '<span class="label label-success">'.$international->namastatusdom.' </span>';
									} ?></b></td>
									</tr>
									
									<tr class="even pointer">
									<td> Action </td>
									<td><b><?php echo $international->namaaction; ?></b></td>
									</tr>
									
										<!-- NEGARA TUJUAN-->	
									<tr class="headings">
									<th class="no-sort">NEGARA PENGIRIMAN</th>
									<th class="no-sort"><?php echo  $international->negaraPengirim.' - '. $international->negaraTujuan; ?></th>
									</tr>
				
										<!-- DETAIL PAKET -->		
									<tr class="headings">
									<th class="no-sort">Detail Paket </th>
									<th class="no-sort"></th>
									</tr>
								
									<tr class="even pointer">
									<td> Panjang Paket </td>
									<td><?php echo   $international->panjangpaket.' m'; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Lebar Paket </td>
									<td><?php echo   $international->lebarpaket.' m'; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Tinggi Paket </td>
									<td><?php echo   $international->tinggipaket.' m'; ?></td>
									</tr>
									
									
									<tr class="even pointer">
									<td> Berat </td>
									<td><?php echo   $international->beratpaket.' kg'; ?></td>
									</tr>
									
									
									<tr class="even pointer">
									<td> Biaya Tarif </td>
									<td><b><?php echo  $international->curr_tarif.' '. number_format ($international->biaya_tarif, 2, ',', '.') ; ?></b></td>
									</tr>
									
									<tr class="even pointer">
									<td> Harga Promo </td>
									<td><b><?php echo  $international->curr_tarif.' '. number_format ($international->biaya_promo, 2, ',', '.') ; ?></b></td>
									</tr>
									
									<tr class="even pointer">
									<td> Detail Item</td>
									<td><div id="detailItem"></div><button class="btn btn-sm btn-default" data-dismiss="modal" onclick="setItemDetail('<?php echo $international->no_pesanan; ?>');">Lihat Item</button></td>
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
									<td><?php echo   $international->kodeposuser; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Alamat Lengkap </td>
									<td><?php echo  $get_pengirim->alamatuser; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Nama Pengirim</td>
									<td><?php echo  $international->namapengirim; ?> (CP: <?php echo  $international->notelppengirim; ?>)</td>
									</tr>
									
										<!-- DATA PENERIMA-->		
									<tr class="headings">
									<th class="no-sort">Data Penerima</th>
									<th class="no-sort"></th>
									</tr>
								
									<tr class="even pointer">
									<td>Nama Penerima</td>
									<td><?php echo   $international->namapenerima; ?> (CP: <?php echo  $international->notelppenerima; ?>)</td>
									</tr>
									
									<tr class="even pointer">
									<td> Alamat Lengkap </td>
									<td><?php echo   $international->alamatlengkappenerima; ?></td>
									</tr>
									
									<tr class="even pointer">
									<td> Negara </td>
									<td><?php echo  $international->negaraTujuan.' ('. $international->kodeposnegara.')'; ?></td>
									</tr>
									<tr class="even pointer">
									<td></td>
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
                                            echo anchor ( 'backoffice/international', 'Kembali', 'class="btn btn-warning"' ); 
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
<script type="text/javascript">

function setItemDetail(no_pesanan) {
	 
	  var no_pesanan = no_pesanan;
	   
						$.ajax({
				           type: "POST",
				           dataType: "html",
				           url: "<?php echo base_url('backoffice/international/itemdetail_ajax'); ?>",
				           data: {no_pesanan: no_pesanan},
				           success: function(msg){
				           // jika tidak ada data
				           if(msg == ''){
				        	alert('kosong');
				            }else{// jika dapat mengambil data,, tampilkan di combo box 
							//$("#idpromointr").html(msg);
							//myfrm.biaya_tarif.value = 0;
							//alert(msg);
							$("#detailItem").html(msg);
							}
				           }
				         });
};	
function setPayment(no_pesanan){
	var no_pesanan = no_pesanan;
		$.ajax({
		   type: "POST",
		   dataType: "html",
		   url: "<?php echo base_url('backoffice/international/payment_ajax'); ?>",
		   data: {no_pesanan: no_pesanan},
		   success: function(msg){
		   // jika tidak ada data
		   if(msg == ''){
			  swal({
                              title: "Belum Mengajukan Jemputan ?",
                              text: "Segera Ajukan Penjemputan untuk pesanan ini",
                              type: "info",
                              showCancelButton: true,
                              confirmButtonText: "Yes, Lets go!",
                              cancelButtonText: "No, Later!",
                              closeOnConfirm: false,
                              showLoaderOnConfirm: true
                            },
                            function(isConfirm){
                              if (isConfirm) {
                                setTimeout(function(){
                                     window.location.replace("<?php echo site_url('backoffice/orderpickup/form/'.$international->no_pesanan); ?>");
                                   }, 1500);
                              }
                            });
			}else{
				// jika dapat mengambil data,, tampilkan di combo box 
				//$("#idpromointr").html(msg);
				//myfrm.biaya_tarif.value = 0;
				//alert(msg);
			$("#paymentDetail").html(msg);
			}
		   }
		 });
};
</script>
<?php   }else{
    redirect('backoffice/user');
}
?>
