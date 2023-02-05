
</div>
<!-- [ Main Content ] end -->
    

    <!-- Required Js -->
    <script src="Assets/admin/ablepro/dist/assets/js/vendor-all.min.js"></script>
    <script src="Assets/admin/ablepro/dist/assets/js/plugins/bootstrap.min.js"></script>
    <script src="Assets/admin/ablepro/dist/assets/js/ripple.js"></script>
    <script src="Assets/admin/ablepro/dist/assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="Assets/admin/ablepro/dist/assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="Assets/admin/ablepro/dist/assets/js/pages/dashboard-main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
    if(isset($_COOKIE['status'])) { ?>
        <script>
        swal({
            title: "<?php echo $_COOKIE['status']; ?>",
            icon: "<?php echo $_COOKIE['status_code']; ?>",
        });
        </script>
    <?php 
        setcookie("status", "", time() - 3600);
        setcookie("status_code", "", time() - 3600);
        } 
    ?>
</body>

</html>
