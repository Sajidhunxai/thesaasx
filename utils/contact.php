<?php


function thesaasx_send_contact_message () {

	if ( isset($_POST['email']) && isset($_POST['message']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {

		// detect & prevent header injections
		$test = "/(content-type|bcc:|cc:|to:)/i";
		foreach ( $_POST as $key => $val ) {
			if ( preg_match( $test, $val ) ) {
				exit;
			}
		}


		// Check reCAPTCHA v3
		//
		$recaptcha_secret = get_theme_mod( 'google_recaptcha3_secret', '' );
		if ( $recaptcha_secret !== '' ) {

			if ( ! isset($_POST['g-recaptcha-v3-token']) ) {
				echo json_encode( array( 'status' => 'error', 'message' => 'reCAPTCHA Token Not Provided!' ) );
				exit();
			}

            // Build POST request:
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_response = $_POST['g-recaptcha-v3-token'];

            // Make and decode POST request:
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
            $recaptcha = json_decode($recaptcha);

            // Take action based on the score returned:
            if ( $recaptcha->score < 0.5 ) {
				echo json_encode( array( 'status' => 'error', 'message' => 'reCAPTCHA Failed!' ) );
				exit();
            }
		}

		// Sender name
		//
		$name = '';
		if ( isset( $_POST['name'] ) ) {
		  $name = $_POST['name'];
		}

	  	if ( isset( $_POST['firstname'] ) ) {
	    	$name = $_POST['firstname'] .' '. $_POST['lastname'];
	  	}
		$name = sanitize_text_field( $name );

	  	// Sender email
	  	//
		$from_email = sanitize_text_field( $_POST['email'] );


		// Receiver
		//
		$to = get_option('admin_email');
		if ( ! empty( $_POST['to'] ) ) {
			$to = $_POST['to'];
		}


		// Email subject
		//
		$subject = '';
		if ( isset( $_POST['subject'] ) ) {
		  $subject = $_POST['subject'];
		}

		if ($subject == "") {
		  $subject = get_bloginfo('name') .' '. esc_html__( 'contact', 'thesaasx' );
		}

		if ( ! empty( $name ) ) {
		  $subject .= ' - By '. $name;
		}



		$message = nl2br( $_POST['message'] );


	  	// Attach other input values to the end of message
	  	//
	  	unset( $_POST['subject'], $_POST['message'], $_POST['to'], $_POST['action'], $_POST['error-msg'], $_POST['success-message'], $_POST['g-recaptcha-v3-token'] );
	  	$message .= '<br><br><br>';
	  	foreach ($_POST as $key => $value) {
	    	$message .= '<b>'. ucfirst($key) .'</b>: '. $value .'<br>';
	  	}


		$headers = "Content-Type: text/html; charset=utf-8\r\n";
		//$headers .= "From: ". $_SERVER[HTTP_HOST] ." <noreply@". $_SERVER[HTTP_HOST] ."> \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Reply-To: ". $from_email . "\r\n";

		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			echo json_encode( array( 'status' => 'success' ) );
			exit;
		}
		else {
			if ( mail( $to, $subject, $message ) ) {
				echo json_encode( array( 'status' => 'success' ) );
				exit;
			}
			else {
				$error = esc_html__( 'There is a problem in our email service. Please try again later.', 'thesaasx' );
				if ( isset( $_POST['error-msg'] ) ) {
					$error = $_POST['error-msg'];
				}

		    global $ts_mail_errors;
		    global $phpmailer;

		    if ( ! isset( $ts_mail_errors ) ) {
		    	$ts_mail_errors = array();
		    }

		    if ( isset( $phpmailer ) ) {
		       $ts_mail_errors[] = $phpmailer->ErrorInfo;
		    }

				echo json_encode( array( 'status' => 'error', 'message' => $error, 'error' => $ts_mail_errors ) );
			}
		}

		exit;

	}

}

add_action("wp_ajax_contact_send", "thesaasx_send_contact_message");
add_action("wp_ajax_nopriv_contact_send", "thesaasx_send_contact_message");
