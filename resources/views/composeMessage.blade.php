<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message Encryption</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Create a email message</h2>
    @session('success')
        <div class="alert alert-success" role="alert">
            {{ $value }}
        </div>
    @endsession
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('compose-message') }}">
        @csrf
        <div class="form-group">
            <label for="key">Encryption key:</label>
            <input type="text" class="form-control" id="key" name="key" maxlength="10" minlength="5">
        </div>
        <div class="form-group">
            <label for="recipient_email">Recipient Email:</label>
            <input type="email" class="form-control" id="recipient_email" name="recipient_email">
        </div>
        <div class="form-group">
            <label for="expire_in_hours">Expire Time:</label>
            <select class="form-control" id="expire_in_hours" name="expire_in_hours">
                <option value="0">Read once</option>
                <option value="1">1 hour</option>
                <option value="6">6 hours</option>
                <option value="12">12 hours</option>
                <option value="24">24 hours</option>
                <option value="48">48 hours</option>
            </select>
        </div>
        <div class="form-group">
            <label for="message">Enter message:</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send email</button>
    </form>

    @if(isset($encrypted_message))
        <div class="mt-3">
            <strong>Encrypted message:</strong><br>
            {{ $encrypted_message }}
        </div>
    @endif
</div>

</body>
</html>
