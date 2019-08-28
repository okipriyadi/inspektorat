
	<style type="text/css">
		 .biru-langit{
			 background: #a6d9ec;
			 //text-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2;

		 }

		 .btn-tambah{
			 box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2;
			 border-radius: 5px;
			 margin-top: 5px;
		 }

		 .merah{
			 background: red;
			 color: white;
		 }

		 .putih{
			 background: white;
			 color: red;
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
						<div class="row">
							<div class="col-md-5">
								<button class="btn-primary btn-tambah"> &nbsp; Tambah Proyek &nbsp;</button>
							</div>
						</div>
						<br />
						<table class="table table-proyek">
							<thead>
								<tr class="biru-langit">
									<th>No</th>
									<th>Proyek</th>
									<th>Tanggal Mulai</th>
									<th>Tanggal Selesai</th>
									<th>Pembuat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr class="merah">
									<td>1</td>
									<td>1</td>
									<td>1</td>
									<td>1</td>
									<td>1</td>
									<td>1</td>
								</tr>
								<tr class="putih">
									<td>1</td>
									<td>1</td>
									<td>1</td>
									<td>1</td>
									<td>1</td>
									<td>1</td>
								</tr>
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

		});
		</script>
<?php
	}
?>
