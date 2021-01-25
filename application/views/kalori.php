<section>
</section>
<section class="story-area left-text center-sm-text pos-relative">
	<div class="container">
			<div class="heading">
					<img class="heading-img" src="<?php echo base_url('assets/')?>images/heading_logo.png" alt="">
					<h3>Apa saja yang kamu Makan Hari ini ?</h3>
			</div>
			<form action="<?php echo base_url('user/saveKalori')?>" method="post">
			<div class="row">
				<table class="table">
					<tr>
						<td>Tanggal</td>
						<td><input type="date" class="form-control" name="tgl"></td>
					</tr>
				</table>
			</div>
			<div class="row">
				<?php
					foreach ($makanan as $row) {
						?>
						<div class="col-lg-3 col-md-4  col-sm-6 ">
							<div class="center-text mb-30">
								<div class="ïmg-200x mlr-auto pos-relative"><img src="<?php echo site_url('upload/'.$row->foto)?>" alt=""></div>
								<h5 class="mt-20"><?= $row->nama_makanan?></h5>
								<h5 class="color-primary"><b class="kalori"><?= $row->jumlah_kalori?></b></h5>
								<input type="hidden" name="jumlah_kalori[]" value="<?= $row->jumlah_kalori?>">
								<input type="checkbox" onchange="hitung()" class="mt-5 form-control cbxKalori" name="id_makanan[]" value="<?= $row->id?>">
							</div>
						</div>
						<?php
					}
				?>
				
			</div>
			<div class="row">
				<table class="table">
					<tr>
						<td>Jumlah Kalori</td>
						<td><input type="text" class="form-control" id="jumlah" value="0" readonly></td>
					</tr>
					<tr>
						<td></td>
						<td class="right-text">
							<button type="submit" class="btn btn-success">Submit</button>
						</td>
					</tr>
				</table>
			</div>
			</form>
	</div>
</section>

<script>
	var kalori = document.getElementsByClassName('kalori');
	var jumlah = document.getElementById('jumlah');
	var cbxKalori = document.getElementsByClassName('cbxKalori');

	function hitung() {
		let result = 0;
		for (let index = 0; index < cbxKalori.length; index++) {
			if (cbxKalori[index].checked) {
				result += parseInt(kalori[index].innerHTML);
			} 
		}
		jumlah.value = result;
	}
</script>
