<?php 
function recursionSelect ($data,$selected = 0,$id_edit = '',$parent = 0,$str = '') {
	foreach ($data as $key => $value) {
        $locale = \App::getLocale();
		$id        = $value["id"];
		$name      = $value["name_".$locale];
		$parent_id = $value["parent"];
		if ($parent_id == $parent) {
			if ($id == $selected) {
				echo '<option value="'.$id.'" selected>'.$str.$name.'</option>';
			} else {
				echo '<option value="'.$id.'">'.$str.$name.'</option>';
			}
			unset($data[$key]);
			recursionSelect ($data,$selected,$id_edit,$id,$str . "---| ");
		}
	}	
}
function recursionTable ($data,$parent = 0,$str = '') {
	foreach ($data as $key => $value) {
		$locale = \App::getLocale();
		$id        = $value["id"];
		$name      = $value["name_".$locale];
		$status = $value["status"];
		$parent_id = $value["parent"];
		$position  = $value["position"];
		$time      = \Carbon\Carbon::createFromTimeStamp(strtotime($value["updated_at"]))->diffForHumans();
		if ($value->status == 'on') {
        	$status = '<span class="badge badge-success">Active</span>';
		} else {
            $status = '<span class="badge badge-secondary">Deactive</span>';
		}
		
		if ($parent_id == $parent) {
			echo'
			<tr>
				<td>'.$str.' <input name="position_cate" type="text" class="text-center" value="'.$position.'" style="width: 30px" data-id="'.$id.'"></td>
				<td>'.$str.' <a href="'.route('admin.category.edit',['id' => $id]).'" target="_blank">'.$name.'</a></td>
				<td>'.$time.'</td>
				<td>'.$status.'</td>
				<td><a href="'.route('admin.category.destroy',['id' => $id]) .'" class="accept_delete">'. __('form.table.delete') .'</a></td>
                <td><a href="'.route('admin.category.edit',['id' => $id]) .'">'.__('form.table.edit') .'</a></td>
			</tr>';
			unset($data[$key]);
			recursionTable ($data,$id,$str . "---| ");
		}
	}	
}

function recursionList ($data,$checked = array(),$parent = 0,$level = 0) {
	$locale = \App::getLocale();
	$child = array();
	foreach ($data as $key => $value) {
		if ($value["parent"] == $parent) {
			$child[] = $value;
			unset($data[$key]);
		}
	}
	if ($child) {
		echo '<ul style="padding-left:30px">';
		foreach ($child as $key => $value) {
			$id        = $value["id"];
			$name      = $value["name_".$locale];
			$parent_id = $value["parent"];
			if (!empty($checked) && in_array($id,$checked)) {
				$input = '<input class="category" type="checkbox" name="category[]" value="'.$id.'" checked /> '.$name;
			} else {
				$input = '<input class="category" type="checkbox" name="category[]" value="'.$id.'" /> '.$name;
			}
			
			echo '<li>'.$input;
			recursionList ($data,$checked,$id,++$level);
			echo '</li>';
		}
		echo '</ul>';
	}
}

?>