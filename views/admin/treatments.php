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
    <h5 class="card-header">Treatments
      <!-- Button trigger modal -->
      <button
        type="button"
        class="btn btn-primary float-end"
        data-bs-toggle="modal"
        data-bs-target="#createNewTreatment">
        Add New Treatment
      </button>
    </h5>
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
              <td class="fw-bold">
                <i class="icon-base bx bx-check-circle icon-md text-success me-4"></i> <span><?= $treatment['name'] ?? 'N/A'; ?></span>
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
                    <a class="dropdown-item edit-treatment-btn" href="javascript:void(0);" data-id="<?= $treatment['id']; ?>"><i class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item delete-treatment-btn" href="javascript:void(0);" data-id="<?= $treatment['id']; ?>"><i class="icon-base bx bx-trash me-1"></i> Delete</a>
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


<!-- Modal -->
<div class="modal fade" id="createNewTreatment" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form id="create-form"
      action="<?= url('services/treatment/ajax_fn.php'); ?>"
      method="POST"
      enctype="multipart/form-data"
      class="modal-content">

      <input type="hidden" name="action" value="create_treatment">

      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Create New Treatment</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-6">
          <div class="col-12">
            <label for="nameWithTitle" class="form-label">Name</label>
            <input type="text" id="nameWithTitle" name="name" class="form-control" placeholder="Enter Name" required />
          </div>
          <div class="col-12">
            <label for="descriptionWithTitle" class="form-label">Description</label>
            <textarea id="descriptionWithTitle" name="description" class="form-control" placeholder="Enter Description" required></textarea>
          </div>
          <div class="col-12">
            <label for="treatmentFeeWithTitle" class="form-label">Treatment Fee</label>
            <input type="number" id="treatmentFeeWithTitle" name="treatment_fee" class="form-control" placeholder="Enter Treatment Fee" required />
          </div>
          <div class="col-12">
            <label for="registrationFeeWithTitle" class="form-label">Registration Fee</label>
            <input readonly type="number" value="1000" id="registrationFeeWithTitle" name="registration_fee" class="form-control" placeholder="Enter Registration Fee" required />
          </div>
          <input type="hidden" name="registration_fee" value="1000" />
          <div class="col-md-6">
            <label for="statusWithTitle" class="form-label">Status</label>
            <select id="statusWithTitle" name="is_active" class="form-select" required>
              <option value="1" selected>Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
          <div id="alert-container"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Close
        </button>

        <button type="button" class="btn btn-primary" id="create">Save changes</button>
      </div>
    </form>
  </div>
</div>

<!-- Edit Treatment Modal -->
<div class="modal fade" id="edit-treatment-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form id="update-form"
      action="<?= url('services/treatment/ajax_fn.php'); ?>"
      method="POST"
      class="modal-content">

      <input type="hidden" name="action" value="update_treatment">
      <input type="hidden" name="id" id="id">

      <div class="modal-header">
        <h5 class="modal-title">Edit Treatment</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-6">
          <div class="col-12">
            <label for="edit_name" class="form-label">Name</label>
            <input type="text" id="edit_name" name="name" class="form-control" placeholder="Enter Name" required />
          </div>
          <div class="col-12">
            <label for="edit_description" class="form-label">Description</label>
            <textarea id="edit_description" name="description" class="form-control" placeholder="Enter Description" required></textarea>
          </div>
          <div class="col-12">
            <label for="edit_treatment_fee" class="form-label">Treatment Fee</label>
            <input type="number" id="edit_treatment_fee" name="treatment_fee" class="form-control" placeholder="Enter Treatment Fee" required />
          </div>
          <div class="col-12">
            <label for="edit_registration_fee" class="form-label">Registration Fee</label>
            <input readonly type="number" id="edit_registration_fee" name="registration_fee" class="form-control" required />
          </div>
          <div class="col-md-6">
            <label for="edit_is_active" class="form-label">Status</label>
            <select id="edit_is_active" name="is_active" class="form-select" required>
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
          <div id="edit-alert-container"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update-treatment">Save changes</button>
      </div>
    </form>
  </div>
</div>

<!-- Delete confirmation modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this treatment?</p>
        <div id="delete-alert-container"></div>
        <!-- hidden fields to store id and permission so JS can read them -->
        <input type="hidden" id="delete_treatment_id" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
      </div>
    </div>
  </div>
</div>

<?php require_once('./layouts/footer.php'); ?>

<script src="<?= asset('assets/forms-js/treatments.js') ?>"></script>