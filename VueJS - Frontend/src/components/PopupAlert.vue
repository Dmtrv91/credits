<template>
    <div
      v-if="'success' === type"
      class="alert alert-success popup-alert"
      :class="active ? '' : 'd-none'"
      role="alert"
      id="popupAlert"
    >
      <div class="fw-bold">
        <i class="bi bi-check-circle-fill me-1"></i>
        Success
      </div>
      {{ text }}
    </div>
    <div
      v-else-if="'warning' === type"
      class="alert alert-warning popup-alert"
      :class="active ? '' : 'd-none'"
      role="alert"
      id="popupAlert"
    >
      <div class="fw-bold">
        <i class="bi bi-exclamation-triangle-fill me-1"></i>
        Warning
      </div>
      {{ text }}
    </div>
    <div
      v-else-if="'danger' === type"
      class="alert alert-danger popup-alert"
      :class="active ? '' : 'd-none'"
      role="alert"
      id="popupAlert"
    >
      <div class="fw-bold">
        <i class="bi bi-exclamation-octagon-fill me-1"></i>
        Error
      </div>
      {{ text }}
    </div>
    <div
      v-else
      class="alert alert-info popup-alert"
      :class="active ? '' : 'd-none'"
      role="alert"
      id="popupAlert"
    >
      <div class="fw-bold">
        <i class="bi bi-info-square-fill me-1"></i>
        Info
      </div>
      {{ text }}
    </div>
  </template>
  
  <script>
  export default {
    name: "PopupAlert",
    data() {
      return {
        active: false,
        type: "",
        text: "",
      };
    },
    mounted() {
      this.emitter.on("popup_alert", (data) => {
        this.active = true;
        this.type = data.type ? data.type : "";
        this.text = data.text ? data.text : "";
  
        setTimeout(() => {
          this.active = false;
        }, 2500);
      });
    },
    methods: {},
  };
  </script>