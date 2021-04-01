jQuery(function ($) {
  if (typeof atcw_wc_modal === "undefined") {
    return false;
  }

  $(document.body).on(
    "added_to_cart",
    function (e, fragments, cart_hash, $button) {
      var container = $($button).parents("li.product");
      var product_title = container.find(".woocommerce-loop-product__title").html();
      var product_img = container.find(".attachment-woocommerce_thumbnail.size-woocommerce_thumbnail");
      var product_price = container.find(".price").html();

      $(atcw_wc_modal).find("h5 .product-title").html(product_title);
      $(atcw_wc_modal).find(".product-item .product-img").html(product_img[0].outerHTML);
      $(atcw_wc_modal).find(".product-item .product-info .product-price-amount").html(product_price);

      atcw_open_modal();
    }
  );
});
