<?php

class Validator {
	public static function string($value, $min = 1, $max = 10) {
		$value = trim($value);

		return strlen($value) >= $min && strlen($value) <= $max;
	}
}