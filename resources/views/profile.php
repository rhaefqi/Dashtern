<?php
// Simulasi 
$nama = "Reinata Carolina";
$nim = "221401021";
$status = "Aktif";
$progress = 70; // dalam persen
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      background-color: #f1f7f6;
    }
    .sidebar {
      width: 240px;
      background: white;
      height: 100vh;
      padding: 20px;
      position: fixed;
    }
    .main-content {
      margin-left: 240px;
      padding: 30px;
    }
    .nav-link {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px;
      color: #333;
      text-decoration: none;
      margin-bottom: 10px;
      border-radius: 6px;
    }
    .nav-link:hover {
      background: #e0f2f1;
    }
    .nav-link.active {
      background: #00332f;
      color: white;
    }
    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      max-width: 700px;
    }
    .profile-icon {
      font-size: 32px;
      background: #ddd;
      border-radius: 50%;
      padding: 15px;
      margin-right: 20px;
    }
    .progress-bar {
      height: 14px;
      background: #e0e0e0;
      border-radius: 10px;
      overflow: hidden;
      margin-top: 10px;
      max-width: 700px;
    }
    .progress-fill {
      height: 100%;
      background: #00695c;
      width: <?= $progress ?>;
    }
    .btn {
      background: #00332f;
      color: white;
      padding: 10px 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    .btn:hover {
      background: #005046;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2 style="color: #00695c;">Dashtern</h2>
    <a href="#" class="nav-link"><i class="fas fa-home"></i> Beranda</a>
    <a href="#" class="nav-link"><i class="fas fa-school"></i> Kelas</a>
    <a href="#" class="nav-link"><i class="fas fa-chart-line"></i> Progres Kinerja</a>
    <a href="#" class="nav-link"><i class="fas fa-book"></i> Panduan</a>
    <a href="#" class="nav-link"><i class="fas fa-info-circle"></i> Tentang</a>
    <a href="profile.php" class="nav-link active"><i class="fas fa-user"></i> Profil</a>
  </div>

  <div class="main-content">
    <h1>Profil</h1>

    <div class="card">
      <div style="display: flex; align-items: center;">
        <div class="profile-icon"><i class="fas fa-user"></i></div>
        <div>
          <p><strong>Nama:</strong> <?= $nama ?></p>
          <p><strong>NIM:</strong> <?= $nim ?></p>
          <p style="color: green; font-size: 14px;"><strong>Status:</strong> <?= $status ?></p>
        </div>
      </div>
      <button class="btn">Ganti Kata Sandi</button>
    </div>

    <!-- Progress Bar -->
    <div style="margin-top: 30px;">
      <label for="progress">Progress Kinerja</label>
      <div class="progress-bar">
        <div class="progress-fill"></div>
      </div>
      <small><?= $progress ?>% selesai</small>
    </div>
  </div>

</body>
</html>
