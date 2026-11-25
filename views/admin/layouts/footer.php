<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
        <div
            class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
            <div class="mb-2 mb-md-0 w-100 d-flex flex-md-column flex-row align-items-center justify-content-center">
                &#169;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by M-Clinic
            </div>
        </div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->

<script src="<?= asset('assets/vendor/libs/jquery/jquery.js'); ?>"></script>

<script src="<?= asset('assets/vendor/libs/popper/popper.js'); ?>"></script>
<script src="<?= asset('assets/vendor/js/bootstrap.js'); ?>"></script>

<script src="<?= asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>

<script src="<?= asset('assets/vendor/js/menu.js'); ?>"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= asset('assets/vendor/libs/apex-charts/apexcharts.js'); ?>"></script>

<!-- Main JS -->

<script src="<?= asset('assets/js/main.js'); ?>"></script>

<!-- Page JS -->
<script src="<?= asset('assets/js/dashboards-analytics.js'); ?>"></script>

<script>
    // Function to display a Bootstrap alert
    function showAlert(message, alertType, id = "alert-container") {
        var alertContainer = $('#' + id);
        var alert = $('<div class="alert alert-' + alertType + ' alert-dismissible fade show" role="alert">' + message +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        alertContainer.html(alert);
    }
</script>
</body>

</html>