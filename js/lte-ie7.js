/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icons\'">' + entity + '</span>' + html;
	}
	var icons = {
			'1160-twitter' : '&#xe000;',
			'1160-youtube' : '&#xe001;',
			'1160-code' : '&#xe002;',
			'1160-github' : '&#xe003;',
			'1160-chrome' : '&#xe004;',
			'1160-firefox' : '&#xe005;',
			'1160-IE' : '&#xe006;',
			'1160-html5' : '&#xe007;',
			'1160-opera' : '&#xe008;',
			'1160-safari' : '&#xe009;',
			'1160-image' : '&#xe00a;',
			'1160-arrow-right' : '&#xe00b;',
			'1160-arrow-left' : '&#xe00c;',
			'1160-heart' : '&#xe00d;',
			'1160-bubbles' : '&#xe00e;',
			'1160-wrench' : '&#xe00f;',
			'1160-laptop' : '&#xe010;',
			'1160-screen' : '&#xe011;',
			'1160-mobile' : '&#xe012;',
			'1160-tablet' : '&#xe013;',
			'1160-calendar' : '&#xe014;',
			'1160-bullhorn' : '&#xe015;',
			'1160-books' : '&#xe016;',
			'1160-location' : '&#xe017;',
			'1160-user' : '&#xe018;',
			'1160-profile' : '&#xe019;',
			'1160-lightning' : '&#xe01a;',
			'1160-earth' : '&#xe01b;',
			'1160-cloud' : '&#xe01c;',
			'1160-facebook' : '&#xe01d;',
			'1160-coin' : '&#xe01e;',
			'1160-Plain_Logo' : '&#x62;',
			'1160-FIRST' : '&#x66;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/1160-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};