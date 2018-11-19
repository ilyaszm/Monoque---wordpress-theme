
<h1>Monoque Theme Options</h1>
<?php settings_errors( ); ?>

<?php
    $firstname = esc_attr(get_option( 'first_name' ));
    $lastname = esc_attr(get_option( 'last_name' ));
    $fullname = $firstname . ' ' . $lastname;
    $description = esc_attr(get_option( 'user_description' ));
?>

<div class="monoque-sidebar-preview">
    <div class="monoque-sidebar">
        <h1 class="monoque-username"><?php print $fullname;?></h1>
        <h2 class="monoque-description"><?php print $description;?></h2>
        <div class="icons-wrapper">
        </div>
    </div>
</div>

<form method="post" action="options.php" class="monoque-general-form">
    <?php settings_fields( 'monoque-settings-group' ); ?>
    <?php do_settings_sections( 'sg_monoque' ); ?>
    <?php submit_button(  ); ?>
</form>

