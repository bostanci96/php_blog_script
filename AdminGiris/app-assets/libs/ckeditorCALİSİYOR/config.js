/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	 config.language = 'tr'; //CKEDITOR arayüz dili
    config.colorButton_enableMore = true; //belirtilenler dışında renk  seçimini  engelleme
    config.colorButton_enableAutomatic = true;
    config.contentsLanguage = 'tr';//Editör içeriği oluşturmak için kullanılan yazı dilinin dil kodu.
     //Dosya Yöneticisi
    config.filebrowserBrowseUrl = 'app-assets/libs/ckfinder/ckfinder.html';// Öntanımlı Dosya Yöneticisi
    config.filebrowserImageBrowseUrl = 'app-assets/libs/ckfinder/ckfinder.html?type=image'; // Sadece Resim Dosyalarını Gösteren Dosya Yöneticisi
    config.removeDialogTabs = 'link:upload;image:upload'; // Upload işlermlerini dosya Yöneticisi ile yapacağımız için upload butonlarını kaldırıyoruz
    //---------
  	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];
config.enterMode = CKEDITOR.ENTER_BR;
config.shiftEnterMode = CKEDITOR.ENTER_BR;
	config.removeButtons = 'Save,NewPage,ExportPdf,Preview,Print,Templates,Scayt,About,Strike,Subscript,Superscript,Language,BidiLtr,BidiRtl,CreateDiv,Blockquote,Indent,Outdent,Replace,Find';
config.extraPlugins = 'file-manager', 'file-manager';

    config.Flmngr = {
        urlFileManager: 'https://www.webkodlamam.com/ozelblog/ftr/flmngr.php',
        urlFiles: 'https://www.webkodlamam.com/ozelblog/ftr/images/'
    }
};
