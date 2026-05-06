<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Coding</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-6 md:p-10 font-sans text-gray-800">

    <?php
    $history_belajar = [
        ["tahun" => 2024, "event" => "Awal Ketertarikan IT", "desc" => "Mulai mencari tahu bagaimana dunia teknologi bekerja."],
        ["tahun" => 2025, "event" => "Kuliah Sistem Informasi", "desc" => "Belajar hal dasar IT yang dibutuhkan oleh Industri nyata."],
        ["tahun" => 2026, "event" => "Eksplorasi Framework", "desc" => "Mempelajari Algoritma, database, dan macam-macam Framework."],
        ["tahun" => 2026, "event" => "Project Ruang Jeda", "desc" => "Menyelesaikan portofolio toko buku estetik."]
    ];
    ?>

    <div class="max-w-2xl mx-auto bg-white p-8 md:p-10 rounded-[2rem] shadow-sm border border-gray-200">
        <h2 class="text-2xl font-bold mb-8 text-gray-800 border-l-4 border-blue-600 pl-4 text-center md:text-left">Riwayat Perjalanan Belajar</h2>
        
        <div class="bg-gray-50 p-6 rounded-[1.5rem] space-y-6 border border-gray-100">
            <?php foreach ($history_belajar as $item): ?>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                    <span class="text-blue-600 font-black text-lg"><?php echo $item['tahun']; ?></span>
                    <h3 class="font-bold text-gray-800 text-md mt-1 italic"><?php echo $item['event']; ?></h3>
                    <p class="text-gray-500 text-sm mt-3 leading-relaxed border-t border-gray-50 pt-3">
                        <?php echo $item['desc']; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 flex justify-center gap-3 border-t pt-8">
            <a href="index.php" class="bg-white text-gray-400 border border-gray-200 px-6 py-2 rounded-full text-sm font-bold hover:text-blue-600 hover:border-blue-600 transition">Halaman 1</a>
            <a href="timeline.php" class="bg-blue-600 text-white px-6 py-2 rounded-full text-sm font-bold shadow-lg shadow-blue-100 transition">Halaman 2</a>
            <a href="blog.php" class="bg-white text-gray-400 border border-gray-200 px-6 py-2 rounded-full text-sm font-bold hover:text-blue-600 hover:border-blue-600 transition">Halaman 3</a>
        </div>
    </div>

</body>
</html>