<section class="savedAd-listing-container">
    <div class="sub-listing-content">
        <div class="savedAd-listing-wrapper">
            <div class="savedAd-img">
                <!-- <img src="./img/testimg/listing2.jpg" alt="" class="savedimg"> -->
                <div class="savedimg bg-[url('../img/testimg/listing1.jpeg')]"></div>
            </div>
            <div class="savedAd-details">
                <div class="savedAd-title">
                    <h3>Mercedes-Benz CLA Class</h3>
                </div>
                <div class="savedAd-price">
                    <label for="vahiclePrice">Rs. 1,000,000</label>
                </div>
                <div class="savedAd-location">
                    <label for="location"><i class="fa-solid fa-map-pin mr-1"></i>Malabe</label>
                </div>
            </div>
        </div>
        <div class="savedAd-buttons">
            <div class="border-r border-customGray">
                <button class="savedAd-view"><i class="fa-regular fa-eye mr-1"></i>View advert</button>
            </div>
            <div class="border-l border-customGray">
                <button class="remove-button savedAd-delete"><i class="fa-regular fa-trash-can mr-1"></i>
                    Remove
                </button>
                <?php require "./dltAlert.php" ?>
            </div>
        </div>
    </div>
</section>

<script>
    function deleteAlert() {
            //delete pop-up display and transitions
            const deleteButton = document.querySelector('.remove-button');
            const popup = document.querySelector('.popup');
            const cancelButton = document.querySelector('cancel-button');
            const confirmDeleteButton = document.querySelector('delete-button');

            deleteButton.addEventListener('click', () => {
                popup.classList.remove('opacity-0', 'pointer-events-none');
                popup.classList.add('opacity-100');
                popup.children[0].classList.remove('scale-90');
                popup.children[0].classList.add('scale-100');
            });

            cancelButton.addEventListener('click', () => {
                popup.classList.remove('opacity-100');
                popup.classList.add('opacity-0');
                popup.children[0].classList.remove('scale-100');
                popup.children[0].classList.add('scale-90');
                setTimeout(() => {
                    popup.classList.add('pointer-events-none');
                }, 300);
            });

            confirmDeleteButton.addEventListener('click', () => {
                popup.classList.remove('opacity-100');
                popup.classList.add('opacity-0');
                popup.children[0].classList.remove('scale-100');
                popup.children[0].classList.add('scale-90');
                setTimeout(() => {
                    popup.classList.add('pointer-events-none');
                }, 300);
            });
    }
</script>