<!-- Navbar Start -->
<div id="appuser">
    <div class="container-fluid nav-bar bg-transparent">
        <nav class="navbar navbar-expand-lg shadow-lg bg-white navbar-light py-0 px-4">
            <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src={{ asset('frontend/assets/img/icon-deal.png') }} alt="Icon"
                        style="width: 30px; height: 30px;">
                </div>
                <h1 class="m-0 text-primary">OG</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ url('/') }}"
                        class="nav-item nav-link {{ request()->routeIs('Home') ? 'active' : '' }}">Home</a>
                    <div class="nav-item dropdown">
                        <a href="{{ url('/all-event') }}"
                            class="nav-link dropdown-toggle {{ request()->routeIs('All-Events') || request()->routeIs('Concert') ? 'active' : '' }}"
                            data-bs-toggle="dropdown">Events</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{ url('/all-event') }}"
                                class="dropdown-item {{ request()->routeIs('All-Events') ? 'active' : '' }}">All
                                Events</a>
                            <a href="{{ url('/upcoming-event') }}"
                                class="dropdown-item {{ request()->routeIs('Upcoming-Events') ? 'active' : '' }}">Upcoming</a>
                            <a href="{{ url('/most-popular-event') }}"
                                class="dropdown-item {{ request()->routeIs('Most-Popular-Events') ? 'active' : '' }}">Most
                                Popular</a>
                            <a href="{{ url('/concert') }}"
                                class="dropdown-item {{ request()->routeIs('Concert') ? 'active' : '' }}">Concerts</a>
                            <a href="{{ url('/conference') }}"
                                class="dropdown-item {{ request()->routeIs('Conference') ? 'active' : '' }}">Conferences</a>
                            <a href="{{ url('/sport') }}"
                                class="dropdown-item {{ request()->routeIs('Sport') ? 'active' : '' }}">Sports</a>
                        </div>
                    </div>
                    {{-- <a href="{{url('/about')}}" class="nav-item nav-link {{ request()->routeIs('About') ? 'active' : '' }}">About</a> --}}

                    <a href="{{ url('/help-center') }}"
                        class="nav-item nav-link {{ request()->routeIs('Help-Center') ? 'active' : '' }}">Help
                        Center</a>
                    <div v-if="isLoggedIn">
                        {{-- href="{{ url('/cart') }}" --}}
                        <a :href="'/cart?uid=' + payload.user_id + '&token=' + payload.token"
                            class="nav-item nav-link {{ request()->routeIs('Cart') ? 'active' : '' }}">
                            Cart
                            <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                            <span
                                class="small-badge top-0 start-100 translate-middle badge ms-1 rounded-pill bg-danger">2</span>
                        </a>
                    </div>
                    <div>

                    </div>
                    {{-- @if (session('role') == 'admin' || session('role') == 'user')
                        <a href="{{ url('/cart') }}"
                            class="nav-item nav-link {{ request()->routeIs('Cart') ? 'active' : '' }}">
                            Cart
                            <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                            <span
                                class="small-badge top-0 start-100 translate-middle badge ms-1 rounded-pill bg-danger">2</span>
                        </a>
                    @else
                        <a href="{{ url('/login') }}"
                            class="nav-item nav-link {{ request()->routeIs('Cart') ? 'active' : '' }}">
                            Cart
                            <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                            <span
                                class="small-badge top-0 start-100 translate-middle badge ms-1 rounded-pill bg-danger">2</span>
                        </a>
                    @endif --}}
                </div>
                <a href="{{ url('/sell-your-ticket') }}" class="btn btn-primary px-3 d-none d-lg-flex">Sell Your
                    Tickets</a>
            </div>
            <div v-if="isLoggedIn">
                {{-- /cart?uid=${this.payload.user_id}&token=${this.payload.token}" --}}
                <a :href="'/user-profile?uid=' + payload.user_id + '&token=' + payload.token"
                    class="nav-item nav-link d-flex align-items-center">
                    <div class="p-2 me-2">
                        <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Icon"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                    </div>
                </a>
            </div>
            <div v-else>
                <a href="{{ url('/login') }}" class="nav-item nav-link">
                    <div class="p-2 me-2">
                        Login
                    </div>
                </a>
            </div>
            {{-- @if (session('role') == 'admin')
                <a href="{{ url('/dashboard') }}" class="nav-item nav-link d-flex align-items-center">
                    <div class="p-2 me-2">
                        Dashboard
                    </div>
                </a>
            @elseif (session('role') == 'user')
                <a href="{{ url('/user-profile') }}" class="nav-item nav-link d-flex align-items-center">
                    <div class="p-2 me-2">
                        <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Icon"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                    </div>
                </a>
            @else
                <a href="{{ url('/login') }}" class="nav-item nav-link">
                    <div class="p-2 me-2">
                        Login
                    </div>
                </a>
            @endif --}}
        </nav>
    </div>
</div>

<script>
    new Vue({
        el: '#appuser',
        data: {
            isLoggedIn: null,
            payload: {
                user_id: localStorage.getItem('uid?'),
                token: localStorage.getItem('token')
            }

        },
        mounted() {
            this.loggedInStatus();
            // console.log(this.isLoggedIn);
        },
        methods: {
            loggedInStatus() {
                this.isLoggedIn = localStorage.getItem('isLoggedIn');
            },
        },
    })
</script>
<!-- Navbar End -->
