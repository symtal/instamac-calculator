
		<div class="rw">

			<label class="cl50">
				Area <span>meters sq</span><br>
				<input type="number" id="area-type-1" value="0" onkeyup="calculateAreaDepth();" onchange="calculateAreaDepth();">
			</label>

			<label class="cl50">
				Depth <span>mm</span><br>
				<input type="number" id="depth-type-1" value="0" onkeyup="calculateAreaDepth();" onchange="calculateAreaDepth();">
			</label>

		</div>

		<input type="hidden" id="product-unit-type" value="<?php echo $find_item->PerKG; ?>">
