<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <b>#TGP-BOOK{{ row.id }}</b>
                    </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>
                                {{ row.customer_name }}
                            </strong>

                            <p class="text-muted">
                                {{ row.user_name }}<br />(<b>{{ row.gender }}</b
                                >)
                            </p>
                        </div>
                        <div class="col-md-2">
                            <strong
                                ><i class="fas fa-phone-alt mr-1"></i>
                                Phone</strong
                            >

                            <p class="text-muted">
                                {{ row.phone }}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <strong
                                ><i class="far fa-calendar-alt mr-1"></i>
                                Joined</strong
                            >
                            <p class="text-muted">{{ row.customer_joined }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>
                                <i class="fa fa-home"></i>
                                {{ row.pod_name }}
                            </strong>
                            <p class="text-muted">
                                <i class="fa fa-map-marker"></i>
                                {{ row.pod_address }}<br />
                                <i class="fa fa-money"></i> S${{
                                    row.price_hour
                                }}
                                / hour
                            </p>
                            <button
                                class="btn btn-sm btn-flat"
                                v-bind:style="{
                                    backgroundColor: row.color
                                }"
                            >
                                <i v-bind:class="'fa ' + row.icon"></i>
                                {{ row.status }}
                            </button>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong
                                        ><i
                                            class="far fa-calendar-alt mr-1"
                                        ></i>
                                        Booking Date</strong
                                    >
                                    <p class="text-muted">
                                        {{ row.booking_date }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <strong
                                        ><i class="far fa-clock mr-1"></i>
                                        Booking Time</strong
                                    >
                                    <p class="text-muted">
                                        {{ row.booking_time }}
                                    </p>
                                </div>
                            </div>
                            <h3>Total : {{ row.price }}</h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <b>User Activity </b>
                    </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p>
                                <strong>User Booking Status</strong>
                            </p>

                            <a
                                class="btn btn-app ml-3"
                                v-bind:style="{ backgroundColor: data.color }"
                                v-for="(data, i) in booking_status_user.data"
                                :key="i"
                            >
                                <span
                                    class="badge bg-primary"
                                    style="font-size:15px"
                                    >{{ data.total }}</span
                                >
                                <i v-bind:class="'fas ' + data.icon"></i>
                                {{ data.status }}
                            </a>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <strong>Pod Booking</strong>
                            </p>

                            <ol>
                                <li
                                    v-for="(data, i) in booking_pod_user.data"
                                    :key="i"
                                >
                                    <b>{{ data.name }}</b> ({{ data.total }})
                                </li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <strong>Booking / Month</strong>
                            </p>

                            <ol>
                                <li
                                    v-for="(data, i) in booking_month_user.data"
                                    :key="i"
                                >
                                    <b>{{ data.month }} - {{ data.year }}</b>
                                    ({{ data.total }})
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        row: {
            required: true
        },
        booking_status_user: {
            required: true
        },
        booking_pod_user: {
            required: true
        },
        booking_month_user: {
            required: true
        }
    }
};
</script>
