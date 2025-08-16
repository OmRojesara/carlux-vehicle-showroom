// You can add more logic here
// Get the table element
var table = document.getElementById("vehicle-table");
// Get the search input element
var searchInput = document.getElementById("search-input");
// Add an event listener for the input change
searchInput.addEventListener("input", function() {
  // Get the input value
  var searchValue = searchInput.value.toLowerCase();
  // Loop through the table rows
  for (var i = 1; i < table.rows.length; i++) {
    // Get the vehicle name and brand cells
    var nameCell = table.rows[i].cells[1];
    var brandCell = table.rows[i].cells[2];
    // Get the text content
    var nameText = nameCell.textContent.toLowerCase();
    var brandText = brandCell.textContent.toLowerCase();
    // Check if the search value matches the name or brand
    if (nameText.includes(searchValue) || brandText.includes(searchValue)) {
      // Show the row
      table.rows[i].style.display = "";
    } else {
      // Hide the row
      table.rows[i].style.display = "none";
    }
  }
});
