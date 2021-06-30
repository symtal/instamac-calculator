/*
Contents:		TYPE 1 - CALCULATE AREA DEPTH
				TYPE 2 - CALCULATE FRAME
				TYPE 3 - CALCULATE LINEAR METRE
				TYPE 5 - CALCULATE AREA
				TYPE 6 - CALCULATE SLAB
				TYPE 7 - CALCULATE LINEAR JOINT
				TYPE 8 - CALCULATE TILE
*/

// CALCULATE AREA DEPTH
function calculateAreaDepth() {

	jQuery('.type-1').each(function() {
			
		var unit = parseFloat(jQuery('#product-unit-type').val());
		var area = parseFloat(jQuery('#area-type-1').val());
		var depth = parseFloat(jQuery('#depth-type-1').val());
		var boxSize = parseFloat(jQuery(this).attr('data-value'));
			
		var physicalArea = area * (depth / 1000);
		var kiloMaterialRequired = physicalArea / unit;       
		var result = kiloMaterialRequired / boxSize;
		
		if(!isNaN(result))
			jQuery(this).html(Math.ceil(result));
		
	});
	
}

// CALCULATE FRAME
function calculateFrame() {

	jQuery('.type-2').each(function() { 
			
		var unit = parseFloat(jQuery('#product-unit-type').val());
		
		var frameWidth = parseFloat(jQuery('#frame-width-type-2').val());
		var frameLength = parseFloat(jQuery('#frame-length-type-2').val());
		var flangeWidth = parseFloat(jQuery('#flange-width-type-2').val());
		var mortarDepth = parseFloat(jQuery('#mortar-depth-type-2').val());
		
		var boxSize = parseFloat(jQuery(this).attr('data-value'));
		
		var area = (2 * (frameWidth * flangeWidth)) + (2 * ((frameLength - flangeWidth - flangeWidth) * flangeWidth));
		var volume = ((area / 1000000) * (mortarDepth / 1000)) * 4.5;
		
		var kilosReq = volume / unit;
		var result = kilosReq / boxSize;
				 
		if(!isNaN(result))
			jQuery(this).html(Math.ceil(result));
	});
	
}

// CALCULATE LINEAR METRE
function calculateLinearMetre() {
	
	jQuery('.type-3').each(function() {
			
		var unit = parseFloat(jQuery('#product-unit-type').val());
		var metreLength = parseFloat(jQuery('#metres-type-3').val());
		var boxSize = parseFloat(jQuery(this).attr('data-value'));
		var result = (metreLength / unit) / boxSize;

		if(!isNaN(result))
			jQuery(this).html(Math.ceil(result));
	});

}

// CALCULATE AREA
function calculateArea() {

	jQuery('.type-5').each(function() {
			
		var unit = parseFloat(jQuery('#product-unit-type').val());
		var metreLength = parseFloat(jQuery('#metres-type-5').val());
		var boxSize = parseFloat(jQuery(this).attr('data-value'));
		var result = (metreLength / unit) / boxSize;
		
		if(!isNaN(result))
			jQuery(this).html(Math.ceil(result));
	});

}

// CALCULATE SLAB
function calculateSlab() {

	jQuery('.type-6').each(function() { 
		
		var unit = parseFloat(jQuery('#product-unit-type').val());
		
		var area = parseFloat(jQuery('#area-type-6').val());
		var slabWidth = parseFloat(jQuery('#slab-width-type-6').val());
		var slabLength = parseFloat(jQuery('#slab-length-type-6').val());
		var jointWidth = parseFloat(jQuery('#joint-width-type-6').val());
		var jointDepth = parseFloat(jQuery('#joint-depth-type-6').val());
		
		var boxSize = parseFloat(jQuery(this).attr('data-value'));
		
		var slabArea = ((slabWidth + jointWidth) / 1000) * ((slabLength + jointWidth) / 1000);
		var slabsRequired = area / slabArea;
		var jointVolume = ((slabWidth + slabLength) / 1000) * ((jointWidth * jointDepth) / 1000) * slabsRequired;
		
		var kilosReq = jointVolume / unit;
		
		var result = kilosReq / boxSize;
		
		if(!isNaN(result))
			jQuery(this).html(Math.ceil(result));
	});
	
}

// CALCULATE LINEAR JOINT
function calculateLinearJoint() {

	jQuery('.type-7').each(function() { 
		
		var unit = parseFloat(jQuery('#product-unit-type').val());
		
		var metres = parseFloat(jQuery('#metre-type-7').val());
		var jointWidth = parseFloat(jQuery('#joint-width-type-7').val());
		var jointDepth = parseFloat(jQuery('#joint-depth-type-7').val());
		   
		var boxSize = parseFloat(jQuery(this).attr('data-value'));
		
		var kilosReq = (((jointWidth * jointDepth) / 1000) * metres) / unit;
		var result = kilosReq / boxSize;
		
		if(!isNaN(result))
			jQuery(this).html(Math.ceil(result));
	});
	
}

// CALCULATE TILE
function calculateTile() {

	jQuery('.type-8').each(function() { 
		
		var unit = parseFloat(jQuery('#product-unit-type').val());
		
		var area = parseFloat(jQuery('#area-type-8').val());
		var tileWidth = parseFloat(jQuery('#tile-width-type-8').val());
		var tileLength = parseFloat(jQuery('#tile-length-type-8').val());
		var jointWidth = parseFloat(jQuery('#joint-width-type-8').val());
		var jointDepth = parseFloat(jQuery('#joint-depth-type-8').val());
		
		var boxSize = parseFloat(jQuery(this).attr('data-value'));
		
		var tileDimensions = tileWidth + tileLength;
		var jointDimensions = jointWidth * jointDepth;
		var tileArea = tileLength * tileWidth;

		var kilosReq = (((tileDimensions * jointDimensions) * unit) / tileArea) * area;
		var result = kilosReq / boxSize;
		
		if(!isNaN(result))
			jQuery(this).html(Math.ceil(result));
	});
	
}