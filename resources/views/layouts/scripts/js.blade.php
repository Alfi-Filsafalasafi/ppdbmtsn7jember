<script src="{{ asset('template/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('template/assets/js/pages/dashboard.js') }}"></script>

<script src="{{ asset('template/assets/js/main.js') }}"></script>
<script src="{{ asset('template/assets/js/extensions/sweetalert2.js') }}"></script>
<script src="{{ asset('template/assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('template/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            showConfirmButton: true,
        })
    </script>
@endif


<script>
    // Simple Datatable
    let table1 = document.querySelector("#table1");
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

<script>
    document.addEventListener('click', function(e) {
        if (e.target.closest('.btn-delete')) {
            const button = e.target.closest('.btn-delete');
            const userId = button.getAttribute('data-id');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${userId}`).submit();
                }
            });
        }
    });
</script>
{{-- 🔽 Script logout SweetAlert --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const logoutBtn = document.getElementById('logoutButton');
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin logout?',
                text: "Sesi Anda akan berakhir.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, logout!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
            });
        });
    });
</script>
