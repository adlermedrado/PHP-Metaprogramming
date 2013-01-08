<?php
/**
 * Form Generator Example
 */
abstract class ReflectionForm {
	private $metadataFields;
	public function __construct() {
		$this->metadataFields = array ();
	}
	public function parse() {
		$this->getFormInfo ();
		$generated = '';
		
		foreach ( $this->metadataFields as $fieldName => $fieldParams ) {
			
			$generated .= "<div>" . ucfirst ( $fieldName ) . "</div>\n";
			$generated .= "<div><input type=\"" . $fieldParams ['type'] . "\" name=\"" . $fieldName . "\" /></div>\n";
		}
		
		return $generated;
	}
	private function getFormInfo() {
		$r = new ReflectionObject ( $this );
		
		$fields = $r->getProperties ();
		
		array_walk ( $fields, function ($field) {
			
			$lines = array ();
			
			$doc = $field->getDocComment ();
			if (preg_match ( '#^/\*\*(.*)\*/#s', $doc, $comment ) === false)
				throw new Exception ( 'Error parsing docbloc' );
			
			$params = trim ( $comment [1] );
			
			if (preg_match_all ( '#^\s*\*(.*)#m', $params, $lines ) === false)
				throw new Exception ( 'Error parsing docbloc 2' );
			
			foreach ( $lines [1] as $line ) {
				$this->getVariables ( $field->getName (), $line );
			}
		} );
	}
	private function getVariables($fieldName, $line) {
		$line = trim ( $line );
		
		if (empty ( $line ))
			return false;
		
		if (strpos ( $line, '@' ) === 0) {
			$param = substr ( $line, 1, strpos ( $line, ' ' ) - 1 );
			$value = substr ( $line, strlen ( $param ) + 2 );
			
			$this->metadataFields [$fieldName] = array (
					$param => $value 
			);
		}
	}
}
