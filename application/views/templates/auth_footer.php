<footer class="footer position-absolute bottom-2 py-2 w-100">
    <div class="container">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
                <div class="copyright text-center text-sm text-white text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    made with Smiles <i class="fa fa-smile-o" aria-hidden="true"></i> by
                    <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Agna Rizky Putra Anggara</a>
                    for a better web.
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</main>
<!--   Core JS Files   -->
<script src="<?= base_url('assets') ?>/js/core/popper.min.js"></script>
<script src="<?= base_url('assets') ?>/js/core/bootstrap.min.js"></script>
<script src="<?= base_url('assets') ?>/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets') ?>/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('assets') ?>/js/material-dashboard.min.js"></script>
</body>

</html>