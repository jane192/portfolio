<?php
/**
 * Template part for top social bar.
 *
 * @package Clean Gallery
 */
?>

<div class='cgal-social-navigation-outer'>
<div class='cgal-social-navigation-inner'>
<nav>

<ul class='cgal-social-navigation-menu'>
<?php if ( cleangallery_get_option('twitterlink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('twitterlink') ); ?>" target="_blank" rel="nofollow" class="social-twitter" title="<?php esc_attr_e('Twitter','clean-gallery'); ?>"><i class="fa fa-twitter"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('facebooklink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('facebooklink') ); ?>" target="_blank" rel="nofollow" class="social-facebook"><i class="fa fa-facebook" title="<?php esc_attr_e('Facebook','clean-gallery'); ?>"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('googlelink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('googlelink') ); ?>" target="_blank" rel="nofollow" class="social-googleplus" title="<?php esc_attr_e('Google Plus','clean-gallery'); ?>"><i class="fa fa-google-plus"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('pinterestlink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('pinterestlink') ); ?>" target="_blank" rel="nofollow" class="social-pinterest" title="<?php esc_attr_e('Pinterest','clean-gallery'); ?>"><i class="fa fa-pinterest"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('linkedinlink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('linkedinlink') ); ?>" target="_blank" rel="nofollow" class="social-linkedin" title="<?php esc_attr_e('Linkedin','clean-gallery'); ?>"><i class="fa fa-linkedin"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('instagramlink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('instagramlink') ); ?>" target="_blank" rel="nofollow" class="social-instagram" title="<?php esc_attr_e('Instagram','clean-gallery'); ?>"><i class="fa fa-instagram"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('flickrlink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('flickrlink') ); ?>" target="_blank" rel="nofollow" class="social-flickr" title="<?php esc_attr_e('Flickr','clean-gallery'); ?>"><i class="fa fa-flickr"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('youtubelink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('youtubelink') ); ?>" target="_blank" rel="nofollow" class="social-youtube" title="<?php esc_attr_e('Youtube','clean-gallery'); ?>"><i class="fa fa-youtube"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('vimeolink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('vimeolink') ); ?>" target="_blank" rel="nofollow" class="social-vimeo" title="<?php esc_attr_e('Vimeo','clean-gallery'); ?>"><i class="fa fa-vimeo"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('soundcloudlink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('soundcloudlink') ); ?>" target="_blank" rel="nofollow" class="social-soundcloud" title="<?php esc_attr_e('SoundCloud','clean-gallery'); ?>"><i class="fa fa-soundcloud"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('lastfmlink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('lastfmlink') ); ?>" target="_blank" rel="nofollow" class="social-lastfm" title="<?php esc_attr_e('Lastfm','clean-gallery'); ?>"><i class="fa fa-lastfm"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('githublink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('githublink') ); ?>" target="_blank" rel="nofollow" class="social-github" title="<?php esc_attr_e('Github','clean-gallery'); ?>"><i class="fa fa-github"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('bitbucketlink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('bitbucketlink') ); ?>" target="_blank" rel="nofollow" class="social-bitbucket" title="<?php esc_attr_e('Bitbucket','clean-gallery'); ?>"><i class="fa fa-bitbucket"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('tumblrlink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('tumblrlink') ); ?>" target="_blank" rel="nofollow" class="social-tumblr" title="<?php esc_attr_e('Tumblr','clean-gallery'); ?>"><i class="fa fa-tumblr"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('digglink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('digglink') ); ?>" target="_blank" rel="nofollow" class="social-digg" title="<?php esc_attr_e('Digg','clean-gallery'); ?>"><i class="fa fa-digg"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('deliciouslink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('deliciouslink') ); ?>" target="_blank" rel="nofollow" class="social-delicious" title="<?php esc_attr_e('Delicious','clean-gallery'); ?>"><i class="fa fa-delicious"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('stumblelink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('stumblelink') ); ?>" target="_blank" rel="nofollow" class="social-stumbleupon" title="<?php esc_attr_e('Stumbleupon','clean-gallery'); ?>"><i class="fa fa-stumbleupon"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('redditlink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('redditlink') ); ?>" target="_blank" rel="nofollow" class="social-reddit" title="<?php esc_attr_e('Reddit','clean-gallery'); ?>"><i class="fa fa-reddit"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('dribbblelink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('dribbblelink') ); ?>" target="_blank" rel="nofollow" class="social-dribbble" title="<?php esc_attr_e('Dribbble','clean-gallery'); ?>"><i class="fa fa-dribbble"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('behancelink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('behancelink') ); ?>" target="_blank" rel="nofollow" class="social-behance" title="<?php esc_attr_e('Behance','clean-gallery'); ?>"><i class="fa fa-behance"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('codepenlink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('codepenlink') ); ?>" target="_blank" rel="nofollow" class="social-codepen" title="<?php esc_attr_e('Codepen','clean-gallery'); ?>"><i class="fa fa-codepen"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('jsfiddlelink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('jsfiddlelink') ); ?>" target="_blank" rel="nofollow" class="social-jsfiddle" title="<?php esc_attr_e('JSFiddle','clean-gallery'); ?>"><i class="fa fa-jsfiddle"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('stackoverflowlink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('stackoverflowlink') ); ?>" target="_blank" rel="nofollow" class="social-stackoverflow" title="<?php esc_attr_e('Stack Overflow','clean-gallery'); ?>"><i class="fa fa-stack-overflow"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('stackexchangelink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('stackexchangelink') ); ?>" target="_blank" rel="nofollow" class="social-stackexchange" title="<?php esc_attr_e('Stack Exchange','clean-gallery'); ?>"><i class="fa fa-stack-exchange"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('bsalink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('bsalink') ); ?>" target="_blank" rel="nofollow" class="social-buysellads" title="<?php esc_attr_e('BuySellAds','clean-gallery'); ?>"><i class="fa fa-buysellads"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('slidesharelink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('slidesharelink') ); ?>" target="_blank" rel="nofollow" class="social-slideshare" title="<?php esc_attr_e('SlideShare','clean-gallery'); ?>"><i class="fa fa-slideshare"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('skypeusername') ) : ?>
    <li><a href="skype:<?php echo esc_html( cleangallery_get_option('skypeusername') ); ?>?chat" class="social-skype" title="<?php esc_attr_e('Skype','clean-gallery'); ?>"><i class="fa fa-skype"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('emailaddress') ) : ?>
    <li><a href="mailto:<?php echo esc_html( cleangallery_get_option('emailaddress') ); ?>" class="social-email" title="<?php esc_attr_e('Email Us','clean-gallery'); ?>"><i class="fa fa-envelope"></i></a></li>
<?php endif; ?>
<?php if ( cleangallery_get_option('rsslink') ) : ?>
    <li><a href="<?php echo esc_url( cleangallery_get_option('rsslink') ); ?>" target="_blank" rel="nofollow" class="social-rss" title="<?php esc_attr_e('RSS','clean-gallery'); ?>"><i class="fa fa-rss"></i></a></li>
<?php endif; ?>
    <li class="cgal-social-search-icon"><a href="<?php echo esc_url( '#' ); ?>" title="<?php esc_attr_e('Search','clean-gallery'); ?>"><i class="fa fa-search"></i></a></li>
</ul>

<div class='social-search-box'>
<?php get_search_form(); ?>
</div>

</nav>
</div>
</div>