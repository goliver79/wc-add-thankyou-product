<?php
	if ( !class_exists( 'GoAddThankYouProduct' ) ) {
		class GoAddThankYouProduct {
			function activate() {
				add_action( 'woocommerce_before_checkout_form', array( $this, 'go_add_thank_you_product' ), 10 );
			}

			function go_add_thank_you_product() {
				$free_product_id = 83193;
				if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
					$found = false;
					foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
						$_product = $values['data'];
						if ( $_product->get_id() == $free_product_id )
							$found = true;

					}
					// if product not found, add it
					if ( ! $found )
						WC()->cart->add_to_cart( $free_product_id );
				}
			}
		}

		$go_thankyou_product = new GoAddThankYouProduct();
		$go_thankyou_product->activate();
	}
