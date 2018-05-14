<?php if ( !(cleangallery_get_option('hide_footer_widgets')) ) { ?>
<div class='site-footer-cover-wrap'>
<div class='site-footer-cover'>
<footer id="colophon" class="site-footer"  itemscope="itemscope" itemtype="http://schema.org/WPFooter" role="contentinfo">

<div class='top-footer clearfix' id='top-footer'>
<?php dynamic_sidebar( 'top-footer' ); ?>
</div>

<div class='footer-columns clearfix'>

<div class='footercol-1'>
<div class='footer-column'>
<?php dynamic_sidebar( 'footer-1' ); ?>
</div>
</div>

<div class='footercol-2'>
<div class='footer-column'>
<?php dynamic_sidebar( 'footer-2' ); ?>
</div>
</div>

<div class='footercol-3'>
<div class='footer-column'>
<?php dynamic_sidebar( 'footer-3' ); ?>
</div>
</div>

<div class='footercol-4'>
<div class='footer-column'>
<?php dynamic_sidebar( 'footer-4' ); ?>
</div>
</div>

</div>

<div class='bottom-footer clearfix' id='bottom-footer'>
<?php dynamic_sidebar( 'bottom-footer' ); ?>
</div>

</footer><!-- #colophon -->
</div>
</div>
<?php } ?>

<div class='site-info-cover-wrap'>
<div class='site-info-cover'>
<div class='site-info'>
<?php if ( cleangallery_get_option('footer_text') ) : ?>
  <?php echo esc_html(cleangallery_get_option('footer_text')); ?><?php if ( !(cleangallery_get_option('hide_credit')) ) { ?> | <a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'clean-gallery' ), 'ThemesDNA.com' ); ?></a><?php } ?>
<?php else : ?>
  <?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'clean-gallery' ), esc_html(date_i18n(__('Y','clean-gallery'))) . ' ' . esc_html(get_bloginfo( 'name' )) ); ?><?php if ( !(cleangallery_get_option('hide_credit')) ) { ?> | <a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'clean-gallery' ), 'ThemesDNA.com' ); ?></a><?php } ?>
<?php endif; ?>
</div>
</div>
</div>

<a href='<?php echo esc_url( '#' ); ?>' id='back-to-top'><i class='fa fa-long-arrow-up'></i> <span>top</span></a>

<?php wp_footer(); ?>

</body>
</html>