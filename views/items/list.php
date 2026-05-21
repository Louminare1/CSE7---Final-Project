<?php include __DIR__ . '/../layout/header.php'; ?>
<div class="d-flex justify-content-between align-items-center mb-4">
  <h3 class="mb-0">Inventory Items</h3>
  <a href="index.php?page=add-item" class="btn btn-primary btn-lg">
    <span class="bi bi-plus-circle me-1"></span>Add Item
  </a>
</div>

<div class="card shadow-sm">
  <div class="card-body pb-1">
    <form class="row g-2 mb-2" method="get" autocomplete="off">
      <input type="hidden" name="page" value="items">
      <div class="col-md-8 col-sm-7">
        <input type="text" class="form-control form-control-lg" name="search" placeholder="Search by title, platform, or genre..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
      </div>
      <div class="col-md-4 col-sm-5 d-grid">
        <button type="submit" class="btn btn-secondary btn-lg">
          <span class="bi bi-search me-1"></span>Search
        </button>
      </div>
    </form>
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th>Title</th>
            <th>Platform</th>
            <th>Genre</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Description</th>
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php if (empty($items)): ?>
          <tr>
            <td colspan="7" class="text-center text-muted py-4">
              <span style="font-size:1.24rem;">No items found.</span>
            </td>
          </tr>
        <?php else: ?>
          <?php foreach ($items as $item): ?>
            <tr>
              <td><span style="font-weight:600"><?= htmlspecialchars($item['title']) ?></span></td>
              <td><?= htmlspecialchars($item['platform']) ?></td>
              <td><?= htmlspecialchars($item['genre']) ?></td>
              <td>$<?= number_format($item['price'],2) ?></td>
              <td class="fw-bold"><?= $item['quantity'] ?></td>
              <td><?= htmlspecialchars($item['description']) ?></td>
              <td class="text-end">
                <div class="btn-group" role="group">
                  <a href="index.php?page=edit-item&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="index.php?page=delete-item&id=<?= $item['id'] ?>" class="btn btn-danger btn-sm"
                     onclick="return confirm('Delete this item?')">Delete</a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>