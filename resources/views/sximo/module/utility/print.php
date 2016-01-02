<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title ;?></title>
    <style type="text/css">
		body { font-family:Arial, Helvetica, sans-serif; font-size:11px;}
            h1{
            font-size: 22px;
        }
        table{
            border-spacing: 0;
            margin: 0;
            border-collapse: collapse;
            min-width:100%;
            table-layout:fixed;
            font-size: 12px;
            line-height: 1.5;
            border: 1px solid #eee;
        }
        table td,table th{
            border: 1px solid #eee;
            padding: 2px;
        }
        table th{
            background: #f5f5f5;
        }
    </style>
</head>

<body onload="window.print()">
<h1> <?php echo $title;?></h1>
<?php	
	$content = '' ;
	$content .= '<table class="table table-striped">';
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
//	exit;
		

?>

</body>
</html>



