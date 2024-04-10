<script setup>
import {Head, Link} from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const props = defineProps({
    weather: Object,
});

</script>

<template>
    <Head title="Welcome" />
    <div class="flex flex-inline">
        <div id="weather" class="bg-[url(/public/weatheria-bg.jpg)] w-3/4 h-screen flex flex-inline justify-between text-white p-16 ">
            <div>
                <h2 class="text-4xl capitalize">{{ weather.name }}, {{ weather.country }}</h2>
                <h4 class="text-2xl capitalize">{{  weather.date }}</h4>
                <p class="text-2xl">{{ weather.time}}</p>
                <img :src="'https://openweathermap.org/img/wn/' + weather.icon + '@4x.png'" alt="Weather Icon">
                <p class="capitalize text-xl">{{ weather.description }}</p>
            </div>
            <div>
                <h2 class="text-8xl">{{ Math.round(weather.temp) }}&deg;</h2>
                <h2 class="text-6xl">{{ Math.round(weather.temp_min) }}&deg; / {{ Math.round(weather.temp_max) }}&deg;</h2>


            </div>
        </div>
        <div id="login" class="bg-white w-1/4 h-screen flex align-center">
            <div class="flex flex-inline justify-center align-center">
                <ApplicationLogo />
                <h2 class="font-extrabold text-2xl" >Weatheria</h2>
            </div>

        </div>
    </div>
</template>
