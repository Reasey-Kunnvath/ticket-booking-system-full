        <!-- Sidebar -->
        <aside id="with-navbar-sidebar"
            class="fixed top-0 left-0 w-64 h-screen bg-base-100 shadow-sm hidden sm:flex flex-col pt-15 z-0">
            <div class="flex-1 p-4 overflow-y-auto">
                <ul class="menu p-0">
                    <li>
                        <a href="{{ url('/admin/dashboard') }}">
                            <span class="icon-[tabler--home] size-5"></span>
                            Home
                        </a>
                    </li>
                    <li class="space-y-0.5">
                        <a class="collapse-toggle collapse-open:bg-base-content/10" id="menu-app"
                            data-collapse="#menu-app-collapse">
                            <span class="icon-[tabler--apps] size-5"></span>
                            Apps
                            <span
                                class="icon-[tabler--chevron-down] collapse-open:rotate-180 size-4 transition-all duration-300"></span>
                        </a>
                        <ul id="menu-app-collapse"
                            class="collapse hidden w-auto space-y-0.5 overflow-hidden transition-[height] duration-300"
                            aria-labelledby="menu-app">
                            <li>
                                <a href="#">
                                    <span class="icon-[tabler--message] size-5"></span>
                                    Chat
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon-[tabler--calendar] size-5"></span>
                                    Calendar
                                </a>
                            </li>
                            <li class="space-y-0.5">
                                <a class="collapse-toggle collapse-open:bg-base-content/10" id="sub-menu-academy"
                                    data-collapse="#sub-menu-academy-collapse">
                                    <span class="icon-[tabler--book] size-5"></span>
                                    Academy
                                    <span class="icon-[tabler--chevron-down] collapse-open:rotate-180 size-4"></span>
                                </a>
                                <ul id="sub-menu-academy-collapse"
                                    class="collapse hidden w-auto space-y-0.5 overflow-hidden transition-[height] duration-300"
                                    aria-labelledby="sub-menu-academy">
                                    <li>
                                        <a href="#">
                                            <span class="icon-[tabler--books] size-5"></span>
                                            Courses
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="icon-[tabler--list-details] size-5"></span>
                                            Course details
                                        </a>
                                    </li>
                                    <li class="space-y-0.5">
                                        <a class="collapse-toggle collapse-open:bg-base-content/10"
                                            id="sub-menu-academy-stats"
                                            data-collapse="#sub-menu-academy-stats-collapse">
                                            <span class="icon-[tabler--chart-bar] size-5"></span>
                                            Stats
                                            <span
                                                class="icon-[tabler--chevron-down] collapse-open:rotate-180 size-4"></span>
                                        </a>
                                        <ul id="sub-menu-academy-stats-collapse"
                                            class="collapse hidden w-auto space-y-0.5 overflow-hidden transition-[height] duration-300"
                                            aria-labelledby="sub-menu-academy-stats">
                                            <li>
                                                <a href="#">
                                                    <span class="icon-[tabler--chart-donut] size-5"></span>
                                                    Goals
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-[tabler--user] size-5"></span>
                            Account
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-[tabler--message] size-5"></span>
                            Notifications
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-[tabler--mail] size-5"></span>
                            Email
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-[tabler--calendar] size-5"></span>
                            Calendar
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-[tabler--shopping-bag] size-5"></span>
                            Product
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-[tabler--login] size-5"></span>
                            Sign In
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-[tabler--logout-2] size-5"></span>
                            Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
