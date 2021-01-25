<section>
    
</section>
<section class="story-area left-text center-sm-text pos-relative">
	<div class="container">
			<div class="heading">
					<img class="heading-img" src="<?php echo base_url('assets/')?>images/heading_logo.png" alt="">
					<h3>Olahraga yang Telah Kamu Lakukan</h3>
					<br>
					<p>Tanggal : <?= $tgl?></p>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-striped center-text">
						<tr>
							<th>No</th>
							<th>Jenis Olahraga</th>
							<th>Jumlah Menit</th>
							<th>Jumlah Pembakaran Kalori</th>
						</tr>
						<?php
							$no = 1;
							foreach ($olahraga as $row) {
								?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$row->nama_olahraga?></td>
									<td><?=$row->jumlah_menit?></td>
									<td class="kal"><?=$row->jumlah_kalori?></td>
								</tr>
								<?php
							}
						?>
						<tr>
							<th colspan="3">Jumlah</th>
							<th id="jumlah"></th>
						</tr>
					</table>
				</div>

			</div><!-- row -->
	</div><!-- container -->
</section>

<script>
	let kal = document.getElementsByClassName('kal');
	let jumlah = document.getElementById('jumlah');
	let result = 0;
	for (let index = 0; index < kal.length; index++) {
		result += parseInt(kal[index].innerHTML);
	}
	jumlah.innerHTML = result;
</script>
