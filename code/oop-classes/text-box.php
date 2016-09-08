<?php 
	class TextBoxSimple {
		public $body_text = "my text";
		function display() {
			print("<TABLE BORDER=1><TR><TD>$this->body_text");
			print("</TD></TR></TABLE>");
		}
	}	
	//$box = new TextBoxSimple;
	//$box->display();
	
	class TextBox {
		public $body_text = "my text";
		// Constructor function
		public function __construct($text_in) {
			$this->body_text = $text_in;
		}
		function display() {
			print("<TABLE BORDER=1><TR><TD>$this->body_text");
			print("</TD></TR></TABLE>");
		}
	}
	// creating an instance
	$box = new TextBox("custom text");
	$box->display();
?>