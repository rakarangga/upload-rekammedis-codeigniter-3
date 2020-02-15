<?php
if (authorize($_SESSION["access"]["pesanan_international"]["buat_pesanan_inter"]["ac_view"])) {
    ?>
<?php echo $sukses; echo $error;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	
      
         
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo empty($crinter->iddomorder) ? 'Buat Pesanan International' :  'Update International : <strong>'.$crinter->iddomorder.'</strong>'; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Pesanan International</li>
			<li class="active"><?php echo empty($crinter->iddomorder) ? 'Buat Pesanan International' :  'Update International'; ?></li>
		</ol>
	</section>


	<!-- Main content -->
	<section class="content">

   
		<div class="row">

	<?php echo form_open_multipart('','id="demo-form" name="interFrm" data-parsley-validate role="form"'); ?>
				<div class="col-xs-12">
		
			  <?php echo validation_errors(); ?>
			</div>
			<div class="col-md-6">
				<div class="box box-default  bg-yellow disabled">
					<div class="box-header with-border text-default">
						<h3 class="box-title">Tujuan</h3>
					</div>
					<div class="box-body ">

						<div class="form-group">
						<label for="country_codetujuan">Negara Tujuan <span class="required">*</span></label>
						<?php  echo form_dropdown('country_codetujuan', $country_codetujuan, $this->input->post('country_codetujuan') ? $this->input->post('country_codetujuan') : $crinter->country_codetujuan, 'id="country_codetujuan" name="country_codetujuan" class="form-control select2" style="width: 100%;"');?>
						</div>
					</div>

					<div class="box-header with-border text-default">
						<h3 class="box-title">Paket</h3>
					</div>
					<div class="box-body">

						<div class="form-group">
							<p>
								<label for="varchar">Dimensi Paket &nbsp;&nbsp;</label>dalam
								cm(s)
							</p>
							<div class="row">
								<div class="col-md-4">
									<input type="number" min="1" class="form-control"
										name="panjangpaket" id="panjangpaket" placeholder="L"
										value="1" style="font-size: 18px;" >
								</div>
								<div class="col-md-4">
									<input type="number" min="1" class="form-control"
										name="lebarpaket" id="lebarpaket" placeholder="W" value="1"
										style="font-size: 18px;" >
								</div>
								<div class="col-md-4">
									<input type="number" min="1" class="form-control"
										name="tinggipaket" id="tinggipaket" placeholder="H" value="1"
										style="font-size: 18px;">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="varchar">Berat (dalam Kg)</label> <input
								type="number" min="0" step="0.1" max="200" class="form-control"
								name="beratpaket" id="beratpaket"
								placeholder="Masukan Berat Paket..." value="0.1">
						</div>
						<div class="form-group" id="item_list">
							<p>
								<label for="varchar">Item Detail (Minimal satu item terisi)</label>
							</p>
							<!-- <div class="row">
								<div class="col-md-2">
									<p align="center">
										<b>Name</b>
									</p>
								</div>
								
								<div class="col-md-2">
									<p align="center">
										<b>Currency</b>
									</p>
								</div>
								
								<div class="col-md-2">
									<p align="center">
										<b>Price</b>
									</p>
								</div>
							
								<div class="col-md-2">
									<p align="center">
										<b>Item QTY</b>
									</p>
								</div>
								<div class="col-md-2">
									<p align="center">
										<b>Total</b>
									</p>
								</div>
								<div class="col-md-2">
									<p align="center">
										<b>Add/Close</b>
									</p>
								</div>
							</div> -->
							<div class="row itemdetail" id="item">
								<div class="col-md-2">
									<input type="text" class="form-control" name="namaitem[]"
										id="namaitem_0" placeholder="Name" value="" required="">
								</div>
								<div class="col-md-2">
									<!-- <input type="text" class="form-control" name="currency[]"
										id="currency_0" placeholder="currency" value="" required=""> -->
										<?php $option = array('IDR'=>'IDR','USD'=>'USD');?>
										<?php  echo form_dropdown('currency[]', $option, $this->input->post('currency[]'), 'id="currency_0" name="currency[]" class="form-control" style="width:100%;"');?>
					
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" name="priceitem[]"
										id="priceitem_0" placeholder="Price" value=""
										onkeypress="return isNumberKey(event)" required="" oninput="return countItemDetail()">
								</div>
								<div class="col-md-2">
									<input type="number" min="1" max="40" class="form-control"
										name="qty[]" id="qty_0" placeholder="QTY" value="1"
										onkeypress="return isNumberKey(event)" required=""  oninput="return countItemDetail()">
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" name="totalprice[]"
										id="totalprice_0" placeholder="total" value=""
										onkeypress="return isNumberKey(event)" required="">
								</div>
								<div class="col-md-2">
									<button type="button" class="btn btn-primary" id="addMoreItem"
										style="font-weight: bold;" align="center">Add</button>
								</div>
							</div>
						</div>

						<div class="form-group">
							<p>
								<label for="packageType">Jenis Barang</label>
							</p>
							<label> <input type="radio" name="jenisbarang" id="jenisbarang" class="flat-red"
								value="dokumen" checked> Dokumen
							</label> <label> <input type="radio" name="jenisbarang" id="jenisbarang"
								class="flat-red" value="paket"> Paket
							</label>
						</div>
				
					</div>
					<!-- /.box-body -->

					<div class="box-footer bg-yellow disabled no-border"></div>
				</div>

			
				<div class="box box-default bg-yellow disabled" style="height: 35%">
					<div class="box-header with-border">
						<h3 class="box-title">Alamat Lengkap</h3>
					</div>
					<div class="box-body ">
						<div class="form-group">
							<label for="varchar">Nama Lengkap Penerima </label> <input type="text"
								class="form-control" name="namapenerima" id="namapenerima"
								placeholder="">
						</div>

						<div class="form-group">
							<label for="varchar">Telepon </label> <input type="text"
								class="form-control" name="notelppenerima" id="notelppenerima"
								value="">

						</div>

						<div class="form-group">
							<label for="varchar">Alamat * </label>
							<textarea class="form-control" rows="2"
								name="alamatlengkappenerima" id="alamatlengkappenerima"
								placeholder="Masukan Alamat Pengiriman (e.g Jalan dan Nomor Rumah)"
								value="" required=""></textarea>
						</div>

						<div class="form-group">
							<label for="varchar">Kode Pos Negara </label> <input type="tel"
								class="form-control" name="kodeposnegara" id="kodeposnegara"
								onkeypress="return isNumberKey(event)" value="">

						</div>


					</div>
					
					<div class="box-footer bg-yellow disabled no-border"></div>
				</div>

			</div>

			<div class="col-md-6">
				<div class="box box-default" style="height: 200%">
					<div class="box-header with-border">

						<h3 class="box-title">Tarif</h3>
					</div>
					<div class="box-body ">
						<!-- <div class="form-group">
							<label for="idkla_layananiex">Layanan International <span
								class="required">*</span></label> -->
								<?php // echo form_dropdown('idkla_layananiex', $idkla_layananiex, $this->input->post('idkla_layananiex') ? $this->input->post('idkla_layananiex') : $crinter->country_codetujuan, 'id="idkla_layananiex" name="idkla_layananiex" class="form-control select2" style="width: 100%;"');?>
						<!-- </div> -->
						

						<!-- <div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"> <input type="checkbox"
									class="flat-red" value="0" name="cekAsuransi">
								</span> <input type="text" class="form-control" disabled
									value="Termasuk Asuransi">
							</div>
						</div> -->
						
						<div class="form-group">
    						<div class="input-group">
                    				<div class="input-group-btn">
            							<button type="button" class="btn btn-primary" id="check-tarif"
            								name="check-tarif" onClick="onClick()"
            								style="font-weight: bold;" data-toggle="modal"
            								data-target="#cekTarif"  >Cek Tarif
											
											   <div class="overlay" id="loadCekTarif">
												</div>
											</button>
            					 	</div>
    							<input type="text" class="form-control" disabled name="ratePrice" id="ratePrice" placeholder="Klik 'Cek Tarif!' dan pilih jenis layanan yang ingin digunakan..."
    							value="" required>
    						</div>
    								 <input type="hidden" name="rateId" id="rateId" value="" placeholder="rateID"> 
    								 <input type="hidden" class="rateItem" name="rateDay" id="rateDay" value="" placeholder="rateDay"> 
    								 <input type="hidden" name="gw" id="gw" value="" placeholder="gw"> 
    								 <input type="hidden" name="v" id="v" value="" placeholder="v"> 
    								 <input type="hidden" name="cw" id="cw" value="" placeholder="cw"> 
									 <input type="hidden" name="idkla_layananiex" id="idkla_layananiex"  placeholder="klalayanan">
									 <input type="hidden" name="idjenislayananiex" id="idjenislayananiex" value="0" placeholder="jlayanan">
    								 <input type="hidden" class="form-control" name="biaya_tarif" id="biaya_tarif" placeholder="Ketik Harga Barang Disini..." value="0" required="">
									 <input type="hidden" class="form-control" name="biaya_promo" id="biaya_promo" placeholder="Ketik promo Barang Disini..." value="0" required="">
    					
						</div>
						
					<div class="form-group">
						<label for="idpromointr">Promo</label>
						<?php $option = array('0'=>'Tidak Ada Promo');?>
						<?php  echo form_dropdown('idpromointr', $option, $this->input->post('idpromointr') ? $this->input->post('idpromointr') : $crinter->idpromointr, 'id="idpromointr" name="idpromointr" class="form-control select2" style="width: 100%;"');?>
					</div>
					
						<div class="form-group">
							<label for="varchar">Biaya Asuransi </label> <input type="text"
								class="form-control" name="biaya_asuransiintr"
								id="biaya_asuransiintr" placeholder="" value="0"
								readonly="readonly">
						</div>
						
					<div id = "layananTerpilih" class ="layananTerpilih">
						<div class="box-header">

							<h3 class="box-title">Layanan Terpilih</h3>
						</div>
						<div class="form-group">
							<div id="selLogisticRate" style="margin-left: 10px;">
								<label for="varchar">- <span id="kLayananLabel"> kLayananLabel</span>
								<br>- <span id="jLayananLabel">jLayananLabel</span> : <span id="durasiLabel"> 0-0 Hari</span></label>
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-4">
								<label for="varchar" class="text-green">Berat Sebenarnya<br />
									(GW) : <span id="actualWeight">0.1</span> KG
								</label>
							</div>
							<div class="col-xs-4">
								<label for="varchar" class="text-aqua">Berat Dalam Volume <br />(V)
									: <span id="volumeWeight">0.1</span> KG
								</label>
							</div>
							<div class="col-xs-4">
								<label for="varchar" class="text-red">Berat Akhir <br />(CW) : <span
									id="finalWeight">0.1</span> KG
								</label>
							</div>
						</div>
					</div>

					</div>
					

					<div class="box-footer"></div>
				</div>
				
					<div class="box box-default" style="height: 35%">
					<div class="box-header with-border">
						<h3 class="box-title">Pengirim</h3>
					</div>
					<div class="box-body ">


						<div class="form-group">
							<label for="varchar">Nama Lengkap </label> <input type="text"
								class="form-control" name="namapengirim" id="namapengirim"
								placeholder="" value="<?php echo $nama_lengkap; ?>" disabled>
						</div>

						<div class="form-group">
							<label for="varchar">Telepon </label> <input type="tel"
								class="form-control" name="notelppengirim" id="notelppengirim"
								value="<?php echo $no_hp; ?>"
								onkeypress="return isNumberKey(event)" disabled>

						</div>

					</div>
					<div class="box-footer no-border"></div>
				</div>


				<div class="box box-default disabled" style="height: 35%">
					<div class="box-header with-border">
						<h3 class="box-title">Task</h3>
					</div>
					<div class="box-body " align="center">
						<div class="form-group">
					<div class="table-responsive">
						<table class="table">
						  <tbody><tr>
							<th style="width:50%">Biaya Tarif :</th>
							<td id="detailTarif">0</td>
						  </tr>
						<!--   <tr>
							<th>Biaya Asuransi:</th>
							<td id="detailAsuransi">0</td>
						  </tr> -->
						  <tr>
							<th>Biaya Promo :</th>
							<td id="detailPromo">0</td>
						  </tr>
						  <tr>
							<th>Total Bayar :</th>
							<td id="detailTotal">0</td>
						  </tr>
						</tbody></table>
					  </div>
					  </div>
					<div class="box-body ">
					
					  <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
					  <?php echo anchor ( 'backoffice/domestic', 'Kembali', 'class="btn btn-warning"' ); ?>
					
					</div>
					

					</div>
					<div class="box-footer no-border"></div>
					
				</div>

				
			</div>


		</div>
		
		<!-- Modal Cek Tarif-->
		<div class="modal fade" id="cekTarif" tabindex="-1" role="dialog"
			aria-labelledby="cekTarifLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="cekTarifLabel">Cek Tarif</h4>
					</div>
					<div class="modal-body nav-tabs-custom no-border"  id="jenisLayanan">
						<!-- Custom Tabs -->
						<!-- nav-tabs-custom -->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /Modal Cektarif -->
			<?php echo form_close();?>


	
	</section>
	
</div>

<script type="text/javascript">

function round(value, precision) {
    var multiplier = Math.pow(10, precision || 0);
    return Math.round(value * multiplier) / multiplier;
	};

function countItemDetail(){
	var myfrm = document.interFrm; 
	var i;
	//var namaitem =  document.getElementById('namaitem_0');
	var namaitem = $("div[class*='itemdetail']").length;
	for(i=0;i<=namaitem;i++){
			var myBox1 = document.getElementById('priceitem_'+i).value; 
		    var myBox2 = document.getElementById('qty_'+i).value;
		    var result = document.getElementById('totalprice_'+i); 
		    var myResult = myBox1 * myBox2;
		    result.value = myResult;
		};
		  
		
};

function setRate(rateID, rateHarga, rateDurasi, rateHargaDisplay, currencyRate, klasiRateName, jenisRateName, klasiRateId, jenisRateId) {
	  var myfrm = document.interFrm; 
	 
	 // var rateDay = document.getElementsByClassName(classname);
	  myfrm.rateId.value = rateID;
	  myfrm.ratePrice.value = currencyRate + ' ' + rateHargaDisplay;
	  myfrm.rateDay.value = rateDurasi;
	  myfrm.biaya_tarif.value = rateHarga;
	  myfrm.idkla_layananiex.value = klasiRateId;
	  myfrm.idjenislayananiex.value = jenisRateId;
	  var v = (myfrm.v.value);
	  var gw = (myfrm.gw.value);
	  var cw = (myfrm.cw.value);
	  $("#layananTerpilih").show();
	  document.getElementById("actualWeight").innerHTML = gw;
	  document.getElementById("volumeWeight").innerHTML = v;
	  document.getElementById("finalWeight").innerHTML = cw;
	  document.getElementById("durasiLabel").innerHTML = rateDurasi;
	  document.getElementById("kLayananLabel").innerHTML = klasiRateName;
	  document.getElementById("jLayananLabel").innerHTML = jenisRateName;
	  document.getElementById("detailTarif").innerHTML = currencyRate + ' ' + rateHargaDisplay;
	  
						$.ajax({
				           type: "POST",
				           dataType: "html",
				           url: "<?php echo base_url('backoffice/crinter/promo_ajax'); ?>",
				           data: {nilaiPromo: rateHarga},
				           success: function(msg){
				           // jika tidak ada data
				           if(msg == ''){
				        	//alert('kosong');
							 myfrm.biaya_promo.value ="0";
							document.getElementById("detailPromo").innerHTML = "0";
							document.getElementById("idpromointr").innerHTML = "0";
							document.getElementById("detailTotal").innerHTML = currencyRate + ' ' + rateHargaDisplay;
				            }else{// jika dapat mengambil data,, tampilkan di combo box 
							 
							$("#idpromointr").html(msg);
						   
							//myfrm.biaya_tarif.value = 0;
							}
				           }
				         });
  };	
  
 function onClick() {
					
					 $("#loadCekTarif").html('<i class="fa fa-refresh fa-spin"></i>');
					 $("#loadCekTarif").show();
					 var country_codetujuan = $("#country_codetujuan").val();
					 var myfrm = document.interFrm;
							var actualW = (myfrm.beratpaket.value); //berat sebenarnya
							var p = (myfrm.panjangpaket.value); 
							var l = (myfrm.lebarpaket.value);
							var t = (myfrm.tinggipaket.value);
							var v =(p*l*t)/5000; // berat volume
							var finalW = Math.ceil(round(v, 2)) >= Math.ceil(round(actualW, 2)) ? Math.ceil(round(v, 2)) : Math.ceil(round(actualW, 2)); //berat akhir
							//var hargaPengiriman = (myfrm.hargapengiriman.value);
							myfrm.v.value = round(v, 2);
							myfrm.gw.value = round(actualW, 2);
							myfrm.cw.value = finalW
							
							//document.getElementById("actualWmodal").innerHTML = round(actualW, 2);
							//document.getElementById("volumeWmodal").innerHTML = round(v, 2);
							//document.getElementById("finalWmodal").innerHTML = finalW;
					 $.ajax({
				           type: "POST",
				           dataType: "html",
				           url: "<?php echo base_url('backoffice/crinter/klasiLayanan_ajax'); ?>",
				           data: {country_codetujuan: country_codetujuan, finalWcount : finalW},
				           success: function(msg){
				       
				           // jika tidak ada data
				           if(msg == ''){
				        	$("#kodeposuser").val("");
				        	alert('kosong');
				            }
							
				           else{// jika dapat mengambil data,, tampilkan di combo box 
						  
				           $('#jenisLayanan').append(msg); 
						   
				           //alert(msg);    
							var actuals = document.getElementsByClassName('actualWmodal');
							for (var i = 0; i < actuals.length; ++i) {
								var gw = actuals[i];  
								gw.innerHTML = round(actualW, 2);
									}	
									
							var volumes = document.getElementsByClassName('volumeWmodal');
							for (var i = 0; i < volumes.length; ++i) {
								var volume = volumes[i];  
								volume.innerHTML = round(v, 2);
									}	
							
							var finals = document.getElementsByClassName('finalWmodal');
							for (var i = 0; i < finals.length; ++i) {
								var cw = finals[i];  
								cw.innerHTML = finalW;
									}	
							  $("#loadCekTarif").hide();		
						
							}
				           }
				         });
					};
					
			

</script>
<?php

} else {
    redirect('backoffice/user');
}
?>

