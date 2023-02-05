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
            <h1>Photo Upload</h1>
            <a href="/all-products"> <button  style="padding: 5px;height:40px; margin-top:20px; margin-left: 50px">All Products</button></a>
            {{-- <button  style="padding: 5px;height:40px; margin-top:20px; margin-left: 50px">All Products</button> --}}

        </div>
        {{-- @if ($errors->any())
    <div style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
@if (Session::has('msg'))
    <p style="color: green">{{ Session::get('msg') }}</p>
    
@endif
        <form action="/store-product" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" id=""> <br><br>
            <input type="file" name="image" id=""><br><br>
            <button>Upload</button>
        </form>
    </div>
</body>
</html>