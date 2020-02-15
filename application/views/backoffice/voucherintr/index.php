<?php if(authorize($_SESSION["access"]["akun_saya"]["voucher"]["ac_view"])){
	echo $sukses.$error;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Voucher <small>Daftar Voucher</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Voucher</li>
			<li class="active">Lihat Voucher</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				
				  <?php 
				  if(authorize($_SESSION["access"]["akun_saya"]["voucher"]["ac_create"])){
				  echo anchor('backoffice/voucherintr/form','<i class="fa fa-plus"></i> ENTRY DATA','class="btn btn-primary"'); 
				  }
				  ?>
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Daftar Voucher</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="example"
							class="table table-striped  table-hover no-padding ">
							<thead>
								<tr class="headings">
									<th class="no-sort">Voucher Tersedia</th>
									<th class="no-sort bg-default" ></th>
									
    								
								</tr>
							</thead>
							<tbody>
                                            <?php if($voucherintrs):foreach ($voucherintrs as $voucherintr) : ?>
                                    <tr class="even pointer">

									<td class="bg-yellow" align="center" width="200" height="80">
										<h2><small><b><?php echo e($voucherintr->voucurr); ?>.</b></small><b>
										<?php echo thousandsCurrencyFormat($voucherintr->nilaivoucher); ?></b></h2>
										<p><?php echo e($voucherintr->namavoucher); ?></p>	

										
						            </td>

									<td >
										<h3 class="text-yellow">
											<b >Intrex Voucher</b>
										</h3>
										<p class="text-muted"><b>Kode : <?php echo e($voucherintr->kodevoucher); ?></b></p>
										<p class="text-muted">
										<small>Belaku sampai
										<cite title="Source Title"><?php echo e(tgl_no_jam($voucherintr->enddate)); ?></cite>
										</small></p>
											<div class="btn-group-vertical pull-right" >
                                            <?php 
                                            if(authorize($_SESSION["access"]["akun_saya"]["voucher"]["ac_edit"])){
                                            echo btn_koreksi('backoffice/voucherintr/form/'.$voucherintr->id);
                                            }
                                            ?>
                                            <?php 
                                            if(authorize($_SESSION["access"]["akun_saya"]["voucher"]["ac_delete"])){
                                            echo btn_hapus('voucherintr/hapus/'.$voucherintr->id);
                                            }
                                            
											//	echo $voucherintr->idvoucherpromorintr == $voucherintr->idvoucherintr && $voucherintr->idusers == $iduser ? "<span class='label label-success'>Sudah Diambil</span>" : anchor('backoffice/voucherintr/form/'.$voucherintr->idvoucherintr, "Ambil","class='btn btn-primary'") ;
											echo anchor('backoffice/voucherintr/form/'.$voucherintr->idvoucherintr, "Ambil","class='btn btn-primary'");
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

