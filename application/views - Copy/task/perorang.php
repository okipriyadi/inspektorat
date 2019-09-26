
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

	 }
	</style>

<!--
<div class="row">
		<div class="col-md-3 center" >
			<div class="column left bgclr">
        <img class="circular--square" src="<?php echo base_url() ?>assets/template/img/crew/oki2.jpg"  />
				<div class="tag">halllllooooo

				</div>
      </div>
		</div>
		<div class="col-md-3">
			<div class="column left bgclr">
        <img class="circular--square" src="<?php echo base_url() ?>assets/template/img/crew/oki.jpg"  />
				<div class="tag">halllllooooo
				</div>
      </div>
		</div>
		<div class="col-md-3">
			hallo
		</div>
		<div class="col-md-3">
			hallo
		</div>
</div>
-->

<div class="row">
		<div class="col-md-1 col-sm-6" >
		</div>
		<div class="col-md-2 col-sm-6" >
			<div class="our-team" id="oki">
				<div class="pic">
					<img src="<?php echo base_url() ?>assets/template/img/crew/oki2.jpg"  />
				</div>
				<div class="team-content">
					<h3 class="title">Oki Priyadi</h3>
					<span class="post">Analis Sistem Informasi</span>
				</div>

				<ul class="social">
					<li><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Lihat List Pekerjaan</button></li>
				</ul>
				<div class="tag center">
					<span class="bgtodo">TD: 8</span>  &nbsp;<span class="bgpemisah">I</span>
					<span class="bginpro">PG: 4 </span> &nbsp; <span class="bgpemisah">I</span>
					<span class="bgdone">DN: 5 </span>
				</div>
      </div>
		</div>
		<div class="col-md-2 col-sm-6" >
			<div class="our-team">
				<div class="pic">
					<img src="<?php echo base_url() ?>assets/template/img/crew/fikri2.jpg"  />
				</div>
				<div class="team-content">
					<h3 class="title">Fikri Azardi</h3>
					<span class="post">Analis Pengelola Keuangan </span>
				</div>
				<ul class="social">
					<li><a href="#">Lihat List Pekerjaan</a></li>
				</ul>
				<div class="tag center">
					<span class="bgtodo">TD: 3</span>  &nbsp;<span class="bgpemisah">I</span>
					<span class="bginpro">PG: 2 </span> &nbsp; <span class="bgpemisah">I</span>
					<span class="bgdone">DN: 6 </span>
				</div>
			</div>
		</div>
		<div class="col-md-2 col-sm-6" >
			<div class="our-team">
				<div class="pic">
					<img src="<?php echo base_url() ?>assets/template/img/crew/sinta.jpg"  />
				</div>
				<div class="team-content">
					<h3 class="title">Hiasinta</h3>
					<span class="post">Analis Pengelola Keuangan</span>
				</div>
				<ul class="social">
					<li><a href="#">Lihat List Pekerjaan</a></li>
				</ul>

				<div class="tag center">
					<span class="bgtodo">TD: 5</span>  &nbsp;<span class="bgpemisah">I</span>
					<span class="bginpro">PG: 3 </span> &nbsp; <span class="bgpemisah">I</span>
					<span class="bgdone">DN: 4 </span>
				</div>
			</div>
		</div>
		<div class="col-md-2 col-sm-6" >
			<div class="our-team">
				<div class="pic">
					<img src="<?php echo base_url() ?>assets/template/img/crew/dian2.jpg"  />
				</div>
				<div class="team-content">
					<h3 class="title">Dian Ismiarti</h3>
					<span class="post">Analis Pengelola Keuangan</span>
				</div>
				<ul class="social">
					<li><a href="#">Lihat List Pekerjaan</a></li>
				</ul>

				<div class="tag center">
					<span class="bgtodo">TD: 6</span>  &nbsp;<span class="bgpemisah">I</span>
					<span class="bginpro">PG: 3 </span> &nbsp; <span class="bgpemisah">I</span>
					<span class="bgdone">DN: 2 </span>
				</div>
			</div>
		</div>
		<div class="col-md-2 col-sm-6" >
			<div class="our-team">
				<div class="pic">
					<img src="<?php echo base_url() ?>assets/template/img/crew/aji22.jpg"  />
				</div>
				<div class="team-content">
					<h3 class="title">Aji</h3>
					<span class="post">Analis Pengelola Keuangan</span>
				</div>
				<ul class="social">
					<li><a href="#">Lihat List Pekerjaan</a></li>
				</ul>

				<div class="tag center">
					<span class="bgtodo">TD: 7</span>  &nbsp;<span class="bgpemisah">I</span>
					<span class="bginpro">PG: 4 </span> &nbsp; <span class="bgpemisah">I</span>
					<span class="bgdone">DN: 4 </span>
				</div>
			</div>
		</div>

		<div class="col-md-1 col-sm-6" >
		</div>
	</div>

	<br><br>
	<div class="row">
		<div class="col-md-1 col-sm-6" >
		</div>
		<div class="col-md-2 col-sm-6" >
			<div class="our-team">
				<div class="pic">
					<img src="<?php echo base_url() ?>assets/template/img/crew/dani.jpeg"  />
				</div>
				<div class="team-content">
					<h3 class="title">Dani</h3>
					<span class="post">Analis Pengelola Keuangan</span>
				</div>
				<ul class="social">
					<li><a href="#">Lihat List Pekerjaan</a></li>
				</ul>

				<div class="tag center">
					<span class="bgtodo">TD: 8</span>  &nbsp;<span class="bgpemisah">I</span>
					<span class="bginpro">PG: 4 </span> &nbsp; <span class="bgpemisah">I</span>
					<span class="bgdone">DN: 5 </span>
				</div>
			</div>
		</div>
		<div class="col-md-2 col-sm-6" >
			<div class="our-team">
				<div class="pic">
					<img src="<?php echo base_url() ?>assets/template/img/crew/bagas.jpg"  />
				</div>
				<div class="team-content">
					<h3 class="title">Bagas</h3>
					<span class="post">Analis Pengelola Keuangan</span>
				</div>
				<ul class="social">
					<li><a href="#">Lihat List Pekerjaan</a></li>
				</ul>

				<div class="tag center">
					<span class="bgtodo">TD: 8</span>  &nbsp;<span class="bgpemisah">I</span>
					<span class="bginpro">PG: 4 </span> &nbsp; <span class="bgpemisah">I</span>
					<span class="bgdone">DN: 5 </span>
				</div>
			</div>
		</div>

		<div class="col-md-2 col-sm-6" >
			<div class="our-team">
				<div class="pic">
					<img src="<?php echo base_url() ?>assets/template/img/crew/azizah.jpg"  />
				</div>
				<div class="team-content">
					<h3 class="title">Azizah</h3>
					<span class="post">Analis Pengelola Keuangan</span>
				</div>
				<ul class="social">
					<li><a href="#">Lihat List Pekerjaan</a></li>
				</ul>

				<div class="tag center">
					<span class="bgtodo">TD: 8</span>  &nbsp;<span class="bgpemisah">I</span>
					<span class="bginpro">PG: 4 </span> &nbsp; <span class="bgpemisah">I</span>
					<span class="bgdone">DN: 5 </span>
				</div>
			</div>
		</div>

		<div class="col-md-2 col-sm-6" >
			<div class="our-team">
				<div class="pic">
					<img src="<?php echo base_url() ?>assets/template/img/crew/naomi.jpg"  />
				</div>
				<div class="team-content">
					<h3 class="title">Naomi</h3>
					<span class="post">Analis Pengelola Keuangan</span>
				</div>
				<ul class="social">
					<li><a href="#">Lihat List Pekerjaan</a></li>
				</ul>

				<div class="tag center">
					<span class="bgtodo">TD: 8</span>  &nbsp;<span class="bgpemisah">I</span>
					<span class="bginpro">PG: 4 </span> &nbsp; <span class="bgpemisah">I</span>
					<span class="bgdone">DN: 5 </span>
				</div>
			</div>
		</div>

		<div class="col-md-2 col-sm-6" >
			<div class="our-team">
				<div class="pic">
					<img src="<?php echo base_url() ?>assets/template/img/crew/refitri.jpg"  />
				</div>
				<div class="team-content">
					<h3 class="title">Reffitri</h3>
					<span class="post">Analis Pengelola Keuangan</span>
				</div>
				<ul class="social">
					<li><a href="#">Lihat List Pekerjaan</a></li>
				</ul>

				<div class="tag center">
					<span class="bgtodo">TD: 8</span>  &nbsp;<span class="bgpemisah">I</span>
					<span class="bginpro">PG: 4 </span> &nbsp; <span class="bgpemisah">I</span>
					<span class="bgdone">DN: 5 </span>
				</div>
			</div>
		</div>
		<div class="col-md-1 col-sm-6" >
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-1 col-sm-6" >
		</div>
		<div class="col-md-2 col-sm-6" >
			<div class="our-team">
				<div class="pic">
					<img src="<?php echo base_url() ?>assets/template/img/crew/vioni.jpeg"  />
				</div>
				<div class="team-content">
					<h3 class="title">Vioni</h3>
					<span class="post">Analis Pengelola Keuangan</span>
				</div>
				<ul class="social">
					<li><a href="#">Lihat List Pekerjaan</a></li>
				</ul>

				<div class="tag center">
					<span class="bgtodo">TD: 8</span>  &nbsp;<span class="bgpemisah">I</span>
					<span class="bginpro">PG: 4 </span> &nbsp; <span class="bgpemisah">I</span>
					<span class="bgdone">DN: 5 </span>
				</div>
			</div>
		</div>
		<div class="col-md-2 col-sm-6" >
			<div class="our-team">
				<div class="pic">
					<img src="<?php echo base_url() ?>assets/template/img/crew/widay.jpeg"  />
				</div>
				<div class="team-content">
					<h3 class="title">Widay</h3>
					<span class="post">Analis Pengelola Keuangan</span>
				</div>
				<ul class="social">
					<li><a href="#">Lihat List Pekerjaan</a></li>
				</ul>

				<div class="tag center">
					<span class="bgtodo">TD: 8</span>  &nbsp;<span class="bgpemisah">I</span>
					<span class="bginpro">PG: 4 </span> &nbsp; <span class="bgpemisah">I</span>
					<span class="bgdone">DN: 5 </span>
				</div>
			</div>
		</div>
		<div class="col-md-1 col-sm-6" >
		</div>

	</div>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header ">
					<h4 class="modal-title">List Pekerjaan</h4>
	        <button type="button" class="close button-hide" data-dismiss="modal">&times;</button>
	      </div>
	      <div class="modal-body">
	        <p>Some text in the modal.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default button-hide" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
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
