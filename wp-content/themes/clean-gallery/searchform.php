<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'clean-gallery' ) ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search&#8230;', 'placeholder', 'clean-gallery' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'clean-gallery' ) ?>" />
    </label>
    <input type="submit" class="search-submit" value="&#xf002;" />
</form>