$(document).ready(function() {
	$("#add-input").click(function(e) {
		e.preventDefault();
		$("#array-inputs").append('<input type="text" name="array[]" required>');
	});

	$("#search-btn").click(function(e) {
		e.preventDefault();
		var array = $("input[name='array[]']")
						.map(function(){return $(this).val();}).get();
		var search = $("input[name='search']").val();
		var index = $.inArray(search, array);

        if (index == -1) {
			$("#result").html("Element not found in the array.");
			$("#sorted-array").html("");
		} else {
			$("#result").html("Element found at index " + index + "");
			var sortedArray = array.slice().sort();
			var html = '<label>Sorted Array	</label><div class="sorted-items">';

			for (var i = 0; i < sortedArray.length; i++) {
				html += '<div class="sorted-item">' + sortedArray[i] + '</div>';
			}

			html += '</div>';
			$("#sorted-array").html(html);
		}
	});
});

