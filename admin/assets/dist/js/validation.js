function validation() {
      var Brand = document.forms["form_validation"]["brand"];
      var Product = document.forms["form_validation"]["product"];
      var Price = document.forms["form_validation"]["price"];
      var Image = document.forms["form_validation"]["image"];

      if (Brand.value == "") {
            document.getElementById("brand_alert").innerHTML = "Select Brand Name";
            Brand.focus();
            return false;
      }
      if (Product.value == "") {
            document.getElementById("product_alert").innerHTML = "Enter Product name";
            Brand.focus();
            return false;
      }
      if (Price.value == "") {
            document.getElementById("price_alert").innerHTML = "Enter Price Value";
            Brand.focus();
            return false;
      }
      if (Image.value == "") {
            document.getElementById("image_alert").innerHTML = "Chose Image";
            Brand.focus();
            return false;
      }
}