<template>
    <div class="container" style="padding-top: 30px; margin:0px 0px 0px 30px">
        <loading :active.sync="isLoading" :is-full-page="true"></loading>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <b>{{ modul_title }}</b>
                        </h3>
                    </div>

                    <div class="card-body">
                        <app-datatable
                            :items="items"
                            :fields="fields"
                            :meta="meta"
                            :custom="custom"
                            :viewUrl="'/dampak/edit/'"
                            @per_page="handlePerPage"
                            @pagination="handlePagination"
                            @search="handleSearch"
                            @sort="handleSort"
                            @delete="handleDelete"
                            @filter="handleFilter"
                            @view="handleView"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-booking-detail">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="fa fa-list"></i> Booking Detail</h5>
                    </div>
                    <div class="modal-body">
                        <booking-detail
                            :row="booking_item"
                            :booking_status_user="booking_status_user"
                            :booking_pod_user="booking_pod_user"
                            :booking_month_user="booking_month_user"
                        />
                    </div>
                    <div class="modal-footer">
                        <div class="w-100 float-right">
                            <button
                                type="button"
                                class="btn btn-danger"
                                @click="closeView()"
                            >
                                <i class="fa fa-times"></i> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Datatable from "./Datatable";
import BookingDetail from "./BookingDetail";
import Loading from "vue-loading-overlay";

export default {
    created() {
        this.getData();
    },
    data() {
        return {
            modul_title: "Booking Dashboard",
            custom: 0,
            isLoading: false,
            fields: [
                { key: "pod_name", sortable: true },
                { key: "user_name", sortable: true },
                { key: "phone", sortable: true },
                { key: "price", sortable: false },
                { key: "booking_date", sortable: false },
                { key: "booking_time", sortable: false },
                { key: "created_at", sortable: true },
                { key: "status", sortable: false }
            ],
            items: [],
            meta: [],
            current_page: 1,
            per_page: 10,
            search: "",
            sortBy: "created_at",
            sortByDesc: false,
            status: "",
            pod_name: "",
            start_date: "",
            end_date: "",
            filter: 0,
            booking_item: {},
            booking_status_user: {},
            booking_pod_user: {},
            booking_month_user: {}
        };
    },
    components: {
        "app-datatable": Datatable,
        "booking-detail": BookingDetail,
        loading: Loading
    },
    methods: {
        getData() {
            this.isLoading = true;
            let current_page = this.search == "" ? this.current_page : 1;
            axios
                .get(`/api/booking`, {
                    params: {
                        page: current_page,
                        per_page: this.per_page,
                        q: this.search,
                        sortby: this.sortBy,
                        sortbydesc: this.sortByDesc ? "DESC" : "ASC",
                        status: this.status,
                        pod_name: this.pod_name,
                        start_date: this.start_date,
                        end_date: this.end_date,
                        filter: this.filter
                    }
                })
                .then(response => {
                    let getData = response.data.data;
                    this.items = getData.data;
                    this.meta = {
                        total: getData.total,
                        current_page: getData.current_page,
                        per_page: getData.per_page,
                        from: getData.from,
                        to: getData.to
                    };

                    if (this.meta.total == 0) {
                        toast.fire({
                            icon: "warning",
                            title: "Empty Data"
                        });
                    } else {
                        toast.fire({
                            icon: "success",
                            title: "Data Loaded"
                        });
                    }
                });
            setTimeout(() => {
                this.isLoading = false;
            }, 1000);
        },
        handlePerPage(val) {
            this.per_page = val;
            this.getData();
        },
        handlePagination(val) {
            this.current_page = val;
            this.getData();
        },
        handleSearch(val) {
            this.filter = 1;
            this.search = val;
            this.getData();
        },
        handleSort(val) {
            this.sortBy = val.sortBy;
            this.sortByDesc = val.sortDesc;
            this.getData();
        },
        handleDelete(val) {
            this.deleteDataAction(val.id);
        },
        handleFilter(val) {
            this.filter = 1;
            this.status = Object.values(val.booking_status).join(",");
            this.pod_name = Object.values(val.pod_name).join(",");
            this.start_date = val.start_date;
            this.end_date = val.end_date;

            this.getData();

            $("#modal-filter").modal("hide");
        },
        handleView(val) {
            this.isLoading = true;
            this.booking_item = val;
            this.getBookingStatusCustomer(this.booking_item.customer_id);
            this.getBookingPod(this.booking_item.customer_id);
            this.getBookingMonth(this.booking_item.customer_id);
            $("#modal-booking-detail").modal({
                backdrop: "static",
                keyboard: false
            });
            setTimeout(() => {
                this.isLoading = false;
            }, 1000);
        },
        closeView() {
            $("#modal-booking-detail").modal("hide");
        },
        getBookingStatusCustomer(customer_id) {
            axios.get("/api/booking/customer/" + customer_id).then(
                function(response) {
                    this.booking_status_user = response.data;
                }.bind(this)
            );
        },
        getBookingPod(customer_id) {
            axios.get("/api/booking/pod/" + customer_id).then(
                function(response) {
                    this.booking_pod_user = response.data;
                }.bind(this)
            );
        },
        getBookingMonth(customer_id) {
            axios.get("/api/booking/month/" + customer_id).then(
                function(response) {
                    this.booking_month_user = response.data;
                }.bind(this)
            );
        }
    }
};
</script>
