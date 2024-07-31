
  // Ordinary Working Day

  $("#selectAllSpecialOTCheckbox").on("change", function() {
  // Get the checked state of the "Select All" checkbox

  const selectAll = $(this).prop("checked");

  $(".special-ot").prop("checked", selectAll);


  updateSelectedSpecialOtCount();

});

$(".special-ot").on("change", function() {
  // Get the checked state of the "Select All" checkbox
  updateSelectedSpecialOtCount();
});



function updateSelectedSpecialOtCount() {
  const checkboxes = $(".special-ot");
  let specialOTCount = 0;

  checkboxes.each(function() {
    if ($(this).prop("checked")) {
      const specialOtValue = parseFloat($("#specialdayOT" + $(this).closest("tr").index()).text());
      specialOTCount += specialOtValue;
    }
  });

  $("#selectedCreditsSpecialDayOT").val(specialOTCount.toFixed(2));
}
