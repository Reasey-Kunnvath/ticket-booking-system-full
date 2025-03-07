<script setup lang="ts">
import type { TDashboardLoginFormValue } from '@/common/types'
import { ref, type PropType } from 'vue'

const props = defineProps({
  handleSubmit: {
    type: Function as PropType<(value: TDashboardLoginFormValue) => void>,
    required: true,
  },
  loading: {
    type: Boolean,
    required: true,
  },
  title: {
    type: String,
    required: true,
  },
  defaultEmail: {
    type: String,
    default: '',
  },
  defaultPassword: {
    type: String,
    default: '',
  },
})

const email = ref(props.defaultEmail)
const password = ref(props.defaultPassword)

const emailError = ref(false)
const passwordError = ref(false)

const submitForm = () => {
  emailError.value = false
  passwordError.value = false

  if (!email.value || !password.value) {
    if (!email.value) emailError.value = true
    if (!password.value) passwordError.value = true
    return
  }

  props.handleSubmit({
    email: email.value,
    password: password.value,
  })
}
</script>

<template>
  <div class="container">
    <section
      class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4"
    >
      <div class="container">
        <div class="row justify-content-center">
          <div
            class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center"
          >
            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="/assets/img/logo.png" alt="" />
                <span class="d-none d-lg-block">{{ title }}</span>
              </a>
            </div>

            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your email & password to login</p>
                </div>

                <form class="row g-3 needs-validation" novalidate @submit.prevent="submitForm">
                  <div class="col-12">
                    <label for="yourEmail" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input
                        type="email"
                        v-model="email"
                        class="form-control"
                        id="yourEmail"
                        required
                        :class="{ 'is-invalid': emailError }"
                      />
                      <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input
                      type="password"
                      v-model="password"
                      class="form-control"
                      id="yourPassword"
                      required
                      :class="{ 'is-invalid': passwordError }"
                    />
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="rememberMe" />
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit" :disabled="loading">
                      <span
                        v-if="loading"
                        class="spinner-border spinner-border-sm"
                        role="status"
                        aria-hidden="true"
                      ></span>
                      <span v-if="!loading">Login</span>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
