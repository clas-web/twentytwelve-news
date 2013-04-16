<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>



	<div id="primary" class="site-content">
		
<div id="featured-story-slider">
<?php 

	$featured_story_ids = array();

	$number_of_featured_stories = 5;
	$number_of_slider_stories = 3;
	$featured_classes = array( 'slide', 'other-story' );

	$no_posts = false;
	$class_index = 0;
	$post_index = 0;
	
	$featured_id = get_cat_ID('feature');
	$query = array(
		'category__in' => array( $featured_id ),
		'posts_per_page' => $number_of_featured_stories
	);

	$posts = new WP_Query( $query );

	for( $i = 0; $i < $number_of_featured_stories; $i++ )
	{
		if( $i == $number_of_slider_stories )
		{
			echo '</div>';
			$class_index++;
		}
		
		if( (!$no_posts) && ($posts->have_posts()) )
		{
			$posts->the_post();
			
			$class = $featured_classes[$class_index];
			$image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			$title = get_the_title();
			$link = get_permalink( get_the_ID() );
			$author = get_the_author();
			$date = get_the_date();
			$excerpt = apply_filters('the_excerpt', get_the_excerpt());
			
			$featured_story_ids[] = get_the_ID();
		}
		else
		{
			$class = $featured_classes[$class_index];
			$no_posts = true;
			$image = null;
			$title = '';
			$link = null;
			$author = '';
			$date = '';
			$excerpt = '';
		}
		
		if( $i == $number_of_featured_stories - 2 ) $class .= ' other-story-left';
		else if( $i == $number_of_featured_stories - 1 ) $class .= ' other-story-right';

		?>
		<div onclick="location.href='<?php echo $link; ?>'" class="<?php echo $class; ?>">
			<div class="image" style="background-image:url(<?php echo $image ?>)"></div>
			<div class="story">
				<h2><a href="<?php echo $link; ?>"><?php echo $title ?></a></h2>
				<span class="by"><?php if($author != '') echo "by $author"; ?></span>
				<span class="date"><?php echo $date ?></span>
				<?php echo $excerpt ?>
			</div>
		</div>
		<?php
	}
?>

<!-- other news goes here -->
	<div style="clear:both;"></div>

	<div id="more-news">

		<h3>MORE NEWS</h3>
		
		<?php 
		
	
						
			$featured_id = get_cat_ID('feature');
			$event_id = get_cat_ID('event');
			$query = array(
				'category__not_in' => array( $event_id ),
				'post__not_in' => $featured_story_ids
			);

			$posts = new WP_Query( $query );
			
			if( $posts->have_posts() )
			{
				while( $posts->have_posts() )
				{
					$posts->the_post();
					
					?>
					<div onclick="location.href='<?php echo $link; ?>'" class="news-story">
						<span class="date"><?php the_date(); ?></span>
						<span class="title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
							</a>
						</span>
					</div>
					<?php
				}                  
			}
			else
			{
				?>
				<div class="no-news">NO MORE NEWS</div>
				<?php
			}
	
		?>

	</div>
		
	</div><!-- #primary -->
	


	<div id="secondary">
	
	<div id="events">
		<h3>EVENTS</h3>

		<?php

		$query = array(
			'category_name' => 'event'
		);

		$posts = new WP_Query( $query );
		
		if( $posts->have_posts() )
		{
			while( $posts->have_posts() )
			{
				$posts->the_post();
				
				?>
				<div onclick="location.href='<?php echo $link; ?>'" class="event">
					<span class="date"><?php the_date(); ?></span>
					<span class="title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</span>
				</div>
				<?php
			}                  
		}
		else
		{
			?>
			<div class="no-event">NO EVENTS</div>
			<?php
		}

		?>

	</div>
	
	</div><!-- #secondary -->



<?php get_footer(); ?>