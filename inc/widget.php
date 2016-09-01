<?php

class kembara_widget extends WP_Widget 
{

	function __construct() 
	{
		parent::__construct('kembara_widget', __('Kembara Widget Quote', 'kembara'), 
			array( 'description' => __( 'Simple quote widget', 'kembara' ), ) 
		);
	}

	public function widget( $args, $instance ) 
	{
		$quote = $instance['quote'];

		echo '<div class="col-xs-6 col-sm-6 clearfix">';
		echo '<blockquote class="blockquote text-muted">'.$quote.'</blockquote>';
		echo '</div>';
	}

	public function form( $instance ) 
	{
		if ( isset( $instance[ 'quote' ] ) ) 
		{
			$quote = $instance[ 'quote' ];
		}
		else 
		{
			$quote = '';
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'quote' ); ?>"><?php _e( 'Quote:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'quote' ); ?>" name="<?php echo $this->get_field_name( 'quote' ); ?>" type="text" value="<?php echo esc_attr( $quote ); ?>" />
		</p>
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) 
	{
		$instance = array();
		$instance['quote'] = ( ! empty( $new_instance['quote'] ) ) ? strip_tags( $new_instance['quote'] ) : '';
		return $instance;
	}
}

function kembara_load_widget() 
{
	register_widget( 'kembara_widget' );
}

add_action( 'widgets_init', 'kembara_load_widget' );
