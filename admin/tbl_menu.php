<?php
	$table = 'menu';
	$field = '*';
	$sql = getMenu($table,$field);

	$table2 = 'kategori_menu';
	$field2 = '*';
	$sql2 = getKategoriMenu($table2,$field);

?>

<?php
	if(isset($_POST['tambah'])){
		$nama_menu = $_POST['nama_menu'];
		$harga = $_POST['harga'];
		$rating = $_POST['rating'];
		$kategori = $_POST['kategori'];
		$deskripsi = $_POST['deskripsi'];
		$nama_file = $_FILES['gambar']['name'];
	  	$source    = $_FILES['gambar']['tmp_name'];
	  	$folder = "../assets/images/menu/";
	  	$exe_img = move_uploaded_file($source,$folder.$nama_file);
		$table = 'menu';
		$field = array('id_menu,nama_menu,harga,rating,kategori,deskripsi,gambar');
		$value = array("null","'$nama_menu'","'$harga'","'$rating'","'$kategori'","'$deskripsi'","'$nama_file'");
		createMenu($table,$field,$value);

	}
?>
<ol class="breadcrumb">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item active">Menu</li>
</ol>
<div class="table-area">
	<div class="table-header">
	  <div class="tambah-area">
	  	<a href="" class="btn btn-tambah" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah</a>
	  	<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
		  <div class="modal-dialog" style="max-width: 600px;">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h6 class="modal-title" id="title">Tambah</h6>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true"><i class="fas fa-times fa-sm"></i></span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="" method="POST" enctype="multipart/form-data">
		        	<div class="form-group">
		        		<input type="text" name="nama_menu" class="form-control" placeholder="Nama Menu"></input>
		        	</div>
		        	<div class="form-group">
		        		<input type="text" class="form-control" name="harga" placeholder="Harga"></input>
		        	</div>
		        	<div class="form-group">
		        		<input type="text" class="form-control" name="rating" placeholder="Rating"></input>
		        	</div>
		        	<div class="form-group">
		        		<select id="select" class="" name="kategori">
		        		  <option>Kategori</option>
		        		  <option value="Makanan">Makanan</option>
		        		  <option value="Minuman">Minuman</option>
		        		  
		        		</select>
		        	</div>
		        	<div class="form-group">
		        		<textarea class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea>
		        	</div>
		        	<div class="form-group">
		        		<input type="file" class="" name="gambar"></input>
		        	</div>
		        	<div class="form-group">
		        		<button type="button" class="btn btn-batal" data-dismiss="modal">Batal</button>
			        	<button type="submit" name="tambah"  class="btn btn-tambah">Tambah</button>
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
		<table class="table table-striped table-bordered" id="dataTable">
			<thead class="">
				<tr>
					<th>No</th>
					<th id="nama-menu">Nama Menu</th>
					<th>Harga</th>
					<th>Rating</th>
					<th>Kategori</th>
					<th id="deskripsi">Deskripsi</th>
					<th>Gambar</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i = 1;
					foreach($sql as $menu):
				?>
				<tr>
					<td><?= $i ;?></td>
					<td id="nama-menu"><?= $menu['nama_menu'];?></td>
					<td><?= $menu['harga'];?></td>
					<td><?= $menu['rating'];?></td>
					<td><?= $menu['kategori'];?></td>
					<td id="deskripsi"><?= $menu['deskripsi'];?></td>
					<td><img width="20" src="../assets/images/menu/<?= $menu['gambar'];?>" alt=""></td>
					<td>
						<a href="" class="btn btn-ubah">Ubah</a>
						<a href="" class="btn btn-hapus">Hapus</a>		
					</td>
				</tr>
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