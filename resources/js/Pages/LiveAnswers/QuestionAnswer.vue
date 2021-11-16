<template>
    <div class="question-answer">
        {{ question.question }}
    </div>
</template>

<script>
    export default {
        name: 'QuestionAnswer',

        props: [
            'question'
        ],
    }
</script>

<style lang="scss" scoped>

</style>
