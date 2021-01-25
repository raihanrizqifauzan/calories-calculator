<?php if ($this->session->flashdata('success')){ ?>
    <script type='text/javascript'>
        setTimeout(function () {
          swal('Sukses!', 'Berhaasil Menyimpan', 'success');
        },10);
    </script>
<?php }?>
<!-- Header -->
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Makanan</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin')?>"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Makanan</li>
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
              <h3 class="mb-0">Data Makanan</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">No.</th>
                    <th scope="col" class="sort" data-sort="budget">Foto</th>
                    <th scope="col" class="sort" data-sort="status">Nama Makanan</th>
                    <th scope="col"> Jumlah Kalori</th>
                    <th scope="col" class="sort" data-sort="completion">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
					<?php
						$no = 1;
						foreach ($makanan as $row) {
							?>
							<tr>	
								<td><?= $no++ ?></td>
								<td><img class="avatar avatar-lg rounded-circle" src="<?php echo site_url('upload/'.$row->foto)?>" alt=""></td>
								<td><?= $row->nama_makanan ?></td>
								<td><?= $row->jumlah_kalori ?></td>
								<td>
									<a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?=$row->id?>" data-nama_makanan="<?=$row->nama_makanan?>" data-jumlah_kalori="<?=$row->jumlah_kalori?>" data-foto="<?=$row->foto?>"><i class="fa fa-edit"></i></a>
									<a onclick="return confirm('Data tersebut akan dihapus ?')" href="<?php echo site_url('makanan/delete/'.$row->id)?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
				<h6 class="modal-title" id="modal-title-default">Form Tambah Makanan</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
			</div>
			
			<form action="<?php echo site_url('makanan/save')?>" method="post" enctype="multipart/form-data">
			<div class="modal-body">
					<div class="form-group">
						<label>Nama Makanan</label>
						<input type="text" class="form-control" placeholder="Nama Makanan" name="nama_makanan" />
					</div>
					<div class="form-group">
						<label>Jumlah Kalori</label>
						<input type="number" class="form-control" placeholder="0" name="jumlah_kalori" />
					</div>
					<div class="form-group">
						<label>Gambar</label>
						<input type="file" class="form-control" name="foto" />
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Makanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
				<form action="<?php echo site_url('makanan/update')?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Makanan</label>
							<input type="text" class="form-control makanan_nama" placeholder="Nama Makanan" name="nama_makanan" />
						</div>
						<div class="form-group">
							<label>Jumlah Kalori</label>
							<input type="number" class="form-control makanan_kalori" placeholder="0" name="jumlah_kalori" />
						</div>
						<div class="form-group">
							<label>Gambar</label>
							<div class="row">
								<div class="col-lg-2">
								<img class="avatar avatar-md rounded-circle makanan_foto" src="" alt="">
								</div>
								<div class="col-lg-10">
									<input type="text" class="form-control makanan_nama_foto" readonly>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="hidden" class="form-control makanan_id" name="id" />
							<input type="file" class="form-control" name="foto" />
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
						const nama_makanan = $(this).data('nama_makanan');
						const jumlah_kalori = $(this).data('jumlah_kalori');
						const foto = $(this).data('foto');
						const url = "<?php echo base_url('upload/')?>";

						$('.makanan_id').val(id);
						$('.makanan_nama').val(nama_makanan);
						$('.makanan_kalori').val(jumlah_kalori);
						$('.makanan_foto').attr('src', url+foto);
						$('.makanan_nama_foto').val(foto);
            $('#editModal').modal('show');
        });
         
    });
</script>
