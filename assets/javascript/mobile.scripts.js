/**
 * mobile.scripts.js
 *
 * Mobile specific scripts
 */

// Only serve javascript to 'Cutting the Mustard' browsers
if(enhance.ctm()){

	(function (window, document) {

		/* Initiate all available classes */
		alerts.init(push_message);                // Init alerts
		expand.init();                            // Init expand / collapse
		navMain.init();                           // Init main navigation
		lazyload.init();                          // Init lazyload

	})(window, document);

}
