<template>
    <div>
        <div>
            <router-link :to="{name: 'new-volunteer'}">
                <sui-button color="green">Novo Voluntário</sui-button>
            </router-link>
        </div>
        <sui-table>
            <sui-table-header>
                <sui-table-row>
                    <sui-table-header-cell>Nome</sui-table-header-cell>
                    <sui-table-header-cell>Idade</sui-table-header-cell>
                    <sui-table-header-cell>Telefone</sui-table-header-cell>
                    <sui-table-header-cell>Status</sui-table-header-cell>
                    <sui-table-header-cell>Ações</sui-table-header-cell>
                </sui-table-row>
            </sui-table-header>
            <sui-table-body>
                <sui-table-row v-for="volunteer in volunteers" :key="volunteer.id">
                    <sui-table-cell>{{ volunteer.name }}</sui-table-cell>
                    <sui-table-cell>{{ volunteer.age }}</sui-table-cell>
                    <sui-table-cell>{{ volunteer.phone }}</sui-table-cell>
                    <sui-table-cell>
                        <sui-label :color="statusColor(volunteer.active)">{{ status(volunteer.active) }}</sui-label>
                    </sui-table-cell>
                    <sui-table-cell>
                        <sui-button inverted color="blue" @click="openModal(volunteer.id)"><v-icon name="info-circle" /></sui-button>
                    </sui-table-cell>
                </sui-table-row>
            </sui-table-body>
        </sui-table>

        <modal :open="modal" :volunteer="volunteer" @update="update()"></modal>
    </div>
</template>

<script>
    import VolunteerDetail from './VolunteerDetail'

    export default {
        components: {
            'modal': VolunteerDetail
        },
        mounted() {
            this.update();
        },
        data() {
            return {
                volunteers: {},
                modal: false,
                volunteer: {}
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
                this.$http.get('/api/volunteers/' + id, this.$store.getters.header)
                    .then(response => {
                        console.log(response);
                        this.volunteer = response.body.volunteer;
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
                this.$http.get('/api/volunteers', this.$store.getters.header)
                    .then(response => {
                        this.volunteers = response.body.volunteers;
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
            }
        }
    }
</script>