<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-6 md:p-10 font-sans text-gray-800">

    <div class="max-w-3xl mx-auto bg-white p-8 md:p-10 rounded-[2rem] shadow-sm border border-gray-200">
        
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Profil Interaktif Developer</h2>
        
        <table class="w-full mb-10 text-sm border-collapse">
            <tr class="border-b border-gray-50"><td class="font-semibold py-3 w-1/3 text-gray-500">Nama</td><td class="py-3">: Nanggala Yuda Pratama</td></tr>
            <tr class="border-b border-gray-50"><td class="font-semibold py-3 text-gray-500">ID Developer</td><td class="py-3">: DEV-2026-001</td></tr>
            <tr class="border-b border-gray-50"><td class="font-semibold py-3 text-gray-500">Kota/Tgl Lahir</td><td class="py-3">: Bangkalan, 01 Jan 2030</td></tr>
            <tr class="border-b border-gray-50"><td class="font-semibold py-3 text-gray-500">Email</td><td class="py-3">: anggaGantenk@gmail.com</td></tr>
            <tr><td class="font-semibold py-3 text-gray-500">No. WhatsApp</td><td class="py-3">: 08123456xxxxx</td></tr>
        </table>

        <h3 class="font-bold mb-6 text-blue-600 uppercase text-xs tracking-widest">Update Data Keahlian</h3>
        <form method="POST" class="space-y-6">
            
            <div>
                <label class="block text-sm font-bold mb-2">Framework/Tools:</label>
                <input type="text" name="frameworks" placeholder="Contoh: Tailwind, PHP, Laravel" required class="w-full border border-gray-200 p-3 rounded-2xl focus:ring-2 focus:ring-blue-500 outline-none bg-gray-50">
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Cerita Pengalaman:</label>
                <textarea name="pengalaman" placeholder="Ceritakan proyekmu..." required class="w-full border border-gray-200 p-3 rounded-2xl focus:ring-2 focus:ring-blue-500 outline-none bg-gray-50 h-28"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                <div class="bg-gray-50 p-5 rounded-[1.5rem] border border-gray-100">
                    <span class="block font-bold text-gray-700 mb-3 underline decoration-blue-300">Tools Penunjang:</span>
                    <div class="space-y-2">
                        <label class="flex items-center gap-3 cursor-pointer"><input type="checkbox" name="tools[]" value="VS Code" class="w-4 h-4 rounded text-blue-600"> VS Code</label>
                        <label class="flex items-center gap-3 cursor-pointer"><input type="checkbox" name="tools[]" value="GitHub" class="w-4 h-4 rounded text-blue-600"> GitHub</label>
                        <label class="flex items-center gap-3 cursor-pointer"><input type="checkbox" name="tools[]" value="Figma" class="w-4 h-4 rounded text-blue-600"> Figma</label>
                        <label class="flex items-center gap-3 cursor-pointer"><input type="checkbox" name="tools[]" value="Postman" class="w-4 h-4 rounded text-blue-600"> Postman</label>
                    </div>
                </div>

                <div class="bg-gray-50 p-5 rounded-[1.5rem] border border-gray-100">
                    <span class="block font-bold text-gray-700 mb-3 underline decoration-blue-300">Minat Bidang:</span>
                    <div class="space-y-2">
                        <label class="flex items-center gap-3 cursor-pointer"><input type="radio" name="minat" value="Frontend" required class="w-4 h-4 text-blue-600"> Frontend</label>
                        <label class="flex items-center gap-3 cursor-pointer"><input type="radio" name="minat" value="Backend" class="w-4 h-4 text-blue-600"> Backend</label>
                        <label class="flex items-center gap-3 cursor-pointer"><input type="radio" name="minat" value="Fullstack" class="w-4 h-4 text-blue-600"> Fullstack</label>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Tingkat Skill:</label>
                <select name="level" required class="w-full border border-gray-200 p-3 rounded-2xl bg-gray-50 outline-none">
                    <option value="Dasar">Dasar</option>
                    <option value="Cukup">Cukup</option>
                    <option value="Profesional">Profesional</option>
                </select>
            </div>

            <button type="submit" name="proses" class="bg-blue-600 text-white font-bold px-4 py-4 rounded-2xl hover:bg-blue-700 transition w-full shadow-lg shadow-blue-100">
                Simpan & Tampilkan Hasil
            </button>
        </form>

        <?php
        if (isset($_POST['proses'])) {
            $f_input = $_POST['frameworks'];
            $cerita = htmlspecialchars($_POST['pengalaman']);
            $list_fw = explode(",", $f_input);
            $tools_dipilih = isset($_POST['tools']) ? implode(", ", $_POST['tools']) : "Tidak ada";

            echo "<div class='mt-8 p-6 bg-blue-50/50 rounded-[1.5rem] border border-blue-100'>";
            if (count($list_fw) > 2) {
                echo "<p class='text-blue-700 font-bold mb-4 text-center'>Skill Anda cukup luas di bidang development!</p>";
            }
            echo "<table class='w-full text-sm'>";
            echo "<tr><td class='font-bold py-1'>Minat</td><td>: ".$_POST['minat']."</td></tr>";
            echo "<tr><td class='font-bold py-1'>Tools</td><td>: $tools_dipilih</td></tr>";
            echo "<tr><td class='font-bold py-1'>Framework</td><td>: ".implode(", ", $list_fw)."</td></tr>";
            echo "</table>";
            echo "<p class='mt-4 text-sm italic text-gray-600 border-t pt-3'>\"$cerita\"</p>";
            echo "</div>";
        }
        ?>

        <div class="mt-12 flex justify-center gap-3 border-t pt-8">
            <a href="index.php" class="bg-blue-600 text-white px-6 py-2 rounded-full text-sm font-bold shadow-lg shadow-blue-100 transition">Halaman 1</a>
            <a href="timeline.php" class="bg-white text-gray-400 border border-gray-200 px-6 py-2 rounded-full text-sm font-bold hover:text-blue-600 hover:border-blue-600 transition">Halaman 2</a>
            <a href="blog.php" class="bg-white text-gray-400 border border-gray-200 px-6 py-2 rounded-full text-sm font-bold hover:text-blue-600 hover:border-blue-600 transition">Halaman 3</a>
        </div>
    </div>

</body>
</html>