<!DOCTYPE html>
<html>
<head>
    <title>Verify Email</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Verify Email
                    </div>
                    <div class="card-body">
                        <form action="{{ route('email.verify',$logins->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="number">OTP CODE</label>
                                <input type="number" class="form-control" name="number" placeholder="OTP CODE" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   
