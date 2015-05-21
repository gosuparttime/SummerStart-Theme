<?php
echo '<div class="row-fluid">';
if (get_field('staff_photo')) {
	  	
		$staff_pix = get_field('staff_photo');
		$staff_size = "staff-large";
		$staff_image = wp_get_attachment_image_src( $staff_pix, $staff_size );
		echo '<div class="span5 mobile1"><img class="thumbnail" src="';
		echo $staff_image[0];
		echo '" alt="';
		the_title();
		echo '"/>';	
		echo '</div><div class="span7 mobile3">';
		} else {
			echo '<div class="span12">';
		}

echo '<h5>';
echo the_title();
echo '</h5>';
echo '<ul class="unstyled"><li><strong class="orange">';
echo the_field('position');
echo '</strong></li>';
echo '<li><i class="icon-envelope-alt"></i> <a href="mailto:'.get_field('email_address').'">';
the_field('email_address');
echo '</a></li>';
echo '<li><a href="tel:1-'.get_field('phone_number').'" class="visible-phone"><i class="icon-phone"></i> ';
echo the_field('phone_number');
echo '</a>';
echo '<span class="hidden-phone"><i class="icon-phone"></i> ';
echo the_field('phone_number');
echo '</span></li>';
echo '</ul>';
echo '</div></div>';
?>