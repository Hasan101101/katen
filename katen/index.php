<?php get_header(); ?>

<!-- section main content -->
<section class="main-content">
	<div class="container-xl">

		<div class="row gy-4">

			<div class="col-lg-8">

				<div class="row gy-4">
					<?php
					if (have_posts() && !is_page()){
						while (have_posts()) {
							the_post();
							get_template_part('template-parts/post-formats/post', get_post_format());
						}
					}
					?>

				</div>

				<!-- Pagination -->
				<nav id="katen_pagination">
					<?php get_template_part('template-parts/common/pagination'); ?>
				</nav>

			</div>

			<!-- Sidebar -->
			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
		</div>

	</div>
</section>

<!-- footer -->
<?php get_footer(); ?>