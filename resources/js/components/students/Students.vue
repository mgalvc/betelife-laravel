<template>
    <div>
        <div>
            <router-link :to="{name: 'new-student'}">
                <sui-button color="green">Novo Aluno</sui-button>
            </router-link>
        </div>
        <sui-table>
            <sui-table-header>
                <sui-table-row>
                    <sui-table-header-cell>Nome</sui-table-header-cell>
                    <sui-table-header-cell>Idade</sui-table-header-cell>
                    <sui-table-header-cell>Mãe</sui-table-header-cell>
                    <sui-table-header-cell>Telefone</sui-table-header-cell>
                    <sui-table-header-cell>Status</sui-table-header-cell>
                    <sui-table-header-cell>Ações</sui-table-header-cell>
                </sui-table-row>
            </sui-table-header>
            <sui-table-body>
                <sui-table-row v-for="student in students" :key="student.id">
                    <sui-table-cell>{{ student.name }}</sui-table-cell>
                    <sui-table-cell>{{ student.age }}</sui-table-cell>
                    <sui-table-cell>{{ student.mother }}</sui-table-cell>
                    <sui-table-cell>{{ student.phone }}</sui-table-cell>
                    <sui-table-cell>
                        <sui-label :color="statusColor(student.active)">{{ status(student.active) }}</sui-label>
                    </sui-table-cell>
                    <sui-table-cell>
                        <sui-button inverted color="blue" @click="openModal(student.id)">
                            <v-icon name="info-circle" />
                        </sui-button>
                        <sui-button @click="printPDF(student.id)" inverted color="blue"><v-icon name="print" /></sui-button>
                    </sui-table-cell>
                </sui-table-row>
            </sui-table-body>
        </sui-table>

        <modal :open="modal" :student="student" @update="update()"></modal>
    </div>
</template>

<script>
    import StudentDetail from './StudentDetail'

    export default {
        components: {
            'modal': StudentDetail
        },
        mounted() {
            this.update();
        },
        data() {
            return {
                students: {},
                modal: false,
                student: {}
            }
        },
        methods: {
            status(value) {
                return value ? 'Ativo' : 'Inativo';
            },
            statusColor(value) {
                return value ? 'green' : 'red';
            },
            openModal(id) {
                this.$http.get('/api/students/' + id, this.$store.getters.header)
                    .then(response => {
                        console.log(response);
                        this.student = response.body.student;
                        this.modal = true;
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
            update() {
                this.$http.get('/api/students', this.$store.getters.header)
                    .then(response => {
                        this.students = response.body.students;
                        this.modal = false;
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
            printPDF(id) {
                this.$http.get('/api/students/' + id + '/print', this.$store.getters.header)
                    .then(response => {
                        console.log(response);
                        let w = window.open();
                        w.document.open();
                        w.document.write(response.body);
                        w.document.close();
                        setTimeout(function () { // necessary for Chrome
                            w.print();
                            w.close();
                        }, 0);
                        // const url = window.URL.createObjectURL(new Blob([response.body]));
                        // const link = document.createElement('a');
                        // link.href = url;
                        // link.setAttribute('download', 'file.pdf'); //or any other extension
                        // document.body.appendChild(link);
                        // link.click();
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
            }
        }
    }
</script>