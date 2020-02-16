<?php 
//if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_view"])){ DICOMMENT KARENA DIGUNAKAN DI CONTROLLER LANGSUNG
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pengaturan Umum <small>User Management</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Pengaturan umum</li>
			<li class="active">User Management</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				
				  <?php 
				  if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_create"])){
				  echo anchor('backoffice/settuser/form','<i class="fa fa-plus"></i> ENTRY DATA','class="btn btn-primary margin-bottom"'); 
				  }
				  ?>
          <?php 
					if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_delete"])){
						echo btn_multi_hapus('user/hapus/'.encrypting($user->iduser));
						echo "<fieldset>";				
					}
				  ?>
			
			
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Daftar User Management</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example2" class="table table-bordered ">
							<thead>
							  <tr class="headings">
						
                                          <?php 
                                              if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_delete"])){
                                            ?>
                                              <th class="no-sort" style="width:20px">	
                                              <div align="center">
                                                <?=form_checkbox('btn_chk_all'," ", FALSE, 'class="icheckbox_flat-green checkall"');?>
                                              </div>
                                              </th>
                                            <?php } ?>
                                            <th class="no-sort" style="width:10px">No</th>
                                             <th class="no-sort">Nama Lengkap </th>
                                             <th class="no-sort">Username </th>
                                             <th class="no-sort">Email </th>
                                             <th class="no-sort">Hak akses </th>
                                             <th class="no-sort">Status </th>
                                             <th class=" no-link last no-sort"><span class="nobr">Aksi</span></th>
                                         </tr>
                                  </thead>
                                <tbody>
								<?php /* ?>
                                <?php $no=1; ?>
                                            <?php if($users):foreach ($users as $user) : ?>
                                              <tr class="even pointer">
                                              <?php 
                                                if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_delete"])){
                                              ?>
                                              <td>
                                                <div align="center">
                                                  <?=form_checkbox('check_id[]', encrypting($user->iduser), FALSE, 'class="icheckbox_flat-green chk"'); ?>
                                                  </fieldset>
                                                </div>
                                              </td>
                                              <?php } ?>
                                              <td align="center"><?=$no++?></td>
                                             <td ><?php if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_edit"])){
                                                 echo anchor('backoffice/settuser/form/'.encrypting($user->iduser), $user->namalengkap); 
                                                }else{
                                                    echo $user->namalengkap;
                                                }?></td>
                                             <td ><?php echo $user->namauser; ?></td>
                                             <td ><?php echo $user->email; ?></td>
                                             <td ><?php echo $user->u_an_id; ?></td>

                                             <?php if($user->stts == 'Y'): ?>
                              								<td>
                                              <div class="btn-group  btn-group-sm">
                                              <a href="javascript:void(0);"><button type="button" class="btn btn-primary active" disabled> &nbsp; Aktif &nbsp;</button></a>
                                               <?php 
                                               if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_edit"])){
                                               echo btn_tidak_aktif('backoffice/settuser/stts/'.encrypting($user->iduser));
                                               }
                                               ?>
                                              </div>
                              								</td>
                                              <?php else:?>
                              								<td>
                                                <div class="btn-group">
                                                       <?php 
                                                       if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_edit"])){
                                                       echo btn_aktif('backoffice/settuser/stts/'.encrypting($user->iduser));
                                                        }?>
                                                       <a href="javascript:void(0);"><button type="button" class="btn btn-info active" disabled> &nbsp; Nonaktif &nbsp;</button></a>
                                                  </div>
                              								</td>
                                              <?php endif;?>

                                             <td class=" last">
                                               <div class="btn-group-vertical">
                                            <?php  
                                            if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_edit"])){ 
                                                     echo btn_koreksi('backoffice/settuser/form/'.encrypting($user->iduser));
                                            }
                                            ?>
                                            <?php 
                                            if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_delete"])){
                                            echo btn_hapus('settuser/hapus/'.encrypting($user->iduser));
                                            }
                                            ?>
                                          
                                        </div>
                                             </td>
                                              </tr>
                                           <?php  endforeach; endif; ?>
										<?php */ ?>

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
	
	var dataTable = $('#example2').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "<?php echo base_url('backoffice/settuser/fetch_ajax'); ?>",
            type: "POST",
        },
		"language": {
            processing: '<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>'
     	 },
        "columnDefs": [{
            "targets": [0, 3, 4],
            "orderable": false,
        }, ],
    });

<?php 
if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_delete"])){
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
									url: "<?php echo base_url('backoffice/settuser/multi_delete'); ?>",
									data: {chk_val: chk_val},
									success: function(){
										// $("#animation").hide();
										// jika tidak ada data
										$(".removeRow").fadeOut(300);
										setTimeout(function(){
										// window.location.replace('backoffice/user');
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

<?php   
// }else{
// 	redirect('backoffice/user');

// }
?>
