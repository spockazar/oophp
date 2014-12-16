<?php
$menu = array (
	'home' => array('text' => 'Home', 'url' => '?p=home'),
	'away' => array('text' => 'Away', 'url' => '?p=away'),
	'about' => array('text' => 'About', 'url' => '?p=about'),
);

class CNavigation 
{
	public static function GenerateMenus($items, $class)
	{
		$html = "<nav class='$class'>\n";
		foreach($items as $key => $item)
		{
			$selected = (isset($_GET['p']) && $_GET['p'] == $key) ? 'selected' : null;
			$html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
		}
		$html .= "</nav>\n";
		return $html;
	}
};
?>

<style type="text/css">
.navbar {display block;background-color:#333;font-family:Verdana;padding:0.5em;}
.navbar a {background-color:#999;color:#fff;padding:0.2em;text-decoration:none;}
.navbar a:hover {background-color:#666;padding:0.5em 0.2em 0.5em 0.2em}
.navbar a.selected {background-color:#fff;padding:0.3em 0.2em 0.5em 0.2em;color:#333;}
</style>


<?php
echo CNavigation::GenerateMenus($menu, 'navbar');