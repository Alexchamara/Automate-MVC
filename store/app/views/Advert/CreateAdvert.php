<main class="advert-main-container">
    <!-- Progress bar -->
    <div class="progress-bar-container">
        <div class="progress-bar">
            <div class="step active" style="border-radius: 10px 0 0 0;">
                <span class="step-number">1</span>
                Vehicle details
            </div>
            <div class="step">
                <span class="step-number">2</span>
                Your advert
            </div>
            <div class="step" style="border-radius: 0 10px 0 0;">
                <span class="step-number">3</span>
                Review & publish
            </div>
        </div>
        <div class="progress-line">
            <div class="progress"></div>
        </div>
    </div>

    <!-- Add vehicle informations -->
    <form action="include/createAds_inc.php" method="post" id="multi-step-form">
        <div class="form-step active form_1">
            <h2>Make & model</h2>
            <div class="sec-box">
                <!-- Make -->
                <div class="col-left">
                    <label for="make" class="required">Make
                        <!-- <span class="required"></span> -->
                    </label><br>
                    <select name="make" id="brand">
                        <option value="DEF">Select</option>
                        <option value="ACURA">Acura</option>
                        <option value="ASTON MARTIN">Aston Martin</option>
                        <option value="AUDI">Audi</option>
                        <option value="BENTLEY">Bentley</option>
                        <option value="BMW">BMW</option>
                        <option value="BUICK">Buick</option>
                        <option value="CADILLAC">Cadillac</option>
                        <option value="CHEVROLET">Chevrolet</option>
                        <option value="CHRYSLER">Chrysler</option>
                        <option value="DODGE">Dodge</option>
                        <option value="FERRARI">Ferrari</option>
                        <option value="FORD">Ford</option>
                        <option value="GMC">GMC</option>
                        <option value="HONDA">Honda</option>
                        <option value="HUMMER">Hummer</option>
                        <option value="HYUNDAI">Hyundai</option>
                        <option value="INFINITI">Infiniti</option>
                        <option value="ISUZU">Isuzu</option>
                        <option value="JAGUAR">Jaguar</option>
                        <option value="JEEP">Jeep</option>
                        <option value="KIA">Kia</option>
                        <option value="LAMBORGHINI">Lamborghini</option>
                        <option value="LAND ROVER">Land Rover</option>
                        <option value="LEXUS">Lexus</option>
                        <option value="LINCOLN">Lincoln</option>
                        <option value="LOTUS">Lotus</option>
                        <option value="MASERATI">Maserati</option>
                        <option value="MAYBACH">Maybach</option>
                        <option value="MAZDA">Mazda</option>
                        <option value="MERCEDES-BENZ">Mercedes-Benz</option>
                        <option value="MERCURY">Mercury</option>
                        <option value="MINI">Mini</option>
                        <option value="MITSUBISHI">Mitsubishi</option>
                        <option value="NISSAN">Nissan</option>
                        <option value="PONTIAC">Pontiac</option>
                        <option value="PORSCHE">Porsche</option>
                        <option value="ROLLS-ROYCE">Rolls-Royce</option>
                        <option value="SAAB">Saab</option>
                        <option value="SATURN">Saturn</option>
                        <option value="SUBARU">Subaru</option>
                        <option value="SUZUKI">Suzuki</option>
                        <option value="TOYOTA">Toyota</option>
                        <option value="VOLKSWAGEN">Volkswagen</option>
                        <option value="VOLVO">Volvo</option>
                    </select>
                </div>
                <!-- Model -->
                <div class="col-right">
                    <label for="model" class="required">Model
                        <span class="required"></span>
                    </label><br>
                    <select id="model" name="model">
                        <option value="DEF">Model</option>
                        <option value="COMMANDER">Commander</option>
                        <option value="COMPASS">Compass</option>
                        <option value="GRAND CHEROKEE">Grand Cherokee</option>
                        <option value="LIBERTY">Liberty</option>
                        <option value="PATRIOT">Patriot</option>
                        <option value="WRANGLER">Wrangler</option>
                    </select>
                </div>
            </div>

            <h2>Age, mileage & other</h2>
            <div class="sec-box">
                <!-- Registration year -->
                <div class="col-left">
                    <label for="year" class="required">Year of registration
                        <span class="required"></span>
                    </label><br>
                    <select name="years" id="years">
                        <option value="">Select</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                        <option value="1979">1979</option>
                        <option value="1978">1978</option>
                        <option value="1977">1977</option>
                        <option value="1976">1976</option>
                        <option value="1975">1975</option>
                    </select>
                </div>
                <!-- Mileage -->
                <div class="col-right">
                    <label for="mileage" class="required">Current mileage
                        <span class="required"></span>
                    </label><br>
                    <input id="model" name="mileage" placeholder="e.g. 50000"></input>
                </div>
                <!-- Condition -->
                <div class="col-left">
                    <label for="condition" class="required">Condition
                        <span class="required"></span>
                    </label><br>
                    <select name="condition" id="condition">
                        <option value="DEF">Select</option>
                        <option value="brand new">Brand new</option>
                        <option value="reconditioned">Reconditioned</option>
                        <option value="used">Used</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <!-- Engine -->
                <div class="col-right">
                    <label for="Engine" class="required">Engine
                        <span class="required"></span>
                    </label><br>
                    <select id="engine" name="engine">
                        <option value="DEF">Select</option>
                        <option value="0.6L">0.6L</option>
                        <option value="0.7L">0.7L</option>
                        <option value="0.8L">0.8L</option>
                        <option value="0.9L">0.9L</option>
                        <option value="1.0L">1.0L</option>
                        <option value="1.1L">1.1L</option>
                        <option value="1.2L">1.2L</option>
                        <option value="1.3L">1.3L</option>
                        <option value="1.4L">1.4L</option>
                        <option value="1.5L">1.5L</option>
                        <option value="1.6L">1.6L</option>
                        <option value="1.7L">1.7L</option>
                        <option value="1.8L">1.8L</option>
                        <option value="1.9L">1.9L</option>
                        <option value="2.0L">2.0L</option>
                        <option value="2.2L">2.2L</option>
                        <option value="2.4L">2.4L</option>
                        <option value="2.6L">2.6L</option>
                        <option value="2.8L">2.8L</option>
                        <option value="3.0L">3.0L</option>
                        <option value="3.0L">3.0L</option>
                        <option value="3.5L">3.5L</option>
                        <option value="3.6L">3.6L</option>
                        <option value="4.0L">4.0L</option>
                        <option value="4.5L">4.5L</option>
                        <option value="5.0L">5.0L</option>
                        <option value="5.5L">5.5L</option>
                        <option value="6.0L">6.0L</option>
                        <option value="6.5L">6.5L</option>
                        <option value="7.0L">7.0L</option>
                    </select>
                </div>
            </div>

            <div class="vhicle-details-container">
                <!-- Body Type -->
                <div class="mt-6">
                    <h2>Body type</h2>
                    <div class="mt-4 flex flex-wrap gap-2 options" id="body-options">
                        <button type="button" data-value="Saloon">Saloon</button>
                        <button type="button" data-value="Hatchback">Hatchback</button>
                        <button type="button" data-value="Convertible">Convertible</button>
                        <button type="button" data-value="Coupe">Coupe</button>
                        <button type="button" data-value="SUV">SUV</button>
                        <button type="button" data-value="MPV">MPV</button>
                        <button type="button" data-value="Estate">Estate</button>
                        <button type="button" data-value="4X4">4X4</button>
                        <button type="button" data-value="Other">Other</button>
                        <input type="hidden" name="body_type" id="body_type">
                    </div>
                </div>

                <!-- Gearbox -->
                <div class="mt-6">
                    <h2>Gearbox</h2>
                    <div class="mt-4 flex flex-wrap gap-2 options" id="gearbox-options">
                        <button type="button" data-value="Automatic">Automatic</button>
                        <button type="button" data-value="Manual">Manual</button>
                        <button type="button" data-value="Tiptronic">Tiptronic</button>
                        <button type="button" data-value="Other">Other</button>
                        <input type="hidden" name="gearbox" id="gearbox">
                    </div>
                </div>

                <!-- Fuel Type -->
                <div class="mt-6">
                    <h2>Fuel type</h2>
                    <div class="mt-4 flex flex-wrap gap-2 options" id="fuel-options">
                        <button type="button" data-value="Petrol">Petrol</button>
                        <button type="button" data-value="Diesel">Diesel</button>
                        <button type="button" data-value="Electronic">Electronic</button>
                        <button type="button" data-value="Hybrid">Hybrid</button>
                        <button type="button" data-value="Gas">Gas</button>
                        <button type="button" data-value="Other">Other</button>
                        <input type="hidden" name="fuel_type" id="fuel_type">
                    </div>
                </div>
            </div>
            <button type="button" class="next-btn">Next
                <i class="fa-solid fa-arrow-right" style="color: #ffffff; margin-left: 10px; vertical-align: middle;"></i></button>
        </div>

        <!-- Advert details -->
        <div class="form-step form_2">
            <h2>Upload images</h2>
            <span style="color: black;">Your advert can contain up to 20 photos. The first image will be the
                main.</span>
            <div class="sec-box img-up">
                <div class="image-uploader">
                    <input type="file" name="carImg" id="image-input" multiple accept="image/*">
                    <label for="image-input"><i class="fa-solid fa-plus" style="color: rgb(11, 25, 111);"></i><br>Add photo</label>
                    <div class="image-preview" id="image-preview"></div>
                </div>
            </div>

            <h2>Asking price</h2>
            <span style="color: black;">We encourage you to specify a sensible price to attract more potential
                buyers. You can always change the price even after the advert is published.</span>
            <div class="sec-box">
                <div class="col-left amount-input">
                    <span>Rs.</span>
                    <input id="price" name="price" placeholder="price..." type="number"></input>
                    <span>.00</span>
                </div>
            </div>

            <h2>Advert description</h2>
            <div class="advert-desceript">
                <label for="mileage" class="required">Advert description
                    <span class="required"></span>
                </label><br>
                <textarea id="description" name="description" placeholder="Describe your car in detail..." rows="15"></textarea>
            </div>

            <h2>Contact details</h2>
            <div class="sec-box">
                <div class="col-left">
                    <label for="phone-number" class="required">Phone number
                        <span class="required"></span>
                    </label><br>
                    <input id="phone-number" name="phone-number" placeholder="Phone number (077..)"></input>
                </div>
                <div class="col-left">
                    <label for="email" class="required">Email
                        <span class="required"></span>
                    </label><br>
                    <input id="email" name="email"></input>
                </div>
                <div class="col-right">
                    <label for="location" class="required">Location
                        <span class="required"></span>
                    </label><br>
                    <input id="location" name="location"></input>
                </div>
            </div>

            <button type="button" class="prev-btn">
                <i class="fa-solid fa-arrow-left" style="margin-right: 10px;"></i>Back</button>
            <button type="button" class="next-btn">Next
                <i class="fa-solid fa-arrow-right" style="color: #ffffff; margin-left: 10px;"></i></button>
        </div>

        <!-- Review & publish -->
        <div class="form-step form_3">
            <div class="publish-top">
                <h2>Advert summary</h2>
                <span>Please review the details and click the 'Publish advert' button to post. To prevent potential
                    spam or suspicious behavior our team will review.</span>
            </div>
            <button type="button" class="prev-btn">
                <i class="fa-solid fa-arrow-left" style="margin-right: 10px;"></i>Back</button>
            <button type="submit" class="publish-btn">Publish advert</button>
        </div>
    </form>
</main>

<!-- progress bar -->
<script type="text/javascript">
    const formSteps = document.querySelectorAll('.form-step');
    const nextBtns = document.querySelectorAll('.next-btn');
    const prevBtns = document.querySelectorAll('.prev-btn');
    const progressSteps = document.querySelectorAll('.progress-bar .step');
    const progressLine = document.querySelector('.progress-line .progress');

    let formStepIndex = 0;

    nextBtns.forEach(button => {
        button.addEventListener('click', () => {
            formStepIndex++;
            updateFormSteps();
            updateProgressBar();
        });
    });

    prevBtns.forEach(button => {
        button.addEventListener('click', () => {
            formStepIndex--;
            updateFormSteps();
            updateProgressBar();
        });
    });

    function updateFormSteps() {
        formSteps.forEach((step, index) => {
            step.classList.toggle('active', index === formStepIndex);
        });
    }

    function updateProgressBar() {
        progressSteps.forEach((step, index) => {
            step.classList.toggle('active', index <= formStepIndex);
        });
        const progressPercentage = (formStepIndex) / (progressSteps.length - 1) * 100;
        progressLine.style.width = `${progressPercentage}%`;
    }

    // image uploader
    document.getElementById('image-input').addEventListener('change', function() {
        const imagePreview = document.getElementById('image-preview');
        const files = Array.from(this.files);

        files.forEach(file => {
            // Check file size
            if (file.size > 2 * 1024 * 1024) {
                alert('Each image must be less than 2MB');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;

                const imageContainer = document.createElement('div');
                imageContainer.classList.add('image-container');

                const removeBtn = document.createElement('button');
                removeBtn.innerText = 'X';
                removeBtn.classList.add('remove-btn');
                removeBtn.addEventListener('click', function() {
                    imageContainer.remove();
                });

                imageContainer.appendChild(img);
                imageContainer.appendChild(removeBtn);
                imagePreview.appendChild(imageContainer);
            };

            reader.readAsDataURL(file);
        });
    });

    // Allow image reordering
    const imagePreview = document.getElementById('image-preview');
    let dragSrcEl = null;

    function handleDragStart(e) {
        dragSrcEl = this;
        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML);
    }

    function handleDragOver(e) {
        if (e.preventDefault) {
            e.preventDefault();
        }
        e.dataTransfer.dropEffect = 'move';
        return false;
    }

    function handleDragEnter() {
        this.classList.add('over');
    }

    function handleDragLeave() {
        this.classList.remove('over');
    }

    function handleDrop(e) {
        if (e.stopPropagation) {
            e.stopPropagation();
        }

        if (dragSrcEl !== this) {
            dragSrcEl.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData('text/html');
        }

        return false;
    }

    function handleDragEnd() {
        const imageContainers = document.querySelectorAll('.image-preview .image-container');
        imageContainers.forEach(container => {
            container.classList.remove('over');
        });
    }

    function addDnDHandlers(container) {
        container.addEventListener('dragstart', handleDragStart, false);
        container.addEventListener('dragenter', handleDragEnter, false);
        container.addEventListener('dragover', handleDragOver, false);
        container.addEventListener('dragleave', handleDragLeave, false);
        container.addEventListener('drop', handleDrop, false);
        container.addEventListener('dragend', handleDragEnd, false);
    }

    imagePreview.addEventListener('DOMNodeInserted', function(e) {
        if (e.target.className === 'image-container') {
            e.target.setAttribute('draggable', 'true');
            addDnDHandlers(e.target);
        }
    });

    // handle button selection for body type, gearbox, and fuel type
    document.querySelectorAll('.options').forEach(optionGroup => {
        optionGroup.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function() {
                // Remove selected state from all buttons in the group
                optionGroup.querySelectorAll('button').forEach(btn => {
                    btn.classList.remove('bg-customBlue', 'text-white');
                    btn.classList.add('bg-customBlue', 'text-gray-900');
                });

                // Add selected state to the clicked button
                this.classList.add('bg-customBlue', 'text-white');
                this.classList.remove('bg-customBlue', 'text-gray-900');

                // Update the hidden input with the selected value
                let hiddenInput = optionGroup.querySelector('input[type="hidden"]');
                hiddenInput.value = this.getAttribute('data-value');
            });
        });
    });
</script>