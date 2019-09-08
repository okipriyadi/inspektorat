
	<style type="text/css">
			.task-board {
					background: #2c7cbc;
					display: inline-block;
					padding: 12px;
					border-radius: 3px;
					//width: 550px;
					white-space: nowrap;
					overflow-x: scroll;
					min-height: 300px;
			}

			.status-card {
					width: 250px;
					margin-right: 8px;
					background: #e2e4e6	;
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
	</style>

<div class="row">
	<div class="task-board">
			<?php
			$status_value = 0;
			echo "<pre>";
			print_r($statusResult);
			echo "</pre>";
			foreach ($statusResult as $statusRow) {
				//bikin kolom masing-masing status
				if($status_value != $statusRow["id_status"]){
			?>
						<div class="status-card">
								<div class="card-header">
										<span class="card-header-text"><?php echo $statusRow["status_name"]; ?></span>
								</div>
								<ul class="sortable ui-sortable" id="sort<?php echo $statusRow["id_status"]; ?>" data-status-id="<?php echo $statusRow["id_status"]; ?>">
									<li class="text-row ui-sortable-handle" data-task-id="<?php echo $statusRow["id_detail"]; ?>">
											<?php echo $statusRow["title"]; ?>
									</li>
								</ul>
						</div>
			<?php
				}
				$status_value = $statusRow["id_status"];
			}
			?>
	</div>
</div>
<?php
	function custom_footer(){
?>
		<script>
		$(document).ready(function (){
				$( function() {
			      var url = 'edit-status.php';
			      $('ul[id^="sort"]').sortable({
			          connectWith: ".sortable",
			          receive: function (e, ui) {
			              var status_id = $(ui.item).parent(".sortable").data("status-id");
			              var task_id = $(ui.item).data("task-id");
			              $.ajax({
			                  url: url+'?status_id='+status_id+'&task_id='+task_id,
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
