<section class="bg-5 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b>Hello, </b></h5>
                                <h2 class="mt-30 mb-15"><?php echo $this->session->userdata('nama')?></h2>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>
<section class="story-area left-text center-sm-text pos-relative">
	<div class="container">
			<div class="heading">
					<img class="heading-img" src="<?php echo base_url('assets/')?>images/heading_logo.png" alt="">
					<h2>My Profil</h2>
			</div>
			<div class="row">
				<div class="col-md-5">
					<h3 class="center-text">- Makanan -</h3>
					<table class="table table-hover">
						<tr>
							<th>No.</th>
							<th>Tanggal</th>
							<th>Jumlah Kalori Makanan</th>
							<th>Detail</th>
						</tr>
						<?php
							$no = 1;
							foreach ($profil as $row) {
								?>
								<tr>
									<td><?= $no++?></td>
									<td><?= $row->tgl?></td>
									<td><?= $row->jml?></td>
									<td>
										<a class="btn btn-sm btn-info" href="<?= site_url('user/detail_kalori/'.$row->tgl) ?>">
											Detail
										</a>
									</td>
								</tr>
								<?php
							}
						?>
						
					</table>
				</div><!-- col-md-6 -->

				<div class="col-md-7">
					<h3 class="center-text">- Olahraga -</h3>
					<table class="table table-hover">
						<tr>
							<th>No.</th>
							<th>Tanggal</th>
							<th>Jumlah Menit</th>
							<th>Jumlah Pembakaran Kalori</th>
							<th>Detail</th>
						</tr>
						<?php
							$no = 1;
							foreach ($olahraga as $row) {
								?>
								<tr>
									<td><?= $no++?></td>
									<td><?= $row->tgl?></td>
									<td><?= $row->menit?></td>
									<td><?= $row->jml?></td>
									<td>
										<a class="btn btn-sm btn-info" href="<?= site_url('user/detail_olahraga/'.$row->tgl) ?>">
											Detail
										</a>
									</td>
								</tr>
								<?php
							}
						?>
						
					</table>
				</div><!-- col-md-6 -->

			</div><!-- row -->
	</div><!-- container -->
</section>
