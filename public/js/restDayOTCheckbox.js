
  // Ordinary Working Day

  $("#selectAllRestDayOTCheckbox").on("change", function() {
  // Get the checked state of the "Select All" checkbox

  const selectAll = $(this).prop("checked");

  $(".restday-ot").prop("checked", selectAll);


  updateSelectedRestDayOtCount();

});

$(".restday-ot").on("change", function() {
  // Get the checked state of the "Select All" checkbox
  updateSelectedRestDayOtCount();
});



function updateSelectedRestDayOtCount() {
  const checkboxes = $(".restday-ot");
  let restOTCount = 0;

  checkboxes.each(function() {
    if ($(this).prop("checked")) {
      const restOtValue = parseFloat($("#restdayOT" + $(this).closest("tr").index()).text());
      restOTCount += restOtValue;
    }
  });

  $("#selectedCreditsRestDayOT").val(restOTCount.toFixed(2));
}
