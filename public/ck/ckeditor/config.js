CKEDITOR.editorConfig = function( config ) {
	config.removeButtons = 'Underline,Subscript,Superscript';
	config.format_tags = 'p;h1;h2;h3;pre';
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.startupFocus = true;
	config.toolbarGroups = [
		{ name: 'links' },
		{ name: 'insert' , groups: [ 'image' ]},
		{ name: 'basicstyles', groups: [ 'basicstyles'] },
		{ name: 'paragraph',   groups: [ 'list', 'blocks', 'align'] },
		{ name: 'styles' },
		{ name: 'colors' }
	];
};
