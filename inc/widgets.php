<?php
// Creating the widget
class Zbmfourteen_Impressum_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'zbm_impressum',

		// Widget name will appear in UI
		'Impressum',

		// Widget description
		array( 'description' => 'Kurz-Impressum als maschienenlesbare V-Card', )
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title	= '<a href="https://www.zimmerbergmuehle.de/a2/impressum/">Impressum</a>';

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		?>
		<div class="vcard">
			<a class="fn org url" href="https://www.kjr-ostalb.de/">Kreisjugendring Ostalb e.V.</a><br>
			<p class="adr"><span class="street-address">Stuttgarter Str. 41</span><br>
				<span class="postal-code">73430</span> <span class="locality">Aalen</span>
				<span class="country-name">Germany</span>
			</p>
			<div>
				<div class="tel">
					<span class="type"><abbr title="Telefonnummer">Tel.</abbr></span>: <span class="value">07361/503-1465</span><br>
				</div>
				<div class="tel">
					<span class="type">Fax</span>: <span class="value">07361/503-1477</span><br>
				</div>
			</div>
			<p class="email">info@kjr-ostalb.de</p>
		</div>
		<?php

		echo $args['after_widget'];
	}

	// Widget Backend
	public function form( $instance ) {
		// Widget admin form
		?>
		<p>
		<i>Keine Konfiguration notwendig.</i>
		</p>
		<?php
		}

		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here
register_widget( 'Zbmfourteen_Impressum_Widget' );

// Creating the widget
class Zbmfourteen_Timer_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'zbm_countdown',

		// Widget name will appear in UI
		'ZBM Countdown',

		// Widget description
		array( 'description' => 'Anzeige des Countdown bis zum Lagerbeginn', )
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		echo $args['before_title'] .'Lagerbeginn'. $args['after_title'];

		// This is where you run the code and display the output
		echo '<div id="timer-tostart"></div>';
		echo $args['after_widget'];
	}

	// Widget Backend
	public function form( $instance ) {
		// Widget admin form
		?>
		<p>
		<i>Keine Konfiguration notwendig.</i>
		</p>
		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here
register_widget( 'Zbmfourteen_Timer_Widget' );
