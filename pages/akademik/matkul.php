<?php
ob_start();
?>
<form name="form1" method="post" action="?cat=akademik&page=matkul&act=1">
  <label>Jadwal Pelajaran</label>

  <!-- <input type="text" name="nama_mata_kuliah" id="nama_mata_kuliah">    
   
      <p></p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Daftar">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset"> -->

      <div align="right">
      <button class="btn btn-medium btn-primary" type="button" onClick="window.location='?cat=akademik&page=addjadwal'">Tambah Data</button>
</form>
<?php
ob_end_flush();
?>
<p></p>
<p></p>
<span class="span4">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <td>ID Jadwal</td>
    <td>Hari</td>  
    <td>Jam Mulai</td> 
    <td>Jam Selesai</td> 
    <td>Kode Kelas</td>     
    <td>NIP</td>  
    <td>Semester</td>  
    <td>Kode Mata Pelajaran</td>  
    <td>&nbsp;</td>
  </tr>
  <?php
  $rw=mysql_query("Select * from jadwal_sekolah");
  while($s=mysql_fetch_array($rw))
  {
  ?>
  <tr>
    <td><?php echo $s['id_jadwal']; ?></td>
    <td><?php echo $s['hari']; ?></td>
    <td><?php echo $s['jam_mulai']; ?></td>
    <td><?php echo $s['jam_selesai']; ?></td>
    <td><?php echo $s['kode_kelas']; ?></td>
    <td><?php echo $s['nip']; ?></td>
    <td><?php echo $s['semester']; ?></td>
    <td><?php echo $s['kode_mata_pelajaran']; ?></td>

    <td><a href="?cat=akademik&page=editmatkul&id=<?php echo sha1($s['kode_mata_kuliah']); ?>">Edit</a> - <a href="?cat=akademik&page=matkul&del=1&id=<?php echo sha1($s['kode_mata_kuliah']); ?>">Hapus</a></td>
  </tr>
  <?php
  }
  ?>
</table>
</span>
<?php
if(isset($_GET['act']))
{
	
	$rs=mysql_query("Insert into mata_kuliah (`nama_mata_kuliah`) values ('".$_POST['nama_mata_kuliah']."')") or die(mysql_error());
	if($rs)
	{
		echo "<script>window.location='?cat=akademik&page=matkul'</script>";
	}
}
?>

<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from mata_kuliah Where sha1(kode_mata_kuliah)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?cat=akademik&page=matkul'</script>";
	}
}
?>
