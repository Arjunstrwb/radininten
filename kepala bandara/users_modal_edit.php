<?php

include "../include/connect.php";

$nip	= $_GET["nip"];

$querypegawai = mysqli_query($connect, "SELECT * FROM pegawai WHERE nip='$nip'");
if($querypegawai == false){
	die ("Terjadi Kesalahan : ". mysqli_error($connect));
}
while($user = mysqli_fetch_array($queryuser)){

?>
	<script src="../assets/plugins/daterangepicker/moment.min.js"></script>
	<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
	
	<!-- page script -->
    <script>
      $(function () {	
		// Daterange Picker
		  $('#Tanggal_Lahir2').daterangepicker({
			  singleDatePicker: true,
			  showDropdowns: true,
			  format: 'YYYY-MM-DD'
		  });
      });
    </script>
	<!-- Modal Popup User Edit -->
		<div id="ModalEditUser" class="modal fade" tabindex="-1" role="dialog"></div>
<!-- Modal Popup User -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Users</h4>
					</div>
					<div class="modal-body">
						<form action="users_add.php" name="modal_popup" enctype="multipart/form-data" method="POST">
							<div class="form-group">
								<label>Nip</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="nip" type="text" class="form-control" placeholder="nip"/>
									</div>
							</div>
							<div class="form-group">
								<label>Nama</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="nama" type="text" class="form-control" placeholder="nama"/>
									</div>
							</div>
							<div class="form-group">
								<label>Jabatan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="jabatan" type="text" class="form-control" placeholder="jabatan"/>
									</div>
							</div>
							<div class="form-group">
								<label>Unit</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="unit" type="text" class="form-control" placeholder="unit"/>
									</div>
							</div>
							<div class="form-group">
								<label>Password</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="password" type="password" class="form-control" placeholder="password"/>
									</div>
							</div>
							<div class="form-group">
								<label>Role</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<select name="level" class="form-control">
										<option value='kepala bandara'>kepala bandara</option>
										<option value='kepala staff'>kepala staff</option>
										<option value='pegawai kampen'>pegawai kampen</option>
				
										</select>
									</div>
									</div>
									
									<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
			
			
<?php
			}

?>