<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message Decryption</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Decrypt Message</h2>
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
    @if(isset($expires))
        <div class="mt-3">
            <strong>Expire message:</strong> Your message expired at {{ $expires }}
        </div>
    @else
        @if(isset($decrypted_message))
            <div class="mt-3">
                <strong>Decrypted message:</strong><br>
                {{ $decrypted_message }}
            </div>
        @else
            <form method="post">
                @csrf
                <div class="form-group">
                    <label for="key">Enter encryption key:</label>
                    <input type="text" class="form-control" id="key" name="key">
                </div>
                <button type="submit" class="btn btn-primary">Decrypt Message</button>
            </form>
        @endif
    @endif
</div>

</body>
</html>
