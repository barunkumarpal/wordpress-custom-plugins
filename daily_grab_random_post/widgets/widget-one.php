<?php
class mcw_widget_one extends WP_Widget{
/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 

			'description' => 'Testing my first widget',
		);
		parent::__construct( 'mcw_custom_widget_one', 'My Custom Widget One', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
				// outputs the content of the widget
				// print_r($args);
				$title = apply_filters( 'widget_title', $instance['title'] );

				// before and after widget arguments are defined by themes
				echo $args['before_widget'];

				if ( ! empty( $title ) ){ ?>

				<div class="">

				<?php echo $args['before_title'] . $title . $args['after_title']; ?>

				</div>
				<?php }

				$random_post_id = get_transient('daily_grab_post');

				//print_r($recipe_id);

				if(!$random_post_id){
					$random_post_id = daily_grab_random_post();

					set_transient(
						'daily_grab_post',
						$random_post_id,
						DAY_IN_SECONDS
					);
				}

			?>

				<div class="portfolio-image">
					<a href="<?php echo get_permalink( $random_post_id); ?>">
					<?php echo get_the_post_thumbnail( $random_post_id, 'thumbnail'); ?>
					</a>
				</div>
				<div class="portfolio-desc center nobottompadding">
					<h3 class="">
						<a href="<?php echo get_permalink( $random_post_id); ?>" ><?php echo get_the_title( $random_post_id); ?></a>
					</h3>
				</div>



			<?php 
			
			// This is where you run the code and display the output

				echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
        
        // outputs the options form on admin
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Default title', 'mcw' );
        $description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( 'Default Description', 'mcw' );
		?>
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_attr_e( 'Title:', 'mcw' );?>             
            </label> 
            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
                type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>">
                <?php esc_attr_e( 'Description:', 'mcw' );?>             
            </label> 
            <textarea 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" 
                ><?php echo esc_attr( $description ); ?></textarea>
		</p>
<?php	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = [];
        $instance['title'] = strip_tags($new_instance['title']);	
        $instance['description'] = strip_tags($new_instance['description']);	
		
		return $instance;
		
	}
}