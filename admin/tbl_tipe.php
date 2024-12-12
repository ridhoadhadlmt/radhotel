<?php

	$table = 'tipe_kamar';
	$field = '*';
	$read = getTipeKamar($table,$field);

	if(isset($_POST['tambah'])){
		$tipe = $_POST['tipe'];
		$deskripsi = $_POST['deskripsi'];
		$table = 'tipe_kamar';
		$field = array('id_tipe,nama_tipe,deskripsi');
		$value = array("null","'$tipe'","'$deskripsi'");
		createTipeKamar($table,$field,$value);

	}
	if(isset($_POST['ubah'])){
		$id = $_POST['id_tipe'];
		$nama_tipe = $_POST['nama_tipe'];
		$deskripsi = $_POST['deskripsi'];
		$table = 'tipe_kamar';
		$field = array('id_tipe,nama_tipe,deskripsi');
		$value = array("null","'$nama_tipe'","'$deskripsi'");
		ubahTipeKamar($table,$field,$id);

	}
?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="index.php?q=menu">Menu</a></li>
  <li class="breadcrumb-item active">Tipe Kamar</li>
</ol>

<div class="table-area">
	<div class="table-header">
	  <div class="tambah-area">
	  	<a href="" class="btn btn-tambah" data-toggle="modal" data-target="#modal-tambah"><i class="ion ion-md-add"></i> Tambah</a>
	  	
  		<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
		  <div class="modal-dialog" style="max-width: 600px;">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="title">Tambah</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="" method="POST" enctype="multipart/form-data">
		        	<div class="form-group">
		        		<input type="text" id="tipe" name="tipe" class="form-control" placeholder="Tipe Kamar" required></input>
		        	</div>
		        	<div class="form-group">
		        		<textarea class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea>
		        	</div>
		        	<div class="form-group">
		        		<button type="button" class="btn btn-batal" data-dismiss="modal">Batal</button>
			        	<button type="submit" id="tambah" name="tambah" class="btn btn-tambah">Tambah</button>
		        	</div>
		        </form>
		      </div>
		      
		    </div>
		  </div>
		</div>
	  	
	  </div>	
	  <div class="impor-ekspor-area">
	  	<div class="btn-group">
	  		<a href="" class="btn btn-impor"><i class="ion ion-md-cloud-upload"></i> Impor</a>
	  		<a href="" class="btn btn-ekspor"><i class="ion ion-md-cloud-download"></i> Ekspor</a>
	  	</div>
	  </div>
	</div>
			
	<div class="table-body">
		<table class="table table-striped" id="dataTable">
			<thead class="">
				<tr>
					<th>No</th>
					<th width="20%">Tipe Kamar</th>
					<th width="50%">Deskripsi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody class="">
				<?php
					$i = 1;
					foreach($read as $tipe):
				?>
				<tr>
					<td><?= $i ;?></td>
					<td width="20%"><?= $tipe['nama_tipe'];?></td>
					
					<td width="50%"><?= $tipe['deskripsi'];?></td>
					<td>
						<a href="" data-toggle="modal" data-target="#modal-ubah-<?= $tipe['id_tipe']?>" class="btn btn-sm btn-ubah">Ubah</a>
						<a href="" class="btn btn-sm btn-hapus">Hapus</a>		
					</td>
				</tr>
				<div class="modal fade" id="modal-ubah-<?= $tipe['id_tipe'] ?>" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
					<div class="modal-dialog" style="max-width: 600px;">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="title">Ubah</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<input type="text" id="nama_tipe" name="nama_tipe" value="<?= $tipe['nama_tipe'] ?>" class="form-control" placeholder="Tipe Kamar" required></input>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="deskripsi" placeholder="Deskripsi"><?= $tipe['deskripsi'] ?></textarea>
								</div>
								<input type="hidden" value="<?= $tipe['id_tipe'] ?>">
								<div class="form-group">
									<button type="button" class="btn btn-batal" data-dismiss="modal">Batal</button>
									<button type="submit" id="ubah" name="ubah" class="btn btn-ubah">Ubah</button>
								</div>
							</form>
						</div>
						
						</div>
					</div>
				</div>
				<?php
					$i++;
					endforeach;
				?>
			</tbody>
		</table>
	</div>	
</div>


<script type="text/javascript">
	// $(document).ready(function(){
	// 	$('#tambah').click(function(e){
	// 		var valid = this.form.checkValidity();
	// 		if(valid){
	// 			var tipe = $('#tipe').val();

	// 			e.preventDefault();
	// 			$.ajax({
	// 				type : 'POST',
	// 				url : 'proses.php',
	// 				data : {tipe:tipe},
	// 				success:function(data){
	// 					Swal.fire({
	// 						'title': 'Berhasil',
	// 						'text' : data,
	// 						'type' : 'success'	
	// 					});
	// 				},
	// 				error:function(data){
	// 					Swal.fire({
	// 						'title': 'Gagal',
	// 						'text' : 'Data gagal ditambah',
	// 						'type' : 'error'	
	// 					});
	// 				}
	// 			});
	// 			alert('true');
	// 		}else{
	// 			alert('false');
	// 		}
			
	// 	});
	// });
</script>