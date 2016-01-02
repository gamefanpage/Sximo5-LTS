
    <table class="table table-striped  " id="{{ $pageModule }}Table">
        <thead>
			<tr>
				<th> No </th>
			
				
				<?php foreach ($tableGrid as $t) :
					if($t['view'] =='1'):
						echo '<th align="'.$t['align'].'">'.SiteHelpers::activeLang($t['label'],(isset($t['language'])? $t['language'] : array())).'</th>';
					endif;
				endforeach; ?>
			  </tr>
        </thead>
        <tbody>
				
           		<?php $i=0; foreach ($rowData as $row) : ?>
                <tr>
					<td width="50"> <?php echo ++$i;?>  </td>
											
					 <?php foreach ($tableGrid as $field) :
						 if($field['view'] =='1') : ?>
						 <td align="<?php echo $field['align'];?>">					 
							<?php 
							$conn = (isset($field['conn']) ? $field['conn'] : array() );
							echo AjaxHelpers::gridFormater($row->$field['field'], $row , $field['attribute'],$conn);?>							 
						 </td>
						 <?php endif;					 
						endforeach; 
					  ?>				 
                </tr>
				
            <?php endforeach;?>
              
        </tbody>
      
    </table>
