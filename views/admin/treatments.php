<?php
$requireOperator = true; // Only operators can open this page

require_once('./layouts/header.php');
require_once BASE_PATH . '/models/Treatment.php';

$treatments = (new Treatment())->getAll();

?>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

  <!-- Hoverable Table rows -->
  <div class="card">
    <h5 class="card-header">Treatments</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Treatment Fee</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php foreach ($treatments as $treatment): ?>
            <tr>
              <td  class="fw-bold">
                <i class="icon-base bx bx-check-circle icon-md text-success me-4"></i> <span ><?= $treatment['name'] ?? 'N/A'; ?></span>
              </td>
              <td><?= $treatment['description'] ?? 'N/A'; ?></td>
              <td class="fw-bold">LKR <?= $treatment['treatment_fee'] ?? 'N/A'; ?></td>
              <td>
                <?php if ($treatment['is_active']): ?>
                  <span class="badge bg-label-success me-1">Active</span>
                <?php else: ?>
                  <span class="badge bg-label-danger me-1">Inactive</span>
                <?php endif; ?>
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="icon-base bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-1"></i> Delete</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Hoverable Table rows -->
</div>
<!-- / Content -->

<?php require_once('./layouts/footer.php'); ?>