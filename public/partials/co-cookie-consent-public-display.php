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
<div class="govuk-form-group">
	<fieldset class="govuk-fieldset" aria-describedby="cookie-website-hint"><legend class="govuk-fieldset__legend govuk-fieldset__legend--xl"> </legend>
		<div class="govuk-radios govuk-radios--inline">
			<div class="govuk-radios__item">
				<input id="cookie-website-on" class="govuk-radios__input" name="cookie-website" type="radio" value="on" /> <label class="govuk-label govuk-radios__label" for="cookie-website-on">On</label>
				<div class="check"></div>
			</div>
			<div class="govuk-radios__item">
				<input id="cookie-website-off" class="govuk-radios__input" name="cookie-website" type="radio" value="off" /> <label class="govuk-label govuk-radios__label" for="cookie-website-off">Off</label>
				<div class="check">
					<div class="inside"></div>
				</div>
			</div>
		</div>
	</fieldset>
	<button id="btn-save" class="gem-c-button govuk-button " data-module="govuk-button"> Save changes </button>
</div>
