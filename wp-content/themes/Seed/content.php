<article <?php post_class(); ?>>
<div class="entry-thumbnail">
        <div class="entry-thumbnail">
          <?php the_post_thumbnail(); ?>
        </div>
        </div>
        <div class="entry-header">
                        <?php origanic_entry_header(); ?>
                        <?php origanic_entry_meta() ?>
        </div>
        <div class="entry-content">
                        <?php origanic_entry_content(); ?>
                <?php ( is_single() ? origanic_entry_tag() : '' ); ?>
        </div>
</article>