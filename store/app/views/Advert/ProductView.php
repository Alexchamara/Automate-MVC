<div class="my-[11%] mx-[7%]">
    <div class="flex flex-col md:flex-row justify-between">

        <div class="text-base text-customBlue mb-4">
            <a href="<?= BASE_URL . 'allAdverts' ?>" class="text-customBlue"><i class="fa-solid fa-arrow-left text-customBlue mr-2"></i>Back to search</a>
        </div>

        <!-- Sign out btn -->
        <div class="flex justify-end gap-8 text-sm mb-4">
            <a href="#" class="text-customBlue"><i class="fa-regular fa-heart mr-2"></i>Save</a> <a href="#" class="text-customBlue"><i class="fa-solid fa-share-nodes mr-2"></i>Share</a>
        </div>
    </div>
    <div class="ad-top-preview flex flex-col md:flex-row gap-4 items-start  bg-center bg-cover bg-no-repeat">

        <!-- Slider -->
        <div class="ad-image-slider w-full md:w-1/2">
            <div class="slider-container relative w-full overflow-hidden">
                <div class="slider flex w-full">
                    <div class="slides flex transition-transform duration-500 ease-in-out">

                        <!-- Slider images -->
                        <img src="<?= BASE_URL ?>img/home-main.jpg" alt="Image 1" class="w-full h-auto">
                        <img src="img/about_main.jpg" alt="Image 2" class="w-full h-auto">
                        <img src="img/home-main.jpg" alt="Image 3" class="w-full h-auto">
                        <img src="img/about_main.jpg" alt="Image 4" class="w-full h-auto">

                        <?php if (empty($car['images'])): ?>
                            <img src="img/placeholder.jpg" alt="placeholder image" class="w-full h-auto">
                        <?php else: ?>
                            <?php foreach (explode(',', $car['images']) as $image): ?>
                                <img src="<?= $image ?>" alt="Image" class="w-full h-auto">
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Navigation buttons -->
                <!-- Navigation buttons -->
                <button class="prev-btn" style="position: absolute; top: 50%; transform: translateY(-50%);background-color: rgba(0, 0, 0, 0.5);color: white;border: none;padding: 10px;cursor: pointer" onclick="prevSlide()">&#10094;</button>
                <button class="next-btn" style="position: absolute; top: 50%; transform: translateY(-50%);background-color: rgba(0, 0, 0, 0.5);color: white;border: none;padding: 10px;cursor: pointer" onclick="nextSlide()">&#10095;</button>
            </div>
            <div class="thumbnails-container flex w-full mt-2">
                <button class="scroll-button bg-gray-500 text-white border-none p-2 cursor-pointer hidden" id="scroll-left" onclick="scrollThumbnails('left')">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <div class="thumbnails flex overflow-x-auto scroll-smooth w-full">
                    <img src="img/home-main.jpg" alt="Thumbnail 1" class="flex-none w-24 mr-2" onclick="currentSlide(1)">
                    <img src="img/home-main.jpg" alt="Thumbnail 2" class="flex-none w-24 mr-2" onclick="currentSlide(2)">
                    <img src="image3.jpg" alt="Thumbnail 3" class="flex-none w-24 mr-2" onclick="currentSlide(3)">
                    <img src="image4.jpg" alt="Thumbnail 4" class="flex-none w-24 mr-2" onclick="currentSlide(4)">
                    <img src="image5.jpg" alt="Thumbnail 5" class="flex-none w-24 mr-2" onclick="currentSlide(5)">
                    <img src="image6.jpg" alt="Thumbnail 6" class="flex-none w-24 mr-2" onclick="currentSlide(6)">
                    <img src="image7.jpg" alt="Thumbnail 7" class="flex-none w-24 mr-2" onclick="currentSlide(7)">
                    <img src="image8.jpg" alt="Thumbnail 8" class="flex-none w-24 mr-2" onclick="currentSlide(8)">
                </div>
                <button class="scroll-button bg-gray-500 text-white border-none p-2 cursor-pointer hidden" id="scroll-right" onclick="scrollThumbnails('right')">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Ad Details -->
        <div class="bg-white pt-0 pb-4 px-4 md:pt-0 md:pb-4 md:px-4 w-full md:w-1/2 flex flex-col gap-5">

            <!-- Title Section -->
            <div class="pb-5">
                <h1 class="text-xl md:text-4xl font-bold text-blue-900"><?= $car['make'] ?></h1>
                <p class="text-gray-500 text-sm md:text-base">
                    <?= ucfirst(strtolower($car['make'])) ?>
                    <?= ucfirst(strtolower($car['model'])) ?>
                    <?= ucfirst(strtolower($car['registrationYear'])) ?>
                </p>
            </div>

            <!-- Price Section -->
            <div class="flex flex-col md:flex-row justify-between items-center border-y border-gray-200 py-5">
                <span class="text-customRed text-2xl md:text-3xl font-bold">Rs.<?= $car['price'] ?>/=</span>
                <div class="flex items-center space-x-2 mt-2 md:mt-0"> <i class="fa-regular fa-circle-check w-5 h-5 text-green-500"></i>
                    <span class="text-green-500 text-base">Verified Ad</span>
                </div>
            </div>

            <!-- Seller Details Section -->
            <div class="pt-5">
                <h2 class="font-semibold text-gray-600 text-base md:text-2xl">Seller details</h2>
                <div class="mt-3 flex flex-col space-y-2"> <!-- Phone Number -->
                    <div class="flex items-center text-customBlue pb-4">
                        <i class="fa-solid fa-mobile-screen"></i> <a href="tel:" class="ml-2 text-base"><?= $car['contactNumber'] ?></a>
                    </div>

                    <!-- Send Message -->
                    <div class="flex flex-col md:flex-row text-customBlue space-y-2 md:space-y-0 md:space-x-4">
                        <div class="flex items-center basis-1/2 pb-4"> <i class="fa-regular fa-comment">

                            </i> <a href="mailto:<?= $car['advertEmail'] ?>" class="ml-2 text-base" name="">Send message</a>
                        </div>
                        <div class="flex items-center pb-4">
                            <i class="fa-regular fa-message"></i>
                            <a href="https://api.whatsapp.com/send?phone=<?= $car['contactNumber'] ?>" class="ml-2 text-base" target="_blank">Chat now</a>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row text-customBlue space-y-2 md:space-y-0 md:space-x-4">
                        <div class="flex items-center basis-1/2 pb-4">
                            <i class="fa-solid fa-location-crosshairs"></i>
                            <a href="https://maps.google.com/maps?q=<?= $car['location'] ?>" class="ml-2 text-base" target="_blank"><?= $car['location'] ?></a>
                        </div>
                        <div class="flex items-center pb-4">
                            <i class="fa-solid fa-route"></i>
                            <a href="https://maps.google.com/maps?q=<?= $car['location'] ?>" class="ml-2 text-base" name="">Direction</a>
                        </div>
                    </div>
                </div>

                <!-- Contact Button -->
                <div class="mt-6">
                    <button class="w-full rounded-full bg-customRed hover:bg-red-600 text-xl text-white py-2 px-4 font-normal"><a href="tel:<?= $car['contactNumber'] ?>">Contact seller</a></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary -->
    <div class="py-14"> <span class="p-4 font-semibold text-2xl text-gray-600">Summary</span>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 w-full md:w-1/2">
            <div class="flex items-center p-4 font-semibold">
                <img src="<?= BASE_URL ?>img/condition.png" alt="condition" class="w-9">
                <span class="ml-2 text-customBlue"><?= ucwords($car['conditions']) ?></span>
            </div>
            <div class="flex items-center p-4 font-semibold">
                <img src="<?= BASE_URL ?>img/meeter.png" alt="condition" class="w-9">
                <span class="ml-2 text-customBlue" name=""><?= ucwords($car['mileage']) ?></span>
            </div>
            <div class="flex items-center p-4 font-semibold">
                <img src="<?= BASE_URL ?>img/registration.png" alt="condition" class="w-9">
                <span class="ml-2 text-customBlue" name=""><?= ucwords($car['registrationYear']) ?></span>
            </div>
            <div class="flex items-center p-4 font-semibold">
                <img src="<?= BASE_URL ?>img/gearbox.svg" alt="condition" class="w-9">
                <span class="ml-2 text-customBlue" name=""><?= ucwords($car['transmission']) ?></span>
            </div>
            <div class="flex items-center p-4 font-semibold">
                <img src="<?= BASE_URL ?>img/engin.png" alt="condition" class="w-9">
                <span class="ml-2 text-customBlue" name=""><?= ucwords($car['engine']) ?></span>
            </div>
            <div class="flex items-center p-4 font-semibold">
                <img src="<?= BASE_URL ?>img/model.png" alt="condition" class="w-9">
                <span class="ml-2 text-customBlue" name=""><?= ucwords($car['model']) ?></span>
            </div>
            <div class="flex items-center p-4 font-semibold">
                <img src="<?= BASE_URL ?>img/fuel.png" alt="condition" class="w-9">
                <span class="ml-2 text-customBlue" name=""><?= ucwords($car['fuelType']) ?></span>
            </div>
            <div class="flex items-center p-4 font-semibold">
                <img src="<?= BASE_URL ?>img/door.png" alt="condition" class="w-9">
                <span class="ml-2 text-customBlue" name=""><?= ucwords($car['bodyType']) ?></span>
            </div>
            <div class="flex items-center p-4 font-semibold">
                <img src="<?= BASE_URL ?>img/color.png" alt="condition" class="w-9">
                <span class="ml-2 text-customBlue" name=""><?= ucwords($car['color']) ?></span>
            </div>
        </div>
    </div> <!-- Description -->
    <div class="pb-14"> <span class="p-4 font-semibold text-2xl text-gray-600">Description</span>
        <div class="p-4 text-customBlue">
            <p class="text-gray-500">
                <?= $description = substr($car['description'], 0, 1000); ?>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
    //imgae slider in product page
    let currentSlideIndex = 0;
    const slides = document.querySelector('.slides');
    const totalSlides = slides.children.length;

    function showSlide(index) {
        slides.style.transform = `translateX(${-index * 100}%)`;
        currentSlideIndex = index;
    }

    function nextSlide() {
        currentSlideIndex = (currentSlideIndex + 1) % totalSlides;
        showSlide(currentSlideIndex);
    }

    function prevSlide() {
        currentSlideIndex = (currentSlideIndex - 1 + totalSlides) % totalSlides;
        showSlide(currentSlideIndex);
    }

    function currentSlide(index) {
        showSlide(index - 1);
    }
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelector('.thumbnails');
        const scrollLeftButton = document.getElementById('scroll-left');
        const scrollRightButton = document.getElementById('scroll-right');
        const thumbnailImages = thumbnails.querySelectorAll('img');
        if (thumbnailImages.length > 6) {
            scrollLeftButton.style.display = 'block';
            scrollRightButton.style.display = 'block';
        }
        window.scrollThumbnails = function(direction) {
            const scrollAmount = 200;
            // Adjust the scroll amount as needed 
            if (direction === 'left') {
                thumbnails.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            } else if (direction === 'right') {
                thumbnails.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        }
    });
</script>