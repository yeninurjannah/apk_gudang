<?php
// membuat instance
$dataBarang=NEW Barang;
// aksi tampil data
if($_GET['aksi']=='tampil'){
// aksi untuk tampil data
$html = null;
$html .='<center><h3>Daftar Barang</h3>';
$html .='<p></p></center>';
$html .='<table class="table table-striped table-hover""><border="1" width="100%">
<thead>
<th>No.</th>
<th>Id Barang</th>
<th>Nama Barang</th>
<th>Jml Barang</th>
<th>Harga Barang</th>
<th>Aksi</th>
</thead>
<tbody>';
// variabel $data menyimpan hasil return
$data = $dataBarang->tampil();
$no=null;
if(isset($data)){
foreach($data as $barisBarang){
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$barisBarang->id_barang.'</td>
<td>'.$barisBarang->nama_barang.'</td>
<td>'.$barisBarang->jml_barang.'</td>
<td>'.$barisBarang->harga_barang.'</td>
<td>
<a class="btn btn-info"
href="index.php?file=barang&aksi=edit&idbarang='.$barisBarang->id_barang.'">Edit</a>
<a class="btn btn-danger"
href="index.php?file=barang&aksi=hapus&idbarang='.$barisBarang->id_barang.'">Hapus</a>
</td>
</tr>';
}
}
$html .='</tbody>
</table>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='tambah') {
$html =null;
$html .='<h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST"
action="index.php?file=barang&aksi=simpan">';
$html .='<p>Id Barang<br/>';
$html .='<input type="text" name="txtidbarang" placeholder="Masukan Id Barang" autofocus/></p>';
$html .='<p>Nama Barang<br/>';
$html .='<input type="text" name="txtnamabarang" placeholder="Masukan Nama Barang" size="30" required/></p>';
$html .='<p>Jml Barang<br/>';
$html .='<input type="text" name="txtjmlbarang" placeholder="Masukan Jml Barang" size="30" required/>,';
$html .='<p>Harga Barang<br/>';
$html .='<input type="text" name="txthargabarang" placeholder="Masukan Harga Barang" size="30" required/></p>';
$html .='<p><input type="submit" class="btn btn-warning" name="tombolSimpan" value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='simpan') {
$data=array(
'id_barang'=>$_POST['txtidbarang'],
'nama_barang'=>$_POST['txtnamabarang'],
'jml_barang'=>$_POST['txtjmlbarang'],
'harga_barang'=>$_POST['txthargabarang'],
);
// simpan barang dengan menjalankan method simpan
$dataBarang->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=barang&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='edit') {
// ambil data barang
$barang=$dataBarang->detail($_GET['idbarang']);
$html =null;
$html .='<h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST"action="index.php?file=barang&aksi=update">';
$html .='<p>Id Barang<br/>';
$html .='<input type="text" name="txtidbarang" value="'.$barang->id_barang.'"placeholder="Masukan Id Barang" readonly/></p>';
$html .='<p>Nama Barang<br/>';
$html .='<input type="text" name="txtnamabarang" value="'.$barang->nama_barang.'" placeholder="Masukan Nama Barang" size "30" required autofocus/></p>';
$html .='<p> Jml Barang<br/>';
$html .='<input type="text" name="txtjmlbarang" value="'.$barang->jml_barang.'" placeholder="Masukan Jml Barang"size="30" required/></p>';
$html .='<p> Harga Batang<br/>';
$html .='<input type="text" name="txthargabarang" value="'.$barang->harga_barang.'" placeholder="Masukan Harga Barang"cols="50" rows="5"required>';
$html .='<p><input type="submit" name="tombolSimpan"value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='update') {
$data=array(

'nama_barang'=>$_POST['txtnamabarang'],
'jml_barang'=>$_POST['txtjmlbarang'],
'harga_barang'=>$_POST['txthargabarang'],
);
$dataBarang->update($_POST['txtidbarang'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=barang&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$dataBarang->hapus($_GET['idbarang']);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=barang&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>

