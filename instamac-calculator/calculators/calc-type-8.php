
		<div class="rw">

			<label class="cl50">
				Area <span>meters sq.</span><br>
				<input type="number" id="area-type-8" value="0" onkeyup="calculateTile();" onchange="calculateTile();">
			</label>

			<label class="cl50">
				Tile Width <span>mm</span><br>
				<input type="number" id="tile-width-type-8" value="0" onkeyup="calculateTile();" onchange="calculateTile();">
			</label>

			<label class="cl50">
				Tile Length <span>mm</span><br>
				<input type="number" id="tile-length-type-8" value="0" onkeyup="calculateTile();" onchange="calculateTile();">
			</label>

			<label class="cl50">
				Joint Width <span>mm</span><br>
				<input type="number" id="joint-width-type-8" value="0" onkeyup="calculateTile();" onchange="calculateTile();">
			</label>

			<label class="cl50">
				Joint Depth <span>mm</span><br>
				<input type="number" id="joint-depth-type-8" value="0" onkeyup="calculateTile();" onchange="calculateTile();">
			</label>

		</div>

		<input type="hidden" id="product-unit-type" value="<?php echo $find_item->PerKG; ?>">
