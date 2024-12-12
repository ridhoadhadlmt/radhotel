<?php
	$table = 'destinasi';
	$field = '*';
	$read = getDestinasi($table,$field);
	
	if(isset($_POST['tambah'])){
		$nama_destinasi = $_POST['nama_destinasi'];
		$deskripsi = $_POST['deskripsi'];
		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$nama_file = $_FILES['gambar']['name'];
	  	$source    = $_FILES['gambar']['tmp_name'];
	  	$folder = "../assets/images/destinasi/";
	  	$exe_img = move_uploaded_file($source,$folder.$nama_file);
		$table = 'destinasi';
		$field = array('id_destinasi,nama_destinasi,deskripsi,alamat,kota,gambar');
		$value = array("null","'$nama_destinasi'","'$deskripsi'","'$alamat'",
			"'$kota'","'$nama_file'");
		createDestinasi($table,$field,$value);

	}
	if(isset($_GET['id_destinasi'])){
		$id = $_GET['id_destinasi'];
		deleteDestinasi($table, $field, $id);
	}
?>

<ol class="breadcrumb">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item active">Destinasi</li>
</ol>

<div class="table-area">
	<div class="table-header">
	  <div class="tambah-area">
	  	<a href="" class="btn btn-tambah" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah</a>
	  	
  		<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
		  <div class="modal-dialog" style="max-width: 600px;">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h6 class="modal-title" id="title">Tambah Destinasi</h6>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	
		        <form action="" method="POST" enctype="multipart/form-data">
		        	<div class="form-group">
		        		<input type="text" name="nama_destinasi" class="form-control" placeholder="Nama Destinasi"></input>
		        	</div>
		        	<div class="form-group">
		        		<input type="text" class="form-control" name="alamat" placeholder="Alamat"></input>
		        	</div>
		        	<div class="form-group">
		        		<input type="text" class="form-control" name="kota" placeholder="Kota"></input>
		        	</div>
					<div class="form-group">
		        		<textarea class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea>
		        	</div>
		        	<div class="form-group">
		        		<input type="file" class="form-control-file" name="gambar"></input>
		        	</div>
		        	<div class="form-group">
		        		<button type="button" class="btn btn-batal" data-dismiss="modal">Batal</button>
			        	<button type="submit" name="tambah" class="btn btn-tambah">Tambah</button>
		        	</div>
		        </form>
		      </div>
		      
		    </div>
		  </div>
		</div>
	  	
	  </div>	
	  <div class="impor-ekspor-area">
	  	<div class="btn-group">
	  		<a href="" class="btn btn-impor"><i class="fas fa-cloud-upload-alt"></i> Impor</a>
	  		<a href="" class="btn btn-ekspor"><i class="fas fa-cloud-download-alt"></i> Ekspor</a>
	  	</div>
	  </div>
	</div>
			
	<div class="table-body">
		<table class="table table-striped table-bordered table-responsive" id="dataTable">
			<thead class="">
				<tr>
					<th>No</th>
					<th width="15%">Nama Destinasi</th>
					<th width="30%">Deskripsi</th>
					<th>Alamat</th>
					<th>Kota</th>
					<th width="5%">Gambar</th>
					<th width="10%">Aksi</th>
				</tr>
			</thead>
			<tbody class="">
				<?php
					$i = 1;
					foreach($read as $destinasi):
				?>
				<tr>
					<td><?= $i ;?></td>
					<td width="15%"><?= $destinasi['nama_destinasi'];?></td>
					<td width="30%"><?= $destinasi['deskripsi'];?></td>
					<td><?= $destinasi['alamat'];?></td>
					<td><?= $destinasi['kota'];?></td>
					<td width="5%"><img class="img-fluid" src="../assets/images/destinasi/<?= $destinasi['gambar'];?>" alt=""></td>
					<td width="10%" class="d-flex">
						<button data-toggle="modal" data-target="#modal-ubah-<?php echo $destinasi['id_destinasi'] ?>" class="btn btn-sm btn-ubah px-2">Ubah</button>
						<a href="index.php?q=destinasi&id_destinasi=<?= $destinasi['id_destinasi']?>" class="btn btn-sm btn-hapus px-2">Hapus</a>		
					</td>
				</tr>
				<div class="modal fade" id="modal-ubah-<?php echo $destinasi['id_destinasi']?>" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
					<div class="modal-dialog" style="max-width: 600px;">
						<div class="modal-content">
						<div class="modal-header">
							<h6 class="modal-title" id="title">Ubah Destinasi</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<input type="text" name="nama_destinasi" value="<?= $destinasi['nama_destinasi']?>" class="form-control" placeholder="Nama Destinasi"></input>
								</div>
								
								<div class="form-group">
									<input type="text" class="form-control" name="alamat" value="<?= $destinasi['alamat']?>" placeholder="Alamat"></input>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="kota" value="<?= $destinasi['kota']?>" placeholder="Kota"></input>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="deskripsi" placeholder="Deskripsi"><?= $destinasi['deskripsi']?></textarea>
								</div>
								<div class="form-group">
									<img style="height: 200px; object-fit:cover" class="w-100 mb-2" src="../assets/images/destinasi/<?= $destinasi['gambar'] ?>" alt="asdad">
									<input type="file" class="form-control-file" name="gambar"></input>
								</div>
								<div class="form-group">
									<button type="button" class="btn btn-batal" data-dismiss="modal">Batal</button>
									<button type="submit" name="ubah" class="btn btn-ubah">Ubah</button>
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


<style type="text/css">
	
	
</style>