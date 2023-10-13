<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Api</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
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
    <div class="shadow-md flex">
        <div class="container mx-auto lg:w-2/4">
            <a href="#" class="float-left px-5 py-2">Zidaan16</a>
        </div>
    </div>
    <div class="container mx-auto lg:w-2/4 shadow-md flex p-5 my-4">
        <form method="post" action="/" class="w-full">
            <?php echo e(csrf_field()); ?>

            <label for="nama">Nama</label><br>
            <input type="text" name="nama" class="mt-1 mb-2"><br>
            <label for="deskripsi">Deskripsi</label><br>
            <textarea name="deskripsi" rows="3" class="mt-1 mb-2"></textarea><br>
            <label for="harga">Harga</label><br>
            <input type="number" name="harga" class="mt-1 mb-2"><br>
            <label for="status">Status</label><br>
            <select name="status" class="mt-1 mb-2">
                <option value="Available">Available</option>
                <option value="Sold">Sold</option>
            </select><br>
            <button type="submit" class="bg-red-500 text-white mt-1 py-1 px-2 rounded hover:bg-red-600">Submit</button>
        </form>
    </div>
    <div class="container mx-auto lg:w-2/4 px-2 py-1">
        <form method="get" action="/search">
            <div class="flex">
                <!-- <?php echo e(csrf_field()); ?> -->
                <input type="text" name="val" placeholder="search" class="border-x-0 border-t-0 border-b rounded-none lg:w-36 focus:outline-none">
                <button type="submit" class="border-b border-black text-gray-400 hover:text-black py-1 px-2"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>
    <div class="container mx-auto lg:w-2/4 shadow-md p-3 mb-4">
        <table class="w-full text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Action</th>
            </tr>               
                <?php
                $no = 0;
                foreach ($contents['data'] as $key) {
                    $no++;
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>".$key['name']."</td>";
                    echo "<td>$".$key['price']."</td>";
                    echo "<td>".$key['status']."</td>";
                    echo '<td class="p-1"> <form action="delete/'.$key["id"].'" method="post">'.method_field("delete").'<input type="hidden" name="_token" value="'.csrf_token().'"/><a href="update/'.$key["id"].'" class="py-1 px-2 bg-slate-400 hover:bg-slate-500 text-white rounded-sm">Edit</a> <button type="submit" class="py-1 px-2 bg-green-500 hover:bg-green-600 text-white rounded-sm">Delete</button></form></td>';
                    echo "<tr>";
                }
                ?>
        </table>
    </div>

    <script src="https://kit.fontawesome.com/e42e6d5e29.js" crossorigin="anonymous"></script>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\e-commerce\resources\views/index.blade.php ENDPATH**/ ?>