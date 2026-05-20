<?php
require_once 'config.php';
require_once 'auth.php';
check_login();

$result = $conn->query("SELECT * FROM barang ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventaris</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-600">Sistem Inventaris GACOR</h1>
        <div class="flex items-center space-x-4">
            <span class="text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded-full font-medium">
                <?php echo htmlspecialchars($_SESSION['username']); ?> (<?php echo htmlspecialchars($_SESSION['role']); ?>)
            </span>
            <a href="logout.php" class="text-red-600 hover:text-red-800 font-semibold text-sm">Logout</a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Daftar Stok Barang</h2>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="create.php" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm font-semibold">+ Tambah Barang</a>
            <?php endif; ?>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="p-3 font-semibold text-sm">Nama Barang</th>
                        <th class="p-3 font-semibold text-sm">Kategori</th>
                        <th class="p-3 font-semibold text-sm">Deskripsi</th>
                        <th class="p-3 font-semibold text-sm">Harga</th>
                        <th class="p-3 font-semibold text-sm">Stok</th>
                        <th class="p-3 font-semibold text-sm">Tanggal Masuk</th>
                        <?php if ($_SESSION['role'] === 'admin'): ?>
                            <th class="p-3 font-semibold text-sm text-center">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3 text-sm font-medium"><?php echo htmlspecialchars($row['nama_barang']); ?></td>
                                <td class="p-3 text-sm"><?php echo htmlspecialchars($row['kategori']); ?></td>
                                <td class="p-3 text-sm text-gray-600"><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                                <td class="p-3 text-sm">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                                <td class="p-3 text-sm"><?php echo htmlspecialchars($row['stok']); ?></td>
                                <td class="p-3 text-sm"><?php echo htmlspecialchars($row['tanggal_masuk']); ?></td>
                                <?php if ($_SESSION['role'] === 'admin'): ?>
                                    <td class="p-3 text-sm text-center space-x-2">
                                        <a href="update.php?id=<?php echo $row['id']; ?>" class="text-blue-600 hover:underline">Edit</a>
                                        <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Hapus barang ini?')" class="text-red-600 hover:underline">Hapus</a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?php echo $_SESSION['role'] === 'admin' ? 7 : 6; ?>" class="p-4 text-center text-gray-500">Belum ada data barang.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>