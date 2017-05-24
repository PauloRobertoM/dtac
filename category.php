<?php if ( have_posts() ) : ?>
<ol class="posts">
	<?php while ( have_posts() ) : the_post(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endwhile; ?>
</ol><!-- ens posts -->
<?php endif; ?>