<!-- IMAGE PREVIEW -->
<script src="<?php echo base_url('assets/backend/'); ?>js/file-upload-preview.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/select2/js/select2.full.min.js"></script>

<!-- Tags-Input -->
<script src="<?php echo base_url('assets/backend/'); ?>js/tags-input.js"></script>

<!-- Tabular-Input -->
<script src="<?php echo base_url('assets/backend/'); ?>js/tabular-input.js"></script>

<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>

<script type="text/javascript">
    "use strict";

    // Custom script for init select2
    initSelect2();

    // FOR LOADING THE IMAGE IN ADD VIEW. I'VE DONE THIS FOR AVOIDING INLINE CSS
    initPreviewer(['food_menu_thumbnail_preview']);

    // For toggling menu price area with servings
    function toggleMenuPriceArea(elem) {
        if ($('#' + elem.id).is(":checked")) {
            $("#per_menu_price_area").hide();
            $("#per_plate_price_area").show();
        } else {
            $("#per_menu_price_area").show();
            $("#per_plate_price_area").hide();
        }
    }

    // For calculating discount percentage
    function calculateDiscountPercentage(servings) {
        var discounted_price = jQuery('#' + servings + "_discounted_price").val();
        if (discounted_price > 0) {
            var actualPrice = jQuery('#' + servings + "_price").val();
            if (actualPrice > 0) {
                var reducedPrice = actualPrice - discounted_price;
                var discountedPercentage = (reducedPrice / actualPrice) * 100;
                if (discountedPercentage > 0) {
                    jQuery('#' + servings + "_discounted_percentage").text(discountedPercentage.toFixed(2) + '%');

                } else {
                    jQuery('#' + servings + "_discounted_percentage").text('0%');
                }
            } else {
                jQuery('#' + servings + "_discounted_percentage").text('0%');
            }
        } else {
            jQuery('#' + servings + "_discounted_percentage").text('0%');
        }
    }


    function toggleHasVariant(elem, menuId) {
        var isCheked;
        if ($(elem).is(":checked")) {
            isCheked = 1;
        } else {
            isCheked = 0;
        }

        $.ajax({
            url: '<?php echo site_url('variation/toggle_menu_variant'); ?>',
            type: 'POST',
            data: {
                menu_id: menuId,
                has_variant: isCheked
            },
            success: function(response) {
                if (response) {
                    if (isCheked) {
                        toastr.success('<?php echo get_phrase('menu_variation_has_been_enabled'); ?>');
                        $("#variant-area").removeClass('d-none');
                    } else {
                        toastr.success('<?php echo get_phrase('menu_variation_has_been_disabled'); ?>');
                        $("#variant-area").addClass('d-none');
                    }
                } else {
                    toastr.warning('<?php echo get_phrase('an_error_occurred'); ?>');
                }
            }
        });
    }
</script>