<?php
/* The Template for displaying comments.
 *
 * @package WordPress
 * @subpackage naiau
 * @since naiau 0.1.0
 */
if ( post_password_required() )
  return;
?>

<div id="comments" class="comments-area">

  <?php if ( have_comments() ) : ?>
    <h2 class="comments-title">
      <i class="icon-comment"></i>
      <?php
        printf( __( '%1$s thoughts on &ldquo;%2$s&rdquo;','naiau'), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
      ?>
    </h2>

    <ol class="comment-list">
      <?php
        wp_list_comments( array(
          'style'       => 'ol',
          'short_ping'  => true,
          'avatar_size' => 74,
          'reply_text' => __('Reply<i class=" fa fa-mail-reply"></i>','naiau')
        ) );
      ?>
    </ol><!-- .comment-list -->

  <nav class="comment-navigation" >
      <div class="previous-comments"><?php previous_comments_link( __( '<i class="icon-left-open"></i> Older Comments', 'naiau' ) ); ?></div>
      <div class="next-comments"><?php next_comments_link( __( 'Newer Comments <i class="icon-right-open"></i>', 'naiau' ) ); ?></div>
    </nav><!-- .comment-navigation -->  


    <?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="no-comments"><?php _e( 'Comments are closed.' , 'naiau' ); ?></p>
    <?php endif; ?>

  <?php endif; // have_comments() ?>

  

</div><!-- #comments -->

  <?php get_template_part('library/comment','form'); ?>


