<template>
    <div class="mt-16 mb-32 text-center">
        <span class="text-lg font-bold">What do you think about this blogpost?</span>
        <div class="flex justify-center mt-8">
            <div class="mr-8">
                <button @click="addReaction('like')" class="flex align-items-center align-self-center border border-gray-400 rounded-md px-3 py-2 focus:shadow-2xl focus:shadow-inner mb-2"><span class="text-2xl mr-3">👍</span> <span class="my-auto">Like</span></button>
                <span>{{ likesCount }}</span>
            </div>

            <div class="mr-8">
                <button @click="addReaction('love')" class="flex align-items-center align-self-center border border-gray-400 rounded-md px-3 py-2 focus:shadow-2xl focus:shadow-inner mb-2"><span class="text-2xl mr-3">😍</span> <span class="my-auto">Love</span></button>
                <span>{{ lovesCount }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['postId', 'likes', 'loves'],
        data() {
            return {
                reacted: false,
                likesCount: parseInt(this.likes),
                lovesCount: parseInt(this.loves),
            }
        },
        methods: {
            addReaction(type) {
                if (!this.reacted) {
                    const headers = {
                        'Content-Type': 'application/json',
                    };

                    axios
                        .post('/api/reaction/' + this.postId + '/' + type, {
                            headers
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
                        .catch(() => alert("Already gave a reaction"));
                } else {
                    alert("Already gave a reaction");
                }
            }
        }
    }
</script>

<style scoped>

</style>
