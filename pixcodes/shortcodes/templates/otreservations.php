<?php if ( ! empty( $disable_weekends ) ) {
	$class = $class . ' disable-weekends';
} ?>
<div class="pixcode  pixcode--otreservations  otreservations  <?php echo esc_attr( $class ) ?>">
	<div class="otreservation-title-wrapper">
		<h4 class="otreservations-title"><?php echo wp_kses_post( $title ) ?></h4>
		<span class="otreservations-subtitle"><?php esc_html_e( 'Powered by OpenTable', 'pixcodes' ) ?></span>
	</div>
	<?php if ( ! empty( $rid ) && intval( $rid ) ) : ?>
		<form method="get" class="otw-widget-form"
		      action="http://www.opentable.<?php echo esc_attr( $domain_ext ); ?>/restaurant-search.aspx"
		      target="_blank">
			<div class="otw-wrapper">
				<div class="otw-date-li otw-input-wrap">
					<label for="date-otreservations"><?php echo( ! empty( $labels ) ? esc_html__( 'Date', 'pixcodes' ) : '<i class="icon-calendar"></i>' ) ?></label>
					<input id="date-otreservations" name="startDate" class="otw-reservation-date" type="text" value=""
					       autocomplete="off">
				</div>
				<div class="otw-time-wrap otw-input-wrap">
					<label for="time-otreservations"><?php echo( ! empty( $labels ) ? esc_html__( 'Time', 'pixcodes' ) : '<i class="icon-clock-o"></i>' ) ?></label>
					<select id="time-otreservations" name="ResTime" class="otw-reservation-time selectpicker">
						<?php
						//Time Loop
						$inc   = 30 * 60;
						$start = ( strtotime( '6AM' ) ); // 6  AM
						$end   = ( strtotime( '11:59PM' ) ); // 10 PM


						for ( $i = $start; $i <= $end; $i += $inc ) {
							// to the standard format
							$time      = date( 'g:i a', $i );
							$timeValue = date( 'g:ia', $i );
							$default   = '7:00pm';
							echo '<option value="' . esc_attr( $timeValue ) . '" ' . ( ( $timeValue == $default ) ? ' selected="selected" ' : '' ) . '>' . esc_html( $time ) . '</option>' . PHP_EOL;
						}

						?>
					</select>

				</div>
				<div class="otw-party-size-wrap otw-input-wrap">
					<label for="party-otreservations"><?php echo( ! empty( $labels ) ? esc_html__( 'Party Size', 'pixcodes' ) : '<i class="icon-user"></i>' ) ?></label>
					<select id="party-otreservations" name="partySize" class="otw-party-size-select selectpicker">
						<option value="1"><?php esc_html_e( '1 Person', 'pixcodes_txtd' ); ?></option>
						<option value="2" selected="selected"><?php esc_html_e( '2 People', 'pixcodes_txtd' ); ?></option>
						<option value="3"><?php esc_html_e( '3 People', 'pixcodes_txtd' ); ?></option>
						<option value="4"><?php esc_html_e( '4 People', 'pixcodes_txtd' ); ?></option>
						<option value="5"><?php esc_html_e( '5 People', 'pixcodes_txtd' ); ?></option>
						<option value="6"><?php esc_html_e( '6 People', 'pixcodes_txtd' ); ?></option>
						<option value="7"><?php esc_html_e( '7 People', 'pixcodes_txtd' ); ?></option>
						<option value="8"><?php esc_html_e( '8 People', 'pixcodes_txtd' ); ?></option>
						<option value="9"><?php esc_html_e( '9 People', 'pixcodes_txtd' ); ?></option>
						<option value="10"><?php esc_html_e( '10 People', 'pixcodes_txtd' ); ?></option>
					</select>

				</div>

				<div class="otw-button-wrap">
					<input type="submit" class="otreservations-submit"
					       value="<?php esc_html_e( 'Find a Table', 'pixcodes' ); ?>"/>
				</div>
				<input type="hidden" name="RestaurantID" class="RestaurantID" value="<?php echo esc_attr( $rid ); ?>">
				<input type="hidden" name="rid" class="rid" value="<?php echo esc_attr( $rid ); ?>">
				<input type="hidden" name="GeoID" class="GeoID" value="15">
				<input type="hidden" name="txtDateFormat" class="txtDateFormat"
				       value="<?php echo ! empty( $date_format ) ? esc_attr( $date_format ) : 'MM/DD/YYYY'; ?>">
				<input type="hidden" name="RestaurantReferralID" class="RestaurantReferralID"
				       value="<?php echo esc_attr( $rid ); ?>">
			</div>
		</form>
	<?php else : ?>
		<span class="otreservations-error"><?php esc_html_e( 'You need to provide us with a valid numeric OpenTable restaurant ID.', 'pixcodes' ) ?></span>
	<?php endif; ?>
</div>
