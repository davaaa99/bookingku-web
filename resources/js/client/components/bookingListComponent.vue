<template>
    <div class="card shadow" :class="type === 'dark' ? 'br-default':''">
        <div class="card-header border-0" :class="type === 'dark' ? 'bg-transarent' : ''">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0" :class="type === 'dark'?'text-white':''">
                        {{tittle}}
                    </h3>
                </div>
                <div class="col texr-right">
                    <base-button type="primarry" size="sm">New</base-button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <base-table class="table align-item-center table-flush"
                        :class="type === 'dark'?'table-dark':''"
                        :thead-classes="type === 'dark'?'thead-dark':''" 
                        tbody-classes="list"
                        :data="tableData">
                <template slot="colums">
                    <th>User</th>
                    <th>Booking Code</th>
                    <th>Schedule</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                </template>
                <template slot-scope="{}">
                    <th scope="row">
                        
                    </th>
                </template>
            </base-table>
        </div>
    </div>
</template>
