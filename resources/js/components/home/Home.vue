<template>
    <div>
        <sui-card-group :items-per-row="2">
            <sui-card>
                <sui-card-content>
                    <sui-card-header>{{ students.total }}</sui-card-header>
                    <sui-card-description>alunos cadastrados</sui-card-description>
                </sui-card-content>
                <sui-card-content extra>
                    {{ students.active }} ativos
                </sui-card-content>
            </sui-card>

            <sui-card>
                <sui-card-content>
                    <sui-card-header>{{ volunteers.total }}</sui-card-header>
                    <sui-card-description>voluntários cadastrados</sui-card-description>
                </sui-card-content>
                <sui-card-content extra>
                    {{ volunteers.active }} ativos
                </sui-card-content>
            </sui-card>
        </sui-card-group>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$http.get('/api/count', this.$store.getters.header)
                .then(response => {
                    this.students = response.body.students;
                    this.volunteers = response.body.volunteers;
                })
                .catch(error => {
                    console.log(error);
                    if (error.status == 401) {
                        this.$store.commit('logout');
                        this.$router.replace('/login')
                    } else {
                        console.log(error);
                    }
                });
        },
        data() {
            return {
                students: {},
                volunteers: {}
            }
        },
        methods: {
            add(type) {
                if (type === 'student') {
                    this.$router.push('new-student');
                } else {
                    this.$router.push('new-volunteer');
                }
            }
        }
    }
</script>