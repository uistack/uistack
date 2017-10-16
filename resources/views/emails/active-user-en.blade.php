<p>Dear {{ $username }},</p>

<p>You have successfully registered on the&nbsp;{{ $SITE_TITLE }}</p>

<p>Please activate your account by clicking on the link provided below.</p>

<p><a href="{{ $VERIFICATION_LINK }}" target="_blank">{{ $VERIFICATION_LINK }}</a></p>

<p>For your reference.</p>

<p>Email: {{ $email }}</p>

<p>Password: {{ $password }}</p>

<p>Sincerely,</p>

<p>The {{ $SITE_TITLE }} Team</p>

<p>If you are having trouble clicking the confirm account link, copy and paste the URL below into your web browser.</p>

<p>{{ $VERIFICATION_LINK }}</p>
