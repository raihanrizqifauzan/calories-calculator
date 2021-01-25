<section>
</section>
<section class="story-area left-text center-sm-text pos-relative">
	<div class="container">
			<div class="heading">
					<img class="heading-img" src="<?php echo base_url('assets/')?>images/heading_logo.png" alt="">
					<h3>Detail Kalori yang Kamu Konsumsi</h3><br>
					<h6>Tanggal <?= $tgl?></h6>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-striped center-text">
						<tr>
							<th>Foto</th>
							<th>Nama Makanan</th>
							<th>Kalori</th>
						</tr>
						<?php
							$no = 1;
							foreach ($makanan as $row) {
								?>
								<tr>
									<td><img style="width: 70px; height: 70px" src="<?= base_url('upload/'.$row->foto)?>" alt=""></td>
									<td><?=$row->nama_makanan?></td>
									<td class="kal"><?=$row->jumlah_kalori?></td>
								</tr>
								<?php
							}
						?>
						<tr>
							<th colspan="2">Jumlah</th>
							<th id="jumlah"></th>
						</tr>
					</table>
				</div>

			</div><!-- row -->
	</div>
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
