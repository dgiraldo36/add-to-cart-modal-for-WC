<div class="product-item">
    <div class="product-img">
        <?php echo $product_img; ?>
    </div>
    <div class="product-info">
        <div class="product-price">
            <?php esc_html_e( 'Price', 'add-to-cart-modal' ); ?>: <span class="product-price-amount"> $<?php echo esc_html( $product_price ); ?></span>
        </div>
        <div class="product-qty">
            <?php esc_html_e( 'Quantity' ); ?>: <?php echo esc_html( $qty ); ?>
        </div>
        <br>
    </div>
</div>