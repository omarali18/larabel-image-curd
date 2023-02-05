<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
          border: 1px solid;
        };
        th,td{
            border: 1px solid;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div >
        <div style="display:flex; justify-content:center; align-item:center; margin-bottom:50px;">
            <h1>All Products</h1>
            <a href="/"> <button  style="padding: 5px;height:40px; margin-top:20px; margin-left: 50px">Add Product</button></a>

        </div>
        <div >
            <table style="margin: 0 auto; ">
                <thead>
                    <tr>
                        <th style="padding: 10px">ID</th>
                        <th style="padding: 10px">Product Image</th>
                        <th style="padding: 10px">Product Name</th>
                        <th style="padding: 10px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($products as $key=>$product )
                        <tr>
                        <td style="padding: 10px">{{ $product->id }}</td>
                        <td style="padding: 10px"><img style="width: 100px; height:50px" src="{{ asset('image/products/'.$product->image) }}" alt=""></td>
                        <td style="padding: 10px">{{ $product->name }}</td>
                        <td style="padding: 10px">
                            <a href="/edit-photo/{{ $product->id }}"><button  style="padding: 5px;height:40px; ">Edit</button></a>
                            <a href="/delete-photo/{{ $product->id }}" ><button  style="padding: 5px;height:40px; ">Delete</button></a>
                        </td>
                    </tr>
                        @endforeach
                        
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>