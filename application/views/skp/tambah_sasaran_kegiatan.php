<div class="row body-low-bg ">
	<div class="col-md-12 content-dalam">
		<div class="row">
				<div class="col-md-12" style="box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2; overflow:auto">
					<br/>
					<div class="row">
						<div class="col-md-12 content-dalam">
								<form  action="<?=base_url('index.php/skp/proses_sasaran_kegiatan/')?>" method="POST" >
									<div class="row">
											<div class="col-md-10">
												<div class="row">
													<div class="col-md-4">
															<label>Sasaran Kegiatan : </label>
													</div>
													<div class="col-md-8">
															<input type="text" name="nama_sasaran_kegiatan" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-md-10">
												<br/>
												<div class="row">
													<div class="col-md-4">
														<label>Cascading Sasaran Kegiatan : </label>
													</div>
													<div class="col-md-8">
														<select id="id_sasaran_kegiatan" name="id_parent" class="form-control" style="height:2.5rem">
																	 <option disabled selected value> -- Pilih Sasaran Kegiatan -- </option>
																	<?php
																		foreach ($sasaranKegiatans as $sasaranKegiatan) {
																	?>
																			<option value="<?= $sasaranKegiatan["id_sasaran_kegiatan"]?>" ><?= $sasaranKegiatan["nama_sasaran_kegiatan"]?></option>
																	<?php
																		}
																	?>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="row" style="clear:both">
											<div class="col-md-12">
												<br/>
												<center><button type="submit" class="btn btn-primary">&nbsp;&nbsp; Save &nbsp;&nbsp;</button></center>
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
