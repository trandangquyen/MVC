<h3>WordPress 4.7.2 Security Release</h3>
<p class='details'>
Posted January 26, 2017 by Aaron D. Campbell. Filed under Releases, Security.

WordPress 4.7.2 is now available. This is a security release for all previous versions and we strongly encourage you to update your sites immediately.
</p>
<p class='details'>
WordPress versions 4.7.1 and earlier are affected by three security issues:

    The user interface for assigning taxonomy terms in Press This is shown to users who do not have permissions to use it. Reported by David Herrera of Alley Interactive.
    WP_Query is vulnerable to a SQL injection (SQLi) when passing unsafe data. WordPress core is not directly vulnerable to this issue, but we’ve added hardening to prevent plugins and themes from accidentally causing a vulnerability. Reported by Mo Jangda (batmoo).
    A cross-site scripting (XSS) vulnerability was discovered in the posts list table. Reported by Ian Dunn of the WordPress Security Team.
    An unauthenticated privilege escalation vulnerability was discovered in a REST API endpoint. Reported by Marc-Alexandre Montpas of Sucuri Security. *

Thank you to the reporters of these issues for practicing responsible disclosure.

Download WordPress 4.7.2 or venture over to Dashboard → Updates and simply click “Update Now.” Sites that support automatic background updates are already beginning to update to WordPress 4.7.2.

Thanks to everyone who contributed to 4.7.2.

* Update: An additional serious vulnerability was fixed in this release and public disclosure was delayed. For more information on this vulnerability, additional mitigation steps taken, and an explanation for why disclosure was delayed, please read Disclosure of Additional Security Fix in WordPress 4.7.2.
</p>