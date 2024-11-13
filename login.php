<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #d0e7ff; /* Warna latar belakang biru lembut */
            overflow: hidden;
        }

        .container {
            text-align: center;
            background-color: #f0f8ff; /* Biru sangat lembut */
            padding: 20px 40px;
            border-radius: 25px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            border: 2px solid #8fcfff; /* Garis tepi biru */
        }

        h2 {
            font-size: 24px;
            color: #4a90e2;
            margin-bottom: 20px;
        }

        .emoji {
            font-size: 50px;
            margin-bottom: 10px;
            animation: bounce 1s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4a90e2; /* Warna biru tombol */
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #357ABD; /* Biru lebih gelap saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="emoji">🎉</div>
        <h2>Hore Berhasil :D</h2>
        <a href="index.php" class="button">Kembali</a>
    </div>
</body>
</html>
