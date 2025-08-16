// Get the table element
var table = document.getElementById("product-list");

// Get the search input element
var searchInput = document.getElementById("search-input");

// Add an event listener for the input change
searchInput.addEventListener("input", function() {
  // Get the input value
  var searchValue = searchInput.value.trim().toLowerCase();

  // Get all product title elements for comparison
  var productTitles = table.querySelectorAll(".car_name");

  // Loop through product titles to find matches
  productTitles.forEach(function(productTitle) {
    // Get the text content of the product title
    var titleText = productTitle.textContent.toLowerCase();

    // Get the parent element of the product title, which is the whole product item
    var productItem = productTitle.closest(".col-lg-4");

    // Check if the search value matches the product title
    if (titleText.includes(searchValue)) {
      // Show the product item
      productItem.style.display = "";
    } else {
      // Hide the product item
      productItem.style.display = "none";
    }
  });
});
