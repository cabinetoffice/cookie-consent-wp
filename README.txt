=== Plugin Name ===
Contributors: Affinity Digital
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Short description of the plugin.

== Description ==

Adds a Cookie Consent banner to the top of each page and functionality that on accepting the cookies Google analytics is loaded (measurement cookies).

Plugin gives the ability to edit Cookie notice, add in Google analytics ID, log Cookie Notices and add in a shortcode to allow switching the Analytics on and off.

== Before Installation ==

Remove any Google Analytics code or plugins from the site.

Disable any Cookie Plugins

Create Cookie Policy Page

Create Cookie Preferences page


== Cookie Policy Page ==

Suggested URL: cookie-policy


Example content - see Appendix 1: 
(Note: This plugin was developed for a specific website, so some sections will not be relevant to your site. Please replace [Service Name] with your service.)

Example content with markup, see Appendix 2




== Cookie Preferences Page ==


Suggested URL: cookie-preferences

Example content - see Appendix 3: 

Example content with markup, see Appendix 4

If using Oxygen theme builder, please break down the content into sections as this will allow you to add in the Shortcode.


== Installation ==


1. Upload `co-cookie-consent` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress


== Set up ==

Cookie Consent Settings are available in the Settings menu


Settings


Google Analytics needs to be run from the Cookie consent plugin and is enabled when the user accepts the cookies.

Enter the Google Analytics ID into the correct field in the Settings tab e.g. UA-29068232-12

Select the Preference centre page from the drop down - as this will then link to the correct page from the Cookie Notice.



Cookie Notice


Example content

[Service Name] uses cookies to make the site work better for you. Some of these cookies are essential to how the site functions and others are optional. Optional cookies help us remember your settings, measure your use of the site and personalise how we communicate with you. Any data collected is anonymised and we do not set optional cookies unless you consent.

The text “Some of these cookies are essential to how the site functions and others are optional.” should be linked to the Cookie Policy page using the link facility on the WYSIWYG

We recommend that there should be no other formatting used.





== Cookie Preferences Shortcodes ==

The Shortcodes to add in functionality to change the Cookie Preference for the  “Cookies that measure website use” section are:

[cookiepreferences]
[cookiepreferencesconfirm]

[cookiepreferences] should be added below the “Cookies that measure website use” section.

[cookiepreferencesconfirm] should be added above the page title.

Shortcodes can be copied and pasted into the text if using the standard editor.

Adding Shortcode with Oxygen editor

In the Oxygen Editor for the Preferences page, select the section above where the shortcode will be e.g. the Cookies that measure

Click Add and Select Wordpress

Then copy and paste the shortcode [cookiepreferences] into the Full Shortcode field







== Changelog ==

= 1.0 =

= 1.0.1 =

Change the Cookie preferences confirmation block to it’s own Shortcode to allow placement above the page title.


== Appendix 1 Example Cookie Policy Content ==

Cookie Policy
Details about cookies on [Service Name]
[Service Name] puts small files (known as ‘cookies’) onto your computer to collect information about how you browse the site.

Cookies are small text files containing a string of characters that can be placed on your computer or mobile device that uniquely identify your browser or device. Cookies tell us if your computer or device has visited the site before. They help us understand how the site is being used, help you navigate between pages efficiently, help remember your preferences, and generally improve your browsing experience.

Cookies help us remember what notifications we send you and make our general communications relevant to you and your interests. Changes made to this policy can be identified by the ‘last updated’ date at the bottom of this page. Any changes to how your cookie data is processed will be promptly reflected in this policy and will immediately apply to you and your data. If these changes affect how your data is processed, the [Service Name] will take reasonable steps to let you know. 

Accepting all cookies via our website banner activates those cookie settings that are listed as optional on the settings page (that is, not ‘strictly necessary’). Your activation of all optional cookies lasts for 3 months and the banner will appear again. This gives you the opportunity to regularly re-visit and adjust your decision. Find out more about how to manage cookies, including how to delete and block them, on the Information Commission Office’s website. To learn more about how we protect and process your information see our Privacy Notice.

Strictly necessary cookies
These cookies do things like remember your preferences and the choices you make, to personalise your experience of using the [Service Name].

Cookies message
You may see a banner when you visit [Service Name] inviting you to accept cookies or review your settings. We’ll set cookies so that your computer knows you’ve seen it and not to show it again, and also to store your settings.

Name	Purpose	Expires
seen_cookie_message	Lets us know if you've seen our cookie message	1 year
cookie_policy	Saves your cookie consent settings	1 year
Messages across [Service Name]
We might display a message on all [Service Name] pages to tell you about an important event or situation. We’ll save a cookie that will let us know how many times you’ve seen it, or if you’ve dismissed it.

Name	Purpose	Expires
global_bar_seen	Remembers the number of times you've seen the message, or if you've dismissed it	12 weeks
Contacting [Service Name]
Name	Purpose	Expires
govuk_contact_referrer	This lets us know the last page you visited before using the contact [Service name] form	1 day
Cookies that measure website use
We use Google Analytics software (Universal Analytics) to collect anonymised information about how you use this site. We do this to help make sure the site is meeting the needs of its users and to help us make improvements. We do not allow Google to use or share the data about how you use this site.

Google Analytics stores information about:

how you got to the site
the pages you visit on this site and how long you spend on them
what you click on while you’re visiting the site
Google Analytics sets the following cookies.

Name	Purpose	Expires
_ga	This helps us count how many people visit [Service Name] by tracking if you've visited before	2 year
_gid	This helps us count how many people visit [Service Name] by tracking if you've visited before	24 hours
_gat	Used to manage the rate at which page view requests are made	10 minutes
You can opt out of Google Analytics cookies.

Cookies that help with our communications
Some [Service Name] pages may contain content from other sites, like YouTube or Flickr, which may set their own cookies. These sites are sometimes called ‘third party’ services. This tells us how many people are seeing the content and whether it’s useful.

In addition, if you share a link to a [Service Name] page, the service you share it on (for example, Facebook) may set a cookie. We have no control over cookies set on other websites - you can turn them off, but not through us.

YouTube videos
We use YouTube to show videos on some [Service Name] pages. YouTube sets cookies when you visit one of these pages.

Name	Purpose	Expires
_use_hitbox	This is a randomly generated number that identifies your browser	When you close your browser
VISITOR_INFO1_LIVE	Lets YouTube count the views of embedded YouTube videos	9 months
Twitter
If you click on our homepage timeline Twitter may receive information including the homepage URL, your IP address, browser type, operating system, and cookie information.

Twitter will never associate this web browsing history with users' names, email addresses, phone numbers, or Twitter handles, and they delete, obfuscate, or aggregate it after no longer than 30 days. Twitter sets the following cookies:

Name	Purpose	Expires
_twitter_sess	This allows the Twitter feed to function on our homepage	When you close your browser
ct0	These cookie allows users to share content from our website, in retweets and replies	6 year
external_referer	Used to identify you to Twitter, if you do not have a Twitter account or never accessed the Twitter.com website directly then it will assign a unique code to track your visit to the feed	1 week
guest_id	This cookie is used for targeting specific content and messages to the user	2 year
personalization_id	This cookie is used for targeting specific content and messages to the user	2 year
Twitter also own the cdn.syndication.twimg.com domain which places the following language cookie, enabling Twitter to determine the language settings of your browser, to better show you relevant information in the right language.

Name	Purpose	Expires
lang	This stores language preferences to serve content in the users preferred language	When you close your browser
Website registration (WordPress)
This website is built using the WordPress content management system. WordPress uses the following cookies to enable registered users to log into the website:

Name	Purpose	Expires
Wordpress_test_cookie	This site uses a number of WordPress plugins to aid functionality, and this cookie ensures they are enabled	When you close your browser
cookie_policy	This is used to indicate when a website administrator is logged in	When you close your browser
Change your cookie options
You can change which cookies you’re happy for us to use.

Last updated 18 June 2019



== Appendix 2 ==

Example content with styling / Markup

<p class="govuk-body">[Service Name] puts small files (known as ‘cookies’) onto your computer to collect information about how you browse the site.</p>
<p>Cookies are small text files containing a string of characters that can be placed on your computer or mobile device that uniquely identify your browser or device. Cookies tell us if your computer or device has visited the site before. They help us understand how the site is being used, help you navigate between pages efficiently, help remember your preferences, and generally improve your browsing experience.</p>

<p>Cookies help us remember what notifications we send you and make our general communications relevant to you and your interests. Changes made to this policy can be identified by the ‘last updated’ date at the bottom of this page. Any changes to how your cookie data is processed will be promptly reflected in this policy and will immediately apply to you and your data. If these changes affect how your data is processed, the [Service Name] will take reasonable steps to let you know. </p>

<p>Accepting all cookies via our website banner activates those cookie settings that are listed as optional on <a class="govuk-link" href="/preference-centre/">the settings page</a> (that is, not ‘strictly necessary’). Your activation of all optional cookies lasts for 3 months and the banner will appear again. This gives you the opportunity to regularly re-visit and adjust your decision. Find out more about how to manage cookies, including how to delete and block them, on the <a href="/cookie-policy">Information Commission Office’s website</a>. To learn more about how we protect and process your information see our <a href="https://dev.civilservicecommission.independent.gov.uk/cookie-policy">Privacy Notice</a>.</p>

<pre></pre>

<h2 class="govuk-heading-l"><strong>Strictly necessary cookies</strong></h2>
<p class="govuk-body">These cookies do things like remember your preferences and the choices you make, to personalise your experience of using the [Service Name].</p>

<h3 class="govuk-heading-m"><strong>Cookies message</strong></h3>
<p class="govuk-body">You may see a banner when you visit [Service Name] inviting you to accept cookies or review your settings. We’ll set cookies so that your computer knows you’ve seen it and not to show it again, and also to store your settings.</p>

<table style="width: 100%; border-collapse: collapse; border-style: none;">
<tbody>
<tr>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Name</span></span></strong></th>
<th class="stretch"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Purpose</span></span></strong></th>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Expires</span></span></strong></th>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">seen_cookie_message</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">Lets us know if you've seen our cookie message</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">1 year</span></td>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">cookie_policy</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">Saves your cookie consent settings</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">1 year</span></td>
</tr>
</tbody>
</table>
<pre></pre>
<h2></h2>
<h3 class="govuk-heading-m"><strong>Messages across [Service Name]</strong></h3>
<p class="govuk-body">We might display a message on all [Service Name] pages to tell you about an important event or situation. We’ll save a cookie that will let us know how many times you’ve seen it, or if you’ve dismissed it.</p>

<table style="width: 100%; border-collapse: collapse; border-style: none;">
<tbody>
<tr>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Name</span></span></strong></th>
<th class="stretch"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Purpose</span></span></strong></th>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Expires</span></span></strong></th>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">global_bar_seen</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">Remembers the number of times you've seen the message, or if you've dismissed it</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">12 weeks</span></td>
</tr>
</tbody>
</table>
<pre></pre>
<h3></h3>
<h3 class="govuk-heading-m"><strong>Contacting [Service Name]</strong></h3>
<table style="width: 100%; border-collapse: collapse; border-style: none;">
<tbody>
<tr>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Name</span></span></strong></th>
<th class="stretch"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Purpose</span></span></strong></th>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Expires</span></span></strong></th>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">govuk_contact_referrer</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">This lets us know the last page you visited before using the contact [Service name] form</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">1 day</span></td>
</tr>
</tbody>
</table>
<pre></pre>
<h2></h2>
<h2 class="govuk-heading-l"><strong>Cookies that measure website use</strong></h2>
<p class="govuk-body">We use Google Analytics software (Universal Analytics) to collect anonymised information about how you use this site. We do this to help make sure the site is meeting the needs of its users and to help us make improvements. We do not allow Google to use or share the data about how you use this site.</p>
<p class="govuk-body">Google Analytics stores information about:</p>

<ul class="govuk-list govuk-list--bullet">
 	<li>how you got to the site</li>
 	<li>the pages you visit on this site and how long you spend on them</li>
 	<li>what you click on while you’re visiting the site</li>
</ul>
<p class="govuk-body">Google Analytics sets the following cookies.</p>

<table style="width: 100%; border-collapse: collapse; border-style: none;">
<tbody>
<tr>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Name</span></span></strong></th>
<th class="stretch"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Purpose</span></span></strong></th>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Expires</span></span></strong></th>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">_ga</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">This helps us count how many people visit [Service Name] by tracking if you've visited before</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">2 year</span></td>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">_gid</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">This helps us count how many people visit [Service Name] by tracking if you've visited before</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">24 hours</span></td>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">_gat</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">Used to manage the rate at which page view requests are made</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">10 minutes</span></td>
</tr>
</tbody>
</table>
<p class="govuk-body">You can opt out of Google Analytics cookies.</p>

<h2></h2>
<h2 class="govuk-heading-l"><strong>Cookies that help with our communications</strong></h2>
<p class="govuk-body">Some [Service Name] pages may contain content from other sites, like YouTube or Flickr, which may set their own cookies. These sites are sometimes called ‘third party’ services. This tells us how many people are seeing the content and whether it’s useful.</p>
<p class="govuk-body">In addition, if you share a link to a [Service Name] page, the service you share it on (for example, Facebook) may set a cookie. We have no control over cookies set on other websites - you can turn them off, but not through us.</p>

<h3></h3>
<h3 class="govuk-heading-m"><strong>YouTube videos</strong></h3>
<p class="govuk-body">We use YouTube to show videos on some [Service Name] pages. YouTube sets cookies when you visit one of these pages.</p>

<table style="width: 100%; border-collapse: collapse; border-style: none;">
<tbody>
<tr>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Name</span></span></strong></th>
<th class="stretch"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Purpose</span></span></strong></th>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Expires</span></span></strong></th>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">_use_hitbox</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">This is a randomly generated number that identifies your browser</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">When you close your browser</span></td>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">VISITOR_INFO1_LIVE</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">Lets YouTube count the views of embedded YouTube videos</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">9 months</span></td>
</tr>
</tbody>
</table>
<pre></pre>
<h3 class="govuk-heading-m"><strong>Twitter</strong></h3>
<p class="govuk-body">If you click on our homepage timeline Twitter may receive information including the homepage URL, your IP address, browser type, operating system, and cookie information.</p>
<p class="govuk-body">Twitter will never associate this web browsing history with users' names, email addresses, phone numbers, or Twitter handles, and they delete, obfuscate, or aggregate it after no longer than 30 days. Twitter sets the following cookies:</p>

<table style="width: 100%; border-collapse: collapse; border-style: none;">
<tbody>
<tr>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Name</span></span></strong></th>
<th class="stretch"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Purpose</span></span></strong></th>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Expires</span></span></strong></th>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">_twitter_sess</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">This allows the Twitter feed to function on our homepage</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">When you close your browser</span></td>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">ct0</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">These cookie allows users to share content from our website, in retweets and replies</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">6 year</span></td>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">external_referer</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">Used to identify you to Twitter, if you do not have a Twitter account or never accessed the Twitter.com website directly then it will assign a unique code to track your visit to the feed</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">1 week</span></td>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">guest_id</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">This cookie is used for targeting specific content and messages to the user </span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">2 year</span></td>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">personalization_id</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">This cookie is used for targeting specific content and messages to the user</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">2 year</span></td>
</tr>
</tbody>
</table>
<p class="govuk-body">Twitter also own the cdn.syndication.twimg.com domain which places the following language cookie, enabling Twitter to determine the language settings of your browser, to better show you relevant information in the right language.</p>

<table style="width: 100%; border-collapse: collapse; border-style: none;">
<tbody>
<tr>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Name</span></span></strong></th>
<th class="stretch"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Purpose</span></span></strong></th>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Expires</span></span></strong></th>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">lang</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;"> This stores language preferences to serve content in the users preferred language</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">When you close your browser</span></td>
</tr>
</tbody>
</table>
<pre></pre>
<h3></h3>
<h3 class="govuk-heading-m"><strong>Website registration (WordPress)</strong></h3>
<p class="govuk-body">This website is built using the WordPress content management system. WordPress uses the following cookies to enable registered users to log into the website:</p>

<table style="width: 100%; border-collapse: collapse; border-style: none;">
<tbody>
<tr>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Name</span></span></strong></th>
<th class="stretch"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Purpose</span></span></strong></th>
<th class="no-wrap"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 10pt;">Expires</span></span></strong></th>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;"><span style="font-weight: 400;">Wordpress_test_cookie</span></span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">This site uses a number of WordPress plugins to aid functionality, and this cookie ensures they are enabled</span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">When you close your browser</span></td>
</tr>
<tr>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">cookie_policy</span></td>
<td class="stretch"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">This is used to indicate when a website administrator is logged in </span></td>
<td class="no-wrap"><span style="font-family: arial, helvetica, sans-serif; font-size: 9pt;">When you close your browser</span></td>
</tr>
</tbody>
</table>
<pre></pre>
<h3></h3>
<h2 class="govuk-heading-l"><strong>Change your cookie options</strong></h2>
<p class="govuk-body">You can <a class="govuk-link" href="/preference-centre/">change which cookies you’re happy for us to use</a>.</p>
<p class="govuk-body">Last updated 18 June 2019</p>

Lets us know that you’ve seen our cookie message

== Appendix 3 ==

(Note: This was developed for a specific service, so some sections will not be relevant to your site e.g. Homepage Twitter timeline)

[cookiepreferencesconfirm]
Preference Centre
Cookies on [Service Name].
 
Cookie settings
We use four types of cookie some of which support the performance and function of this site. You can choose which cookies you are happy for us to use.

 
Strictly necessary cookies
These essential cookies do things like:

remember the notifications you've seen so we do not show them to you again
remember your progress through a form
enable core functionality such as website registration, security, network management and accessibility
They always need to be on however they can be switched off by changing the settings on your browser.

   
Cookies that measure website use
These cookies collect information about

how you use our website - for instance, which pages you go to most. This data is used to make it easier for you to move through the site.
whether you came to our website from an affiliate site
These cookies provide us with statistics and do not collect information that identifies you. All information these cookies collect is aggregated and therefore anonymous.

[cookiepreferences]

Find out more about cookies

Homepage Twitter timeline
These essential cookies do things like:

If you click on our homepage timeline Twitter may receive information including the homepage URL, your IP address, browser type, operating system, and cookie information.

Twitter will never associate this web browsing history with users' names, email addresses, phone numbers, or Twitter handles, and they delete, obfuscate, or aggregate it after no longer than 30 days.

Read Twitter's Privacy Policy





== Appendix 4 ==



[cookiepreferencesconfirm]
<h1>Preference Centre</h1>
<h1 class="govuk-heading-xl">Cookies on [Service Name].</h1>
&nbsp;
<h2 class="govuk-heading-l"><strong>Cookie settings</strong></h2>
<p class="govuk-body">We use four types of cookie some of which support the performance and function of this site. You can choose which cookies you are happy for us to use.</p>
&nbsp;
<h2 class="govuk-heading-l"><strong>Strictly necessary cookies</strong></h2>
<p class="govuk-body">These essential cookies do things like:</p>

<ul class="govuk-list govuk-list--bullet">
 	<li>remember the notifications you've seen so we do not show them to you again</li>
 	<li>remember your progress through a form</li>
 	<li>enable core functionality such as website registration, security, network management and accessibility</li>
</ul>
<p class="govuk-body">They always need to be on however they can be switched off by changing the settings on your browser.</p>
&nbsp;
<h2 class="govuk-heading-l"><strong>Cookies that measure website use</strong></h2>
<p class="govuk-body">These cookies collect information about</p>
<ul class="govuk-list govuk-list--bullet">
 	<li>how you use our website - for instance, which pages you go to most. This data is used to make it easier for you to move through the site.</li>
 	<li>whether you came to our website from an affiliate site</li>
</ul>
<p class="govuk-body">These cookies provide us with statistics and do not collect information that identifies you. All information these cookies collect is aggregated and therefore anonymous.</p>
&nbsp;
[cookiepreferences]
&nbsp;
<p><a href="https://preprod.civilservicecommission.independent.gov.uk/cookie-policy/" data-rich-text-format-boundary="true">Find out more about cookies</a></p>

<h2 class="govuk-heading-l"><strong>Cookies that help with our communications</strong></h2>
<p class="govuk-body">These cookies may be set by third party websites and do things like</p>
<ul class="govuk-list govuk-list--bullet">
 	<li>connect you to social media</li>
 	<li>measure how you view YouTube videos that are on our site</li>
</ul>
<p class="govuk-body">These cookies provide us with statistics and do not collect information that identifies you. All information these cookies collect is aggregated and therefore anonymous.</p>
&nbsp;
<br>
<a class="govuk-link" href="/cookie-policy/">Find out more about cookies</a>
<h2 class="govuk-heading-l"><strong>Homepage Twitter timeline</strong></h2>
<p class="govuk-body">These essential cookies do things like:</p>
<p class="govuk-body">If you click on our homepage timeline Twitter may receive information including the homepage URL, your IP address, browser type, operating system, and cookie information.</p>
<p>Twitter will never associate this web browsing history with users' names, email addresses, phone numbers, or Twitter handles, and they delete, obfuscate, or aggregate it after no longer than 30 days.</p>
<p>Read <a href="https://twitter.com/en/privacy" class="govuk-link">Twitter's Privacy Policy</a></p>
