<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="text-align: center; margin:35px;">
        <div style="display:flex; justify-content:center; align-item:center;">
            <h1>Edit Photo</h1>
            <a href="/all-products"> <button  style="padding: 5px;height:40px; margin-top:20px; margin-left: 50px">All Products</button></a>

        </div>
@if (Session::has('msg'))
    <p style="color: green">{{ Session::get('msg') }}</p>
    
@endif
        <form action="/update-photo/{{ $editPhoto->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" id="" value="{{ $editPhoto->name }}"> <br><br>
            <img style="width:100; height:80px" src="{{ asset("image/products/".$editPhoto->image ) }}" alt=""> <br><br>
            <input type="file" name="image" id=""><br><br>
            <button>Update</button>
        </form>
    </div>
</body>
</html>