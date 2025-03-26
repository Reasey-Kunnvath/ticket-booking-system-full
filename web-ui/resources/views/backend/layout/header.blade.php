<!-- Header -->
<header>
    <nav id="header" class="navbar bg-indigo-500 shadow-sm shadow-indigo-500 fixed top-0 z-10 w-full px-6 py-3 h-15">
        <div class="flex flex-1 items-center">
            <a class="link text-base-content link-neutral text-xl font-bold no-underline" href="#">
                FlyonUI
            </a>
        </div>
        <div class="navbar-end flex items-center gap-4">
            <!-- Theme Toggle Button -->
            <div class="flex items-center justify-end p-4">
                <button id="theme-toggle" class="btn btn-circle btn-ghost">
                    <svg id="sun-icon" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                    <svg id="moon-icon" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                </button>
            </div>
            <!-- Notifications Dropdown -->
            <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
                <button id="dropdown-notifications" type="button"
                    class="dropdown-toggle btn btn-text btn-circle dropdown-open:bg-base-content/10 size-10"
                    data-hs-toggle="#dropdown-notifications-menu" aria-haspopup="menu" aria-expanded="false"
                    aria-label="Notifications">
                    <div class="indicator">
                        <span class="indicator-item bg-error size-2 rounded-full"></span>
                        <span class="icon-[tabler--bell] text-base-content size-5.5"></span>
                    </div>
                </button>
                <div id="dropdown-notifications-menu" class="dropdown-menu dropdown-open:opacity-100 hidden"
                    role="menu" aria-orientation="vertical" aria-labelledby="dropdown-notifications">
                    <div class="dropdown-header justify-center">
                        <h6 class="text-base-content text-base">Notifications</h6>
                    </div>
                    <div class="overflow-auto text-base-content/80 max-h-56 max-md:max-w-60">
                        <div class="dropdown-item flex items-start gap-3 p-3 hover:bg-base-200">
                            <div class="avatar avatar-away-bottom">
                                <div class="w-10 rounded-full">
                                    <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar 1" />
                                </div>
                            </div>
                            <div class="w-60">
                                <h6 class="truncate text-base">Charles Franklin</h6>
                                <small class="text-base-content/50 truncate">Accepted your connection</small>
                            </div>
                        </div>
                        <div class="dropdown-item flex items-start gap-3 p-3 hover:bg-base-200">
                            <div class="avatar">
                                <div class="w-10 rounded-full">
                                    <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-2.png" alt="avatar 2" />
                                </div>
                            </div>
                            <div class="w-60">
                                <h6 class="truncate text-base">Martian added moved Charts & Maps task to the done board.
                                </h6>
                                <small class="text-base-content/50 truncate">Today 10:00 AM</small>
                            </div>
                        </div>
                        <div class="dropdown-item flex items-start gap-3 p-3 hover:bg-base-200">
                            <div class="avatar avatar-online-bottom">
                                <div class="w-10 rounded-full">
                                    <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-8.png" alt="avatar 8" />
                                </div>
                            </div>
                            <div class="w-60">
                                <h6 class="truncate text-base">New Message</h6>
                                <small class="text-base-content/50 truncate">You have new message from Natalie</small>
                            </div>
                        </div>
                        <div class="dropdown-item flex items-start gap-3 p-3 hover:bg-base-200">
                            <div class="avatar avatar-placeholder">
                                <div class="bg-neutral text-neutral-content w-10 rounded-full p-2">
                                    <span class="icon-[tabler--user] size-full"></span>
                                </div>
                            </div>
                            <div class="w-60">
                                <h6 class="truncate text-base">Application has been approved 🚀</h6>
                                <small class="text-base-content/50 text-wrap">Your ABC project application has been
                                    approved.</small>
                            </div>
                        </div>
                        <div class="dropdown-item flex items-start gap-3 p-3 hover:bg-base-200">
                            <div class="avatar">
                                <div class="w-10 rounded-full">
                                    <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-10.png" alt="avatar 10" />
                                </div>
                            </div>
                            <div class="w-60">
                                <h6 class="truncate text-base">New message from Jane</h6>
                                <small class="text-base-content/50 text-wrap">Your have new message from Jane</small>
                            </div>
                        </div>
                        <div class="dropdown-item flex items-start gap-3 p-3 hover:bg-base-200">
                            <div class="avatar">
                                <div class="w-10 rounded-full">
                                    <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-3.png" alt="avatar 3" />
                                </div>
                            </div>
                            <div class="w-60">
                                <h6 class="truncate text-base">Barry Commented on App review task.</h6>
                                <small class="text-base-content/50 truncate">Today 8:32 AM</small>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="dropdown-footer justify-center gap-1 p-3 hover:bg-base-200">
                        <span class="icon-[tabler--eye] size-4"></span>
                        View all
                    </a>
                </div>
            </div>

            <!-- User Profile Dropdown -->
            <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
                <button id="dropdown-profile" type="button" class="dropdown-toggle flex items-center"
                    data-hs-toggle="#dropdown-profile-menu" aria-haspopup="menu" aria-expanded="false"
                    aria-label="Profile">
                    <div class="avatar">
                        <div class="size-9.5 rounded-full">
                            <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar 1" />
                        </div>
                    </div>
                </button>
                <ul id="dropdown-profile-menu" class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60"
                    role="menu" aria-orientation="vertical" aria-labelledby="dropdown-profile">
                    <li class="dropdown-header gap-2 p-3">
                        <div class="avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar" />
                            </div>
                        </div>
                        <div>
                            <h6 class="text-base-content text-base font-semibold">John Doe</h6>
                            <small class="text-base-content/50">Admin</small>
                        </div>
                    </li>
                    <li>
                        <a class="dropdown-item flex items-center gap-2 p-3 hover:bg-base-200" href="#">
                            <span class="icon-[tabler--user] size-5"></span>
                            My Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item flex items-center gap-2 p-3 hover:bg-base-200" href="#">
                            <span class="icon-[tabler--settings] size-5"></span>
                            Settings
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item flex items-center gap-2 p-3 hover:bg-base-200" href="#">
                            <span class="icon-[tabler--receipt-rupee] size-5"></span>
                            Billing
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item flex items-center gap-2 p-3 hover:bg-base-200" href="#">
                            <span class="icon-[tabler--help-triangle] size-5"></span>
                            FAQs
                        </a>
                    </li>
                    <li class="dropdown-footer gap-2 p-3">
                        <a class="btn btn-error btn-soft btn-block flex items-center gap-2" href="#">
                            <span class="icon-[tabler--logout] size-5"></span>
                            Sign out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const themeToggle = document.getElementById("theme-toggle");
        const sunIcon = document.getElementById("sun-icon");
        const moonIcon = document.getElementById("moon-icon");
        const htmlElement = document.documentElement;

        const savedTheme = localStorage.getItem("theme") || "light";
        setTheme(savedTheme);

        function setTheme(theme) {
            if (theme === "dark") {
                htmlElement.classList.add("dark");
                sunIcon.classList.remove("hidden");
                moonIcon.classList.add("hidden");
                localStorage.setItem("theme", "dark");

            } else {
                htmlElement.classList.remove("dark");
                sunIcon.classList.add("hidden");
                moonIcon.classList.remove("hidden");
                localStorage.setItem("theme", "light");
            }


        }

        themeToggle.addEventListener("click", function() {
            if (htmlElement.classList.contains("dark")) {
                setTheme("light");
            } else {
                setTheme("dark");
            }
            window.location.reload();
        });
    });
</script>
