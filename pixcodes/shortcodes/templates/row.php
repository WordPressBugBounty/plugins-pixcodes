<?php
$output = '';
$output .= '<div class="pixcode  pixcode--row  row  ' . esc_attr( $class ) . '">' . PHP_EOL;
$output .= wp_kses_post( $this->get_clean_content( $content ) ) . PHP_EOL;
$output .= '</div>' . PHP_EOL;
echo $output;
