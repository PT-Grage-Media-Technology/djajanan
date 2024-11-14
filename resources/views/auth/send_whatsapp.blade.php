<!DOCTYPE html>
<html>
<head>
    <title>Send WhatsApp Message</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tambahkan CSS atau Bootstrap jika diperlukan -->
</head>
<body>
    <div class="container">
        <h1>Send WhatsApp Message</h1>
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('send.whatsapp') }}">
            @csrf
            <div class="form-group">
                <label for="number">Nomor Telepon:</label>
                <input type="text" id="number" name="number" value="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Pesan:</label>
                <input type="text" id="message" name="message" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
        </form>
    </div>
</body>
</html>
