tinyMCEPopup.requireLangPack();

var Eomarvin2dDialog = {
	init : function() {
		var f = document.forms[0];

		// Get the selected contents as text and place it in the input
		//f.someval.value = tinyMCEPopup.editor.selection.getContent({format : 'text'});
//		f.somearg.value = tinyMCEPopup.getWindowArg('some_custom_arg');
	},

	insert : function() {
		// Insert the contents from the input into the document
//		tinyMCEPopup.editor.execCommand('mceInsertContent', false, document.forms[0].someval.value);
		var s = document.MSketch.getMol('mrv');
//		s = s.replace(/(\r\n|\n|\r)/gm,"\n");
		s = unix2local(s); // Convert "\n" to local line separator
//		document.MolForm.MolTxt.value = s;
//		var molfile = ChemDoodle.writeMOL(sketcher.getMolecule());
//		var molfile = ChemDoodle.writeRXN(sketcher.getMolecules());

	



//		display3d = document.display3d.value;

//		alert(display3d);
	//	molfile = s.replace(/\</g,'LL');
		s = s.replace(/</g, unescape("%26lt%3B")).replace(/>/g, unescape("%26gt%3B"))
//		alert(s);

		var molfile = '<mar>' +s+ '</mar>';

//		alert(molfile);

		tinyMCEPopup.editor.execCommand('mceInsertContent', false, molfile);
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.onInit.add(Eomarvin2dDialog.init, Eomarvin2dDialog);
