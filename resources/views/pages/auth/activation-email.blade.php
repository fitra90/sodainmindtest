<h3>Hello, {{ $email }} !</h3>

<p>Thanks for your registration at argon network</p>
<p>Plase follow this  <a href="{{ URL::to('auth/activate-this/' . $data['email']) }}">link</a> to activate your account</p>
<br>
<p>Sincerely,</p>
<p>Argon Network Team</p>