<?php
//ambil nilai normalisasi dari tiap kriteria
$kriteria1 = "SELECT normalisasi FROM kriteria WHERE id_kriteria=1";
$result_kriteria1 = mysql_query($kriteria1);
$data_kriteria1 = mysql_fetch_array($result_kriteria1);
$kriteria2 = "SELECT normalisasi FROM kriteria WHERE id_kriteria=2";
$result_kriteria2 = mysql_query($kriteria2);
$data_kriteria2 = mysql_fetch_array($result_kriteria2);
$kriteria3 = "SELECT normalisasi FROM kriteria WHERE id_kriteria=3";
$result_kriteria3 = mysql_query($kriteria3);
$data_kriteria3 = mysql_fetch_array($result_kriteria3);
$kriteria4 = "SELECT normalisasi FROM kriteria WHERE id_kriteria=4";
$result_kriteria4 = mysql_query($kriteria4);
$data_kriteria4 = mysql_fetch_array($result_kriteria4);
$kriteria5 = "SELECT normalisasi FROM kriteria WHERE id_kriteria=5";
$result_kriteria5 = mysql_query($kriteria5);
$data_kriteria5 = mysql_fetch_array($result_kriteria5);
$kriteria6 = "SELECT normalisasi FROM kriteria WHERE id_kriteria=6";
$result_kriteria6 = mysql_query($kriteria6);
$data_kriteria6 = mysql_fetch_array($result_kriteria6);

$sql_penilaian = "SELECT * FROM penilaian";
$result_penilaian = mysql_query($sql_penilaian);
    
?>

<?php	
//hitung s dari tiap pegawai
$i=1;
while($data_penilaian = mysql_fetch_array($result_penilaian)){
    $nip = $data_penilaian['nip'];
    $nama_pegawai = $data_penilaian['nama_pegawai'];
    $s_penilaian=(pow($data_penilaian['kriteria1'],$data_kriteria1['normalisasi']))*(pow($data_penilaian['kriteria2'],$data_kriteria2['normalisasi']))*(pow($data_penilaian['kriteria3'],$data_kriteria3['normalisasi']))*(pow($data_penilaian['kriteria4'],$data_kriteria4['normalisasi']))*(pow($data_penilaian['kriteria5'],$data_kriteria5['normalisasi']))*(pow($data_penilaian['kriteria6'],$data_kriteria6['normalisasi']));    
    var_dump($s_penilaian); 
    var_dump($nip);
    //if($nip WHERE EXISTS);
    $sql = "INSERT INTO hasil_akhir (nip, nama_pegawai, nilai_s) VALUES (
        '$nip','$nama_pegawai','$s_penilaian')"; 
    $result = mysql_query($sql);
    ?>
    <?php
    $i++;
}
?>
 <?php
//hitung v dari tiap pegawai    
    //$sql = "INSERT INTO hasil_akhir (nip, nama_pegawai, hasil) VALUES (
    //'{$_POST['nip']}','{$_POST['nama_pegawai']}','$hasil')"; 
    //$result = mysql_query($sql);
?>
<?php
mysql_query($sql) or die(mysql_error()); 
pesan_sukses("Membuka Halaman Hasil Akhir"); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=hasil">'; 

?>