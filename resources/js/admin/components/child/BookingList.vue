<template>
    <div id="booking-list">
        <div class="filter ">
            <div class="filter-item d-flex">
                <input class="filterTanggal inputFilter" type="date" />

                <div class="filterStatus">
                    <div class="filterTitle d-flex align-items-center " @click="show">{{filterTitle}}<i
                            class="fas fa-caret-down ml-auto"></i>
                    </div>
                    <div v-if="status" class="box d-flex align-items-center justify-content-center">
                        <div class="link">
                            <div class="link-item" v-for="list in statusList">
                                <a @click="click(list.status)">
                                    <div class="link-status">
                                        {{ list.status }}
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="search ml-auto d-flex align-items-center">
                    <input class="filterSearch" type="text" placeholder="Search...">
                    <a href="">
                        <i class="fa fa-search"></i>
                    </a>
                    </input>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                status: false,
                statusList: [{
                        id: '001',
                        status: 'status 1'
                    },
                    {
                        id: '001',
                        status: 'status 2'
                    },
                    {
                        id: '001',
                        status: 'status 3'
                    }
                ],
                filterTitle: "Status",
                filterTanggal: "",
                filterStatus: "",
                filterSearch: ""
            };
        },
        methods: {
            show: function () {
                this.status = !this.status;
            },
            click: function (status) {
                this.status = !this.status;
                this.filterTitle = status;
            }

        }
    };

</script>
