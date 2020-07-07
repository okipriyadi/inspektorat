<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;

class TaskPrint extends CI_Controller {
	function __construct(){
			parent::__construct();
			require_once APPPATH.'libraries/dompdf/autoload.inc.php';

	}

	public function index()
	{
		$this->load->view('index');
	}

	public function cetakLaporan2()
	{
		$judul = "<h1>Laporan Kerja Tanggal .... sampai Tanggal ....</h1>";
		$head ="
		<table class='table table-hover table-bordered table-stripped'>
				<thead>
				<th width='10%'>No</th>
				<th width='15%'>PIC</th>
				<th width='15%'>Status</th>
				<th width='60%'>Kegiatan</th>
				</thead>
				<tbody>
						" ;

		$tr = "";
		$no = 1;
		for($a=1; $a<10; $a++ ){
					$tr .= "
						<tr>
							<td>". $no ."</td>
							<td>Nama</td>
							<td>	Todo:<br/>
							 			In Progress : <br/>
										Done :
							</td>
							<td>
										Nama Tugas : <br/>
										<i class='fas fa-dot-circle text-primary' > Sasaran Kegiatan :</i>  <br/>
										<i class='fas fa-chart-line text-primary'> Indikator kinerja :</i>  <br/>
										<i class='fas fa-tasks text-primary'> Kategori :</i>
										<br/>
										Mulai Dari :<br/>
										Sampai dengan : <br/>
										Lampiran

							</td>

						</tr>
					";
					$no++;
		};

		$foot =		"
				</tbody>
				</table>
			";

			$html = $judul. $head . $tr . $foot;
		echo $html;
	}
	public function cetakLaporan()
	{
		// reference the Dompdf namespace


		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$judul = "<h1>Laporan Kerja Tanggal .... sampai Tanggal ....</h1>";
		$head ="
		<table class='table table-hover table-bordered table-stripped'>
				<thead>
				<th width='10%'>No</th>
				<th width='15%'>PIC</th>
				<th width='15%'>Status</th>
				<th width='60%'>Kegiatan</th>
				</thead>
				<tbody> <br/>
						" ;

		$tr = "";
		$no = 1;
		for($a=1; $a<10; $a++ ){
					$tr .= "
						<tr>
							<td>". $no ."</td>
							<td>Nama</td>
							<td>	Todo:<br/>
							 			In Progress : <br/>
										Done :
							</td>
							<td>
										Nama Tugas : <br/>
										<i class='fas fa-dot-circle text-primary' > Sasaran Kegiatan :</i>  <br/>
										<i class='fas fa-chart-line text-primary'> Indikator kinerja :</i>  <br/>
										<i class='fas fa-tasks text-primary'> Kategori :</i>
										<br/>
										Mulai Dari :<br/>
										Sampai dengan : <br/>
										Lampiran

							</td>



						</tr>
					";
					$no++;
		};

		$foot =		"
				</tbody>
				</table>
			";

		$html = $judul. $head . $tr . $foot;

		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream('laporanku.pdf', array('Attachment' => false));
			}
}
