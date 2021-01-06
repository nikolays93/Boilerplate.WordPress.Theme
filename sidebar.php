<?php
/**
 * Второстепенный столбец
 *
 * Вызывается командой get_sidebar()
 * Как правило, он используется для добавления бокового столбца
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _rus
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
