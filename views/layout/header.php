<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game Inventory System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap & custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" defer></script>
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid px-4 py-3">
    <a class="navbar-brand d-flex align-items-center gap-2" href="index.php?page=items">
      <img src="https://cdn-icons-png.flaticon.com/512/3208/3208759.png" alt="Logo" height="32" style="filter: invert(1) brightness(1.2);">
      <span>Game Store Inventory</span>
    </a>
    <?php if (isset($_SESSION['user'])): ?>
      <div class="d-flex align-items-center ms-auto gap-3">
        <span class="navbar-text d-flex align-items-center gap-2">
          <span class="badge bg-light text-primary"><?= htmlspecialchars($_SESSION['user']['role']) ?></span>
          <strong style="color: #f1f5f9;"><?= htmlspecialchars($_SESSION['user']['username']) ?></strong>
        </span>
        <a href="index.php?page=logout" class="btn btn-outline-light btn-sm">Logout</a>
      </div>
    <?php endif; ?>
  </div>
</nav>
<div class="container">