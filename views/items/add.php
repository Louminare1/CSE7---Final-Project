<?php include __DIR__ . '/../layout/header.php'; ?>
<div class="card shadow-sm">
  <div class="card-body">
    <h3 class="mb-3">Add New Item</h3>
    <?php if ($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
    <form method="post" autocomplete="off">
      <div class="mb-2">
        <label class="form-label">Title</label>
        <input class="form-control form-control-lg" name="title" required>
      </div>
      <div class="mb-2">
        <label class="form-label">Platform</label>
        <input class="form-control form-control-lg" name="platform" required>
      </div>
      <div class="mb-2">
        <label class="form-label">Genre</label>
        <input class="form-control form-control-lg" name="genre" required>
      </div>
      <div class="mb-2">
        <label class="form-label">Price</label>
        <input class="form-control form-control-lg" name="price" type="number" min="0" step="0.01" required>
      </div>
      <div class="mb-2">
        <label class="form-label">Quantity</label>
        <input class="form-control form-control-lg" name="quantity" type="number" min="0" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"></textarea>
      </div>
      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-success btn-lg">Add Item</button>
        <a href="index.php?page=items" class="btn btn-secondary btn-lg">Cancel</a>
      </div>
    </form>
  </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>