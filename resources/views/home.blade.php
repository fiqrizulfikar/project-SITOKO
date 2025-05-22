<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITOKO - Manajemen Barang Terbaik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #4e73df; /* biru */
            color: #fff;
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.5rem;
            margin-bottom: 40px;
        }
        a {
            text-decoration: none;
            border: 2px solid #fff;
            color: #4e73df; /* teks biru */
            background-color: #fff; /* tombol putih */
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }
        a:hover {
            background-color: #4e73df;
            color: #fff;
            border: 2px solid #fff;
        }
        img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px; /* Biar sudut gambarnya sedikit membulat */
            box-shadow: 0 4px 8px rgba(0,0,0,0.2); /* Efek bayangan */
        }
    </style>
</head>
<body>
    <div class="py-14">
        <div class="container">
            <div class="row">
                <div class="offset-lg-2 col-lg-8 col-md-12 col-12 text-center">
                    <img src="https://i.pinimg.com/736x/b4/dc/24/b4dc24b96af40c20a51491fcd4618dd9.jpg" alt="Logo SITOKO">
                    <h1 class="display-3 mt-4 mb-3 fw-bold">SITOKO</h1>
                    <p class="lead px-lg-8 mb-6">Platform manajemen stok barang.</p>
                    <a href="/dashboard" class="btn btn-primary">Masuk ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
