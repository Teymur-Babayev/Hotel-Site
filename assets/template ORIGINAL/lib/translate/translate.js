function ChangeLang(a) {
	var b, elemento = "";
	if (document.createEvent) {
		var c = document.createEvent("HTMLEvents");
		c.initEvent("click", true, true)
	}
	if (a == 'pt') {
		elemento = $(".goog-te-banner-frame:eq(0)").contents().find("button[id*='restore']")
	} else {
		switch (a) {
		case 'de':
			b = "Alem";
			break;
		case 'es':
			b = "Espanhol";
			break;
		case 'fr':
			b = "Fran";
			break;
		case 'en':
			b = "Ing";
			break;
		case 'pl':
			b = "Pol";
			break;	
		case 'ru':
			b = "Russo";
			break;	
		case 'it':
			b = "Italiano";
			break
		}
		elemento = $(".goog-te-menu-frame:eq(0)").contents().find("span:contains('" + b + "')");
	}
	if (elemento.length > 0) {
		if (document.createEvent) {
			elemento[0].dispatchEvent(c)
		} else {
			elemento[0].click()
		}
	}
}
function googleTranslateElementInit() {
	new google.translate.TranslateElement({
		pageLanguage: 'pt',
		autoDisplay: false,
		includedLanguages: 'de,es,fr,en,pl,ru,it',
		layout: google.translate.TranslateElement.InlineLayout.SIMPLE
	},
	'google_translate_element');
}