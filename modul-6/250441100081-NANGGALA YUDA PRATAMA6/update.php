<?php
require_once 'config.php';
require_once 'auth.php';
check_admin();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$error = '';

$stmt = $conn->prepare("SELECT * FROM barang WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    header("Location: dashboard.php");
    exit;
}

$barang = $result->fetch_assoc();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama_barang']);
    $kategori = trim($_POST['kategori']);
    $deskripsi = trim($_POST['deskripsi']);
    $harga = intval($_POST['harga']);
    $stok = intval($_POST['stok']);
    $tanggal = $_POST['tanggal_masuk'];

    if (!empty($nama) && !empty($kategori) && $harga >= 0 && $stok >= 0 && !empty($tanggal)) {
        $stmt_update = $conn->prepare("UPDATE barang SET nama_barang = ?, kategori = ?, deskripsi = ?, harga = ?, stok = ?, tanggal_masuk = ? WHERE id = ?");
        $stmt_update->bind_param("sssiisi", $nama, $kategori, $deskripsi, $harga, $stok, $tanggal, $id);

        if ($stmt_update->execute()) {
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Gagal memperbarui data.";
        }
        $stmt_update->close();
    } else {
        $error = "Validasi gagal. Pastikan semua data valid.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 p-6">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow mt-10">
        <h2 class="text-2xl font-bold mb-6">Edit Data Barang</h2>

        <?php if ($error): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nama Barang</label>
                <input type="text" name="nama_barang" value="<?php echo htmlspecialchars($barang['nama_barang']); ?>" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Kategori</label>
                <input type="text" name="kategori" value="<?php echo htmlspecialchars($barang['kategori']); ?>" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Deskripsi</label>
                <textarea name="deskripsi" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo htmlspecialchars($barang['deskripsi']); ?></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Harga (Rp)</label>
                    <input type="number" name="harga" min="0" value="<?php echo htmlspecialchars($barang['harga']); ?>" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Stok</label>
                    <input type="number" name="stok" min="0" value="<?php echo htmlspecialchars($barang['stok']); ?>" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" value="<?php echo htmlspecialchars($barang['tanggal_masuk']); ?>" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex space-x-2 pt-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">Perbarui</button>
                <a href="dashboard.php" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition font-semibold">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>