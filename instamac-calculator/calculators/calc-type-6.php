
		<div class="rw">

			<label class="cl50">
				Area <span>m&sup2;</span><br>
				<input type="number" id="area-type-6" value="0" onkeyup="calculateSlab();" onchange="calculateSlab();">
			</label>

			<label class="cl50">
				Slab Width <span>mm</span><br>
				<input type="number" id="slab-width-type-6" value="0" onkeyup="calculateSlab();" onchange="calculateSlab();">
			</label>

			<label class="cl50">
				Slab Length <span>mm</span><br>
				<input type="number" id="slab-length-type-6" value="0" onkeyup="calculateSlab();" onchange="calculateSlab();">
			</label>

			<label class="cl50">
				Joint Width <span>mm</span><br>
				<input type="number" id="joint-width-type-6" value="0" onkeyup="calculateSlab();" onchange="calculateSlab();">
			</label>

			<label class="cl50">
				Joint Depth <span>mm</span><br>
				<input type="number" id="joint-depth-type-6" value="0" onkeyup="calculateSlab();" onchange="calculateSlab();">
			</label>

		</div>

		<input type="hidden" id="product-unit-type" value="<?php echo $find_item->PerKG; ?>">
