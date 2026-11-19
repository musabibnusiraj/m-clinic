<?php
$requireOperator = true; // Only operators can open this page

require_once('./layouts/header.php');
require_once BASE_PATH . '/models/User.php';

$users = (new User())->getAll();

?>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">


  <!-- Hoverable Table rows -->
  <div class="card">
    <h5 class="card-header">Users
      <!-- Button trigger modal -->
      <button
        type="button"
        class="btn btn-primary float-end"
        data-bs-toggle="modal"
        data-bs-target="#createNewUser">
        Add New User
      </button>
    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php foreach ($users as $user): ?>
            <tr>
              <td>
                <i class="icon-base bx bx-user-circle icon-md text-success me-4"></i> <span><?= $user['username'] ?? 'N/A'; ?></span>
              </td>
              <td><?= $user['email'] ?? 'N/A'; ?></td>
              <td>
                <?php if ($user['is_active']): ?>
                  <span class="badge bg-label-success me-1">Active</span>
                <?php else: ?>
                  <span class="badge bg-label-danger me-1">Inactive</span>
                <?php endif; ?>
              </td>
              <td><span class="badge bg-label-primary me-1 text-capitalize"><?= $user['permission'] ?? 'N/A'; ?></span></td>
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

<!-- Modal -->
<div class="modal fade" id="createNewUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form id="create-form"
      action="<?= url('services/user/ajax_fn.php'); ?>"
      method="POST"
      enctype="multipart/form-data"
      class="modal-content">

      <input type="hidden" name="action" value="create">

      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Create New User</h5>
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
            <label for="emailWithTitle" class="form-label">Email</label>
            <input type="email" id="emailWithTitle" name="email" class="form-control" placeholder="xxxx@xxx.xx" required />
          </div>
          <div class="row gy-2">
            <div class="col form-password-toggle">
              <label class="form-label" for="passwordInput">Password</label>
              <div class="input-group">
                <input
                  type="password"
                  required
                  name="password"
                  class="form-control"
                  id="passwordInput"
                  placeholder="Enter password"
                  aria-describedby="password-toggle" />
                <span id="password-toggle" class="input-group-text cursor-pointer">
                  <i class="bx bx-hide"></i>
                </span>
              </div>
            </div>
            <div class="col form-password-toggle">
              <label class="form-label" for="confirmPasswordInput">Confirm Password</label>
              <div class="input-group">
                <input
                  type="password"
                  required
                  name="confirm_password"
                  class="form-control"
                  id="confirmPasswordInput"
                  placeholder="Confirm password"
                  aria-describedby="confirm-password-toggle" />
                <span id="confirm-password-toggle" class="input-group-text cursor-pointer">
                  <i class="bx bx-hide"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label for="roleWithTitle" class="form-label">Role</label>
            <select id="roleWithTitle" name="permission" class="form-select" required>
              <option value="" selected disabled>Select role</option>
              <option value="operator">Operator</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="statusWithTitle" class="form-label">Status</label>
            <select id="statusWithTitle" name="is_active" class="form-select" required>
              <option value="1" selected>Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary" id="create">Save changes</button>
      </div>
    </form>
  </div>
</div>

<?php require_once('./layouts/footer.php'); ?>
<script src="<?= asset('assets/forms-js/users.js') ?>"></script>