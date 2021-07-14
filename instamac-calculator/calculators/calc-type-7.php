
		<div class="rw">

			<label class="cl50">
				Linear Metres <span>meters</span><br>
				<input type="number" id="metre-type-7" value="0" onkeyup="calculateLinearJoint();" onchange="calculateLinearJoint();">
			</label>

			<label class="cl50">
				Joint width <span>mm</span><br>
				<input type="number" id="joint-width-type-7" value="0" onkeyup="calculateLinearJoint();" onchange="calculateLinearJoint();">
			</label>

			<label class="cl50">
				Joint depth <span>mm</span><br>
				<input type="number" id="joint-depth-type-7" value="0" onkeyup="calculateLinearJoint();" onchange="calculateLinearJoint();">
			</label>

		</div>

		<input type="hidden" id="product-unit-type" value="<?php echo $find_item->PerKG; ?>">
