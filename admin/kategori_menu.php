<?php

	$table = 'kategori_menu';
	$field = '*';
	$read = getKategoriMenu($table,$field);
	
?>
<?php
	if(isset($_POST['tambah'])){
		$kategori = $_POST['kategori'];
		// $nama_file = $_FILES['gambar']['name'];
	 //  	$source    = $_FILES['gambar']['tmp_name'];
	 //  	$folder = "../assets/images/destinasi/";
	 //  	$exe_img = move_uploaded_file($source,$folder.$nama_file);
		$table = 'kategori_menu';
		$field = array('id_kategori,kategori');
		$value = array("null","'$kategori'");
		create($table,$field,$value);

	}
?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="index.php?q=menu">Menu</a></li>
  <li class="breadcrumb-item active">Kategori</li>
</ol>

<div class="table-area">
	<div class="table-header">
	  <div class="tambah-area">
	  	<a href="" class="btn btn-tambah" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah</a>
	  	
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
		        		<input type="text" id="kategori" name="kategori" class="form-control" placeholder="Kategori" required></input>
		        	</div>
		        	<!-- <div class="form-group">
		        		<input type="file" class="form-control-file" name="gambar"></input>
		        	</div> -->
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
	  		<a href="" class="btn btn-impor"><i class="fas fa-cloud-upload-alt"></i> Impor</a>
	  		<a href="" class="btn btn-ekspor"><i class="fas fa-cloud-download-alt"></i> Ekspor</a>
	  	</div>
	  </div>
	</div>
			
	<div class="table-body">
		<table class="table table-striped" id="dataTable">
			<thead class="text-center">
				<tr>
					<th>No</th>
					<th>Kategori</th>
					
					<!-- <th>Gambar</th> -->
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php
					$i = 1;
					foreach($read as $kategori):
				?>
				<tr>
					<td><?= $i ;?></td>
					<td><?= $kategori['kategori'];?></td>
					
					<!-- <td><?= $kategori['gambar'];?></td> -->
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


<script type="text/javascript">
	// $(document).ready(function(){
	// 	$('#tambah').click(function(e){
	// 		var valid = this.form.checkValidity();
	// 		if(valid){
	// 			var kategori = $('#kategori').val();

	// 			e.preventDefault();
	// 			$.ajax({
	// 				type : 'POST',
	// 				url : 'proses.php',
	// 				data : {kategori:kategori},
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