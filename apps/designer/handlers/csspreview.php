<?php

/**
 * Live preview handler for stylesheet forms.
 */

$page->title = i18n_get ('Page title');
$page->preview = true;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (! empty ($_GET['layout'])) {
		$page->layout = file_get_contents ('layouts/' . $_GET['layout'] . '.html');
	} else {
		$page->layout = file_get_contents ('layouts/default.html');
	}
} else {
	$page->layout = file_get_contents ('layouts/' . $_POST['layout'] . '.html');
	$page->layout = str_replace ('</head>', '<style>' . $_POST['css'] . '</style></head>', $page->layout);
}

echo '<p>' . i18n_get ('This is a preview of how your layout will look.') . '</p>';

?>