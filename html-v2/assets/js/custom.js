(function ($) {
	"use strict";

	// ----- Show/Hide personalized characters feature on product details page
	$("#personalize_item_choice").on("change", () => {
		const choice = $("#personalize_item_choice").val();

		switch (choice) {
			case "no":
				$("#personalize_item_characters").find("input").val("");
				$("#personalize_item_characters").hide();
				break;
			case "yes_4_or_less":
				$("#personalize_item_characters").show();
				$("#characters_input_label").text("Enter 4 or less characters");
				$("#personalize_item_characters").find("input").attr("maxlength", 4);

				if ($("#personalize_item_characters").find("input").val()) {
					const first_4_characters = $("#personalize_item_characters").find("input").val().substring(0, 4);
					$("#personalize_item_characters").find("input").val(first_4_characters);
				}

				break;
			case "yes_5_or_more":
				$("#personalize_item_characters").show();
				$("#characters_input_label").text("Enter 5 or more characters");
				$("#personalize_item_characters").find("input").removeAttr("maxlength");
				break;
			default:
				break;
		}
	});

	//---Add size guide on product details page
	const sizeGuideImage = `http://${location.hostname}/wp-content/themes/amicrafts/html-v2/assets/images/product/size-guide.png`;
	const sizeGuideHtml = `<br> <a class="text-muted small" href="#" data-bs-toggle="modal" data-bs-target="#sizeGuideModal">Size Guide</a>`;
	const sizeGuideModal = `
	<br>
	<div class="modal fade" id="sizeGuideModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header border-0 p-0">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						<i class="ion-android-close text-white"></i>
					</button>
				</div>
				<div class="modal-body">
					<img src="${sizeGuideImage}" alt="size guide"/>
				</div>
			</div>
		</div>
	</div>
	`;

	const sizeVariationExists = $("table.varations") > $('label:contains("Size")').append(sizeGuideHtml).append(sizeGuideModal);
})(jQuery);
