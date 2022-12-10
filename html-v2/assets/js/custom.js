(function ($) {
	"use strict";

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
})(jQuery);
