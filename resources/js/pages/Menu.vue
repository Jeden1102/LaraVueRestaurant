<template>
    <div class="container">
        <h2 class="my-4">Pick your favourite food and enjoy the meal !</h2>
        <b-card no-body>
            <b-tabs pills card vertical>
            <b-tab v-for="category in categoryList" :key="category.id" :title="category.name" active><b-card-text>{{ category.name }}</b-card-text></b-tab>
            </b-tabs>
        </b-card>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                categoryList:null,
            }
        },
        mounted(){
            let self = this;
            axios.get('/api/showCategories')
            .then(function (response) {
                self.categoryList = response.data;
                console.log(self.categoryList);
            })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
            });
        }
    }
</script>

<style lang="scss" scoped>

</style>