<p>Dear {{ $userName }},</p>

<p>You have requested to have your password reset for your account at {{ $siteTitle }}</p>

<p>Please visit this url to reset your password:</p>

<p><a href="{{ $RESET_LINK }}" target="_blank">{{ $RESET_LINK }}</a></p>

<p><strong>If you didn&#39;t make this request, you can ignore this email.</strong><br />
&nbsp;</p>

<p>Sincerely,</p>

<p>The {{$siteTitle}} Team</p>
