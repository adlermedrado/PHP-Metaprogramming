<?php
/**
 * Form Generator Example
 */
abstract class ReflectionForm {
	private $generated;
	public function parse() {
		$r = new ReflectionObject ( $this );
		
		$fields = $r->getProperties ();
		
		array_walk ( $fields, function ($field) {
			$this->generated .= "\t\t<div>" . ucfirst ( $field->getName () ) . "</div>\n";
			$this->generated .= "\t\t<div><input type=\"text\" name=\"" . $field->getName () . "\" /></div>\n";
		} );
		
		$gen = $this->generated;
		$this->generated = null;
		
		return $gen;
	}
}