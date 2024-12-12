<?php

	$table = 'kamar';
	$field = '*';
	$sql = getKamar($table,$field);
?>
<ol class="breadcrumb">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item active">Kamar</li>
</ol>
<div class="table-area">
	<div class="table-header">
		<div class="tambah-area">
			<a href="" class="btn btn-tambah" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah</a>
			<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
		  		<div class="modal-dialog">
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
				        		<input type="text" name="nama_kamar" class="form-control" placeholder="Nama Kamar"></input>
				        	</div>
				        	<div class="form-group">
				        		<input type="text" class="form-control" name="harga" placeholder="Harga"></input>
				        	</div>
				        	<div class="form-group">
				        		<input type="text" placeholder="Rating" class="form-control" name="rating">
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
		<table class="table table-striped" id="dataTable">
			<thead class="text-center">
				<tr>
					<th>No</th>
					<th>Nama Kamar</th>
					<th>Harga</th>
					<th>Rating</th>
					<th>Gambar</th>
					<th>Deskripsi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php
					$i = 1;
					foreach($sql as $kamar):
				?>
				<tr>
					<td><?= $i ;?></td>
					<td><?= $kamar['nama_kamar'];?></td>
					<td>Rp. <?= $kamar['harga_kamar'];?></td>
					<td><?= $kamar['rating_kamar'];?></td>
					<td><img width="80" src="../assets/images/kamar/<?= $kamar['gambar_kamar'];?>"></td>
					<td>lorem</td>
					<td>
						<a href="" class="btn btn-sm btn-ubah">Ubah</a>
						<a href="" class="btn btn-sm btn-hapus">Hapus</a>		
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
	{
		
	}
	
</style>