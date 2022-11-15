<template lang="">
    <div class="main-landing">
        <div class="left-side">
            <h1>SMS Mini Vue</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non necessitatibus a libero debitis nemo dolorem iusto hic vel, tenetur earum!</p>
        </div>
        <div class="right-side"><img src="@/assets/images/Sent-Message-bro.png" alt=""></div>
    </div>
</template>
<script>
export default {

}
</script>
<style scoped>
.main-landing {
    display: flex;
    height: 100%;
    padding: 0 15%;
    justify-content: center;
    align-items: center;
}

h1 {
    font-size: clamp(32px, 7vw, 64px);
}

P {
    font-size: clamp(16px, 2vw, 24px);
}
</style>