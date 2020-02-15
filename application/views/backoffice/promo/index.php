<?php 
if(authorize($_SESSION["access"]["pengaturan_umum"]["promo"]["ac_view"])){
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pengaturan Umum <small>Promo / Slider</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Pengaturan umum</li>
			<li class="active">Promo / Slider</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				
				  <?php
				if (authorize($_SESSION["access"]["pengaturan_umum"]["promo"]["ac_create"])) {
					echo anchor('backoffice/promo/form', '<i class="fa fa-plus"></i> ENTRY DATA', 'class="btn btn-primary margin-bottom"');
				}
				?>
					<?php 
					if(authorize($_SESSION["access"]["pengaturan_umum"]["promo"]["ac_delete"])){
						echo btn_multi_hapus('promo/hapus/'.$promo->id);
						echo "<fieldset>";				
					}
				?>
			
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Daftar Promo / Slider</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="example" class="table table-hover no-padding">
							<thead>
								<tr class="headings">
								<?php 
										if(authorize($_SESSION["access"]["pengaturan_umum"]["promo"]["ac_delete"])){
									?>
										<th class="no-sort" style="width:20px">	
										<div align="center">
											<?=form_checkbox('btn_chk_all'," ", FALSE, 'class="icheckbox_flat-green checkall"');?>
										</div>
										</th>
									<?php } ?>
									<th class="no-sort" style="width:10px">No</th>
									<th class="no-sort">Judul</th>
									<th class="no-sort">URL</th>
									<th class="no-sort">Status</th>
									<th class="no-sort">Tanggal Posting</th>
									<th class=" no-link last no-sort"><span class="nobr">Aksi</span>
									</th>
								</tr>
							</thead>

							<tbody>
							<?php $no=1; ?>
                                            <?php if($promos):foreach ($promos as $promo) : ?>
                                              <tr class="even pointer">
											  <?php 
										if(authorize($_SESSION["access"]["pengaturan_umum"]["promo"]["ac_delete"])){
									?>
									<td>
										<div align="center">
											<?=form_checkbox('check_id[]', $promo->id, FALSE, 'class="icheckbox_flat-green chk"'); ?>
											</fieldset>
										</div>
									</td>
									<?php } ?>
									<td align="center"><?=$no++?></td>
									<td><?php echo anchor('backoffice/promo/form/'.$promo->id, $promo->id); ?></td>
									<td><?php echo $promo->judul; ?></td>
									
						  					<?php if($promo->status == 'Y'): ?>
                              		<td>
										<div class="btn-group  btn-group-sm">
											<a href="javascript:;"><button type="button"
													class="btn btn-primary active" disabled>&nbsp; Aktif &nbsp;</button></a>
                                               <?php
                                                        if (authorize($_SESSION["access"]["pengaturan_umum"]["promo"]["ac_edit"])) {
                                                            echo btn_tidak_aktif('backoffice/promo/stts/' . $promo->id);
                                                        }
                                                        ?>
                                              </div>
									</td>
                                              <?php else:?>
                              		<td>
										<div class="btn-group">
                                                       <?php
                                                        if (authorize($_SESSION["access"]["pengaturan_umum"]["promo"]["ac_edit"])) {
                                                            echo btn_aktif('backoffice/promo/stts/' . $promo->id);
                                                        }
                                                        ?>
                                                       <a
												href="javascript:;"><button type="button"
													class="btn btn-info active" disabled>&nbsp; Nonaktif &nbsp;</button></a>
										</div>
									</td>
                                              <?php endif;?>
                                              
                                    <td><?php echo $promo->tgl_posting; ?></td>
										
									<td class=" last">
										<div class="btn-group-vertical">
                                            <?php
                                                    if (authorize($_SESSION["access"]["pengaturan_umum"]["promo"]["ac_edit"])) {
                                                        echo btn_koreksi('backoffice/promo/form/' . $promo->id);
                                                    }
                                                    ?>
                                            <?php
                                                    if (authorize($_SESSION["access"]["pengaturan_umum"]["promo"]["ac_delete"])) {
                                                        echo btn_hapus('promo/hapus/' . $promo->id);
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

<script>
$(document).ready(function () {


<?php 
if(authorize($_SESSION["access"]["pengaturan_umum"]["promo"]["ac_delete"])){
?>
	$(document).on('click', '.btn_hapus_multi', function(){  
		// $('.btn_hapus_multi').click(function () { 
					   var chk = $('.chk:checked');
					   if(chk.length > 0){
						var chk_val = [];
						$(chk).each(function(){
							chk_val.push($(this).val());
						});

						swal({
							title: "Anda Yakin Ingin Menghapus?",
							text: "Item yang sudah di hapus tidak dapat di kembalikan!",
							type: "warning",
							showCancelButton: true,
							confirmButtonColor: '#DD6B55',
							confirmButtonText: 'Ya, Hapus Item!',
							cancelButtonText:'Batal',
							closeOnConfirm: true,
							showLoaderOnConfirm: true,
						},
						function(){
							$.ajax({
									method: "POST",
									url: "<?php echo base_url('backoffice/promo/multi_delete'); ?>",
									data: {chk_val: chk_val},
									success: function(){
										// $("#animation").hide();
										// jika tidak ada data
										$(".removeRow").fadeOut(300);
										setTimeout(function(){
										// window.location.replace('backoffice/promo');
											window.location.reload()
										}, 500);
										// chk.length = 0;
										// $('#example').data.reload();
									}
								});
						});
					
					   }else{
						swal({
                            title: "Mohon untuk memilih Data yang ingin dihapus",
                            type: "error",
                        });
					   }
					}); 
					
				$(document).on('click', '.chk', function(){  
				// $('.chk').click(function () {
					if($(this).is(':checked')){
						$(this).closest('tr').addClass('removeRow');
					}else{
						$(this).closest('tr').removeClass('removeRow');
					}
				});
				$(document).on('click', '.checkall', function(){  
				
					$(this).parents('fieldset:eq(0)').find('.chk').prop('checked', this.checked);
					if($('.chk').is(':checked')){
						$('.chk').closest('tr').addClass('removeRow');
					}else{
						$('.chk').closest('tr').removeClass('removeRow');
					}
					// $.uniform.update();
				});	
<?php } ?>
			});

</script>

<?php   }else{
    redirect('backoffice/user');
}
?>
