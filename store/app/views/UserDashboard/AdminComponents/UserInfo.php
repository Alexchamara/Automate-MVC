<section class="user-info-container">
    <div class="user-info-content">
        <div class="">
            <span class="user-info-title"><i class="fa-regular fa-user mr-3"></i>User ID: <?= $user['userId'] ?></span>
        </div>

        <div class="user-listing-info">
            <div class="user-info-tag">
                <span class=""><i class="fa-regular fa-id-card mr-3 text-customBlue"></i>Name: <?= ucfirst($user['name'])?></span>
            </div>
            <div class="user-info-tag">
                <span class=""><i class="fa-solid fa-location-crosshairs mr-3 text-customBlue"></i>Location: <?= ucfirst($user['location'])?></span>
            </div>
            <div class="user-info-tag">
                <span class=""><i class="fa-regular fa-calendar-days mr-3 text-customBlue"></i>Registered Date: <?= $user['createdAt']?></span>
            </div>
            <div class="user-info-tag">
                <span class=""><i class="fa-solid fa-mobile-screen mr-3 text-customBlue"></i>Tel Number: </span>
            </div>
            <div class="user-info-tag">
                <span class=""><i class="fa-solid fa-arrow-down-wide-short mr-3 text-customBlue"></i>Number of Ads: </span>
            </div>
            <div class="user-info-tag">
                <span class=""><i class="fa-solid fa-envelope-open-text mr-3 text-customBlue"></i>Email: <?= $user['email']?></span>
            </div>           
        </div>

        <div class="user-info-btns">

            <a href="deleteUser/id/<?= $user['userId'] ?>" class="btn user-btn-danger">Delete Account</a>
            <!-- <button class="btn user-btn-warning">Deactivate User</button> -->
        </div>
    </div>
</section>