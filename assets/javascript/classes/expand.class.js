/**
 * Expand / collapse
 */

var expand = {
	init: function() {
		var expanders = document.querySelectorAll('.js-expandtarget');
		for (i = 0; i < expanders.length; i++) {
			var expanderid = expanders[i].getAttribute('id');
			if(cookie.get(expanderid)) {
				expanders[i].parentNode.classList.add('isActive');
			}
			else {
				expanders[i].parentNode.classList.add('isClosed');
			}
		}

		var expandbuttons = document.querySelectorAll('.js-expandbutton');
		for (i = 0; i < expandbuttons.length; i++) {
			expandbuttons[i].addEventListener('click', expand.toggle, false);
		}
	},

	toggle: function(event) {
		event.preventDefault();
		var button = event.target;
		var targetid = button.getAttribute('href');
		var cookieid = targetid.substring(1);
		var target = document.querySelector(targetid);
		var expandparent = target.parentNode;

		if(expandparent.classList.contains('isClosed')) {
			button.classList.add('isActive');
			expandparent.classList.remove('isClosed');
			expandparent.classList.add('isOpen');
			cookie.set(cookieid,'open');
		}
		else {
			button.classList.remove('isActive');
			expandparent.classList.remove('isOpen');
			expandparent.classList.add('isClosed');
			cookie.erase(cookieid);
		}
	}
};
