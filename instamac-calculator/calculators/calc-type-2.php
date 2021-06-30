
		<div class="rw">

			<label class="cl50">
				Frame width <span>mm</span><br>
				<input type="number" id="frame-width-type-2" value="0" onkeyup="calculateFrame();" onchange="calculateFrame();">
			</label>

			<label class="cl50">
				Frame length <span>mm</span><br>
				<input type="number" id="frame-length-type-2" value="0" onkeyup="calculateFrame();" onchange="calculateFrame();">
			</label>

			<label class="cl50">
				Flange width <span>mm</span><br>
				<input type="number" id="flange-width-type-2" value="0" onkeyup="calculateFrame();" onchange="calculateFrame();">
			</label>

			<label class="cl50">
				Mortar depth <span>mm</span><br>
				<input type="number" id="mortar-depth-type-2" value="0" onkeyup="calculateFrame();" onchange="calculateFrame();">
			</label>

		</div>

		<input type="hidden" id="product-unit-type" value="<?php echo $find_item->PerKG; ?>">
