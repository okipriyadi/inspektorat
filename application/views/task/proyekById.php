
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
					margin-right: 8px;
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
					<div class="col-md-9">
						<div class=" task-board">
						<?php
								foreach ($status as $statusRow) {
										?>
										<div class="status-card">
												<div class="card-header">
														<span class="card-header-text"><?php echo $statusRow["status_name"]; ?></span>
												</div>
												<ul class="sortable ui-sortable" id="sort<?php echo $statusRow["id_status"]; ?>" data-status-id="<?php echo $statusRow["id_status"]; ?>">
														<?php
														if (! empty($task)) {
															foreach ($task as $taskRow) {
																if ($statusRow["id_status"] == $taskRow["id_status"]){
																?>
																 <li class="text-row ui-sortable-handle ui-li-shadow" data-task-id="<?php echo $taskRow["id_detail"]; ?>">
																	 		<?php echo $taskRow["title"]; ?>
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
					<div class="col-md-3">
							<div class=" task-board" >
								<div class="status-card" style="background:red">
										<div class="card-header">
												<span class="card-header-text" style="color:white">History</span>
										</div>
										<ul class="sortable ui-sortable">
											<li class="text-row ui-sortable-handle history-li">
												<h6 style="color:blue"><u><b>Proyek RDK</b> </u></h6>
												Oki menambahkan komentar pada tugas "pekerjaan1"<br>
												<div style="text-align:right;"> 09.00 -- 12 Maret 2019  </div>
											</li>
											<li class="text-row ui-sortable-handle history-li" >
												<h6 style="color:blue"><u><b>Proyek RDK</b> </u></h6>
												Oki memindahkan tugas "pekerjaan1" dari todo ke progress
												<div style="text-align:right;"> 08.30 -- 12 Maret 2019  </div>
											</li>
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
										url = url+task_id+'/'+status_id ;
										alert(url);
			              $.ajax({
			                  url: url ,
			                  success: function(response){}
			              });
			           }
		      }).disableSelection();
		   });
		});
		</script>
<?php
	}
?>
