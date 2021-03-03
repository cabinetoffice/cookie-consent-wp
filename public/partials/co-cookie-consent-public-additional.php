<?php

/**
 * Add JS script to the header with the Google Tag ID
 *
 *
 * @link       https://www.affinity-digital.com
 * @since      2.0.0
 *
 * @package    Co_Cookie_Consent
 * @subpackage Co_Cookie_Consent/public/partials
 */

?>
<script>

function createCookie(key, value, date) {
	let expiration = date
		? new Date(date).toUTCString()
		: new Date(new Date().getTime() + (365 * 24 * 60 * 60 * 1000)).toUTCString();
	let cookie = escape(key) + "=" + escape(value) + ";expires=" + expiration + "; path=/";
	document.cookie = cookie;
}

function readCookie(name) {
	let key = name + "=";
	let cookies = document.cookie.split(';');
	for (let i = 0; i < cookies.length; i++) {
		let cookie = cookies[i];
		while (cookie.charAt(0) === ' ') {
			cookie = unescape(cookie.substring(1, cookie.length));
		}
		if (cookie.indexOf(key) === 0) {
			return unescape(cookie.substring(key.length, cookie.length));
		}
	}
	return null;
}

function storeCookiePolicy(essential, settings, usage, campaigns) {
	createCookie("cookie_policy", JSON.stringify({
		"essential": essential,
		"settings": settings,
		"usage": usage,
		"campaigns": campaigns
	}));
}

function deleteCookiePolicy() {
	createCookie("cookie_policy", "", new Date(2000, 1, 1));
}

function retrieveCookiePolicy() {
	let cookiePolicy = readCookie("cookie_policy");
	return cookiePolicy
		? JSON.parse(cookiePolicy)
		: { "essential": false, "settings": false, "usage": false };
}

function gtag() {
	dataLayer.push(arguments);
}

function setupGoogleAnalyticsTagIfOptedIn() {
	let cookiePolicy = retrieveCookiePolicy();
	if (!cookiePolicy || !cookiePolicy.usage) {
		return;
	}

	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date()); 
	gtag('config', '<?php echo $google_tag_id;?>');

	var head = document.getElementsByTagName('head')[0];
	var js = document.createElement("script");
	js.src = "https://www.googletagmanager.com/gtag/js?id=<?php echo $google_tag_id;?>";
	js.async = "true";
	head.appendChild(js);
}

function setupCookieChoices() {
	let cookieMsg = document.getElementById("global-cookie-message");
	let cookieConfirm = document.getElementById("global-cookie-confirm");
	let cookieAcceptButton = document.getElementById("btn-accept-cookies");
	let cookieSettingsButton = document.getElementById("btn-cookie-settings");
	let cookieHideConfirmButton = document.getElementById("btn-hide-cookie-confirm");

	let cookiePolicy = retrieveCookiePolicy();
	if (!cookiePolicy || !cookiePolicy.essential) {
		cookieMsg.style.display = "block";
	}

	cookieAcceptButton.onclick = function() {
		storeCookiePolicy(true, true, true, true);
		cookieMsg.style.display = "none";
		cookieConfirm.style.display = "block";
	}

	cookieRejectButton.onclick = function() {
		storeCookiePolicy(false, false, false, false);
		cookieMsg.style.display = "none";
		cookieConfirm.style.display = "block";
	}
	cookieSettingsButton.onclick = function() {
		location.href = "<?php echo $preference_link;?>";
	}
	cookieHideConfirmButton.onclick = function() {
		cookieConfirm.style.display = "none";
	}
}

setupGoogleAnalyticsTagIfOptedIn();

</script>