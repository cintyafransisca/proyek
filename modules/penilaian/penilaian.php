<?php	
if (isset($_POST['submitted'])){ 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }

				$nip=$_POST['nip'];
				$nama_pegawai=$_POST['nama_pegawai'];
				$nama_divisi=$_POST['nama_divisi'];
				$hasil=$_POST['hasil'];
				
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
	$data2 = mysql_fetch_array($result2);
	$sql3 = "SELECT * FROM kriteria";
	$result3 = mysql_query($sql3);
	$sql_join = "SELECT * FROM  pegawai pg, penilaian pn WHERE pn.nip=pg.nip group by pg.nama_pegawai , pg.nama_divisi order by pn.nip asc";
	$result_join = mysql_query($sql_join);
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
                        <input type="hidden" name="mod" value="penilaian"/>
                        
                        </div>
                        </form>
					
                
                <table id="dyntable" class="table table-bordered responsive">
                
					
                    <thead>
                        <tr> 
                    <th width="20">No</th>   
	     			<th width="20">NIP</th>
	     			<th width="50">Nama Pegawai</th>
	     			<th width="50">Divisi</th>
					 <?php 
					 $i=1;
					 while($data3 = mysql_fetch_array($result3)){
					 ?>
					
	     			<th width="20"><?php echo $data3['nama_kriteria'] ?></th>
					 <?php
		   					$i++;
	        			}
	    				?> 
	     			<th width="20">Action</th>
		        </tr>
    		</thead>
    		<tbody>
	
	<?php
	    $i=1;
	    while($data_join = mysql_fetch_array($result_join)){
	?>    
        		<tr>
 	 			<td><?php echo $i; ?></td>
 	 			<td><?php echo $data_join['nip'] ?></td>
 	 			<td><?php echo $data_join['nama_pegawai'] ?></td>
 	 			<td><?php echo $data_join['nama_divisi'] ?></td>
                <td><?php echo $data_join['kriteria1'] ?></td>
                <td><?php echo $data_join['kriteria2'] ?></td>
                <td><?php echo $data_join['kriteria3'] ?></td>
                <td><?php echo $data_join['kriteria4'] ?></td>
                <td><?php echo $data_join['kriteria5'] ?></td>
                <td><?php echo $data_join['kriteria6'] ?></td>
				
 	 			
<td><div align="center"><a href="index.php?mod=<?php echo $modname; ?>_edit&id=<?php echo $data_join['nip'] ?>"><span title="Edit" class="iconfa-edit" style="font-size:20px"></span></a>&nbsp;&nbsp;
<a href="index.php?mod=<?php echo $modname; ?>_delete&id=<?php echo $data_join['nip'] ?>"><span title="Delete" class="iconfa-trash" style="font-size:20px"></span></a>&nbsp;&nbsp;
</div></td></tr>
                        <?php
		   					$i++;
	        			}
	    				?>  
                        
                       
                    </tbody>
                </table>
                

                 <ul class="list-nostyle list-inline">
                	<li><a href="index.php?mod=penilaian_proses" class="btn btn-primary">
				 <i class="iconfa-refresh"></i>&nbsp;PROSES</a></li>
                 
                </ul>
                
                <?php include "footer.php"; ?>
            
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>
