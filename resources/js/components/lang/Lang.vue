<template>
    <select v-model="$i18n.locale" @change="changeLanguage" id="language">
            <option value="en">English</option>
            <option value="ar">عربى</option>
        </select>
</template>

<script>

export default {
    name : "Lang",
    methods: {
        changeLanguage(obj) {
            // LocalStorage
            localStorage.setItem('language', obj.target.value);
            // Arabic To En and En To Ar
            if (obj.target.value == 'en') {
                document.body.style.direction = "ltr";
            } else if (obj.target.value == 'ar') {
                document.body.style.direction = "rtl";
            }
        }
    }
}
</script>

<style scoped>
select {
  appearance: none;
  outline: 0;
  border: 0;
  box-shadow: none;
  color: #fff;
  background-color: var(--secondary-text-color);
  cursor: pointer;
  text-align: center;
}
/* Remove IE arrow */
select::-ms-expand {
  display: none;
}
select:hover{
    cursor: pointer;
}
option:hover{
    background: none;
    cursor: pointer;
}
</style>