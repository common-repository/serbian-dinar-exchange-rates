<?php
/*
 * Plugin Name: Serbian Dinar Exchange Rates
 * Version: 1.3
 * Plugin URI: http://wordpress.org/plugins/serbian-dinar-exchange-rates
 * Description: "Serbian Dinar Exchange Rates" is a widget that gives the users from Serbia a possibility to see changes in rates of foreign currencies.
 * Author: cicophoto
 * Text Domain:serbian-dinar-exchange-rates
 * Domain Path:/languages
 * Author URI: http://wordpress.org/plugins/serbian-dinar-exchange-rates
 * License: GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

/* No direct access */
   if ( ! defined( 'ABSPATH' ) ) die( "Can't load this file directly" );
class serbian_dinar_exchange_rates extends WP_Widget {

    /** constructor  */
	function __construct() {
		parent::__construct(
			'kursna_lista_box', /* Base ID */
			__( 'Serbian Dinar Exchange Rates', 'serbian-dinar-exchange-rates' ), /* Name */
			array( 'description' => __( 'Serbian Dinar Exchange Rates Widget!', 'serbian-dinar-exchange-rates' ), ) /* Args */
		);
	}


    /** @see WP_Widget::form  */
	public function form( $instance ) {
	    $instance = wp_parse_args( (array) $instance, array('title'=>'Serbian Dinar Exchange Rates',  'width'=>'300', 'height'=>'280','format'=>'4','decimale'=>'2','datum'=>'1','promene'=>'1','procenat'=>'1','zastavice'=>'1' ));
        if ( isset( $instance['title'] ) ) { $title = $instance['title']; } else { $title = _e( 'Serbian Dinar Exchange Rates', 'serbian-dinar-exchange-rates' ); }
		if ( isset( $instance['width'] ) ) { $width = $instance['width']; }else{ $width="300";}
		if ( isset( $instance['height'] ) ) { $height = $instance['height']; }else{ $height="280";}
        if ( isset( $instance['format'] ) ) { $format = $instance['format']; }else{ $format="4";}
        if ( isset( $instance['decimale'] ) ) { $decimale = $instance['decimale']; }else{ $decimale="4";}
        if ( isset( $instance['datum'] ) ) { $datum = $instance['datum']; }else{ $datum="1";}
        if ( isset( $instance['promene'] ) ) { $promene = $instance['promene']; }else{ $promene="1";}
        if ( isset( $instance['procenat'] ) ) { $procenat = $instance['procenat']; }else{ $procenat="1";}
        if ( isset( $instance['zastavice'] ) ) { $zastavice = $instance['zastavice']; }else{ $zastavice="1";}
        ?>
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php _e( "Title", 'serbian-dinar-exchange-rates' ); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</p>
<p>
	<input class="widefat" id="<?php echo $this->get_field_id( 'datum' ); ?>" name="<?php echo $this->get_field_name( 'datum' ); ?>" type="checkbox" value="1" <?php checked( $datum, '1' ); ?>>
	<label for="<?php echo $this->get_field_id( 'datum' ); ?>">
		<?php _e( 'Show date', 'serbian-dinar-exchange-rates' ); ?>
	</label>
</p>
<p>
	<input class="widefat" id="<?php echo $this->get_field_id( 'promene' ); ?>" name="<?php echo $this->get_field_name( 'promene' ); ?>" type="checkbox" value="1" <?php checked( $promene, '1' ); ?>>
	<label for="<?php echo $this->get_field_id( 'promene' ); ?>">
		<?php _e( 'Show change', 'serbian-dinar-exchange-rates' ); ?>
	</label>
</p>
<p>
	<input class="widefat" id="<?php echo $this->get_field_id( 'procenat' ); ?>" name="<?php echo $this->get_field_name( 'procenat' ); ?>" type="checkbox" value="1" <?php checked( $procenat, '1' ); ?>>
	<label for="<?php echo $this->get_field_id( 'procenat' ); ?>">
		<?php _e( 'Show percent', 'serbian-dinar-exchange-rates' ); ?>
	</label>
</p>
<p>
	<input class="widefat" id="<?php echo $this->get_field_id( 'zastavice' ); ?>" name="<?php echo $this->get_field_name( 'zastavice' ); ?>" type="checkbox" value="1" <?php checked( $zastavice, '1' ); ?>>
	<label for="<?php echo $this->get_field_id( 'zastavice' ); ?>">
		<?php _e( 'Show flags', 'serbian-dinar-exchange-rates' ); ?>
	</label>
</p>
<p>
	<?php
        echo '<p style="text-align:left;"><label for="' . $this->get_field_name('format') . '">'._e( 'Select format:', 'serbian-dinar-exchange-rates' ).' <select name="' . $this->get_field_name('format')  . '" id="' . $this->get_field_id('format')  . '">"';
        ?>
		<option value="4" <?php if ($format=='4' ) echo 'selected="4"'; ?> >Format 4</option>
		<option value="3" <?php if ($format=='3' ) echo 'selected="3"'; ?> >Format 3</option>
		<option value="2" <?php if ($format=='2' ) echo 'selected="2"'; ?> >Format 2</option>
		<option value="1" <?php if ($format=='1' ) echo 'selected="1"'; ?> >Format 1</option>
		</select>
		</label>
</p>
<p>
	<?php
        echo '<p style="text-align:left;"><label for="' . $this->get_field_name('decimale') . '">'._e( 'Select the number of decimal places:', 'serbian-dinar-exchange-rates' ).' <select name="' . $this->get_field_name('decimale')  . '" id="' . $this->get_field_id('decimale')  . '">"';
        ?>
		<option value="4" <?php if ($decimale=='4' ) echo 'selected="4"'; ?> >4</option>
		<option value="3" <?php if ($decimale=='3' ) echo 'selected="3"'; ?> >3</option>
		<option value="2" <?php if ($decimale=='2' ) echo 'selected="2"'; ?> >2</option>
		<option value="1" <?php if ($decimale=='1' ) echo 'selected="1"'; ?> >1</option>
		</select>
		</label>
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'width' ); ?>">
	   <?php _e( 'Width:', 'serbian-dinar-exchange-rates' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo esc_attr( $width ); ?>">
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'height' ); ?>">
		<?php _e( 'Height:', 'serbian-dinar-exchange-rates' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>">
</p>

<?php
    }

/** @see WP_Widget::update  */
public function update( $new_instance, $old_instance ) {
        $instance                       = array();
        $instance['title']              = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['width']              = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
		$instance['height']             = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';
        $instance['format']             = ( ! empty( $new_instance['format'] ) ) ? strip_tags( $new_instance['format'] ) : '';
        $instance['decimale']           = ( ! empty( $new_instance['decimale'] ) ) ? strip_tags( $new_instance['decimale'] ) : '';
        $instance['datum']              = ( ! empty( $new_instance['datum'] ) ) ? strip_tags( $new_instance['datum'] ) : '';
        $instance['promene']            = ( ! empty( $new_instance['promene'] ) ) ? strip_tags( $new_instance['promene'] ) : '';
        $instance['procenat']           = ( ! empty( $new_instance['procenat'] ) ) ? strip_tags( $new_instance['procenat'] ) : '';
        $instance['zastavice']          = ( ! empty( $new_instance['zastavice'] ) ) ? strip_tags( $new_instance['zastavice'] ) : '';
        return $instance;
    }


/** @see WP_Widget::widget*/
public function widget( $args, $instance ) {
        $title              = apply_filters( 'widget_title', $instance['title'] );
		$width              = $instance['width'];
		$height             = $instance['height'];
        $format             = $instance['format'];
        $decimale           = $instance['decimale'];
        $datum              = $instance['datum'];
        $promene            = $instance['promene'];
        $procenat           = $instance['procenat'];
        $zastavice          = $instance['zastavice'];

        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
         ?>
         <div style="overflow: hidden; width:<?php echo $height; ?>; height:<?php echo $height; ?>; margin: 0px; padding: 0px;"><iframe src="http://www.kursna-lista.info/resources/kursna-lista.php?format=<?php echo $format; ?>&br_decimala=<?php echo $decimale; ?>&promene=<?php echo $promene; ?>&procenat=<?php echo $procenat; ?>&datum=<?php echo $datum; ?>&zastavice=<?php echo $zastavice; ?>" width="<?php echo $width; ?>px" height="<?php echo $height; ?>px" frameborder="0" scrolling="no"></iframe></div>
        <?php


        echo $args['after_widget'];
    }

}

/* Register Widget */
function register_kursnalista_widget() {
    register_widget( 'serbian_dinar_exchange_rates' );
}
add_action( 'widgets_init', 'register_kursnalista_widget' );
/* Load language .*/
add_action( 'plugins_loaded', 'kursnalista_load_textdomain' );
    function kursnalista_load_textdomain() {
    load_plugin_textdomain( 'serbian-dinar-exchange-rates', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
    }

