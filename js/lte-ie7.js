/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icons\'">' + entity + '</span>' + html;
	}
	var icons = {
			'1160-facebook' : '&#x66;&#x62;',
			'1160-twitter' : '&#x74;&#x77;&#x69;&#x74;',
			'1160-youtube' : '&#x79;&#x74;',
			'1160-code' : '&#x3c;&#x2f;&#x3e;',
			'1160-github' : '&#x67;&#x69;&#x74;',
			'1160-chrome' : '&#x63;&#x72;&#x6d;',
			'1160-firefox' : '&#x66;&#x66;',
			'1160-IE' : '&#x69;&#x65;',
			'1160-html5' : '&#x68;&#x74;&#x35;',
			'1160-opera' : '&#x6f;&#x70;&#x72;',
			'1160-safari' : '&#x73;&#x61;&#x66;',
			'1160-image' : '&#x70;&#x69;&#x63;',
			'1160-arrow-right' : '&#x72;&#x61;&#x72;&#x72;',
			'1160-arrow-left' : '&#x6c;&#x61;&#x72;&#x72;',
			'1160-heart' : '&#x68;&#x72;&#x74;',
			'1160-bubbles' : '&#x63;&#x68;&#x74;',
			'1160-wrench' : '&#x6d;&#x65;&#x63;&#x68;',
			'1160-laptop' : '&#x6c;&#x61;&#x70;&#x74;&#x70;',
			'1160-screen' : '&#x64;&#x73;&#x6b;&#x74;&#x70;',
			'1160-mobile' : '&#x6d;&#x6f;&#x62;&#x6c;',
			'1160-tablet' : '&#x74;&#x61;&#x62;',
			'1160-calendar' : '&#x63;&#x61;&#x6c;',
			'1160-bullhorn' : '&#x6d;&#x69;&#x63;',
			'1160-books' : '&#x6c;&#x69;&#x62;',
			'1160-location' : '&#x6c;&#x6f;&#x63;',
			'1160-user' : '&#x73;&#x75;&#x69;&#x74;',
			'1160-profile' : '&#x64;&#x6f;&#x63;',
			'1160-lightning' : '&#x73;&#x68;&#x6f;&#x63;&#x6b;',
			'1160-earth' : '&#x77;&#x72;&#x6c;&#x64;',
			'1160-cloud' : '&#x63;&#x6c;&#x64;'
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