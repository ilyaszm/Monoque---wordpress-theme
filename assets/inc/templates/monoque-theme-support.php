
<h1>Monoque Theme Support</h1>
<?php settings_errors( ); ?>

<?php
    //$picture = esc_attr( get_option( 'profile_picture' ));
?>

<form method="post" action="options.php" class="monoque-general-form">
    <?php settings_fields( 'monoque-theme-support' ); ?>
    <?php do_settings_sections( 'sg_monoque_theme' ); ?>
    <?php submit_button(  ); ?>
</form>

