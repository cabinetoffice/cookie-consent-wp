<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.affinity-digital.com
 * @since      1.0.1
 *
 * @package    Co_Cookie_Consent
 * @subpackage Co_Cookie_Consent/public/partials
 */

?>
<div id="save_confirm" class="cookie-settings__confirmation" data-cookie-confirmation="true" style="display: none">
	<section aria-label="Notice" aria-live="polite" class="gem-c-notice govuk-!-margin-bottom-8" role="region">
		<h2 class="gem-c-notice__title">Your cookie settings were saved</h2>
		<p>Government services may set additional cookies and, if so, will have their own cookie policy and banner.</p>
		<a class="govuk_link cookie-settings__prev-page" data-module="track-click" data-track-action="Back to previous page" data-track-category="cookieSettings" href="javascript:window.history.back();">Go back to the page you were looking at
		</a>
	</section>
</div>
