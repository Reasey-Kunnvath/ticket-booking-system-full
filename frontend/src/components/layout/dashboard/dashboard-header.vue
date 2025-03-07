<script setup lang="ts">
import { RouterLink, useRouter } from 'vue-router'
import { handleLogout } from '@/common/helper/auth.helper'
import useUserContext from '@/stores/user.context'
import { APP_NAME, ROLE, ROLE_NAME } from '@/common/constants/default.const'
const router = useRouter()
const { user } = useUserContext()

const logout = () => {
  handleLogout()
  router.push(user?.role_id === ROLE.ADMIN ? '/admin/login' : '/event-provider/login')
}
</script>

<template>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <RouterLink to="/dashboard/admin" class="logo d-flex align-items-center">
        <img src="../../../assets/img/logo.png" alt="" />
        <span class="d-none d-lg-block">{{ APP_NAME }}</span>
      </RouterLink>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a
            class="nav-link nav-profile d-flex align-items-center pe-0"
            href="#"
            data-bs-toggle="dropdown"
          >
            <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" />
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ user?.name }}</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Name : {{ user?.name }}</h6>
              <span v-if="user?.role_id">Role : {{ ROLE_NAME[user?.role_id] }}</span>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item" style="margin-right: 20px">
          <button
            class="btn btn-danger d-flex align-items-center pe-3 ps-3"
            @click="logout"
            style="padding: 8px 16px; font-size: 14px; display: flex; align-items: center"
          >
            <i class="bi bi-box-arrow-right" style="font-size: 18px"></i>
            <span class="d-none d-md-block ps-2">Sign Out</span>
          </button>
        </li>
      </ul>
    </nav>
  </header>
</template>
