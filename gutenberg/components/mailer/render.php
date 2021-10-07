<?php

function thesaasx_render_mailer( $attributes, $children ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$class = [];
$class[] = $X['class'];


$data = [
  'action'    => admin_url('admin-ajax.php'),
  'method'    => "POST",
  'data-form' => "mailer",
];

$txtTo      = esc_attr( $X['receiver'] );
$txtSubject = esc_attr( $X['subject'] );
$txtMessage = $X['message'];
$valMessage = esc_attr( $txtMessage );


$attrData  = The_Util::get_attr_data ( $data );
$attrClass = The_Util::get_attr_class( $class );


$output = <<< EOD
<form $attrClass $attrData>
  <input type="hidden" name="to" value="$txtTo">
  <input type="hidden" name="subject" value="$txtSubject">
  <input type="hidden" name="success-message" value="$valMessage">
  <input type="hidden" name="action" value="contact_send">
  <div class="alert alert-success d-on-success">$txtMessage</div>
  $children
</form>
EOD;


/* --------------------------------------------------- */

return $output;
}
