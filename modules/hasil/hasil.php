<?php	
$cari=$_GET['cari'];
		if(isset($cari)){
		$ket="where nama_pegawai like '%" . $cari. "%'";
	} else {
		$ket="";
	}
    
	$sql_join = "SELECT * FROM  pegawai pg, hasil_akhir ha WHERE ha.nip=pg.nip group by pg.nama_pegawai order by hasil desc";
	$result_join = mysql_query($sql_join);
	$sql = "SELECT max(hasil) as max FROM  hasil_akhir";
	$result = mysql_query($sql);
	$data = mysql_fetch_array($result);
	$modname="hasil";		
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
                <h5>Hasil Akhir</h5>
                <h1>Pegawai Terbaik</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
            <div class="maincontentinner">
			<ul class="list-nostyle list-inline">
                	<li><a href="index.php?mod=<?php echo $modname; ?>_print" target="_blank" class="btn btn-primary">
                    <i class="iconfa-print"></i>&nbsp;Print Hasil</a></li>
                    
                </ul>
                </ul>
					
                
                <table id="dyntable" class="table table-bordered responsive">
                
					
                    <thead>
                        <tr> 
                    <th width="20">No</th>   
	     			<th width="20">NIP</th>
	     			<th width="50">Nama Pegawai</th>
	     			<th width="50">Nilai S</th>
	     			<th width="50">Hasil</th>
	     			<th width="50">Persentase Hasil</th>
	     			<th width="50">Keterangan</th>
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
 	 			<td><?php echo $data_join['nilai_s'] ?></td>
 	 			<td><?php echo $data_join['hasil'] ?></td>
 	 			<td><?php echo $data_join['hasil']*100 ?> %</td>
				<td>
				<?php
				if $data_join['hasil']=$max
				?>
				</td>
				</tr>
                        <?php
		   					$i++;
	        			}
	    				?>  
                       
                       
                    </tbody>
                </table>
                
                <?php include "footer.php"; ?>
            
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>