
<div class="wrapper" >
  <!-- Main content -->
  <section class="invoice">
  
   <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive" align="center">
        <table class="table table-bordered" style="width:14cm;">
          <thead>
          <tr>
            <th colspan="2">
            		<img class="img-responsive" width="170" height="150"
            			src="<?php echo base_url()?>assets/dist/img/truck-intrex.png"
            			alt="Photo">
			</th>
            <th class="text-center" colspan="3"><?php  echo '<img class="img-responsive" style="height:40px;" src="data:image/png;base64,' . $get_barcode. '">'; ; ?></br><?php echo  $international->no_pesanan; ?></th>
        
          </tr>
          </thead>
          <tbody>
          <tr>
           <td colspan="5" style="height:40px;">
          		<dl>
                <dt><small>Pengirim</small></dt>
                <dd><small><?php echo  $international->namapengirim; ?> </small></dd>
                <dd></small><?php echo  $international->notelppengirim; ?></small></dd>
              	</dl>
          </tr>
          <tr>
           <td colspan="5" style="height:40px;">
          		<dl>
                <dt><small>Penerima</small></dt>
                <dd><small><?php echo   $international->namapenerima; ?></small></dd>
                <dd></small><?php echo  $international->notelppenerima; ?></small></dd>
                 <dd></small><?php echo   $international->alamatlengkappenerima; ?></small></dd>
              	</dl>
            </td>
          </tr>
          <tr>
            <td colspan="2">
            <small><?php echo tgl_indo($international->waktuorder);?></small></br>
             <small><?php echo $international->jenislayanan.' - '.$international->namalayananex; ?></small></br>
            <small>Jenis Barang : <?php echo $international->jenisbarang;?></small>
            </td>
        	
            <td  class="text-center" colspan="3">
            
            <h3><strong>
            <?php echo  $international->country_codekirm.'-'. $international->country_codetujuan; ?></br>
            <?php echo $international->kodeposnegara; ?>
            </strong></h3>
            
            </td>
           
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
