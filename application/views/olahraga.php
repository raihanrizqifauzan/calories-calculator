<section>
</section>
<section class="story-area left-text center-sm-text pos-relative">
	<div class="container">
			<div class="heading">
					<img class="heading-img" src="<?php echo base_url('assets/')?>images/heading_logo.png" alt="">
					<h3>Pilih Jenis Olahraga </h3>
			</div>
			<form action="<?php echo base_url('user/saveOlahraga')?>" method="post">
			<div class="row">
				<table class="table">
					<tr>
						<td>Tanggal</td>
						<td><input type="date" class="form-control" name="tgl"></td>
					</tr>
					<tr>
						<td>Jenis Olahraga</td>
						<td>
							<select onchange="hitung()" class="form-control" id="jenis">
							<option>- Pilih -</option>
								<?php
									foreach ($olahraga as $row) {
										?>
										<option value="<?= $row->id.'-'.$row->kalori_per_menit ?>"><?= $row->nama_olahraga.' '?></option>
										<?php
									}
								?>
							</select>
							<input type="hidden" name="id_olahraga" id="id_olahraga">
							<input type="hidden" id="jumlah_kalori">
						</td>
					</tr>

					<tr>
						<td>Waktu Olahraga (menit)</td>
						<td>
							<select onchange="jumlahKalori()" name="jumlah_menit" class="form-control" id="waktu">
								<option value="">- Pilih -</option>
								<option value="15">15</option>
								<option value="30">30</option>
								<option value="60">60</option>
								<option value="90">90</option>
							</select>
						</td>
					</tr>
				</table>
			</div>
			<div class="row">
				<table class="table">
					<tr>
						<td>Jumlah Kalori</td>
						<td><input type="text" class="form-control" id="jumlah" value="0" readonly name="jumlah_kalori"></td>
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
	var jenis= document.getElementById('jenis');
	var jumlah_kalori = document.getElementById('jumlah_kalori');
	var id_olahraga = document.getElementById('id_olahraga');
	var jumlah = document.getElementById('jumlah');
	var waktu = document.getElementById('waktu');

	function hitung() {
		let gabungan = jenis.value;
		let batas = gabungan.indexOf("-");
		let result = "";
		let result2 = "";
		for (let index = batas+1; index < gabungan.length; index++) {
			result += gabungan[index];			
		}
		for (let index = 0; index < batas; index++) {
			result2 += gabungan[index];			
		}
		jumlah_kalori.value = result;
		id_olahraga.value = result2;
	}

	function jumlahKalori() {
		jumlah.value = parseInt(waktu.value)*parseInt(jumlah_kalori.value);
	}
</script>
