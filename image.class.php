<?php

class Cuztom_Field_Image extends Cuztom_Field
{
  function _output( $value )
	{
		if( ! empty( $value ) )
		{
			$url = wp_get_attachment_image_src( $value, apply_filters( 'cuztom_preview_size', 'medium' ) );
			$url = $url[0];
			$image  = '<img src="' . $url . '" />';
		}
		else 
		{
			$image = '';
		}
		global $wp_version;
		$output = '<div class="cuztom_button_wrap">';
			$output .= '<input type="hidden" name="cuztom[' . $this->id_name . ']" id="' . $this->id_name . '" class="cuztom_hidden" value="' . ( ! empty( $value ) ? $value : '' ) . '" class="cuztom_input" />';
			if ( $wp_version >= 3.5 ) {
     			$output .= sprintf( '<input id="upload_image_button" type="button" class="button cuztom_button cuztom_upload_new" value="%s" class="cuztom_upload" />', __( 'Upload Image', CUZTOM_TEXTDOMAIN ) );
			}else{
				$output .= sprintf( '<input id="upload_image_button" type="button" class="button cuztom_button cuztom_upload_old" value="%s" class="cuztom_upload" />', __( 'Upload Image', CUZTOM_TEXTDOMAIN ) );
			}
			$output .= ( ! empty( $value ) ? sprintf( '<a href="#" class="cuztom_remove_image">%s</a>', __( 'Remove current image', CUZTOM_TEXTDOMAIN ) ) : '' );
		$output .= '</div>';
		$output .= '<span class="cuztom_preview">' . $image . '</span>';

		return $output;
	}
}
