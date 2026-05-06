<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Developer</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-6 md:p-10 font-sans text-gray-800">

    <?php
    $artikel = [
        "html-dasar" => [
            "judul" => "Momen Belajar HTML",
            "tgl" => "12 Feb 2026",
            "cerita" => "Pertama kali belajar HTML, saya merasa seperti sedang membangun sebuah rumah. HTML adalah pondasi yang sangat seru untuk dipelajari.",
            "img" => "img/gamb2.jpeg",
            "link" => "https://www.w3schools.com/html/"
        ],
        "php-logic" => [
            "judul" => "Belajar Logika PHP",
            "tgl" => "08 Mar 2026",
            "cerita" => "PHP memberikan tantangan baru tentang bagaimana data diproses. Setiap error adalah cara terbaik untuk belajar menjadi lebih teliti.",
            "img" => "img/gamb1.jpeg",
            "link" => "https://www.w3schools.com/php/"
        ]
    ];
    $id_pilihan = isset($_GET['id']) ? $_GET['id'] : null;
    ?>

    <div class="max-w-4xl mx-auto bg-white p-6 md:p-10 rounded-[2rem] shadow-sm border border-gray-200">

        <div class="bg-blue-600 text-white p-8 rounded-[1.5rem] mb-10 shadow-lg shadow-blue-100">
            <h1 class="text-3xl font-black tracking-tight">Blog Reflektif</h1>
            <p class="text-sm italic opacity-80 mt-2">"Belajar koding itu seperti lari maraton, nikmati setiap langkahnya."</p>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            <div class="w-full md:w-1/3">
                <h3 class="font-bold text-gray-400 mb-4 uppercase text-[10px] tracking-widest">Daftar Artikel</h3>
                <div class="space-y-3">
                    <?php foreach ($artikel as $id => $data): ?>
                        <a href="?id=<?php echo $id; ?>" 
                        class="block p-5 rounded-2xl border transition-all <?php echo ($id_pilihan == $id) ? 'bg-blue-600 text-white border-blue-600 shadow-md scale-[1.02]' : 'bg-gray-50 border-gray-100 hover:bg-blue-50'; ?>">
                            <span class="text-[10px] block opacity-60 mb-1 font-bold"><?php echo $data['tgl']; ?></span>
                            <span class="font-bold leading-tight"><?php echo $data['judul']; ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="w-full md:w-2/3">
                <?php if ($id_pilihan && isset($artikel[$id_pilihan])): 
                    $post = $artikel[$id_pilihan];
                ?>
                    <div class="bg-white rounded-[1.5rem] overflow-hidden border border-gray-100 shadow-sm">
                        <div class="w-full bg-gray-200">
                            <img src="<?php echo $post['img']; ?>" class="w-full h-auto min-h-[250px] object-cover">
                        </div>
                        
                        <div class="p-6 md:p-8">
                            <h2 class="text-2xl font-bold mb-4 text-gray-800"><?php echo $post['judul']; ?></h2>
                            <p class="text-gray-600 leading-relaxed mb-8 italic text-lg">
                                "<?php echo $post['cerita']; ?>"
                            </p>
                            
                            <div class="pt-6 border-t border-gray-50">
                                <a href="<?php echo $post['link']; ?>" target="_blank" class="inline-flex items-center bg-blue-50 text-blue-600 px-6 py-3 rounded-full text-sm font-bold hover:bg-blue-600 hover:text-white transition-all group">
                                    Baca Referensi Tambahan 
                                    <span class="ml-2 group-hover:translate-x-1 transition-transform">&rarr;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="bg-gray-50 p-16 rounded-[1.5rem] text-center border-2 border-dashed border-gray-200 flex flex-col items-center justify-center h-full">
                        <p class="text-gray-400 font-medium">Pilih salah satu artikel di samping untuk membaca pengalaman saya.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="mt-12 flex justify-center gap-3 border-t pt-8">
            <a href="index.php" class="bg-white text-gray-400 border border-gray-200 px-6 py-2 rounded-full text-sm font-bold hover:text-blue-600 hover:border-blue-600 transition shadow-sm">Halaman 1</a>
            <a href="timeline.php" class="bg-white text-gray-400 border border-gray-200 px-6 py-2 rounded-full text-sm font-bold hover:text-blue-600 hover:border-blue-600 transition shadow-sm">Halaman 2</a>
            <a href="blog.php" class="bg-blue-600 text-white px-6 py-2 rounded-full text-sm font-bold shadow-lg shadow-blue-100 transition">Halaman 3</a>
        </div>
    </div>

</body>
</html>