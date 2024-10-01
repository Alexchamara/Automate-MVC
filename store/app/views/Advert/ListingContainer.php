<?php if (!empty($listing)): ?>
    <section class="sub-listing-container">
        <div class="sub-listing-content">
            <div class="sub-listing-content-up">
                <div class="main-img-wrapper">
                    <!-- <img src="img/testimg/listing2.jpg" alt="main image" class="sub-listing-main-img"> -->
                    <div class="sub-listing-main-img bg-[url('../img/testimg/listing1.jpeg')]"></div>
                </div>
                <div class="sub-listing-info">
                    <label class="sub-listing-title"><?= htmlspecialchars($listing['make']); ?></label>
                    <div class="sub-listing-features-container">
                        <div class="sub-listing-features">
                            <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($listing['conditions'])); ?></lable>
                            <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($listing['registrationYear'])); ?></lable>
                            <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($listing['mileage'])); ?></lable>
                            <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($listing['bodyType'])); ?></lable>
                            <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($listing['fuelType'])); ?></lable>
                            <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($listing['color'])); ?></lable>
                            <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($listing['engine'])); ?></lable>
                        </div>
                        <div class="sub-listing-location">
                            <label for="location"><i class="fa-solid fa-map-pin mr-1"></i><?= htmlspecialchars(ucfirst($listing['location'])); ?></label>
                        </div>
                    </div>
                </div>
                <div class="listing-price-label">
                    <label for="vahiclePrice" class="listing-price">Rs. <?= htmlspecialchars(ucfirst($listing['price'])); ?>/=</label>
                </div>
            </div>
            <div class="sub-listing-content-bottom">
                <div class="sub-listing-imgs-table">
                    <div class="sub-listing-img bg-[url('../img/testimg/listing2.jpg')]"></div>
                    <div class="sub-listing-img bg-[url('../img/testimg/listing3.jpg')]"></div>
                    <div class="sub-listing-img bg-[url('../img/testimg/listing4.jpeg')]"></div>
                    <div class="sub-listing-img bg-[url('../img/testimg/listing5.jpeg')]"></div>
                    <div class="sub-listing-img bg-[url('../img/testimg/listing6.jpeg')]"></div>
                    <div class="sub-listing-img bg-[url('../img/testimg/listing7.jpeg')]"></div>
                </div>
            </div>
        </div>

        <a href="viewAdvert/id/<?= $listing['listingId'] ?>" class="border-l text-customBlue py-[8px] px-[10px] flex justify-end w-full items-center">
            <i class="fa-regular fa-eye mr-1"></i>View advert
        </a>
        
    </section>
<?php else: ?>
    <section class="sub-listing-container">
        <div class="sub-listing-content">
            <div class="sub-listing-content-up">
                <div class="main-img-wrapper">
                    <img src="img/placeholder.jpg" alt="main image" class="sub-listing-main-img">
                </div>
                <div class="sub-listing-info">
                    <label class="sub-listing-title">No listing found</label>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>