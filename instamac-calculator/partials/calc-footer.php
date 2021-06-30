
	</div>

	<footer>
<?php

	$count	=	1;

	foreach ( $find_unit as $unit ) :
	
?>
		<div class="rw">

			<div class="cl50">

				<?php if ( 1 === $count ) : ?><label>Amount:</label><?php endif; ?>

			</div>

			<div class="cl50">

				<div class="packsize-value type-<?php echo $find_item->CalcType; ?>" data-value="<?php echo $unit->PackSize; ?>">0</div> 
				<div class="packsize-description type-<?php echo $find_item->CalcType; ?>"><?php echo $unit->PackDescription; ?></div> 

			</div>

		</div>
<?php

		$count++;

	endforeach;

?>
	</footer>

</div>