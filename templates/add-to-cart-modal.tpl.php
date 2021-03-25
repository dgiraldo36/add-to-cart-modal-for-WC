<div id="atcw-modal" class="atcw-modal ModalOpen" onload="atcw_open_modal();">

  <!-- Modal content -->
  <div class="atcw-modal-content">
    <span class="atcw-close">&times;</span>
    <h5><?php echo sprintf( esc_html( 'Product "%s" was added to the cart', 'add-to-cart-modal' ), $product->get_name() ); ?></h5>
    <?php echo $body; ?>



    <?php echo sprintf( '<a href="%s" tabindex="1" class="">%s</a> or <a href="#" tabindex="1" class="atcw-close-link">%s</a>', esc_url( wc_get_cart_url() ), esc_html__( 'Go to cart', 'add-to-cart-modal' ), esc_html__( 'continue shopping', 'add-to-cart-modal' ) ); ?>
  </div>

</div>