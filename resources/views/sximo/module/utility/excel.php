<?php


		
	$content = $title;
	$content .= '<table border="1">';
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
	
	@header('Content-Type: application/ms-excel');
	@header('Content-Length: '.strlen($content));
	@header('Content-disposition: inline; filename="'.$title.' '.date("d/m/Y").'.xls"');
	
	echo $content;
	exit;
		
/*		

$content = $title;
$content .= '<table border="1">';
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
		if($f['download'] =='1')	$content .= '<td>'. $row[$f['field']] . '</td>';
	}
	$content .= '</tr>';
}
$content .= '</table>';

@header('Content-Type: application/ms-excel');
@header('Content-Length: '.strlen($content));
@header('Content-disposition: inline; filename="'.$title.' '.date("d/m/Y").'.xls"');

echo $content;
*/	
?>
