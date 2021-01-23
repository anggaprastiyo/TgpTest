<template>
    <div class="row">
        <div class="col-md-4 mb-2">
            <div class="form-inline">
                <label class="mr-2">Showing</label>
                <select
                    class="form-control"
                    v-model="meta.per_page"
                    @change="loadPerPage"
                >
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <label class="ml-2">Entries from {{meta.total}}</label>
            </div>
        </div>
        <div class="col-md-4 offset-md-4">
            <div class="form-inline float-right">
                <label class="mr-2"><i class="fa fa-search"></i></label>
                <input
                    type="text"
                    placeholder="@username"
                    class="form-control"
                    @input="search"
                />
                <button
                    type="button"
                    class="btn btn-default ml-2"
                    @click="showFilter()"
                >
                    <i class="fa fa-filter"></i>
                    <span
                        v-if="check == 1"
                        class="badge bg-warning"
                        style="position:relative; top:-.5em; vertical-align: baseline;"
                        ><i class="fa fa-info-circle"></i
                    ></span>
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <b-pagination
                v-model="meta.current_page"
                :total-rows="meta.total"
                :per-page="meta.per_page"
                align="right"
                @change="changePage"
            ></b-pagination>
        </div>
        <div class="col-md-12">
            <b-table
                striped
                hover
                :items="items"
                :fields="fields"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                show-empty
            >
                 <template
                    v-slot:cell(user_name)="row"
                >
                    <a href="#" @click="actionView(row)">{{row.item.user_name}}</a>
                </template>
                <template v-slot:cell(status)="row">
                    <button
                        class="btn btn-sm"
                        v-bind:style="{ backgroundColor: row.item.color }"
                    >
                        {{ row.item.status }}
                    </button>
                </template>
               
            </b-table>
        </div>
        <div class="col-md-6">
            <p>
                Showing {{ meta.from }} to {{ meta.to }} of
                {{ meta.total }} items
            </p>
        </div>
        <div class="col-md-6">
            <b-pagination
                v-model="meta.current_page"
                :total-rows="meta.total"
                :per-page="meta.per_page"
                align="right"
                @change="changePage"
            ></b-pagination>
        </div>

        <div class="modal fade" id="modal-filter">
            <div class="modal-dialog modal-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            <h5><i class="fa fa-filter"></i> Filter Data</h5>
                        </div>
                        <button
                            type="button"
                            class="close"
                            @click="closeButtonFilter()"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h5>
                                            <i class="fa fa-check-circle"></i>
                                            Status
                                        </h5>
                                        <br />
                                        <div
                                            v-for="data in booking_status.data"
                                            :key="data.id"
                                        >
                                            <input
                                                type="checkbox"
                                                :id="data.id"
                                                :value="data.id"
                                                v-model="filter.booking_status"
                                                style="width: 20px; height: 20px"
                                            />
                                            <label :for="data.id">{{
                                                data.status
                                            }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <h5>
                                            <i class="fa fa-home"></i> Pod Name
                                        </h5>
                                        <br />
                                        <div
                                            v-for="data in pod_name.data"
                                            :key="data.id"
                                        >
                                            <input
                                                type="checkbox"
                                                :id="data.id"
                                                :value="data.id"
                                                v-model="filter.pod_name"
                                                style="width: 20px; height: 20px"
                                            />
                                            <label :for="data.id">{{
                                                data.name
                                            }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h5>
                                            <i class="fa fa-calendar"></i>
                                            Booking Date
                                        </h5>
                                    </div>

                                    <daterange
                                        ref="picker"
                                        :opens="opens"
                                        :minDate="minDate"
                                        :maxDate="maxDate"
                                        :singleDatePicker="singleDatePicker"
                                        :timePicker="timePicker"
                                        :timePicker24Hour="timePicker24Hour"
                                        :showWeekNumbers="showWeekNumbers"
                                        :showDropdowns="showDropdowns"
                                        :autoApply="autoApply"
                                        v-model="dateRange"
                                        @update="updateValues"
                                        @toggle="checkOpen"
                                        :linkedCalendars="linkedCalendars"
                                    >
                                        <template
                                            v-slot:input="picker"
                                            style="min-width: 350px;"
                                        >
                                            {{ picker.startDate | date }} -
                                            {{ picker.endDate | date }}
                                        </template>
                                    </daterange>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100 float-right">
                            <button
                                type="button"
                                class="btn btn-primary"
                                @click="actionFilter()"
                            >
                                <i class="fa fa-check-circle"></i> Process
                            </button>
                            <button
                                type="button"
                                class="btn btn-danger"
                                @click="actionReset()"
                            >
                                <i class="fa fa-sync"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import _ from "lodash";
import DateRangePicker from "vue2-daterange-picker";
import moment from "moment";

export default {
    created() {
        this.getBookingStatus();
        this.getPod();
    },
    props: {
        items: {
            type: Array,
            required: true
        },
        fields: {
            type: Array,
            required: true
        },
        meta: {
            required: true
        },
    },
    data() {
        return {
            sortBy: null,
            sortDesc: false,
            deleteModal: false,
            selected: null,
            booking_status: [],
            pod_name: [],
            check: 0,
            filter: {
                booking_status: [],
                pod_name: [],
                start_date: "",
                end_date: ""
            },
            minDate: "",
            maxDate: "",
            singleDatePicker: "default",
            showWeekNumbers: true,
            timePicker: true,
            timePicker24Hour: true,
            showDropdowns: true,
            autoApply: false,
            opens: "right",
            dateRange: {
                startDate: null,
                endDate: null
            },
            linkedCalendars: true,
            singleDatePicker: false,
            showDropdowns: false
        };
    },
    watch: {
        sortBy(val) {
            this.$emit("sort", {
                sortBy: this.sortBy,
                sortDesc: this.sortDesc
            });
        },
        sortDesc(val) {
            this.$emit("sort", {
                sortBy: this.sortBy,
                sortDesc: this.sortDesc
            });
        }
    },
    filters: {
        date(val) {
            return val ? moment(val).format("DD-MM-YYYY HH:mm:ss") : "";
        }
    },
    components: {
        daterange: DateRangePicker
    },
    methods: {

        //Showing Data
        loadPerPage(val) {
            this.$emit("per_page", this.meta.per_page);
        },
        changePage(val) {
            this.$emit("pagination", val);
        },

        //Date Range Picker
        updateValues() {},
        checkOpen() {},

        //Search & Filter
        search: _.debounce(function(e) {
            this.$emit("search", e.target.value);
        }, 500),

        showFilter() {
            $("#modal-filter").modal({
                backdrop: "static",
                keyboard: false
            });
        },
        closeButtonFilter() {
            $("#modal-filter").modal("hide");
        },
        actionFilter() {
            this.check = 1;
            this.filter.start_date = this.dateRange.startDate;
            this.filter.end_date = this.dateRange.endDate;
            this.$emit("filter", this.filter);
        },
        actionReset() {
            this.check = 0;
            this.filter.start_date = null;
            this.filter.end_date = null;
            this.filter.booking_status = [];
            this.filter.pod_name = [];

            this.dateRange.startDate = null;
            this.dateRange.endDate = null;
            this.$emit("filter", this.filter);
        },

        //View Detail
        actionView(row){
            this.$emit("view", row.item);
        },

        //Retrive Data API
        getBookingStatus() {
            axios.get("/api/booking_status/").then(
                function(response) {
                    this.booking_status = response.data;
                }.bind(this)
            );
        },
        getPod() {
            axios.get("/api/pod/").then(
                function(response) {
                    this.pod_name = response.data;
                }.bind(this)
            );
        },

        
    }
};
</script>
