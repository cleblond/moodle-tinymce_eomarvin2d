<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Displays the TinyMCE popup window to insert a Moodle emoticon
 *
 * @package   tinymce_moodleemoticon
 * @copyright 2010 David Mudrak <david@moodle.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */





define('NO_MOODLE_COOKIES', true); // Session not used here.

require(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/config.php');

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/lib/editor/tinymce/plugins/eomarvin2d/marvin.php');

$editor = get_texteditor('tinymce');
$plugin = $editor->get_plugin('eomarvin2d');


$htmllang = get_html_lang();
header('Content-Type: text/html; charset=utf-8');
header('X-UA-Compatible: IE=edge');



?>
<!DOCTYPE html>
<html <?php echo $htmllang ?>
<head>
    <script type="text/javascript" src="<?php echo $editor->get_tinymce_base_url(); ?>/tiny_mce_popup.js"></script>
    <script type="text/javascript" src="<?php echo $plugin->get_tinymce_file_url('js/dialog.js'); ?>"></script>
</head>
<body>

<form onsubmit="Eomarvin2dDialog.insert();return false;" action="#">

	<p> </p>
		<table><tr>
		<td><input type="button" id="insert" name="insert" value="{#insert}" onclick="Eomarvin2dDialog.insert();" /></td>
		<td><input type="button" id="cancel" name="cancel" value="{#cancel}" onclick="tinyMCEPopup.close();" /></td>
		</tr>
		</table>

</form>

<script LANGUAGE="JavaScript1.1" SRC="/marvin/marvin.js"></script>
<script LANGUAGE="JavaScript1.1">

function importMol() {
	if(document.MSketch != null) {
		var s = document.MolForm.MolTxt.value;
		s = local2unix(s); // Convert local line separator to "\n"
		document.MSketch.setMol(s);
	} else {
		alert("Cannot import molecule:\n"+
		      "no JavaScript to Java communication in your browser.\n");
	}
}
function exportMol(format) {
	if(document.MSketch != null) {
		var s = document.MSketch.getMol(format);
		s = unix2local(s); // Convert "\n" to local line separator
		document.MolForm.MolTxt.value = s;
	} else {
		alert("Cannot import molecule:\n"+
		      "no JavaScript to Java communication in your browser.\n");
	}
}


msketch_name = "MSketch";
msketch_begin("../../../../../../marvin", 700, 500);
msketch_param("menuconfig", "customization_mech_instructor.xml");
msketch_param("background", "#ffffff");
msketch_param("molbg", "#ffffff");
msketch_end();
</script> 


</body>
</html>




