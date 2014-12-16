<?php
/**
 * Dice with images as graphical representation
 */
class CDiceImage extends CDice
{
	/**
	 * Properties
	 */
	const FACES = 6;
	
	
	// Base class constructor
	public function __construct()
	{
		parent::__construct(self::FACES);
	}
	
	public function GetRollsAsImageList()
	{
		$html = "<ul class='dice'>";
		foreach($this->rolls as $val)
		{
			$html .= "<li class='dice-{$val}'></li>";
		}
		$html .= "</ul>";
		
		return $html;
	}
	
}