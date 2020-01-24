
	<style type="text/css">
		body{
				background: #b5cdf2;
		}


		.modal-header, .modal-header h4, .modal-header .close  {
    background-color: #eb1768;
    color:white !important;
    text-align: center !important;
    font-size: 30px;
  }

		.circular--square {
	  		border-radius: 50%;
				display: inline-block;
			  width: 150px;
			  height: 150px;
			  background-repeat: no-repeat;
			  background-position: center center;
			  background-size: cover;
		}

		.tag {
			bottom: 0px;
			z-index: 0;
			background-color: #92AD40;
			padding: 5px;
			color: #FFFFFF;
			font-weight: bold;
	 }

	 .our-team{
		 padding: 30px 0 40px;
		 background: white;
		 text-align: center;
		 overflow: hidden;
		 overflow-y:hidden;

		 position: relative;
	 }

	 .our-team .pic{
		 display: inline-block;
		 width : 130px;
		 height: 130px;
		 position: relative;
		 margin-bottom: 30px;
		 z-index: 1;
	 	}

		 .our-team .pic:before{
			 content: "asd";
			 width: 100%;
			 background: #eb1768;
			 border-radius: 50%;
			 position: absolute;
			 bottom: 130%;
			 //right : 0;
			 //left : 0;
			 transform: scale(3);
			 transition: all 0.5s ease 0s;
		 }

		 .our-team:hover .pic:before{
			 height:100%;
		 }

		 .our-team:hover .pic:after{
			 content: "poi";
			 width:100%;
			 height:100%;
			 border-radius: 50%;
			 background: #ee4266;
			 position: absolute;
			 top:0;
			 left:0;
			 z-index: -1;
		 }

		 .our-team .pic img{
			 width: 100%;
			 height: 100%;
			 border-radius: 50%;
			 transform: scale(1);
			 transition: all 0.9s ease 0s;
		 }

		 .our-team:hover .pic img{
			 box-shadow: 0 0 0 14px #f7f5ec;
			 transform: scale(0.7);
		 }

		 .our-team .team-content{
			 margin-bottom: 30px;
		 }

		 .our-team .title{
			 font-size: 22px;
			 font-weight: 700;
			 color: #4e5052;
			 letter-spacing: 1px;
			 text-transform: capitalize;
			 margin-bottom: 5px;
		 }

		 .our-team .post{
			 display: block;
			 font-size: 15px;
			 color: #4e5052;
			 text-transform: capitalize;
		 }

		 .our-team .social{
			 width: 100%;
			 padding: 0;
			 margin: 0;
			 background: #eb1768;
			 position: absolute;
			 bottom: -100px;
			 left: 0;
			 transition: all 0.5s ease 0s;
		 }

		 .our-team:hover .social{
			 bottom: 0;
		 }

		 .our-team .social li{
			 display: inline-block;
		 }
		 .our-team .social li button{
			 display: block;
			 padding: 6px;
			 font-size: 14px;
			 color: white;
			 background: transparent ;
			 border : 0 ;
			 transition: all 0.3s ease 0s;
		 }
		 .our-team .social li button:hover{
			 color: #eb1768;
			 background: #f7f5ec;
			 text-decoration: none;
		 }
		 .bgtodo{
			 	color:white;
		 }

		 .bginpro{
			 color:yellow;
		 }

		 .bgdone{
			 color:white;
		 }

		 .bgpemisah{
			 color:grey;
		 }
		 .listwoy{
			 list-style-type: decimal;
			 margin-left:20px;
		 }
		 .listwoy a{
			text-decoration: underline;
			color:blue;
		 }
		 .hr-stylewoy{
			 border-bottom-color: rgba(0, 0, 0, 0.1);
			 border-bottom-style: solid;
			 border-bottom-width: 1px;

		 }
	 }
	</style>

<div class="row">
		<?php
			$i = 5;
			$p = 1;
			foreach ($users as $user){
					if( $i%5 == 0){

						echo '<div class="col-md-1 col-sm-6" >';
						echo '</div>';
					}
			?>
					<div class="col-md-2 col-sm-6" >
						<div class="our-team" id="oki">
							<div class="pic">
								<img src="<?php echo base_url('assets/template/img/crew/'.$user['foto']) ?>" >
							</div>
							<div class="team-content">
								<h3 class="title"><?= $user['nama'] ?></h3>
								<span class="post"><?= $user['jabatan'] ?></span>
							</div>

							<ul class="social">
								<li><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#user<?= $user['user_id']?>">Lihat List Pekerjaan</button></li>
							</ul>
							<div class="tag center">
								<!--
								<div class="row">
									<div class="col-md-3"style="border-radius:25px	; background:red">
										Todo
										<?= $hitungan_proyeks[$user['nama']]["todo"]["jml"]; ?>
									</div>
									<div class="col-md-5" style="margin-left:8px;border-radius:25px; background:yellow; color:red">
										Progress
										<?= $hitungan_proyeks[$user['nama']]["progress"]["jml"]; ?>
									</div>
									<div class="col-md-3" style="margin-left:8px;border-radius:25px; background:green; color:yellow">
										<span style="margin-left:-5px">Done</span>
										<?= $hitungan_proyeks[$user['nama']]["done"]["jml"]; ?>
									</div>
								</div>
							-->
								<span class="bgtodo">Todo: <?= $hitungan_proyeks[$user['nama']]["todo"]["jml"]; ?></span>  &nbsp;<span class="bgpemisah"></span>
								<span class="bginpro">PG: <?= $hitungan_proyeks[$user['nama']]["progress"]["jml"]; ?> </span> &nbsp; <span class="bgpemisah"></span>
								<span class="bgdone">Done: <?= $hitungan_proyeks[$user['nama']]["done"]["jml"]; ?> </span>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div id="user<?= $user['user_id'] ?>" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-lg">
					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header ">
									<h4 class="modal-title">List Pekerjaan <?= $user['nama'] ?></h4>
					        <button type="button" class="close button-hide" data-dismiss="modal">&times;</button>
					      </div>
					      <div class="modal-body">
									<?php
											$inc_todo = 1;
											$inc_progress = 1;
											$inc_done = 1;
											$j = 0;
											foreach($tasks as $task){
												if($task["id_user"] == $user["user_id"]){
													if($task["id_state"] == 1 ){
														if ($inc_todo === 1){
																echo '<h3> Todo : </h3>';
																echo "<ol>";
														}
														echo "<li class='listwoy'>". $task["title"] ."| <a href=". base_url("index.php/task/proyek/".$task["id_project"]) ."> #".$task["project_name"]. "</a></li>";
														if ($inc_todo ==  $hitungan_proyeks[$user['nama']]["todo"]["jml"] ){
																echo "</ol>";
																echo "<hr>";
														}
														$inc_todo++;
													}elseif ($task["id_state"] == 2 ){
														if($hitungan_proyeks[$user['nama']]["todo"]["jml"] == 0  and $inc_todo == 1){ #karena sudah di order by maka jika inc_todo kosong artinya orang tersebut tidak punya kegiatan yang berstate todo
																echo "<h3>Todo : </h3>";
																echo "Belum Ada Tugas yang akan dikerjakan";
																echo "<hr>";
																$inc_todo++;
														}
														if ($inc_progress === 1){
																echo "<h3>Progress : </h3>";
																echo "<ol style='list-style-type:decimal'>";
														}
														echo "<li class='listwoy'>". $task["title"]. "<a href=". base_url("index.php/task/proyek/".$task["id_project"]) ."> #".$task["project_name"]. "</a></li>";
														if ($inc_progress ==  $hitungan_proyeks[$user['nama']]["progress"]["jml"] ){
																echo "</ol>";
																echo "<hr>";
														}
														$inc_progress++;
													}elseif($task["id_state"] == 3 ){
														if($hitungan_proyeks[$user['nama']]["todo"]["jml"] == 0 and $inc_todo == 1){ #karena sudah di order by maka jika inc_todo kosong artinya orang tersebut tidak punya kegiatan yang berstate todo
																echo "<h3>Todo : </h3>";
																echo "Belum Ada Tugas yang akan dikerjakan";
																echo "<hr>";
																$inc_todo++;
														}
														if(($hitungan_proyeks[$user['nama']]["progress"]["jml"] == 0) and $j == $hitungan_proyeks[$user['nama']]["todo"]["jml"]){
																echo "<h3>Progress : </h3>";
																echo "Belum Ada Tugas yang sedang dikerjakan";
																echo "<hr class='hr-stylewoy'>";
																$inc_progress++;
														}
														if ($inc_done == 1){
																echo "<h3>Done : </h3>";
																echo "<ol style='list-style-type:decimal'>";
														}
														echo "<li class='listwoy'>". $task["title"] ."<a href=". base_url("index.php/task/proyek/".$task["id_project"]) ."> #".$task["project_name"]. "</a></li>";
														if ($inc_done ==  $hitungan_proyeks[$user['nama']]["done"]["jml"] ){
																echo "</ol>";
														}
														$inc_done++;
													}
													$j++;
													// echo $j;
													// echo $hitungan_proyeks[$user['nama']]["todo"]["jml"]+$hitungan_proyeks[$user['nama']]["progress"]["jml"];
													// echo "<br>";
													if(($hitungan_proyeks[$user['nama']]["done"]["jml"] == 0) and $j == $hitungan_proyeks[$user['nama']]["todo"]["jml"]+$hitungan_proyeks[$user['nama']]["progress"]["jml"]){
															echo "<h3>Done : </h3>";
															echo "Belum Ada Tugas yang selesai dikerjakan";
													}

												}
												// else{
												// 	echo "<h3>Todo : </h3>";
												// 	echo "Belum Ada Tugas yang akan dikerjakan";
												// 	echo "<hr>";
												// 	echo "<h3>Progress : </h3>";
												// 	echo "Belum Ada Tugas yang sedang dikerjakan";
												// 	echo "<hr class='hr-stylewoy'>";
												// 	echo "<h3>Done : </h3>";
												// 	echo "Belum Ada Tugas yang selesai dikerjakan";
												// }
											}
									?>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default button-hide" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>
					</div>
			<?php
					if( $p%5 == 0){
						echo '<div class="col-md-1 col-sm-6" >';
						echo '</div>';
						echo "<div style='clear:both'>";
						echo '</div>';
						echo "<div class='col-md-12'>";
						echo "<br>&nbsp<br>";
						echo '</div>';

					}
					$i++;
					$p++;
		 	};
		 ?>



	</div>
	<br><br>


<?php
	function custom_footer(){
?>
		<script>
		$(document).ready(function (){
			$(".modal").on('hide.bs.modal', function(){
		    //Ini digunakan untuk mengscroll profil keatas agar tampilannya tidak berantakan
				setTimeout(function(){
					$('.our-team').animate({scrollTop:0},"slow");
				},100);
		  });
		});
		</script>
<?php
	}
?>
