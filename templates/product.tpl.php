<div class="product-item">
    <div class="product-img">
        <?php echo $product_img; ?>
    </div>
    <div class="product-info">
        <div>
            <?php esc_html_e( 'Price', 'add-to-cart-modal' ); ?>: $ <?php echo esc_html( $product_price ); ?>
        </div>
        <div>
            <?php esc_html_e( 'Quantity' ); ?>: <?php echo esc_html( $qty ); ?>
        </div>
        <br>
    </div>
</div>