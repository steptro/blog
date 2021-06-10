<template>
    <div class="mt-16 mb-32 text-center">
        <span class="text-lg font-bold">What do you think about this blogpost?</span>

        <div v-if="error" class="mt-4 text-red-700">
            Already gave a reaction!
        </div>

        <div class="flex justify-center mt-8">
            <div class="">
                <button @click="addReaction('like')" class="flex align-items-center align-self-center border border-gray-400 rounded-md px-3 py-2 focus:shadow-2xl focus:shadow-inner mb-2"><span class="text-2xl mr-3">👍</span> <span class="my-auto">Like</span></button>
                <span>{{ likesCount }}</span>
            </div>

            <div class="ml-8">
                <button @click="addReaction('love')" class="flex align-items-center align-self-center border border-gray-400 rounded-md px-3 py-2 focus:shadow-2xl focus:shadow-inner mb-2"><span class="text-2xl mr-3">😍</span> <span class="my-auto">Love</span></button>
                <span>{{ lovesCount }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    import { v4 } from 'uuid';

    export default {
        props: ['postId', 'likes', 'loves'],
        data() {
            return {
                error: false,
                reacted: false,
                likesCount: parseInt(this.likes),
                lovesCount: parseInt(this.loves),
            }
        },
        methods: {
            addReaction(type) {
                if (!this.reacted) {
                    let deviceId = localStorage.getItem('deviceId');
                    if (deviceId == null) {
                        deviceId = v4();
                        localStorage.setItem('deviceId', deviceId);
                    }

                    axios
                        .post('/api/reaction/' + this.postId, {
                            type,
                            // deviceId,
                        })
                        .then(() => {
                            if (type === 'like') {
                                this.likesCount++;
                                this.reacted = true;
                            } else if (type === 'love') {
                                this.lovesCount++
                                this.reacted = true;
                            }
                        })
                        .catch(() => this.error = true);
                } else {
                    this.error = true;
                }
            }
        }
    }
</script>

<style scoped>

</style>
