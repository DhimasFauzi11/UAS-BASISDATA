<?php

include("config.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        <?php

        include("aset/sidebar.css");
        ?>* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .sidebar a.active {
            background-color: #04AA6D;
            color: white;
        }

        .table {
            width: 100%;
        }

        .table_header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgb(240, 240, 240);
        }

        .table_header p {
            color: #000000;
        }

        button {
            outline: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            padding: 10px;
            color: #ffffff;
        }

        td .edit {
            background-color: #0298cf;
        }

        td .delete {
            background-color: #f80000;
        }

        .add_new {
            padding: 10px 20px;
            color: #ffffff;
            background-color: #0298cf;
        }

        input {
            padding: 10px 20px;
            margin: 0 10px;
            outline: none;
            border: 1px solid #0298cf;
            border-radius: 6px;
            color: #0298cf;
        }

        .table_section {
            height: 650px;
            overflow: auto;
        }

        table {
            width: 100%;
            table-layout: fixed;
            min-width: 1000px;
            border-collapse: collapse;
        }

        thead th {
            position: sticky;
            top: 0;
            background-color: #f6f9fc;
            color: #8493a5;
            font-size: 15px;
        }

        th,
        td {
            border-bottom: 1px solid #dddddd;
            padding: 10px 20px;
            word-break: break-all;
            text-align: center;

        }



        ::placeholder {
            color: #0298cf;
        }

        ::-webkit-scrollbar {
            height: 5px;
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <a class="active" href="dashboard.php">Artikel</a>
        <a href="jenisTanaman.php">Tanaman</a>
        <a href="#contact">Daftar Pertanyaan</a>
        <a href="#about">Daftar Jawaban</a>
        <a href="index.php">Log out</a>
    </div>

    <div class="content">
        <div class="table">
            <div class="table_header">
                <p>List Artikel</p>
                <div>
                    <input type="text" placeholder="product">
                    <a href="tambahArtikel.php"><button class="add_new">+ add new</button></a>
                </div>
            </div>
            <div class="table_section">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Artikel</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Rating</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM artikel";
                        $query = mysqli_query($koneksi, $sql);
                        $i = 1;

                        while ($artikel = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>{$i}</td>";
                            echo "<td>{$artikel['judul_artikel']}</td>";
                            echo "<td>{$artikel['kategori_artikel']}</td>";
                            echo "<td>{$artikel['tanggal_artikel']}</td>";
                            echo "<td>{$artikel['rating']}</td>";

                            echo "<td> 
                            <a href='edit.php?id={$artikel["id_artikel"]}'><button class='edit'><i class='fa-solid fa-pen-to-square'></i></button></a>
                            <a href='deleteArtikel.php?id={$artikel["id_artikel"]}'><button class='delete'><i class='fa-solid fa-trash'></i></button></a>
                            </td>";

                            echo "</tr>";
                            $i++;
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>