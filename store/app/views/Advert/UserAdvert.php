<section class="sub-listing-container">
    <div class="sub-listing-content">
        <div class="sub-listing-content-up">
            <div class="main-img-wrapper">
                <div class="sub-listing-main-img bg-[url('../img/testimg/listing1.jpeg')]"></div>
            </div>
            <div class="sub-listing-info">
                <lable class="sub-listing-title"><?= htmlspecialchars($car['make']); ?></lable>
                <div class="sub-listing-features-container">
                    <div class="sub-listing-features">
                        <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($car['conditions'])); ?></lable>
                        <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($car['registrationYear'])); ?></lable>
                        <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($car['mileage'])); ?></lable>
                        <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($car['bodyType'])); ?></lable>
                        <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($car['fuelType'])); ?></lable>
                        <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($car['color'])); ?></lable>
                        <lable class="sub-listing-feature-value"><?= htmlspecialchars(ucfirst($car['engine'])); ?></lable>
                    </div>
                    <div class="sub-listing-location">
                        <label for="location"><i class="fa-solid fa-map-pin mr-1"></i><?= htmlspecialchars(ucfirst($car['location'])); ?></label>
                    </div>
                </div>
            </div>
            <div class="listing-price-label">
                <label for="vahiclePrice" class="listing-price">Rs. <?= htmlspecialchars(ucfirst($car['price'])); ?>/=</label>
            </div>
        </div>
        <div class="savedAd-buttons">
            <div class="border-r border-customGray">
                <a href="viewAdvert/id/<?= $car['listingId'] ?>" class="savedAd-view">
                    <button class="savedAd-view"><i class="fa-regular fa-eye mr-1"></i>View advert</button></a>
            </div>
            <div class="border-l border-customGray flex">
                <a href="#" class="remove-button savedAd-delete"><i class="fa-solid fa-pencil mr-1"></i>
                    Update
                </a>

                <a href="deleteList/id/<?= $car['listingId']; ?>" class="remove-button savedAd-delete border-l"><i class="fa-regular fa-trash-can mr-1"></i>
                    Remove
                </a>
            </div>
        </div>
    </div>
</section>