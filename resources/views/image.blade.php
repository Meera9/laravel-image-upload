<!DOCTYPE html>
<html>
<head>
    <title>Laravel Image Upload - <a href="https://www.mtitsolutions.in/">MTitsolutions</a></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            Laravel Image Upload - <a href="https://www.mtitsolutions.in/">MTitsolutions</a>
        </div>
        <div class="card-body">
           @if(Session::has('success'))
            <div class="alert alert-success">
              <strong>Success!</strong> <p>{{Session::get('success')}}</p>
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger">
              <strong>Error!</strong> <p>{{Session::get('error')}}</p>
            </div>
            @endif
            <form action="{{ route('image-save') }}" method="POST" class="image_upload" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" class="form-control" required>
                <br>
                <button class="btn btn-primary">Upload File</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
