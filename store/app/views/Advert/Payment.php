<div class="payment-form-container">
    <!-- Button to Open Popup -->
    <!-- <button id="open-popup" class="popup-toggle"><i class="fas fa-credit-card"></i> Choose Payment Method</button> -->

    <!-- Blurred Background Overlay -->
    <div id="blur-background" class="blur-background"></div>

    <!-- Payment Popup Window -->
    <div class="payment-popup" id="payment-popup">
        <!-- Close Button -->
        <span id="close-popup" class="close-btn"><i class="fas fa-times"></i></span>

        <h2>Payment Method</h2>
        <div class="payment-options">
            <input type="radio" name="payment" id="credit-card" checked>
            <label for="credit-card">Credit Card</label>
            <input type="radio" name="payment" id="debit-card">
            <label for="debit-card">Debit Card</label>
            <input type="radio" name="payment" id="paypal">
            <label for="paypal">PayPal</label>
        </div>

        <div class="payment-form" id="credit-card-form">
            <h3>Credit Card</h3>
            <form>
                <div class="input-group">
                    <label for="cc-name">Card Holder Name</label>
                    <input type="text" id="cc-name" placeholder="John Doe">
                </div>
                <div class="input-group">
                    <label for="cc-number">Card Number</label>
                    <input type="text" id="cc-number" placeholder="4123 4567 8910 1234">
                </div>
                <div class="input-group">
                    <label for="cc-expiry">Expiry Date</label>
                    <input type="text" id="cc-expiry" placeholder="MM/YY">
                </div>
                <div class="input-group">
                    <label for="cc-cvv">CVV Code</label>
                    <input type="text" id="cc-cvv" placeholder="123">
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="payment-form" id="debit-card-form">
            <h3>Debit Card</h3>
            <form>
                <div class="input-group">
                    <label for="dc-name">Card Holder Name</label>
                    <input type="text" id="dc-name" placeholder="John Doe">
                </div>
                <div class="input-group">
                    <label for="dc-number">Card Number</label>
                    <input type="text" id="dc-number" placeholder="4123 4567 8910 1234">
                </div>
                <div class="input-group">
                    <label for="dc-expiry">Expiry Date</label>
                    <input type="text" id="dc-expiry" placeholder="MM/YY">
                </div>
                <div class="input-group">
                    <label for="dc-cvv">CVV Code</label>
                    <input type="text" id="dc-cvv" placeholder="123">
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="payment-form" id="paypal-form">
            <h3>PayPal</h3>
            <form>
                <button type="submit">Continue to PayPal</button>
            </form>
        </div>
    </div>
    <script src="scripts.js"></script>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const paymentOptions = document.querySelectorAll('.payment-options input[type="radio"]');
        const paymentForms = document.querySelectorAll('.payment-form');
        const openPopupBtn = document.getElementById('open-popup');
        const closePopupBtn = document.getElementById('close-popup');
        const paymentPopup = document.getElementById('payment-popup');
        const blurBackground = document.getElementById('blur-background');

        function showForm(id) {
            paymentForms.forEach(form => form.classList.remove('active'));
            document.getElementById(id).classList.add('active');
        }

        paymentOptions.forEach(option => {
            option.addEventListener('change', function() {
                showForm(option.id + '-form');
            });
        });

        // Open the popup
        openPopupBtn.addEventListener('click', function() {
            paymentPopup.classList.add('active');
            blurBackground.classList.add('active');
        });

        // Close the popup
        closePopupBtn.addEventListener('click', function() {
            paymentPopup.classList.remove('active');
            blurBackground.classList.remove('active');
        });

        // Trigger default form display
        showForm('credit-card-form');
    });
</script>