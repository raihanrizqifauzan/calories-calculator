
<footer class="pb-50  pt-5">
                <p class="color-white font-9 mt-50 mt-sm-30"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-heart" aria-hidden="true"></i> </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
		
		

		
</footer>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<form action="<?php echo base_url('user/login') ?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<div class="mb-2">
		<label for="exampleFormControlInput1" class="form-label">Username</label>
		<input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="Input your Username...">
	</div>
	<div class="mb-2">
		<label for="exampleFormControlInput1" class="form-label">Password</label>
		<input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="Input your Password...">
	</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </div>
    </div>
		</form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<form action="<?php echo base_url('user/register') ?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="mb-2">
		<label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
		<input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Nama ...">
	</div>
	<div class="mb-2">
		<label for="exampleFormControlInput1" class="form-label">Username</label>
		<input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Username ...">
	</div>
	<div class="mb-2">
		<label for="exampleFormControlInput1" class="form-label">Password</label>
		<input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password ...">
	</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-block">Register</button>
      </div>
    </div>
		</form>
  </div>
</div>

<!-- SCIPTS -->
<script src="<?php echo base_url('assets/')?>plugin-frameworks/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/')?>plugin-frameworks/swiper.js"></script>
<script src="<?php echo base_url('assets/')?>common/scripts.js"></script>

</body>
</html>
