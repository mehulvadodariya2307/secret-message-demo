<div>
Hello <br>

You have received an encrypted message. Click the link below to decrypt it:<br>

<a href="{{ route('read-message', ['id' => $encryptedId]) }}" target="_blank">{{ route('read-message', ['id' => $encryptedId]) }}</a><br>

Thanks,<br><br>
{{ config('app.name') }}

</div>
