<!-- Header -->
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Olahraga</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin')?>"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Olahraga</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
				<button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal-default">
					<i class="fa fa-plus-circle"></i> Tambah Data
				</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Jenis Olahraga</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">No.</th>
                    <th scope="col" class="sort" data-sort="status">Nama Olahraga</th>
                    <th scope="col"> Kalori Per Menit</th>
                    <th scope="col" class="sort" data-sort="completion">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
					<?php
						$no = 1;
						foreach ($olahraga as $row) {
							?>
							<tr>	
								<td><?= $no++ ?></td>
								<td><?= $row->nama_olahraga ?></td>
								<td><?= $row->kalori_per_menit ?></td>
								<td>
									<a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->id?>" data-nama_olahraga="<?= $row->nama_olahraga?>" data-kalori_per_menit="<?= $row->kalori_per_menit?>"><i class="fa fa-edit"></i></a>
									<a onclick="return confirm('Data tersebut akan dihapus ?')" href="<?php echo site_url('olahraga/delete/'.$row->id)?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							<?php
						}
					?>
					
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
	  </div>
	  <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>

	<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		<div class="modal-dialog modal-lg modal- modal-dialog-centered modal-" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="modal-title-default">Form Tambah Jenis Olahraga</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
			</div>
			
			<form action="<?php echo site_url('olahraga/save')?>" method="post" enctype="multipart/form-data">
			<div class="modal-body">
					<div class="form-group">
						<label>Nama Olahraga</label>
						<input type="text" class="form-control" placeholder="Nama Olahraga" name="nama_olahraga" />
					</div>
					<div class="form-group">
						<label>Jumlah Kalori per Menit</label>
						<input type="number" class="form-control" placeholder="0" name="kalori_per_menit" />
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Save changes</button>
				<button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
			</div>
			</div>
			</form>
		</div>
	</div>



	<!-- Edit Data -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Olahraga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
				<form action="<?php echo site_url('olahraga/update')?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Olahraga</label>
							<input type="text" class="form-control olahraga_nama" placeholder="Nama Olahraga" name="nama_olahraga" />
						</div>
						<div class="form-group">
							<label>Kalori per Menit</label>
							<input type="number" class="form-control olahraga_kalori" placeholder="Kalori per Menit" name="kalori_per_menit" />
						</div>
						<div class="form-group">
							<input type="hidden" class="form-control olahraga_id" name="id" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
					</div>
					</div>
				</form>
            </div>
        </div>
	</div>


<script>
    $(document).ready(function(){

        // get Edit Product
        $('.btn-edit').on('click',function(){
			const id = $(this).data('id');
			const nama_olahraga = $(this).data('nama_olahraga');
			const kalori_per_menit = $(this).data('kalori_per_menit');

			$('.olahraga_id').val(id);
			$('.olahraga_nama').val(nama_olahraga);
			$('.olahraga_kalori').val(kalori_per_menit);
            $('#editModal').modal('show');
        });
         
    });
</script>
