<?php	
 
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
