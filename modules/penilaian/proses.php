<?php	
if (isset($_POST['submitted'])){ 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }

				$nip=$_POST['nip'];
				$nama_pegawai=$_POST['nama_pegawai'];
				$nama_divisi=$_POST['nama_divisi'];
				$kriteria1=$_POST['kriteria1'];
				$kriteria2=$_POST['kriteria2'];
				$kriteria3=$_POST['kriteria3'];
				$kriteria4=$_POST['kriteria4'];
				$kriteria5=$_POST['kriteria5'];
				$kriteria6=$_POST['kriteria6'];
				$hasil=$_POST['hasil'];
	
//ambil data dari tabel kriteria
$sql_kriteria = "SELECT * from kriteria";
$result_kriteria = mysql_fetch_array(mysql_query($sql_kriteria));
$bobot_kriteria=$result_kriteria['bobot'];
	$sql_total = "SELECT sum(bobot) as total from kriteria";
	$result_total = mysql_fetch_array(mysql_query($sql_total));

//hitung normalisasi kriteria & input nilai normalisasi tiap kriteria ke tabel kriteria	
$sql_input = "INSERT INTO kriteria (normalisasi) VALUES (
'$normalisasi')";
$normalisasi=$bobot_kriteria/$result_total['total'];
 
 
//hitung s dari tiap pegawai
$sql_penilaian = "SELECT * from penilaian";
$result_penilaian = mysql_fetch_array(mysql_query($sql_penilaian));
$s_penilaian=$result_penilaian['s'];



//hitung penilaian pegawai & input ke tabel hasil_akhir
$sql = "INSERT INTO hasil_akhir (nip, nama_pegawai, nama_divisi, kriteria1, kriteria2, kriteria3,kriteria4, kriteria5, kriteria6, hasil) VALUES (
'{$_POST['nip']}','{$_POST['nama_pegawai']}','{$_POST['nama_divisi']}','{$_POST['kriteria1']}','{$_POST['kriteria2']}','{$_POST['kriteria3']}','{$_POST['kriteria4']}','{$_POST['kriteria5']}','{$_POST['kriteria6']}','$hasil')"; 



mysql_query($sql) or die(mysql_error()); 
pesan_sukses("Membuka Halaman Hasil Akhir"); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=hasil">'; 
} 
?>