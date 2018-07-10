<?php
function tableGenerator($tableConf, $dataTable, $pk, $url){
	echo "
			<div class='table-responsive'>
			<table class='table table-hover'>
			<thead>
				<tr>
					<th>No</th>";
					foreach($tableConf as $t){
						echo "<th>".$t['label']."</th>";
					}
	echo "
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>";
			$no = 1;
			if(count($dataTable) == 0){
				echo "<tr><td colspan=".(count($tableConf)+2).">Data Kosong</td></tr>";
			}else{
				foreach($dataTable as $r){
					echo "
						<tr>
							<td>".$no."</td>";
					foreach($tableConf as $t){
						echo "<td>".$r[$t['name']]."</td>";
					}
                    echo "<td>";
                    if($url['hapus'] != null) echo "<a class='btn btn-danger' href='".$url['hapus'].".php?".$pk."=".$r[$pk]."'>Hapus</a> ";
                    if($url['edit'] != null) echo "<a class='btn btn-info' href='".$url['edit'].".php?".$pk."=".$r[$pk]."'>Edit</a>";
					echo "</td></tr>";
					$no++;
				}
			}
	echo "
			</tbody>	
		</table></div>";
		}
function formGenerator($fields){
	$value = "";
	$disabled = "";
	$readonly = "";
	foreach($fields as $f){
		if(!array_key_exists('value', $f)) $value = null;
		else $value = $f['value'];
		
		if(isset($f['disabled'])) $disabled = 'disabled';
		else $disabled = null;
		if(isset($f['readonly'])) $disabled = 'readonly';
		else $readonly = null;
		
		if($f['name'] == 'input_group'){	
			echo "<div class='row'>";
				foreach($f['list'] as $l){
					if(isset($l['value'])) $value = $l['value'];
					else $value = null;
					
					if(isset($l['disabled'])) $disabled = 'disabled';
					else $disabled = null;
					if(isset($l['readonly'])) $disabled = 'readonly';
					else $readonly = null;
					echo "<div class='col-sm-".$l['col']."'>";
						switch($l['type']){
							case "input" : 
								echo '
									<div class="form-group">
					                    <label for="'.$l['name'].'">'.$l['label'].'</label>
					                    <input id="'.$l['name'].'" name="'.$l['name'].'" type="'.$l['inputType'].'" class="form-control" value="'.$value.'" '.$disabled.' '.$readonly.' required />
									</div>
								';
								break;
							case "textarea": 
								echo '
									<div class="form-group">
					                    <label for="'.$l['name'].'">'.$l['label'].'</label>
					                    <textarea id="'.$l['name'].'" name="'.$l['name'].'" class="form-control" value="'.$value.'" '.$disabled.' '.$readonly.'  required >'.$value.'</textarea>
									</div>
								';
								break;
							case "select" : 
								echo '
									<div class="form-group">
										<label for="'.$l['name'].'">'.$l['label'].'</label>
										<select id="'.$l['name'].'" name="'.$l['name'].'" class="form-control" value="'.$value.'" '.$disabled.' '.$readonly.'  required >';
									foreach($l['options'] as $d){
										echo '<option value="'.$d[$l['optionValue']].'" '.$disabled.' '.$readonly.'>'.$d[$l['optionLabel']].'</option>';
									}	
								echo '</select>
									 </div>
								';
								break;
						}
					echo "</div>";
				}
			echo "</div>";
		}else{
			switch($f['type']){
				case "input" : 
					echo '
						<div class="form-group">
		                    <label for="'.$f['name'].'">'.$f['label'].'</label>
		                    <input id="'.$f['name'].'" name="'.$f['name'].'" type="'.$f['inputType'].'" class="form-control" value="'.$value.'" '.$disabled.' '.$readonly.'  required >
						</div>
					';
					break;
				case "textarea": 
					echo '
						<div class="form-group">
		                    <label for="'.$f['name'].'">'.$f['label'].'</label>
		                    <textarea id="'.$f['name'].'" name="'.$f['name'].'" class="form-control" value="'.$value.'" '.$disabled.' '.$readonly.'>'.$value.'</textarea>
						</div>
					';
					break;
				case "select" : 
					echo '
						<div class="form-group">
							<label for="'.$f['name'].'">'.$f['label'].'</label>
							<select id="'.$f['name'].'" name="'.$f['name'].'" class="form-control" value="'.$value.'" '.$disabled.' '.$readonly.'  required >';
						foreach($f['options'] as $d){
							if($d[$f['optionValue']] == $f['value']){
								echo '<option value="'.$d[$f['optionValue']].'" '.$disabled.' '.$readonly.' selected>'.$d[$f['optionLabel']].'</option>';
							}else echo '<option value="'.$d[$f['optionValue']].'" '.$disabled.' '.$readonly.'>'.$d[$f['optionLabel']].'</option>';
						}	
					echo '</select>
						 </div>
					';
					break;
			}
		}
	}
}
function alert($pesan, $jenis = 'success'){
	return '<div role="alert" class="alert alert-'.$jenis.'">'.$pesan.'</div>';
}
function rupiah($x){
        return "Rp ".number_format($x,2,',','.');
}
?>
