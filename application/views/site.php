<?php
/** @var $title string */
?>

<h2 class="text-center"><?= $title ?></h2>

<div id="app">
    <table class="table table-striped table-bordered">
        <tr v-for="item in courses">
            <td>{{item.id}}</td>
            <td>{{item.title}}</td>
            <td>{{item.start}}</td>
            <td>
                <span v-if="!item.isBought" class="btn btn-success" @click="buy(item.id)">Buy</span>
                <span v-if="item.isBought" class="btn btn-danger" @click="cancel(item.id)">Cancel</span>
            </td>
        </tr>
    </table>
</div>

<script src="/vue.js"></script>

<script>
    const vm = new Vue({
        el: '#app',
        data: {
            courses: [],
        },
        mounted() {
            $.ajaxSetup({async: false});
            this.getCourses();
        },
        methods: {
            getCourses() {
                let courses = this.postCourses();
                let boughtCourses = this.postBoughtCourses();

                courses.forEach(item => {
                    let isBought = boughtCourses.find(course => course.course_id === item.id);
                    this.$set(item, 'isBought', isBought !== undefined);
                });

                this.courses = courses;
            },
            postCourses() {
                let result = [];

                $.post('api/courses/list')
                    .done(function(response) {
                        result = response;
                    })
                    .fail(function(error) {
                        console.error(error);
                        alert(error);
                    });

                return result;
            },
            postBoughtCourses() {
                let result = [];

                $.post(`api/courses/bought/1`)
                    .done(function(response) {
                        result = response;
                    })
                    .fail(function(error) {
                        console.error(error);
                        alert(error);
                    });

                return result;
            },
            cancel(id) {
                if (confirm('Are you sure?')) {
                    $.post(`api/course/${id}/cancel`)
                        .done(function(response) {
                            alert(response);
                            vm.getCourses();
                        })
                        .fail(function(error) {
                            console.error(error);
                            alert(error);
                        });
                }
            },
            buy(id) {
                if (confirm('Are you sure?')) {
                    $.post(`api/course/${id}/buy`)
                        .done(function(response) {
                            alert(response);
                            vm.getCourses();
                        })
                        .fail(function(error) {
                            console.error(error);
                            alert(error);
                        });
                }
            },
        }
    });
</script>