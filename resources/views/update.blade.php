<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        input, textarea, select{
            border: 1px solid black;
            width: 100%;
            border-radius: 5px;
            padding: 3px 5px;
        }
    </style>
</head>
<body>
    <div class="h-screen flex justify-center items-center">
        <div class="container mx-2 shadow-md lg:w-2/4 lg:mx-0 p-4">
            <h2 class="text-center my-4 text-2xl text-green-600 font-bold">Update Data</h2>
            <form method="post" action="/update" class="w-full">
                {{csrf_field()}}
                <label for="nama">Nama</label><br>
                <input type="hidden" name="id" value="{{$contents['data']['id']}}">
                <input type="text" name="nama" class="mt-1 mb-2" value="{{$contents['data']['name']}}"><br>
                <label for="deskripsi">Deskripsi</label><br>
                <textarea name="deskripsi" rows="3" class="mt-1 mb-2">{{$contents['data']['description']}}</textarea><br>
                <label for="harga">Harga</label><br>
                <input type="number" name="harga" class="mt-1 mb-2" value="{{$contents['data']['price']}}"><br>
                <label for="status">Status</label><br>
                <select name="status" class="mt-1 mb-2">
                    <?php
                    if($contents['data']['status'] == "Available"){
                        echo '<option value="Available" select="selected">Available</option><option value="Sold">Sold</option>';
                    }else{
                        echo '<option value="Available" >Available</option><option value="Sold" selected="selected">Sold</option>';
                    }
                    ?>
                </select><br>
                <button type="submit" class="bg-green-600 text-white hover:bg-green-500 py-1 px-2 mt-2 rounded-sm">Update</button>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/e42e6d5e29.js" crossorigin="anonymous"></script>
</body>
</html>