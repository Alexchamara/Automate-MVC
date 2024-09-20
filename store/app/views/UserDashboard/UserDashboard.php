<!-- User Dashboard -->
<main class="user-dashboard-main-container">
    <!-- upper section -->
    <div class="dashboard-path-wrapper">
        <!-- Breadcrumb -->
        <div class="text-sm text-gray-600 mb-4">
            <a href="#" class="text-customBlue hover:underline" onclick="loadPage('dashboard')">Dashboard</a>
            <span id="breadcrumb"> / Dashboard</span>
        </div>
        <!-- Sign out btn -->
        <div class="text-sm mb-4">
            <a href="logout" class="text-customBlue hover:underline">Sign out<i class="fa-solid fa-arrow-right-from-bracket ml-1"></i></a>
        </div>
    </div>

    <!-- Dashboard -->
    <div class="user-dashboard-wrapper">
        <!-- Navbar for mobile -->
        <div class="bg-customBlue text-white p-4 flex justify-between items-center lg:hidden">
            <div class="text-lg font-bold">Dashboard</div>
            <button id="menuToggle" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Sidebar for desktop -->
        <div id="sidebar" class="dashboard-sidebar-desktop-wrapper">
            <ul class="dashboard-sidebar-options flex flex-col">
                <li class="u-sidebar-value rounded-t-md hover:rounded-t-md" data-page="dashboard" onclick="loadPage('dashboard')">
                    <i class="fa-regular fa-address-card ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="dashboard" class="dashboard-sidebar-title">Dashboard</label><br>
                    <span class="dashboard-sidebar-sub-title">Summary of your account</span>
                </li>
                <li class="u-sidebar-value" data-page="myAdverts" onclick="loadPage('myAdverts')">
                    <i class="fa-solid fa-rectangle-ad ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">My adverts</label><br>
                    <span class="dashboard-sidebar-sub-title">Vehicles you are selling</span>
                </li>
                <!-- <li class="u-sidebar-value" data-page="myMessages" onclick="loadPage('myMessages')">
                    <i class="fa-regular fa-envelope ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">My messages</label><br>
                    <span class="dashboard-sidebar-sub-title">Send and receive messages</span>
                </li> -->
                <li class="u-sidebar-value" data-page="notifications" onclick="loadPage('notification')">
                    <i class="fa-regular fa-bell ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">Notification</label><br>
                    <span class="dashboard-sidebar-sub-title">Receive notifications</span>
                </li>
                <li class="u-sidebar-value" data-page="savedAdverts" onclick="loadPage('savedAdverts')">
                    <i class="fa-regular fa-heart ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">Saved adverts</label><br>
                    <span class="dashboard-sidebar-sub-title">Ads you have saved for later</span>
                </li>
                <li class="u-sidebar-value" data-page="myOrders" onclick="loadPage('myOrders')">
                    <i class="fa-solid fa-bag-shopping ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">My orders</label><br>
                    <span class="dashboard-sidebar-sub-title">View all your orders</span>
                </li>
                <li class="u-sidebar-value" data-page="personalDetails" onclick="loadPage('personalDetails')">
                    <i class="fa-regular fa-user ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">Personal details</label><br>
                    <span class="dashboard-sidebar-sub-title">Information about you</span>
                </li>
                <li class="u-sidebar-value rounded-b-md hover:rounded-b-md border-none" data-page="accountSecurity" onclick="loadPage('accountSecurity')">
                    <i class="fa-solid fa-shield-halved ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">Account security</label><br>
                    <span class="dashboard-sidebar-sub-title">Change your password</span>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="u-dashboard-content-wrapper">
            <!-- Dashboard page -->
            <div id="dashboard" class="ud-page-wrapper">
                <div class="ud-dashboard-page">
                    <h2 class="text-[40px] font-bold text-customBlue">Hello! <?= $userData["name"]?></h2>
                    <div class="flex gap-10 text-[#252a34] mb-4">
                        <span class="mt-2"><i class="fa-regular fa-user mr-2"></i><?= $userData['name']?></span>
                        <span class="mt-2"><i class="fa-regular fa-envelope mr-2"></i><?= $userData["email"]?></span>
                        <span class="mt-2"><i class="fa-regular fa-calendar mr-2"></i>Member since: <?= $userData['createdAt']?></span>
                    </div>
                    <button class="ud-btn" onclick="loadPage('personalDetails')">Edit my details</button>
                </div>
                <div class="ud-dashboard-page">
                    <h2 class="text-[40px] font-bold text-customBlue">Find your next car</h2>
                    <div class="flex gap-10 text-[#252a34] mb-4">
                        <p class="mt-2">We are the fastest growing largest digital automotive marketplace in Sri Lanka.</p>
                    </div>
                    <a href="./advertListing.php" class="ud-btn">Browse latest car</a>
                </div>
                <div class="ud-dashboard-page">
                    <h2 class="text-[40px] font-bold text-customBlue">Looking to sell your car?</h2>
                    <div class="flex gap-10 text-[#252a34] mb-4">
                        <p class="mt-2">Make more money by selling your car with Automate 3 easy steps!</p>
                    </div>
                    <a href="createAdvert" class="ud-btn">Create your advert</a>
                </div>
            </div>

            <!-- My advert page -->
            <div id="myAdverts" class="ud-page-wrapper hidden">
                <div class="ud-advert-page">
                    <div class="ud-advert-status-wrapper flex-[25%]">
                        <p class="mt-2 mb-2"></i>Status</p>
                        <select name="" id="" class="border border-[#00000026] rounded-[5px]">
                            <option value="all">All</option>
                            <option value="live">Live</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="ud-advert-keyword-wrapper flex-[50%]">
                        <p class="mt-2 mb-2"></i>Keyword</p>
                        <div class="flex">
                            <input type="text" class="ud-advert-keyword-input" placeholder="Search adverts...">
                            <a href="#"><i class="ud-advert-keyword-search fa-solid fa-magnifying-glass"></i></a>
                        </div>
                    </div>
                </div>
                <div class="ud-empty-body">
                    <i class="fa-solid fa-magnifying-glass text-[#6C757D] text-[80px]"></i>
                    <h2 class="text-[#6C757D] text-[40px] font-bold">No adverts found</h2>
                    <span class="text-[#6C757D]">We couldn't find any records. Try changing search filters</span>
                    <a href="createAdvert" class="border bg-customRed text-white px-7 py-2 rounded-[50px] hover:shadow-4xl transition-all duration-300 ease-in-out">Create a new advert</a>
                </div>
            </div>

            <!-- My messages -->
            <!-- <div id="myMessages" class="ud-page-wrapper bg-white p-6 rounded shadow hidden">
                <h2 class="text-2xl font-bold text-blue-900">My messages</h2>
                <p class="mt-2">Your messages.</p>
            </div> -->


            <!-- Notification page -->
            <div id="notification" class="ud-page-wrapper hidden">
                <div class="ud-presonal-page">
                    <!-- order page -->
                </div>
                <div class="ud-empty-body">
                    <i class="fa-solid fa-magnifying-glass text-[#6C757D] text-[80px]"></i>
                    <h2 class="text-[#6C757D] text-[40px] font-bold">No any notification found</h2>
                    <span class="text-[#6C757D]">We couldn't find any notification.</span>
                </div>
            </div>

            <!-- Saved ad page -->
            <div id="savedAdverts" class="ud-page-wrapper hidden">
                <div class="ud-saved-advert-page">
                    <div class="ud-advert-keyword-wrapper flex-[50%]">
                        <p class="mt-2 mb-2"></i>Keyword</p>
                        <div class="flex">
                            <input type="text" class="ud-advert-keyword-input" placeholder="Search adverts...">
                            <a href="#"><i class="ud-advert-keyword-search fa-solid fa-magnifying-glass"></i></a>
                        </div>
                    </div>
                </div>

                <div class="ud-savedAd-container">
                    <ul>
                        <?php foreach ($savedAds as $ad): ?>
                            <li>
                                <?php require "./savedAdvertContainer.php"; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="ud-empty-body">
                    <i class="fa-solid fa-magnifying-glass text-[#6C757D] text-[80px]"></i>
                    <h2 class="text-[#6C757D] text-[40px] font-bold">No saved adverts found</h2>
                    <span class="text-[#6C757D]">We couldn't find any records. Try changing search filters</span>
                    <a href="#" class="border bg-customRed text-white px-7 py-2 rounded-[50px] hover:shadow-4xl transition-all duration-300 ease-in-out">Show latest adverts</a>
                </div>
            </div>

            <!-- My order page -->
            <div id="myOrders" class="ud-page-wrapper hidden">
                <div class="ud-presonal-page">
                    <!-- order page -->
                </div>
                <div class="ud-empty-body">
                    <i class="fa-solid fa-magnifying-glass text-[#6C757D] text-[80px]"></i>
                    <h2 class="text-[#6C757D] text-[40px] font-bold">No order found</h2>
                    <span class="text-[#6C757D]">We couldn't find any records. Try changing search filters</span>
                </div>
            </div>

            <!-- My presonal details -->
            <div id="personalDetails" class="ud-page-wrapper hidden">
                <div class="ud-presonal-page">
                    <div class="ud-pro-change">
                        <h2 class="text-[50px] font-bold text-customBlue">Your details</h2>
                        <span>Please keep your details up to date. Your personal data are stored securely. We do not share information with third parties.</span>
                        <form action="editProfile" method="POST" class="mt-4">
                            <div class="mb-4">
                                <span class="required"></span>
                                <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name
                                </label>
                                <input type="text" name="uName" id="lname" placeholder="<?= $userData['name']?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email address
                                </label>
                                <input type="text" name="uEmail" id="lemail" placeholder="<?= $userData['email']?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="mobile" class="block text-sm font-medium text-gray-700 ">Mobile
                                </label>
                                <input type="number" name="uPhone" id="lphoen" placeholder="<?= $userData['contactNumber']?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            <button type="submit" class="ud-btn">Save my details</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Account security page -->
            <div id="accountSecurity" class="ud-page-wrapper hidden">
                <div class="ud-security-page">
                    <div class="ud-pw-change">
                        <h2 class="text-[50px] font-bold text-customBlue">Your password</h2>
                        <span>Please make sure to have a secure password with at least 6 characters long.</span>
                        <form action="changePassword" method="POST" class="mt-4">
                            <div class="mb-4">
                                <label for="currentPassword" class="block text-sm font-medium text-gray-700 required">Current password</label>
                                <input type="password" name="currentPassword" id="currentPassword" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                            </div>
                            <div class="mb-4">
                                <label for="newPassword" class="block text-sm font-medium text-gray-700 required">New password</label>
                                <input type="password" name="newPassword" id="newPassword" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                            </div>
                            <div class="mb-4">
                                <label for="confirmPassword" class="block text-sm font-medium text-gray-700 required">Confirm password</label>
                                <input type="password" name="confirmPassword" id="confirmPassword" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                            </div>
                            <button type="submit" class="ud-btn">Change my password</button>
                        </form>
                    </div>
                </div>
                <div class="bg-red-100 p-6 rounded shadow-6xl my-5">
                    <div class="ud-dlt-acc ">
                        <h2 class="text-[50px] font-bold text-customBlue">Delete account</h2>
                        <span>By deleting the account your data will be permanently removed and you will no longer have access to them.</span>
                    </div>
                    <form action="deleteProfile" methhod="POST">
                        <button type="submit" class="ud-btn mt-3">Delete my account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Load the dashboard page in mobile view
        document.getElementById('menuToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        });

        // Load the selected page
        function loadPage(page) {
            // Hide all pages
            var pages = document.querySelectorAll('.ud-page-wrapper');
            pages.forEach(function(p) {
                p.classList.add('hidden');
            });

            // Show the selected page if it exists
            var selectedPage = document.getElementById(page);
            if (selectedPage) {
                selectedPage.classList.remove('hidden');
            } else {
                console.error(`Page with id '${page}' not found.`);
                return;
            }

            // Update the active state in the sidebar
            var items = document.querySelectorAll('.u-sidebar-value');
            items.forEach(function(item) {
                item.classList.remove('bg-customBlue', 'text-white');
                item.classList.add('text-black');
            });

            var activeItem = document.querySelector(`.u-sidebar-value[data-page="${page}"]`);
            if (activeItem) {
                activeItem.classList.add('bg-customBlue', 'text-white');
                activeItem.classList.remove('text-black');
            } else {
                console.error(`Sidebar item with data-page="${page}" not found.`);
            }

            // Update the breadcrumb
            var breadcrumb = document.getElementById('breadcrumb');
            if (breadcrumb) {
                breadcrumb.textContent = ` / ${page.charAt(0).toUpperCase() + page.slice(1).replace(/([A-Z])/g, ' $1').trim()}`;
            } else {
                console.error('Breadcrumb element not found.');
            }
        }

        // Set default text color to black on page load and select default tab
        document.addEventListener('DOMContentLoaded', function() {
            var items = document.querySelectorAll('.u-sidebar-value');
            items.forEach(function(item) {
                item.classList.add('text-black');
            });

            // Set the default tab to 'dashboard'
            loadPage('dashboard');
        });
    </script>
</main>