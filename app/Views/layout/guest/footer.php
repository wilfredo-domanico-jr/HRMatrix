

<?php if(session()->getFlashdata('msg')): ?>
    <script>

        document.addEventListener("DOMContentLoaded", function() {

            let msg = '<?= session()->getFlashdata('msg') ?>';
            let icon = '<?= session()->getFlashdata('icon') ?>';

            switch (icon) {
                case 'error':
                    Swal.fire({
                        title: 'Error',
                        text: msg,
                        icon: icon,
                        confirmButtonText: 'Okay'
                    });
                    break;
                case 'info':
                    Swal.fire({
                        title: 'Info',
                        text: msg,
                        icon: icon,
                        confirmButtonText: 'Okay'
                    });
                    break;
                case 'warning':
                  Swal.fire({
                        title: 'Warning',
                        text: msg,
                        icon: icon,
                        confirmButtonText: 'Okay'
                    });
                    break;
                case 'success':
                  Swal.fire({
                        title: 'Success',
                        text: msg,
                        icon: icon,
                        confirmButtonText: 'Okay'
                    });
                    break;
                default:
                Swal.fire({
                        title: 'Warning',
                        text: msg,
                        icon: "info",
                        confirmButtonText: 'Okay'
                    });
            }


        });
    </script>
<?php endif; ?>

 <!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- Sweet Alert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>