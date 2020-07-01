function createChildrenSelectBox(element) {
	//remove children created select boxes
	$(element).nextAll('.select-box').remove();

	if (!element.value) return;
	let parentID = parseInt(element.value);

	$.get(base_url + "/categories/getCategoriesByParentID/" + parentID, function (data, status) {
		if (!data.childrenCategories.length) return;

		let htmlContent = "<select class='select-box' name='child-of-"+parentID+"' onchange='createChildrenSelectBox(this)' > " +
			"<option>Select...</ooption>";
		$.each(data.childrenCategories, function (index, cat) {
			htmlContent += "<option value='" + cat.id + "'>" + cat.title + "</option>";
		});
		htmlContent += "</select>";

		$('#body').append(htmlContent);
	});
}
