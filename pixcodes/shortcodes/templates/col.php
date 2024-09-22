<?php
$output = '';
$output .= '<div class="col-12  hand-span-' . esc_attr( $size ) . ' ' . esc_attr( $class ) . '">' . PHP_EOL;
$output .= wp_kses_post( $this->get_clean_content( $content ) ) . PHP_EOL;
$output .= '</div>' . PHP_EOL;
echo $output;
