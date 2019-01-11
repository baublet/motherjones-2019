<section class="contentBlock mt-lg">
<div class="desktop:flex flex-wrap">

<?php if (have_rows('products')): ?>
    <?php while (have_rows('products')): the_row(); ?>
        <div id='product-component-<?php the_sub_field('id'); ?>' class="w-full desktop:w-1/4 desktop:px-base"></div>
        <script type="text/javascript">
        /*<![CDATA[*/
        (function () {
            var scriptURL = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';
            if (window.ShopifyBuy) {
                if (window.ShopifyBuy.UI) {
                ShopifyBuyInit();
                } else {
                loadScript();
                }
            } else {
                loadScript();
            }

            function loadScript() {
                var script = document.createElement('script');
                script.async = true;
                script.src = scriptURL;
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
                script.onload = ShopifyBuyInit;
            }

            function ShopifyBuyInit() {
                var client = ShopifyBuy.buildClient({
                    domain: 'mother-jones-museum.myshopify.com',
                    storefrontAccessToken: 'e6f9ae963da421036f6d6cfc1e935cdd',
                });

                ShopifyBuy.UI.onReady(client).then(function (ui) {
                    ui.createComponent('product', {
                        id: [<?php the_sub_field('id'); ?>],
                        node: document.getElementById('product-component-<?php the_sub_field('id'); ?>'),
                        moneyFormat: '%24%7B%7Bamount%7D%7D',
                        options: {
                            "product": {
                                "variantId": "all",
                                "width": "100%",
                                "text": {
                                    "button": "Add to Cart"
                                },
                                "contents": {
                                    "imgWithCarousel": false,
                                    "variantTitle": false,
                                    "description": false,
                                    "buttonWithQuantity": false,
                                    "quantity": false
                                },
                                "styles": {
                                    "product": {
                                        "font-family": "Roboto, system-ui, BlinkMacSystemFont, -apple-system, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Fira Sans, Droid Sans, Helvetica Neue, sans-serif",
                                        // "@media (min-width: 601px)": {
                                        //     "max-width": "calc(25% - 20px)",
                                        //     "margin-left": "20px",
                                        //     "margin-bottom": "50px"
                                        // }
                                    },
                                    "button": {
                                        "background-color": "rgb(98, 111, 162)",
                                        ":hover": {
                                            "background-color": "rgb(25, 25, 25)",
                                        },
                                        ":focus": {
                                            "background-color": "rgb(25, 25, 25)",
                                        }
                                    }
                                }
                            },
                            "cart": {
                                "contents": {
                                    "button": true
                                },
                                // "styles": {
                                //     "footer": {
                                //         "background-color": "#ffffff"
                                //     }
                                // }
                            },
                            "modalProduct": {
                                "contents": {
                                    "img": false,
                                    "imgWithCarousel": true,
                                    "variantTitle": false,
                                    "buttonWithQuantity": true,
                                    "button": false,
                                    "quantity": false
                                },
                                // "styles": {
                                //     "product": {
                                //         "@media (min-width: 601px)": {
                                //             "max-width": "100%",
                                //             "margin-left": "0px",
                                //             "margin-bottom": "0px"
                                //         }
                                //     }
                                // }
                            },
                            "productSet": {
                                // "styles": {
                                //     "products": {
                                //         "@media (min-width: 601px)": {
                                //             "margin-left": "-20px"
                                //         }
                                //     }
                                // }
                            }
                        }
                    });
                });
            }
        })();
        /*]]>*/
        </script>
    <?php endwhile; ?>
<?php endif; ?>

</div>
</section>