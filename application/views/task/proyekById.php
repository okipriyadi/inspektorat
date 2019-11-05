
	<style type="text/css">

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
		<div class="row">
					<div class="col-md-9" style="box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2; overflow:auto">
						<div class=" task-board">
						<?php
								foreach ($status as $statusRow) {
										?>
										<div class="status-card">
												<div class="card-header" style="background:green; color:white; height:40px">
														<span class="card-header-text"><i class="fa fa-arrows-alt"> </i> <?php echo $statusRow["status_name"]; ?></span>
												</div>
												<ul class="sortable ui-sortable" id="sort<?php echo $statusRow["id_status"]; ?>" data-status-id="<?php echo $statusRow["id_status"]; ?>" >
														<?php
														if (! empty($task)) {
															foreach ($task as $taskRow) {
																if ($statusRow["id_status"] == $taskRow["id_status"]){
																?>
																 <li class="text-row ui-sortable-handle ui-li-shadow" data-task-id="<?php echo $taskRow["id_detail"]; ?>"
																	 style=" border-top-style: solid; border-top-color: coral;">
																	 		<div class="row">
																				 <div class="col-sm-10">
																					<?php echo $taskRow["title"]; ?>
																				 </div>
																				 <div class="col-sm-2"><p class="text-right"><a data-toggle="modal" onclick="onClickModal()" href="#modal_task"><span><i class="fa fa-pencil"></i></span></a></p></div>
																			 </div>
																	 		<div class="row">
																				 <div class="col-sm-10">
																					 <?php
																						 $task_lampiran = $this->task_model->getLampiranTask($taskRow['id_detail']);
																						 if(isset($task_lampiran)){
																							 echo "<p>Lampiran (".count($task_lampiran).")</p>";
																							 echo "<p>Read More</p>";
																						 }
																					 ?>
																				 </div>
																			 </div>
																			<br><br>
																			<img src="<?php echo base_url("assets/template/img/crew/".$taskRow['foto'])?>" style="display: inline-block; position: relative; height:25px; border-radius: 50%; ">
																			<span style=" display: inline-block;margin-left:0px"><?= $taskRow["nama"]?></span>
																			<span style=" display: inline-block; margin-left:auto; margin-right:0px ; float:right; padding-top:3px"><i class="fa fa-fire fa-lg" style="font-size:18px;color:red"></i> <?= date('d:m:Y', strtotime($taskRow["end_date"]));?> &nbsp;</span>
																 </li>
															 <?php
																}
															}
														}
														?>
												</ul>
										</div>
										<?php
								}
						?>
						</div>
					</div>
					<!-- Modal di Task Dinamis ----------------------------- -->
					<div id="modal_task" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-header" style="background:#007bff; ">
								<h4 class="modal-title text-white">Tambah aja</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-content">
								<form action="">
									Lampiran
								</form>
							</div>
							<div class="modal-footer " style="background:#007bff">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
								<input type="submit" class="btn btn-default" value="Simpan">
							</div>
						</div>
					</div>
					<!-- Modal tambah tugas ----------------------------- -->
					<div id="modal_tambah_tugas" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header" style="background:#007bff; ">
									<h4 class="modal-title" style="color:white">Tambah Tugas</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>

								</div>
								<form  action="<?=base_url('index.php/task/tambah_tugas/'.$id_proyek)?>" method="POST">
										<div class="modal-body biru-langit" style="">
												<div class="form-group ">
													<label ><b>Nama Tugas:</b></label> &nbsp;&nbsp;
													<input type="text" class="form-control" name="title">
													<label ><b>Deskripsi Tugas:</b></label> &nbsp;&nbsp;
													<input type="text" class="form-control" name="description">
													<div class="form-group">
														<div class ="row">
															<div class="col-md-6">
														    <label ><b>Tanggal Mulai Tugas:</b></label> &nbsp;&nbsp;
														    <input type="date" class="form-control" name="start_date">
															</div>
															<div class="col-md-6">
														    <label ><b>Tanggal Akhir Tugas:</b></label> &nbsp;&nbsp;
														    <input type="date" class="form-control" name="end_date">
															</div>
														</div>
												  </div>
												</div>
												<div class="form-group ">
													<label>Masuk kedalam status</label>
													<select name="id_status" class="form-control">
														<?php
															foreach ($status as $statusRow) {
														?>
																<option value="<?= $statusRow["id_status"]?>"><?= $statusRow["status_name"]?></option>

														<?php
															}
														?>
													</select>
											 </div>
											 <div class="form-group ">
												 <label>Ditugaskan kepada</label>
												 <select name="id_petugas" class="form-control">
													 <?php
														 foreach ($users as $user) {
													 ?>
															 <option value="<?= $user["user_id"]?>"><?= $user	["nama"]?></option>

													 <?php
														 }
													 ?>
												 </select>
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
			<!-- Modal tambah status ----------------------------- -->
			<div id="modal_tambah_status" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header" style="background:#007bff; ">
							<h4 class="modal-title" style="color:white">Tambah Status</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>

						</div>
						<form  action="<?=base_url('index.php/task/tambah_status/'.$id_proyek)?>" method="POST">
								<div class="modal-body biru-langit" style="">
										<div class="form-group ">
											<label ><b>Nama Status:</b></label> &nbsp;&nbsp;
											<input type="text" class="form-control" name="nama_status">
										</div>
										<div class="form-group">
											<select class="form-control" id="sel1" name="id_state" placeholder="status ini termasuk ke dalam">
												<option value=1>Akan</option>
												<option value=2>Sedang</option>
												<option value=1>Selesai</option>
											</select>
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
			<!-- ------------------------------------ modal tambah status end ---------------------------- -->
					<div class="col-md-3">
							<div class=" task-board" >
								<button class="btn btn-primary" style="" data-toggle="modal" data-target="#modal_tambah_tugas"><i class="fa fa-plus"> Tugas</i></button>
								<button class="btn btn-success" data-toggle="modal" data-target="#modal_tambah_status"><i class="fa fa-plus"  > Status</i></button>

								<br>
								<br>

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
				$( function() {
			      $('ul[id^="sort"]').sortable({
			          connectWith: ".sortable",
			          receive: function (e, ui) {
			              var status_id = $(ui.item).parent(".sortable").data("status-id");
			              var task_id = $(ui.item).data("task-id");
										var url = "<?= base_url()."task/updateTaskStatus/" ?>";
										url = url+task_id+'/'+status_id;
			              $.ajax({
			                  url: url ,
			                  success: function(response){}
			              });
			           }
		      }).disableSelection();
		   });
		});
		function onClickModal(){
			$.ajax
		}
		</script>
<?php
	}
?>
