<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .button-container {
        display: flex;
        justify-content: flex-start;
        /* Menggunakan flex-start untuk menempatkan tombol di kiri */
        align-items: center;
        position: relative;
        /* Menjadikan posisi relative untuk posisi absolut */
        margin-bottom: 20px;
    }

    .button-mulai-baca {
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 30px;
        border: none;
        cursor: pointer;
    }

    .button-plus {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 30px;
        width: 40px;
        height: 40px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        position: absolute;
        /* Menggunakan posisi absolut */
        right: 0;
        /* Menempatkan tombol tepat di sisi kanan tombol "Mulai Membaca" */
        top: 50%;
        /* Menyentralkan vertikal */
        transform: translateY(-50%);
        /* Menyentralkan vertikal */
    }

    .button-plus:hover {
        background-color: #f3f3f3;
    }
    </style>
</head>

<body>
    <div class="button-container">
        <button class="button-mulai-baca">Mulai Membaca</button>
        <button class="button-plus">+</button>
    </div>

</body>

</html>