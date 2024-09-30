<div class="brand clearfix" style="background-color: #34495e; padding: 15px 20px;">
    <a href="dashboard.php" style="font-size: 25px; font-weight: bold; color: #fff; text-transform: uppercase;">Rapid Rescue</a>
    <span class="menu-btn" style="color: #fff;"><i class="fa fa-bars"></i></span>
    
    <ul class="ts-profile-nav" style="float: right; margin: 0;">
        <li class="ts-account" style="position: relative;">
            <a href="#" style="color: #fff; font-size: 16px; padding: 10px;">
                <img src="img/vehicleimages/ambula.png" class="ts-avatar hidden-side" alt="" style="border-radius: 50%; width: 30px; height: 30px; margin-right: 10px;">
                Account <i class="fa fa-angle-down hidden-side"></i>
            </a>
            <ul style="position: absolute; top: 100%; right: 0; background-color: #2c3e50; border-radius: 5px; display: none; min-width: 150px; box-shadow: 0 8px 16px rgba(0,0,0,0.3);">
                <li><a href="change-password.php" style="color: #fff; padding: 10px 20px; display: block; text-decoration: none;">Change Password</a></li>
                <li><a href="logout.php" style="color: #fff; padding: 10px 20px; display: block; text-decoration: none;">Logout</a></li>
            </ul>
        </li>
    </ul>
</div>

<script>
    // Toggle dropdown
    document.querySelector('.ts-account a').addEventListener('click', function(e) {
        e.preventDefault();
        var dropdown = this.nextElementSibling;
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.ts-account')) {
            document.querySelector('.ts-account ul').style.display = 'none';
        }
    });
</script>
