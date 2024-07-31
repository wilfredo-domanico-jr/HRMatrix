
  // Ordinary Working Day

  $("#selectAllRegOTCheckbox").on("change", function() {
  // Get the checked state of the "Select All" checkbox

  const selectAll = $(this).prop("checked");

  $(".regular-ot").prop("checked", selectAll);


  updateSelectedRegularOtCount();

});

$(".regular-ot").on("change", function() {
  // Get the checked state of the "Select All" checkbox
  updateSelectedRegularOtCount();
});



function updateSelectedRegularOtCount() {
  const checkboxes = $(".regular-ot");
  let regOTCount = 0;

  checkboxes.each(function() {
    if ($(this).prop("checked")) {
      const otValue = parseFloat($("#regularOT" + $(this).closest("tr").index()).text());
      regOTCount += otValue;
    }
  });

  $("#selectedCreditsRegOT").val(regOTCount.toFixed(2));
}
