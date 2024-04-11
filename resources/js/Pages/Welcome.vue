<script setup>
import {Head, Link} from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const props = defineProps({
    weather: Object,
});

</script>


<template>
    <Head title="Welcome"></Head>
    <div class="flex flex-inline">
        <div
            id="weather"
            :style="{ backgroundImage: `url('/images/${weather.time_of_day}/${weather.image}')` }"
            class="bg-cover bg-no-repeat object-contain w-3/4 h-screen flex flex-inline justify-between text-white p-16"
        >
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
        <div id="login" class="bg-white w-1/4 h-screen flex  justify-center items-center p-9">
            <div class="flex-col justify-center">
                <div class="flex flex-inline justify-center items-center mb-32">
                    <ApplicationLogo />
                    <h2 class="font-extrabold text-2xl" >Weatheria</h2>
                </div>
                <div>
                    <p class="text-4xl font-extrabold">Step into the Elements: Your Instant Window to Real-Time Weather Updates!</p>
                </div>
                <div class="mt-10">
                    <button class="bg-deep-purple-500 hover:bg-deep-purple-400 text-white font-bold py-2 px-4 rounded">
                        Discover Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
