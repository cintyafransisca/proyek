<?php
session_start();
$sql_join = "SELECT * FROM  pegawai pg, hasil_akhir ha WHERE ha.nip=pg.nip group by pg.nama_pegawai order by hasil desc";
$result_join = mysql_query($sql_join);
?>

<body onload="javascript:window.print()"
style="margin:0 auto; width:100%;">
<div style="margin-left:20px; margin-right:20px;">

	<div id="watermark">
		<img src="../img/logo2baru.png" width="100%">
		</div>

<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="3" align="center"><img src="../img/logobaru.png" width="150" height="145">
		</td>
		<td><div align="center"><font size="5">
		PT. ANTARMITRA SEMBADA CABANG CIREBON</font>
		</div></td>
	</tr>
	
	<tr>
		<td><div align="center">Jln. Brigjen Darsono No. 96 Cirebon, Prov. Jawa Barat
		</div></td>
	</tr>	

</table>
<hr>
<label><font size="3"><center>HASIL AKHIR PEMILIHAN PEGAWAI TERBAIK</center></font></label>

<table style="border:1px solid #000;" width="100%" cellpadding="0" cellspacing="0">
<tr>
	<th style="border-right:1px solid #000;">
	No.</th>
    <th style="border-right:1px solid #000;">
	NIP</th>
	<th style="border-right:1px solid #000;">
	Nama Pegawai</th>
	<th style="border-right:1px solid #000;">
	Divisi</th>
	<th style="border-right:1px solid #000;">
	Persentase</th>
</tr>

<?php
	$i=1;
	while($data_join = mysql_fetch_array($result_join)){
		?>
		
		<tr>
		<td align='center' 
		style ='border-right:1px solid #000; border-top:1px solid #000; padding:3px;'><?php echo $i ?></td>
		<td align='center' 
		style ='border-right:1px solid #000; border-top:1px solid #000; padding:3px;'><?php echo $data_join['nip'] ?></td>
		<td align='center' 
		style ='border-right:1px solid #000; border-top:1px solid #000; padding:3px;'><?php echo $data_join['nama_pegawai'] ?></td>
		<td align='center' 
		style ='border-right:1px solid #000; border-top:1px solid #000; padding:3px;'><?php echo $data_join['nama_divisi'] ?></td>
		<td align='center' 
		style ='border-right:1px solid #000; border-top:1px solid #000; padding:3px;'><?php echo $data_join['hasil']*100 ?> %</td>
		</tr>
		<?php
		$i++;
	}
		?>

</table>
<br></br>
<p style="text-align:right; font-size:15px; solid #000;">Cirebon, <?php echo date("d M Y")?></p>

</div>
</body>