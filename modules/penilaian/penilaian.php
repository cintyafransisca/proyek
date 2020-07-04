<?php	
if (isset($_POST['submitted'])){ 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }

				$nip=$_POST['nip'];
				$nama_pegawai=$_POST['nama_pegawai'];
				$nama_divisi=$_POST['nama_divisi'];
				$hasil=$_POST['hasil'];
				
$sql = "INSERT INTO hasil_akhir (nip, nama_pegawai, nama_divisi, hasil) VALUES (
'{$_POST['nip']}','{$_POST['nama_pegawai']}','{$_POST['nama_divisi']}','$hasil')"; 

mysql_query($sql) or die(mysql_error()); 
pesan_sukses("Data berhasil disimpan"); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=hasil_akhir">'; 
} 

$cari=$_GET['cari'];
		if(isset($cari)){
		$ket="where nama_pegawai like '%" . $cari. "%'";
	} else {
		$ket="";
	}
    $sql = "SELECT * FROM penilaian ".$ket." order by nip asc";
    $result = mysql_query($sql);
	$sql2 = "SELECT * FROM penilaian";
    $result2 = mysql_query($sql2);
	$sql1 = "SELECT * FROM kriteria";
	$result1 = mysql_query($sql1);
	$modname="penilaian";		
?>

<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=<?php echo $modname;?>>"><?php echo ucwords($modname);?></a> <span class="separator"></span></li>  
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>        
<div class="pageheader">
            
            <div class="pageicon"><span class=" iconfa-file"></span></div>
            <div class="pagetitle">
                <h5>Penilaian</h5>
                <h1>Daftar Penilaian</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
            <div class="maincontentinner">
			
            <ul class="list-nostyle list-inline">
                	<li><a href="index.php?mod=penilaian_new" class="btn btn-primary">
                    <i class="iconfa-plus"></i>&nbsp;Tambah Data Penilaian</a></li>
                    
                </ul>
                
                </ul>
                <form class="stdform3" action="" method="GET">
                	<div class="input-append" style="position:absolute;top:255px; left:1070px">
                    
                    	<label>Nama Pegawai</label>
                        <input type="text" name="cari"/>
                        <button type="submit" class="btn">CARI</button>
                        <input type="hidden" name="mod" value="pegawai"/>
                        
                        </div>
                        </form>
					
                
                <table id="dyntable" class="table table-bordered responsive">
                
					
                    <thead>
                        <tr> 
                    <th width="20">No</th>   
	     			<th width="20">NIP</th>
	     			<th width="50">Nama Pegawai</th>
	     			<th width="50">Divisi</th>
	     			<th width="20">Kedisiplinan</th>
	     			<th width="20">Kerjasama Tim</th>
	     			<th width="20">Sikap</th>
	     			<th width="20">Presensi</th>
	     			<th width="20">Skill</th>
	     			<th width="20">Produktivitas</th>
	     			
	     			<th width="20">Action</th>
		        </tr>
    		</thead>
    		<tbody>
	
	<?php
	    $i=1;
	    while($data = mysql_fetch_array($result)){
		
		($data2 = mysql_fetch_array($result2))
	?>    
        		<tr>
 	 			<td><?php echo $i; ?></td>
 	 			<td><?php echo $data['nip'] ?></td>
 	 			<td><?php echo $data['nama_pegawai'] ?></td>
 	 			<td><?php echo $data['nama_divisi'] ?></td>
                <td><?php echo $data2['kriteria1'] ?></td>
                <td><?php echo $data2['kriteria2'] ?></td>
                <td><?php echo $data2['kriteria3'] ?></td>
                <td><?php echo $data2['kriteria4'] ?></td>
                <td><?php echo $data2['kriteria5'] ?></td>
                <td><?php echo $data2['kriteria6'] ?></td>
				
 	 			
<td><div align="center"><a href="index.php?mod=<?php echo $modname; ?>_edit&id=<?php echo $data['nip'] ?>"><span title="Edit" class="iconfa-edit" style="font-size:20px"></span></a></div></td></tr>
                        <?php
		   					$i++;
	        			}
	    				?>  
                        
                       
                    </tbody>
                </table>
                

                 <ul class="list-nostyle list-inline">
                	<li><a href="index.php?mod=proses" class="btn btn-primary">
				 <i class="iconfa-refresh"></i>&nbsp;PROSES</a></li>
                 
                </ul>
                
                <?php include "footer.php"; ?>
            
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>
