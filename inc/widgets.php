<?php

class kembara_widget_quote extends WP_Widget 
{

	function __construct() 
	{
		parent::__construct('kembara_widget_quote', __('Kembara Widget Quote', 'kembara'), 
			array( 'description' => __( 'Simple quote widget', 'kembara' ), ) 
		);
	}

	public function widget( $args, $instance ) 
	{
		$quote = $instance['quote'];

		echo '<div class="col-xs-12 col-sm-6 clearfix">';
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

class kembara_widget_social extends WP_Widget 
{

	function __construct() 
	{
		parent::__construct('kembara_widget_social', __('Kembara Widget Social', 'kembara'), 
			array( 'description' => __( 'Display social handles', 'kembara' ), ) 
		);

		add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
	}

	public function widget( $args, $instance ) 
	{
		$title = $instance['title'] == '' ? 'Social' : $instance['title'];
		$image = $instance['image'] == '' ? '' : '<img src="'.$instance['image'].'" width="60" class="img-rounded pull-xs-right m-l-1">';
		
		$facebook =  get_theme_mod('facebook') == '' ? '' : '<li class="list-inline-item"><a rel="nofollow" href="'.get_theme_mod('facebook').'" title="Facebook"><i class="ion ion-social-facebook"></i></a></li>';

		$twitter =  get_theme_mod('twitter') == '' ? '' : '<li class="list-inline-item"><a rel="nofollow" href="'.get_theme_mod('twitter').'" title="Twitter"><i class="ion ion-social-twitter"></i></a></li>';

		$instagram =  get_theme_mod('instagram') == '' ? '' : '<li class="list-inline-item"><a rel="nofollow" href="'.get_theme_mod('instagram').'" title="Instagram"><i class="ion ion-social-instagram"></i></a></li>';

		$youtube =  get_theme_mod('youtube') == '' ? '' : '<li class="list-inline-item"><a rel="nofollow" href="'.get_theme_mod('youtube').'" title="Instagram"><i class="ion ion-social-youtube"></i></a></li>';

		$github =  get_theme_mod('github') == '' ? '' : '<li class="list-inline-item"><a rel="nofollow" href="'.get_theme_mod('github').'" title="Github"><i class="ion ion-social-github"></i></a></li>';
		
		echo '<div class="col-xs-12 col-sm-3 text-sm-right">';
		echo $image;
		echo '<h4 class="title">'._($title).'</h4>';
		echo '<ul class="list-inline social-list">'.$facebook.$twitter.$instagram.$youtube.$github.'</ul>';
		echo '</div>';
	}
	
	/**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', plugin_dir_url(__FILE__) . 'upload-media.js', array('jquery'));

        wp_enqueue_style('thickbox');
    }

	public function form( $instance ) 
	{
		$title = 'Social';
		if ( isset( $instance[ 'title' ] ) ) 
		{
			$title = $instance[ 'title' ];
		}
		
		$image = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
        }

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button button button-primary" type="button" value="Upload Image" />
        </p>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(document).on("click", ".upload_image_button", function() {

				jQuery.data(document.body, 'prevElement', $(this).prev());

				window.send_to_editor = function(html) {
					var imgurl = jQuery(html).attr('src');
					var inputText = jQuery.data(document.body, 'prevElement');

					if(inputText != undefined && inputText != '')
					{
						inputText.val(imgurl);
					}

					tb_remove();
				};

				tb_show('', 'media-upload.php?type=image&TB_iframe=true');
				return false;
			});
		});
		</script>
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) 
	{
		$instance = $new_instance;
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		
		return $instance;
	}
}

function kembara_load_widget() 
{
	register_widget( 'kembara_widget_quote' );
	register_widget( 'kembara_widget_social' );
}

add_action( 'widgets_init', 'kembara_load_widget' );
