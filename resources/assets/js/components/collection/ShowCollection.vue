<template>
    <div class="row">
        <div class="panel panel-default col-md-8 col-md-offset-2">
            <div class="panel-body">
                <div class="col-md-4">
                    <img :src="painting.image" height="200px" width="200px">
                </div>
                <div class="row col-md-8">
                    <div class="col-md-12">
                        <p>{{ painting.name }}</p>
                    </div>
                    <div class="col-md-12">
                        <p>{{ painting.width }} cm x {{ painting.height }} cm</p>
                    </div>
                    <div class="col-md-12">
                        <p>{{ painting.description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        painting: Object
   }
}
</script>
<style scoped>

</style>