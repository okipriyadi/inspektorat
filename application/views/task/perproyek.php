
	<style type="text/css">
		 .form-control input{
			 height: 10px
		 }
		 .biru-langit{
			 background: #a6d9ec;
			 //text-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2;

		 }


		 .merah{
			 background: red;
			 color: white;
		 }



		 .putih{
			 background: white;

		 }

		 .btn-tambah{
		 	box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2;
		 	border-radius: 5px;
		 	margin-top: 5px;
		 }

		 .table-proyek{
				//background: #a6d9ec;
				box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2;

				/*border-radius: 5px;
				display: inline-block;
				vertical-align: top;
				//font-size: 0.9em;*/
			}

			.task-board {
					display: inline-block;
					padding: 12px;
					border-radius: 3px;
					//width: 550px;
					white-space: nowrap;
					overflow: auto;
					min-height: 300px;
			}

			.status-card {
					width: 250px;
					margin-right: 30px;
					background: #a6d9ec;
					box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2;
					border-radius: 3px;
					display: inline-block;
					vertical-align: top;
					font-size: 0.9em;
			}

			.status-card:last-child {
					margin-right: 0px;
			}

			.card-header {
					width: 100%;
					padding: 10px 10px 0px 10px;
					box-sizing: border-box;
					border-radius: 3px;
					display: block;
					font-weight: bold;
			}

			.card-header-text {
					display: block;
			}

			ul.sortable {
					padding-bottom: 10px;
			}

			ul.sortable li:last-child {
					margin-bottom: 0px;
			}

			ul {
					list-style: none;
					margin: 0;
					padding: 0px;
			}

			.text-row {
					padding: 15px 10px;
					margin: 10px;
					background: #fff;
					box-sizing: border-box;
					border-radius: 3px;
					border-bottom: 1px solid #ccc;
					cursor: pointer;
					font-size: 0.8em;
					white-space: normal;
					line-height: 20px;
			}

			.ui-sortable-placeholder {
					visibility: inherit !important;
					background: transparent;
					border: #666 2px dashed;
			}

			.ui-li-shadow{
				box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2;
			}

			.history-li{
				background: white;
				padding-bottom:0px;
			}
	</style>

<div class="row body-low-bg ">
	<div class="col-md-12 content-dalam">
					<!-- Modal -->
					<div id="myModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header" style="background:#007bff; ">
									<h4 class="modal-title" style="color:white">Tambah Proyek</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>

					      </div>
								<form  action="<?=base_url()?>index.php/task/tambah_proyek" method="POST">
							      <div class="modal-body biru-langit" style="">
											  <div class="form-group ">
											    <label ><b>Nama Proyek:</b></label> &nbsp;&nbsp;
											    <input type="text" class="form-control" name="nama_proyek">
											  </div>
												<div class="form-group">
													<div class ="row">
														<div class="col-md-6">
													    <label ><b>Tanggal Mulai Proyek:</b></label> &nbsp;&nbsp;
													    <input type="date" class="form-control" name="start_date">
														</div>
														<div class="col-md-6">
													    <label ><b>Tanggal Akhir Proyek:</b></label> &nbsp;&nbsp;
													    <input type="date" class="form-control" name="end_date">
														</div>
													</div>
											  </div>
							      </div>
							      <div class="modal-footer " style="background:#007bff">
							        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
											<input type="submit" class="btn btn-default" value="Simpan">
							      </div>
									</form>
					    </div>
					  </div>
					</div>
					<!-- ------------------------------------ modal end ---------------------------- -->
		<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-5">
								<button type="button" class="btn btn-primary btn-lg btn-tambah" data-toggle="modal" data-target="#myModal">Tambah Proyek</button>
								<!--<a href="<?=base_url()?>index.php/task/tambah_proyek" class="btn-primary btn-tambah"> &nbsp; Tambah Proyek &nbsp;</a>-->
							</div>
						</div>
						<br />
						<table class="table table-proyek">
							<thead>
								<tr style="background:blue; color: white">
									<th>#</th>
									<th>Proyek</th>
									<th style="width:15%">Statistik</th>
									<th>Tanggal Mulai</th>
									<th>Tanggal Selesai</th>
									<th>Pembuat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 0 ;
									foreach ($proyeks as $proyek) {
										// code...
								?>

											<tr class="biru-langit <?php if($i%2==0){echo "putih";}else{echo "biru-langit";}?>" >
												<td>#</td>
												<td><?= $proyek["project_name"]?></td>
												<td>
														<span class="fa fa-list" style="color:blue"></span>
														Todo : <?php echo $hitungan_proyeks[$proyek["project_name"]]["todo"]["jml"]; ?>
														<br>
														<span class="fa fa-hourglass" style="color:green"></span>
														progress : <?php echo $hitungan_proyeks[$proyek["project_name"]]["progress"]["jml"]; ?>
														<br>
														<span class="fa fa-check-circle" style="color:red"></span>
														Done : <?php echo $hitungan_proyeks[$proyek["project_name"]]["done"]["jml"]; ?>
														<br>
												</td>
												<td><?= date('d/m/Y', strtotime($proyek["start_date"]))?></td>
												<td><?= date('d/m/Y', strtotime($proyek["end_date"]))?></td>
												<td><?= $proyek["nama"]?></td>
												<td style="text-align:center">
														Edit | Hapus <br>
														<a href="<?= base_url('index.php/task/proyek/'.$proyek["id_project"])?>" class="btn btn-primary">Lihat Proyek</a>

												</td>
											</tr>
								<?php
									$i++ ;
									}
								?>
							</tbody>
						</table>
					</div>
					<div class="col-md-3">
							<div class=" task-board" >
								<div class="status-card" style="background:red">
										<div class="card-header">
												<span class="card-header-text" style="color:white">History</span>
										</div>
										<ul class="sortable ui-sortable">
											<?php
												foreach ($histories as $history) {
											?>
													<a href="<?= base_url('index.php/task/proyek/'.$history["id_project"])?>">
														<li class="text-row ui-sortable-handle history-li">
															<h6 style="color:blue"><u><b><?= $history["project_name"]?></b></u></h6>
															<?= $history["history_name"]?><br>
															<div style="text-align:right;"> <?= $history["date_creation"]?> </div>
														</li>
													</a>
												<?php
													}
												?>
										</ul>
										<!-- <div class="row">
											<div class="col-md-12" style="word-wrap: break-word; background:white">
												Proyek RDK
												Oki memindahkan pekerjaan1 dari todo ke progress
											</div>
										</div> -->
								</div>
							</div>
					</div>
			</div>
	</div>
</div>


<?php
	function custom_footer(){
?>
		<script>
		$(document).ready(function (){

		});
		</script>
<?php
	}
?>
