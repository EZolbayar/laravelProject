/*
 * CKFinder
 * ========
 * http://ckfinder.com
 * Copyright (C) 2007-2011, CKSource - Frederico Knabben. All rights reserved.
 *
 * The software, this file, and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying, or distributing this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 *
 */

/**
 * @fileOverview Defines the {@link CKFinder.lang} object for the English
 *		languages. This is the base file for all translations.
 */

/**
 * Contains the dictionary of languages entries.
 * @namespace
 */
CKFinder.lang['en'] =
{
	appTitle : 'CKFinder',

	// Common messages and labels.
	common :
	{
		// Put the voice-only part of the label in the span.
		unavailable		: '%1<span class="cke_accessibility">, unavailable</span>',
		confirmCancel	: 'Some of the options were changed. Are you sure you want to close the dialog window?',
		ok				: 'OK',
		cancel			: 'Cancel',
		confirmationTitle	: 'Confirmation',
		messageTitle	: 'Information',
		inputTitle		: 'Question',
		undo			: 'Undo',
		redo			: 'Redo',
		skip			: 'Skip',
		skipAll			: 'Skip all',
		makeDecision	: 'What action should be taken?',
		rememberDecision: 'Remember my decision'
	},


	// Language direction, 'ltr' or 'rtl'.
	dir : 'ltr',
	HelpLang : 'en',
	LangCode : 'en',

	// Date Format
	//		d    : Day
	//		dd   : Day (padding zero)
	//		m    : Month
	//		mm   : Month (padding zero)
	//		yy   : Year (two digits)
	//		yyyy : Year (four digits)
	//		h    : Hour (12 hour clock)
	//		hh   : Hour (12 hour clock, padding zero)
	//		H    : Hour (24 hour clock)
	//		HH   : Hour (24 hour clock, padding zero)
	//		M    : Minute
	//		MM   : Minute (padding zero)
	//		a    : Firt char of AM/PM
	//		aa   : AM/PM
	DateTime : 'm/d/yyyy h:MM aa',
	DateAmPm : ['AM','PM'],

	// Folders
	FoldersTitle	: 'Фолдерууд',
	FolderLoading	: 'Уншиж байна...',
	FolderNew		: 'Шинэ фолдерын нэрээ оруулна уу: ',
	FolderRename	: 'Шинэ фолдерын нэрээ оруулна уу: ',
	FolderDelete	: '"%1" энэ фолдерыг устгах уу?',
	FolderRenaming	: ' (Нэрийг сольж байна...)',
	FolderDeleting	: ' (Устгаж байна...)',

	// Files
	FileRename		: 'Шинэ файлын нэрээ оруулна уу: ',
	FileRenameExt	: 'Файлын өргөтгөлийг солих уу ?',
	FileRenaming	: 'Нэр сольж байна...',
	FileDelete		: '"%1" энэ файлын устгах уу?',
	FilesLoading	: 'Уншиж байна...',
	FilesEmpty		: 'Фолдер хоосон байна.',
	FilesMoved		: 'File %1 moved to %2:%3.',
	FilesCopied		: 'File %1 copied to %2:%3.',

	// Basket
	BasketFolder		: 'Basket',
	BasketClear			: 'Clear Basket',
	BasketRemove		: 'Remove from Basket',
	BasketOpenFolder	: 'Open Parent Folder',
	BasketTruncateConfirm : 'Do you really want to remove all files from the basket?',
	BasketRemoveConfirm	: 'Do you really want to remove the file "%1" from the basket?',
	BasketEmpty			: 'No files in the basket, drag and drop some.',
	BasketCopyFilesHere	: 'Copy Files from Basket',
	BasketMoveFilesHere	: 'Move Files from Basket',

	BasketPasteErrorOther	: 'File %s error: %e',
	BasketPasteMoveSuccess	: 'The following files were moved: %s',
	BasketPasteCopySuccess	: 'The following files were copied: %s',

	// Toolbar Buttons (some used elsewhere)
	Upload		: 'Файл хуулах',
	UploadTip	: 'Шинэ файл хуулах',
	Refresh		: 'Дахин ачааллах',
	Settings	: 'Тохиргоо',
	// Context Menus
	Select			: 'Бүтнээр сонгох',
	SelectThumbnail : 'Жижиг хэмжээтэй сонгох',
	View			: 'Харах',
	Download		: 'Татах',

	NewSubFolder	: 'Шинэ subfolder үүсгэх',
	Rename			: 'Нэр солих',
	Delete			: 'Устгах',

	CopyDragDrop	: 'Файлыг хуулах',
	MoveDragDrop	: 'Файлыг бүр мөсөн хуулах',

	// Dialogs
	RenameDlgTitle		: 'Нэр солих',
	NewNameDlgTitle		: 'Шинэ нэр',
	FileExistsDlgTitle	: 'Ийм нэртэй файл байна!',
	SysErrorDlgTitle : 'Систем алдаа',

	FileOverwrite	: 'Дарж хадгалах',
	FileAutorename	: 'Автоматаар нэр солих',

	// Generic
	OkBtn		: 'OK',
	CancelBtn	: 'Болих',
	CloseBtn	: 'Хаах',

	// Upload Panel
	UploadTitle			: 'Шинэ файл хуулах',
	UploadSelectLbl		: 'Хуулах файлаа сонгох',
	UploadProgressLbl	: 'Хуулж байна. Түр хүлээнэ үү...',
	UploadBtn			: 'Сонгогдсон файлыг хуулах',
	UploadBtnCancel		: 'Болих',

	UploadNoFileMsg		: 'Өөрийн компьютерээс файл сонгох.',
	UploadNoFolder		: 'Файл хуулахаас өмнө фолдероо сонгох.',
	UploadNoPerms		: 'Файл хуулах боломжгүй байна.',
	UploadUnknError		: 'Хуулахад алдаа гарлаа.',
	UploadExtIncorrect	: 'Файлын төрөл энэ фолдерт тохирохгүй байна.',

	// Flash Uploads
	UploadLabel			: 'Олон файл хуулах',
	UploadTotalFiles	: 'Нийт файлын тоо:',
	UploadTotalSize		: 'Нийт файлын хэмжээ:',
	UploadAddFiles		: 'Файл нэмэх',
	UploadClearFiles	: 'Цэвэрлэх',
	UploadCancel		: 'Цуцлах',
	UploadRemove		: 'Хасах',
	UploadRemoveTip		: 'Хасах !f',
	UploadUploaded		: '!n% хуулагдсан',
	UploadProcessing	: 'Файл хуулж байна...',

	// Settings Panel
	SetTitle		: 'Тохиргоо',
	SetView			: 'Харагдаж:',
	SetViewThumb	: 'Зурган байдлаар',
	SetViewList		: 'Жагсаалт байдлаар',
	SetDisplay		: 'Харуулах утгыг сонгох:',
	SetDisplayName	: 'Файлын нэр',
	SetDisplayDate	: 'Огноо',
	SetDisplaySize	: 'Файлын хэмжээ',
	SetSort			: 'Эрэмбэлэх:',
	SetSortName		: 'Файлын нэрээр',
	SetSortDate		: 'Файлын огноогоор',
	SetSortSize		: 'Файлын хэмжээгээр',

	// Status Bar
	FilesCountEmpty : '<Хоосон фолдер>',
	FilesCountOne	: '1 файл',
	FilesCountMany	: '%1 файл',

	// Size and Speed
	Kb				: '%1 kB',
	KbPerSecond		: '%1 kB/секунд',

	// Connector Error Messages.
	ErrorUnknown	: 'Алдаа гарч амжилтгүй боллоо. (Алдаа %1)',
	Errors :
	{
	 10 : 'Буруу үйлдэл.',
	 11 : 'The resource type was not specified in the request.',
	 12 : 'The requested resource type is not valid.',
	102 : 'Invalid file or folder name.',
	103 : 'It was not possible to complete the request due to authorization restrictions.',
	104 : 'It was not possible to complete the request due to file system permission restrictions.',
	105 : 'Invalid file extension.',
	109 : 'Invalid request.',
	110 : 'Unknown error.',
	115 : 'A file or folder with the same name already exists.',
	116 : 'Folder not found. Please refresh and try again.',
	117 : 'File not found. Please refresh the files list and try again.',
	118 : 'Source and target paths are equal.',
	201 : 'A file with the same name is already available. The uploaded file was renamed to "%1".',
	202 : 'Invalid file.',
	203 : 'Invalid file. The file size is too big.',
	204 : 'The uploaded file is corrupt.',
	205 : 'No temporary folder is available for upload in the server.',
	206 : 'Upload cancelled due to security reasons. The file contains HTML-like data.',
	207 : 'Хуулагдсан файлын нэр "%1" боллоо.',
	300 : 'Бүр мөсөн хуулах үед алдаа гарлаа.',
	301 : 'Хуулах үед алдаа гарлаа.',
	500 : 'Нууцлал хамгаалалын алдаа гарлаа. Админтай холбогдож тодруулна уу',
	501 : 'Зурган хэлбэрээр харах боломжгүй байна'
	},

	// Other Error Messages.
	ErrorMsg :
	{
		FileEmpty		: 'The file name cannot be empty.',
		FileExists		: 'File %s already exists.',
		FolderEmpty		: 'The folder name cannot be empty.',

		FileInvChar		: 'The file name cannot contain any of the following characters: \n\\ / : * ? " < > |',
		FolderInvChar	: 'The folder name cannot contain any of the following characters: \n\\ / : * ? " < > |',

		PopupBlockView	: 'It was not possible to open the file in a new window. Please configure your browser and disable all popup blockers for this site.',
		XmlError		: 'It was not possible to properly load the XML response from the web server.',
		XmlEmpty		: 'It was not possible to load the XML response from the web server. The server returned an empty response.',
		XmlRawResponse	: 'Raw response from the server: %s'
	},

	// Imageresize plugin
	Imageresize :
	{
		dialogTitle		: 'Зургийн хэмжээг өөрчлөх %s',
		sizeTooBig		: 'Үндсэн зургийн хэмжээнээс хэтэрлээ (%size).',
		resizeSuccess	: 'Зургийн хэмжээ амжилттай солигдлоо.',
		thumbnailNew	: 'Шинэ thumbnail үүсгэх',
		thumbnailSmall	: 'Жижиг хэмжээ: (%s)',
		thumbnailMedium	: 'Дунд хэмжээ: (%s)',
		thumbnailLarge	: 'Том хэмжээ: (%s)',
		newSize			: 'Шинэ хэмжээ зааж өгөх',
		width			: 'Өндөрийн хэмжээ',
		height			: 'Өргөний хэмжээ',
		invalidHeight	: 'Боломжгүй өндөрийн хэмжээ.',
		invalidWidth	: 'Боломжгүй өргөний хэмжээ.',
		invalidName		: 'Боломжгүй файлын нэр.',
		newImage		: 'Шинэ зураг үүсгэх',
		noExtensionChange : 'Файлын өргөтгөлийг солих боломжгүй байна.',
		imageSmall		: 'Хэт жижиг зураг байна.',
		contextMenuName	: 'Хэмжээг өөрчлөх',
		lockRatio		: 'Зургийн харьцааг түгжих',
		resetSize		: 'Хуучин хэмжээнд буцаах'
	},

	// Fileeditor plugin
	Fileeditor :
	{
		save			: 'Хадгалах',
		fileOpenError	: 'Файл нээж болохгүй байна.',
		fileSaveSuccess	: 'Файл амжилттай хадгалагдлаа.',
		contextMenuName	: 'Засах',
		loadingFile		: 'Уншиж байна. Түр хүлээнэ үү...'
	},

	Maximize :
	{
		maximize : 'Maximize',
		minimize : 'Minimize'
	}
};
