<?php
$menu_id = $param2;
$menu_variant_id = $param3;
$menu_variant = $this->variation_model->get_variant_by_id($menu_variant_id);
$exploded_current_menu_variants = explode(',', $menu_variant['variant']);
?>
<form action="<?php echo site_url('variation/variant/edit'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="menu_id" value="<?php echo sanitize($param2); ?>">
    <input type="hidden" name="menu_variant_id" value="<?php echo sanitize($menu_variant_id); ?>">
    <div class="form-group">
        <label for="variant_price"><?php echo get_phrase("variant_price"); ?><span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="variant_price" name="variant_price" placeholder="<?php echo get_phrase('enter_variant_price'); ?>" step=".01" value="<?php echo sanitize($menu_variant['price']); ?>">
    </div>
    <?php $menu_options = $this->variation_model->get_options(sanitize($param2)); ?>
    <?php if (is_array($menu_options) && count($menu_options) > 0) : ?>
        <?php foreach ($menu_options as $key => $menu_option) : ?>
            <div class="form-group">
                <label for="menu_variation_options">
                    <?php echo get_phrase(sanitize($menu_option['name'])); ?><span class="text-danger">*</span>
                </label>
                <select class="custom-select" id="menu_variation_options" name="menu_variation_options[]">
                    <?php
                    $exploded_variant_options = explode(',', $menu_option['options']);
                    foreach ($exploded_variant_options as $exploded_variant_option) : ?>
                        <option value="<?php echo sanitize($menu_option['id']); ?>-<?php echo sanitize($exploded_variant_option); ?>" <?php if (in_array(sanitize($menu_option['id']) . '-' . sanitize($exploded_variant_option), $exploded_current_menu_variants)) echo "selected"; ?>><?php echo ucfirst(sanitize($exploded_variant_option)); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary mt-4"><?php echo get_phrase('update_variant'); ?></button>
</form>