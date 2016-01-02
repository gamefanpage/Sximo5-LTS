<div style="width:760px !important; ;">
<?php
		
	$content = $title;
	$content .= '<table  class="table">';
	$content .= '<tr>';
	foreach($fields as $f )
	{
		if($f['download'] =='1') $content .= '<th style="background:#f9f9f9;">'. $f['label'] . '</th>';
	}
	$content .= '</tr>';
	
	foreach ($rows as $row)
	{
		$content .= '<tr>';
		foreach($fields as $f )
		{
			if($f['download'] =='1'):
				$conn = (isset($f['conn']) ? $f['conn'] : array() );					
				$content .= '<td> '. AjaxHelpers::gridFormater($row->$f['field'],$row,$f['attribute'],$conn) . '</td>';
			endif;	
		}
		$content .= '</tr>';
	}
	$content .= '</table>';
	echo $content;
?>
</div>
<style>
.table {  border: 1px solid #EBEBEB; width: 90%;}
.table   tr  th { font-size: 11px; }
.table   tr  td {
  border-top: 1px solid #e7eaec;
  line-height: 1.42857;
 
  font-size:11px;
 	
  vertical-align: top; 
}
	
</style>