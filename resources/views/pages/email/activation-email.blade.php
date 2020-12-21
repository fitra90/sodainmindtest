<h3>Hello, {{ $email }} !</h3>

<p>Thanks for your registration at argon network</p>
<p>Plase follow this  <a href="{{ URL::to('/activate-this/' . $email) }}">link</a> to activate your account</p>
<br>
<p>Sincerely,</p>
<p>Argon Network Team</p>