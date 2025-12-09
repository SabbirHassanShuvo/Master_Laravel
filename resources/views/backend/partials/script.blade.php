<!-- latest js -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<!-- Bootstrap js -->
<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- feather icon js -->
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- scrollbar simplebar js -->
<script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>

<!-- Sidebar jquery -->
<script src="{{ asset('assets/js/config.js') }}"></script>

<!-- tooltip init js -->
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>

<!-- Plugins JS -->
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/notify/index.js') }}"></script>

<!-- Apexchar js -->
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart1.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/chart-custom1.js') }}"></script>

<!-- slick slider js -->
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/custom-slick.js') }}"></script>

<!-- customizer js -->
<script src="{{ asset('assets/js/customizer.js') }}"></script>

<!-- ratio js -->
<script src="{{ asset('assets/js/ratio.js') }}"></script>

<!-- sidebar effect -->
<script src="{{ asset('assets/js/sidebareffect.js') }}"></script>

<!-- Theme js -->
<script src="{{ asset('assets/js/script.js') }}"></script>


{{-- image preview --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const photoInput = document.getElementById('photoInput');
        const photoPreview = document.getElementById('photoPreview');
        const previewImg = photoPreview.querySelector('img');

        photoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImg.src = event.target.result;
                    photoPreview.style.display = 'block';
                    setTimeout(() => {
                        photoPreview.style.opacity = '1';
                    }, 10);
                };
                reader.readAsDataURL(file);
            } else {
                photoPreview.style.opacity = '0';
                setTimeout(() => {
                    photoPreview.style.display = 'none';
                }, 300);
            }
        });
    });
</script>
<script>
    document.getElementById('photoInput').addEventListener('change', function(e) {
        const [file] = e.target.files;
        if (file) {
            const preview = document.getElementById('photoPreview').querySelector('img');
            preview.src = URL.createObjectURL(file);
        }
    });
</script>

<script>
    document.getElementById('photoInput').addEventListener('change', function(event) {
        let file = event.target.files[0];
        let preview = document.querySelector('#photoPreview img');

        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    });
</script>
