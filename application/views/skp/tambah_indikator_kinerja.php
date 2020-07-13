<div class="row body-low-bg ">
	<div class="col-md-12 content-dalam">
		<div class="row">
				<div class="col-md-12" style="box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2; overflow:auto">
					<br/>
					<div class="row">
						<div class="col-md-12 content-dalam">
								<form  action="<?=base_url('index.php/skp/proses_indikator_kinerja/')?>" method="POST" >
									<div class="row" id="kotak">
											<div class="col-md-10">
												<br/>
												<div class="row">
													<div class="col-md-4">
														<label>Sasaran Kegiatan : </label>
													</div>
													<div class="col-md-8">
														<select id="id_sasaran_kegiatan"  name="id_sasaran_kegiatan" class="form-control" style="height:2.5rem">
																	 <option disabled selected value> -- Pilih Sasaran Kegiatan -- </option>
																	<?php
																		foreach ($sasaranKegiatans as $sasaranKegiatan) {
																	?>
																			<option value="<?= $sasaranKegiatan["id_sasaran_kegiatan"]?>" placeholder="<?= $sasaranKegiatan["id_parent"]?>"><?= $sasaranKegiatan["nama_sasaran_kegiatan"]?></option>
																	<?php
																		}
																	?>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-10">
												<br/>
												<div class="row">
													<div class="col-md-4">
														<label>Indikator Kinerja Parent : </label>
													</div>
													<div class="col-md-8">
														<select id="id_indikator_parent" name="id_indikator_parent" class="form-control" style="height:2.5rem" >
															 <option disabled selected value> -- Pilih Indikator kinerja -- </option>
															<?php
																foreach ($indikatorKinerjas as $indikatorKinerja) {
															?>
																	<option value="<?= $indikatorKinerja["id_indikator_kinerja"]?>" class="indikatorKinerja indikatorKinerjaNo<?= $indikatorKinerja["id_sasaran_kegiatan"]?>" style="display:none"><?= $indikatorKinerja["nama_indikator_kinerja"]?></option>
															<?php
																}
															?>
														</select>
													</div>
												</div>
											</div>

														<div class="col-md-10" >
															<br/>
															<div class="row">
																<div class="col-md-4">
																		<label>indikator Kinerja : </label>
																</div>
																<div class="col-md-8">
																		<input type="text" name="indikatorKinerja[]" class="form-control">
																</div>
															</div>
														</div>
														<div class="col-md-10" >
															<br/>
															<div class="row">
																<div class="col-md-4">
																		<label>Target : </label>
																</div>
																<div class="col-md-8">
																		<input type="text" name="target[]" class="form-control">
																</div>
															</div>
														</div>

										</div>
										<div class="row" style="clear:both">
											<div class="col-md-12">
												<br/>
												<center><a href="#" class="btn btn-warning" id="btnTambahKolom" >Tambah Kolom Indikator</a>  <button type="submit" class="btn btn-primary">&nbsp;&nbsp; Save &nbsp;&nbsp;</button></center>
											</div>
										</div>
								</form>
						</div>
					</div>
				</div>
				<br/><br/>
		</div>

	</div>
</div>
<?php

function custom_footer(){
	 $ci =& get_instance();
?>
		<script>
				$("#id_sasaran_kegiatan").change(function(){
					var id_sasaran_kegiatan =  $('option:selected', this).attr("placeholder");
					var id_sasaran_kegiatanNo = ".indikatorKinerjaNo"+id_sasaran_kegiatan ;
					$(".indikatorKinerja").hide();
					$("#id_indikator_kinerja").val("");
					$(id_sasaran_kegiatanNo).show();
				});

				$("#btnTambahKolom").on( 'click', function( event ) {
					 $("#kotak").append(`

								 <div class="col-md-10" >
									 <hr>
									 <br/>
									 <div class="row">
										 <div class="col-md-4">
												 <label>indikator Kinerja : </label>
										 </div>
										 <div class="col-md-8">
												 <input type="text" name="indikatorKinerja[]" class="form-control">
										 </div>
									 </div>
								 </div>
								 <div class="col-md-10" >
									 <br/>
									 <div class="row">
										 <div class="col-md-4">
												 <label>Target : </label>
										 </div>
										 <div class="col-md-8">
												 <input type="text" name="target[]" class="form-control">
										 </div>
									 </div>
								 </div>
					 `);
				});
		</script>
<?php
}
?>
