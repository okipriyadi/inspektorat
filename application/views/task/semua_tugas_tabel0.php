<div class="col-md-12 content-dalam">
	<div class="row">
		<div class="offset-1 col-md-10" style="box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2;">
			<div class=" task-board">
				<div class="table-responsive p-2">
					<br />
					<div class="form-group">
						<form action="?" method="post">

							<div class="row" style="background:#9bdaeb; border:solid 2px;">

								<div class="col-md-2">
									<div class="form-group">

										<div class="button-group">
											Nama PIC
											<!-- Basic dropdown -->
											<button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-users fa-2x "></span></button>

											<div class="dropdown-menu" style=" height: auto; max-height: 200px; overflow-x: hidden;">
												<?php
												foreach ($pics as $key => $value) {
												?>
													<a class="dropdown-item">
														<!-- Default unchecked -->
														<div class="custom-control custom-checkbox" data-value="<?= $value["user_id"] ?>">
															<input type="checkbox" class="custom-control-input" value="<?= $value["user_id"] ?>" name="pic[]">
															<img src="<?php echo base_url("assets/template/img/crew/" . $value['foto']) ?>" title="<?= $value['nama'] ?>" class="img-fluid rounded" width="10%">
															<label class="custom-control-label" for="checkbox1"><?= $value["nama"] ?></label>
														</div>
													</a>
												<?php
												}
												?>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="row">
										<div class="col-md-5">
											<div class="row">
												<label>Tanggal Mulai:</label>
												<input type="date" class="form-control" name="start_date">
											</div>
										</div>
										<div class="col-md-1">
										</div>
										<div class="col-md-5">
											<div class="row">
												<label>Tanggal Akhir:</label>
												<input type="date" class="form-control" name="end_date">
											</div>
										</div>
										<div class="col-md-1">
											<label>&nbsp</label><br />

										</div>

									</div>
								</div>




								<div class="col-md-4">
									<label>Search</label><br />
									<div class="row">
										<div class="col-md-7">
											<input type="text" class="form-control" name="search"> </input>
										</div>
										<div class="col-md-4">
											<button class="btn btn-success"><span class="fa fa-filter"> </span> Filter</button>
										</div>

										<div class="col-md-1">
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
				</div>
				<table class="table table-hover table-bordered table-stripped" id="datatable">
					<thead>
						<th>No</th>
						<th width="20%">Kegiatan</th>
						<th width="30%">Kategori</th>
						<th width="15%">Mulai</th>
						<th width="15%">Selesai</th>
						<th>Status</th>
						<th width="15%">PIC</th>
						<th>Keterangan</th>
						<!-- <th>Aksi</th> -->
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($tasks as $key => $value) {
						?>
							<tr>

								<td class="text-center"><?php echo $no++; ?></td>
								<td><a href="<?= base_url("index.php/task/proyek/" . $value["id_project"]) ?>" style="font-weight:normal">
										<?= $value['title'] ?></a>
								</td>
								<td><a href="<?= base_url("index.php/task/proyek/" . $value["id_project"]) ?>" style="font-weight:normal">
										<?= $value["project_name"] ?></a></td>
								<td><?= date('d-F-Y', strtotime($value['start_date'])) ?></td>
								<td><?= date('d-F-Y', strtotime($value['end_date'])) ?></td>
								<td class="<?php echo $value['id_state'] == 1 ? 'table-primary' : '';
											echo $value['id_state'] == 2 ? 'table-warning' : '';
											echo $value['id_state'] == 3 ? 'table-success' : '' ?>"><?= $value['status_name'] ?></td>
								<td>
									<?php
									$users = $this->task_model->getUserTaskDetail($value["id_task_detail"]);
									if ($users) {
										foreach ($users as $ukey => $uvalue) {
									?>
											<img src="<?php echo base_url("assets/template/img/crew/" . $uvalue['foto']) ?>" title="<?= $uvalue['nama'] ?>" class="img-fluid rounded" width="30%">
									<?php
										}
									}
									?>
								</td>
								<td class="<?php echo (new DateTime('now') > new DateTime($value['end_date'])) && $value['id_state'] != 3 ? 'table-danger' : '' ?>">
									<?php

									$lampirans = $this->task_model->getLampiranTask($value["id_task_detail"]);
									$nolampiran = 1;
									foreach ($lampirans as $ukey => $uvalue) {
										echo "<a href='" . base_url($uvalue['link']) . "'> Lampiran-" . $nolampiran++ . "</a>";
									}
									?>

								</td>

							</tr>

						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
</div>


<?php

function custom_footer(){
	 $ci =& get_instance();
?>
<script>
var options = [];
$( '.tambah-komentar-button' ).on( 'click', function( event ) {
	$('.tambah-komentar').show();
	$('.tambah-komentar-button').hide();
});

$("#id_sasaran_kegiatan").change(function(){
  var id_sasaran_kegiatan = $("#id_sasaran_kegiatan").val();
	var id_sasaran_kegiatanNo = ".indikatorKinerjaNo"+id_sasaran_kegiatan ;
	$(".indikatorKinerja").hide();
	$(id_sasaran_kegiatanNo).show();
});

$("#id_kategori").change(function(){
		var id_kategori =   $('#id_kategori').val() ;
		$.ajax({url: "<?php echo base_url('index.php/task/get_category') ?>",
			type: "POST",
			data: {
				id_project : id_kategori
			},
			success: function(result){
			 		var data2 =  JSON.parse(result);
			    $('#id_status').empty();
          for (var i = 0; i < data2.length; i++) {
							$('#id_status').append($('<option>', {
									 value: data2[i].id_status ,
									 text : data2[i].status_name
							 }));
          }
  		},
			fail: function(xhr, textStatus, errorThrown){
				alert('gagal koneksi ke server');
	 		}
		});
});

$(".lihatSemuaKomentar").click(function(){
	var id_task_detail =   $(this).attr("placeholder") ;
	var targetClass = '.komentarTaskId' + id_task_detail ;
	$(targetClass).show();
	$(this).hide();
});

$(".kirim-komentar").click(function(){
	var id_task_detail =   $(this).attr("placeholder") ;
	var idTarget = '#textareaKomentar' + id_task_detail;
	var komentar = $(idTarget).val();
  $.ajax({url: "<?php echo base_url('index.php/task/tambahKomentar') ?>",
			type: "POST",
			beforeSend: function() {
				$('.loading-tambah-komentar').show();
		    $('#loadingResponse').text(komentar);
		  },
			data: {
				komentar: komentar,
				id_user : <?php echo $ci->session->userdata('user_id_iman') ?> ,
				id_task_detail : id_task_detail
			},
			success: function(result){
				var kolomKomentarId = '.kolom-komentar' + id_task_detail;
				$('.loading-tambah-komentar').hide();
				$('.tambah-komentar').hide();
				$('.tambah-komentar-button').show();
				$(kolomKomentarId).prepend( `
						<div class='row'>
								<div class='col-md-1'>
									<img src='`+ "<?= base_url("assets/template/img/crew/".$ci->session->userdata('foto_iman')) ?>" +`' class='img-fluid rounded-circle'>
								</div>
								<div class='col-md-8'>
										<p class='media-comment' style='color:black; position: relative; background: #dad1d1; font-size: 12px; border-radius: 7px; padding: 10px'>
											`+ $.datepicker.formatDate('dd/mm/yy', new Date()) +`<br/>
											`+ komentar +`
										</p>
								</div>
								<div class='col-md-1'>
								</div>
						</div>
						`);
  		},
			fail: function(xhr, textStatus, errorThrown){
				alert('kirim komentar gagal');
	 		}
		});
});

$( '.dropdown-menu div' ).on( 'click', function( event ) {

   var $target = $( event.currentTarget ),
       val = $target.attr( 'data-value' ),
       $inp = $target.find( 'input' ),
       idx;

   if ( ( idx = options.indexOf( val ) ) > -1 ) {
      options.splice( idx, 1 );
      setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
   } else {
      options.push( val );
      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
   }

   $( event.target ).blur();

   console.log( options );
   return false;
});
</script>


<?php
}
/*
foreach ($userT as $key => $value) {
    # code...
    if(!empty($value)){
    ?>
    <div id="list_user_<?php echo $key;?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-header" style="background:#007bff;">
                <h4 style="color:white;">PIC</h4>
            </div>
            <ul class="list-group">
                <?php
            foreach ($value as $ukey => $uvalue) {
                # code...
            ?>
                <li class="list-group-item"><?=$uvalue['nama']?></li>
            <?php }?>
            </ul>
            <div class="modal-footer" style="background:#007bff;">
                <button type="button" class="btn btn-primary" style="background:#fff;color:black;" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
    <?php
    }
}
*/
?>