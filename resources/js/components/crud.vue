<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="student in students" :key="student.id">
                        <th scope="row">{{ student.id }}</th>
                        <td>{{ student.first_name }}</td>
                        <td>{{ student.last_name }}</td>
                        <td>{{ student.gender }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                students: {}
            }
        },
        methods: {
            loadStudents() {
                axios.get('api/students').then(({data}) => (this.students = data.students));
            }
        },
        created () {
            this.loadStudents()
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
