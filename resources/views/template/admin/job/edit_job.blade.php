@php use App\Models\JobStatus; @endphp
@extends('layouts.admin.admin_layout',['title'=>'Update OrderJob'])
@section('content')

    @push('styles')
        <style>
            .ui-autocomplete {
                position: absolute;
                top: 100%;
                left: 0;
                z-index: 1000;
                display: none;
                float: left;
                min-width: 160px;
                padding: 5px 0;
                margin: 2px 0 0;
                list-style: none;
                font-size: 14px;
                text-align: left;
                background-color: #ffffff;
                border: 1px solid #cccccc;
                border: 1px solid rgba(0, 0, 0, 0.15);
                border-radius: 4px;
                -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
                background-clip: padding-box;
            }

            .ui-autocomplete > li > div {
                display: block;
                padding: 3px 20px;
                clear: both;
                font-weight: normal;
                line-height: 1.42857143;
                color: #333333;
                white-space: nowrap;
            }

            .ui-state-hover,
            .ui-state-active,
            .ui-state-focus {
                text-decoration: none;
                color: #262626;
                background-color: #f5f5f5;
                cursor: pointer;
            }

            .ui-helper-hidden-accessible {
                border: 0;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }
        </style>
    @endpush

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <x-admin.title-and-breadcrumb title="Edit Job"
                                      breadcrumbs='{"Home":"dashboard","Job":"job.index","Edit Job":""}'/>
        <!-- /.content-header -->

        <x-admin.ui.card-form title="Job Details" form-route="job.update" form-id="update_job" autocomplete
                              form-route-id="{{ $job->id }}">
            <x-slot name="input">
                <div class="row px-3">
                    <div class="card-body">
                        <div class="col-12">
                            <x-admin.ui.select label="Customer"
                                               name="customer"
                                               id="customer"
                                               required
                                               options="customer.list"
                                               add-class="customer"
                                               :value="$job->user_id"
                            />
                        </div>
                        <div class="col-12">
                            <x-admin.ui.input label="Customer Contact" type="text" name="customer_contact"
                                              id="customer_contact"
                                              add-class=""
                                              placeholder="Customer Contact" required autocomplete
                                              :value="$job->customerContact->customer_contact"/>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card-body pt-2">
                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                            <label class="btn btn-primary job-radio active">
                                <input type="radio" name="default_address" id="from" value="from" autocomplete="off"
                                       class="default_address">Pick up from client
                            </label>
                            <label class="btn btn-primary job-radio">
                                <input type="radio" name="default_address" id="to" value="to" autocomplete="off"
                                       class="default_address">Deliver to client
                            </label>
                            <label class="btn btn-primary job-radio">
                                <input type="radio" name="default_address" id="neither" value="neither"
                                       autocomplete="off" class="default_address">3rd Party
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="col-12 box1-bg p-3">
                                    <lable class="text-bold text-black-50">From Address</lable>
                                    <a class="btn btn-link text-sm address-book float-right" data-toggle="modal"
                                       data-target="#modal-xl" data-id="from">Select From Address Book
                                    </a>
                                    <x-admin.ui.input label="Company Name" type="text" name="company_name_from"
                                                      id="company_name_from"
                                                      add-class="company_name"
                                                      placeholder="Company Name" required autocomplete
                                                      other="data-type=from"
                                                      :value="$job->fromAddress->company_name"/>
                                    <x-admin.address-autocomplete input-id="from" :edit-data="$job"
                                                                  relations="fromAddress"/>
                                    <x-admin.ui.select label="Area"
                                                       name="from_area_id"
                                                       id="from_area_id"
                                                       required
                                                       options="area.list"
                                                       add-class="from_area"
                                                       required
                                                       :value="$job->from_area_id"
                                    />
                                    <label for="from_add_to_address_book">Add to address
                                        book (default Yes)</label><br>
                                    <x-admin.ui.bootstrap-switch name="from_add_to_address_book"
                                                                 id="from_add_to_address_book" onText="Yes"
                                                                 offText="No" label=""/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-12 box2-bg p-3">
                                    <lable class="text-bold text-black-50">To Address</lable>
                                    <a class="btn btn-link text-sm address-book float-right" data-toggle="modal"
                                       data-target="#modal-xl" data-id="to">Select From Address Book
                                    </a>
                                    <x-admin.ui.input label="Company Name" type="text" name="company_name_to"
                                                      id="company_name_to"
                                                      add-class="company_name"
                                                      placeholder="Company Name" required autocomplete
                                                      other="data-type=to"
                                                      :value="$job->toAddress->company_name"/>
                                    <x-admin.address-autocomplete input-id="to" :edit-data="$job"
                                                                  relations="toAddress"/>
                                    <x-admin.ui.select label="Area"
                                                       name="to_area_id"
                                                       id="to_area_id"
                                                       required
                                                       options="area.list"
                                                       add-class="to_area"
                                                       required
                                                       :value="$job->to_area_id"
                                    />
                                    <label for="to_add_to_address_book">Add to address book (default Yes)</label><br>
                                    <x-admin.ui.bootstrap-switch name="to_add_to_address_book"
                                                                 id="to_add_to_address_book" onText="Yes"
                                                                 offText="No" label=""/>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row px-3">
                        <div class="col-12">
                            <x-admin.ui.input label="Number of Boxes" type="number" name="number_box" id="number_box"
                                              add-class=""
                                              placeholder="Number of Boxes" required :value="$job->number_box"/>
                        </div>
                        <div class="col-12">
                            <label for="van_hire">Do you need van? (default to No,leave as it is if you don't need a van)</label><br>
                            <x-admin.ui.bootstrap-switch name="van_hire" id="van_hire" onText="Yes"
                                                         offText="No" label="Need" :value="$job->van_hire"/>
                        </div>
                        <div class="col-12 mt-3">
                            <x-admin.ui.Textarea label="Notes (any special instruction you want the driver to know)"
                                                 name="notes"
                                                 id="note"
                                                 :value="$job->notes"
                            />
                        </div>
                        <div class="col-12">
                            <x-admin.ui.select label="Status"
                                               name="status_id"
                                               id="status_id"
                                               :options="Helper::getJobStatus()"
                                               add-class="status"
                                               :value="$job->status_id"
                                               required
                            />
                        </div>
                        <div class="col-12 job_driver_id {{ $job->jobAssign->user_id ?? 'd-none' }}">
                            @php $disable=false; if($job->status_id==JobStatus::getStatusId(JobStatus::PICKED_UP) || $job->status_id==JobStatus::getStatusId(JobStatus::DELIVERED)){ $disable=true; } @endphp
                            @if(!empty($job->jobAssign->user_id))
                                <x-admin.ui.select label="Assign Driver"
                                                   name="driver_id"
                                                   id="driver_id"
                                                   options="driver.list"
                                                   add-class="driver_id"
                                                   :value="$job->jobAssign->user_id"
                                                   required
                                                   :disable="$disable"

                                />
                            @else
                                <x-admin.ui.select label="Assign Driver"
                                                   name="driver_id"
                                                   id="driver_id"
                                                   options="driver.list"
                                                   add-class="driver_id"
                                                   :disable="$disable"

                                />
                            @endif
                        </div>
                        {{--                    <div class="col-lg-6">--}}
                        {{--                        <x-admin.ui.select label="Time Frame"--}}
                        {{--                                           name="timeframe_id"--}}
                        {{--                                           id="timeframe_id"--}}
                        {{--                                           required--}}
                        {{--                                           options="timeframe.list"--}}
                        {{--                                           add-class="timeframe_id"--}}

                        {{--                        />--}}
                        {{--                    </div>--}}
                        <div class="col-12 d-none comment">
                            <x-admin.ui.Textarea label="Comment"
                                                 name="comment"
                                                 id="comment"
                            />
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="button">
                <div class="d-flex justify-content-between">
                    <div>
                        <x-admin.ui.button type="button" btn-name="Cancel" name="job_cancel" id="job_cancel"
                                           class="btn-secondary"
                                           other="onclick=redirectBack()"/>
                    </div>
                    <div>
                        <x-admin.ui.button type="submit" btn-name="Update" name="job_submit" id="job_submit"/>
                    </div>
                </div>
                <hr>
                <div class="card-body bg-white">
                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <h4>Job History</h4>
                                <ul class="timeline">
                                    @foreach($job->jobStatusHistory as $jobStatusHistory)
                                        {{--                                        <li>--}}
                                        {{--                                            <span class="text-bold">{{ $jobStatusHistory->fromStatus->status ?? 'Job Created' }}</span>--}}
                                        {{--                                            <p class="mt-3">{{ 'Updated By - '.$jobStatusHistory->user->name }}</p>--}}
                                        {{--                                        </li>--}}
                                        <li>
                                            <div
                                                class="d-flex justify-content-between display-comment-{{ $jobStatusHistory->id }}">
                                                <span
                                                    class="text-bold">{{ $jobStatusHistory->toStatus->status .'(Updated By - '.$jobStatusHistory->user->name.')' }} </span>
                                                <span
                                                    class="text-bold float-right">{{ $jobStatusHistory->created_at->format('Y-M-d h:i A') }}</span>
                                            </div>
                                            @if($jobStatusHistory->user_id==auth()->id())
                                                <div
                                                    class="d-flex justify-content-between mt-3 show-comment-{{ $jobStatusHistory->id }}">
                                                    <p id="comment_para_{{ $jobStatusHistory->id }}">{!! $jobStatusHistory->comment !!}</p>
                                                    <div>
                                                        <a href="#" class="edit-comment mr-2"
                                                           data-id="{{ $jobStatusHistory->id }}"><i
                                                                class="fa fa-edit"></i></a>
                                                        @if($jobStatusHistory->comment)
                                                            <a href="#" class="delete-comment"
                                                               data-id="{{ $jobStatusHistory->id }}"><i
                                                                    class="fa fa-trash"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="d-none" id="{{ $jobStatusHistory->id }}">
                                                    <x-admin.ui.Textarea label="Comment"
                                                                         name="update_comment"
                                                                         id="update_comment_{{ $jobStatusHistory->id }}"
                                                                         :value="$jobStatusHistory->comment"
                                                    />
                                                    <x-admin.ui.button type="button" class="btn-primary job_history"
                                                                       btn-name="Save"
                                                                       name="job_history_{{ $jobStatusHistory->id }}"
                                                                       id="job_history_{{ $jobStatusHistory->id }}"
                                                                       data-id="{{ $jobStatusHistory->id }}"/>
                                                </div>
                                            @else
                                                <p id="comment_para_{{ $jobStatusHistory->id }}">{!! $jobStatusHistory->comment !!}</p>
                                            @endif
                                            @if($jobStatusHistory->getFirstMediaUrl('job_status_images') && $jobStatusHistory->to_status_id==JobStatus::getStatusId(JobStatus::DELIVERED))
                                                <img
                                                    src="{{ $jobStatusHistory->getFirstMediaUrl('job_status_images','base-image') }}"
                                                    alt="no image" class="img-fluid img-thumbnail">
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-admin.ui.card-form>

        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Address Book</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body my-address-book row">

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- /.content -->
        @push('scripts')
            <script>
                $('#customer').change(function () {
                    let customerId = $(this).val();
                    let checkedAddress = $('input[name="default_address"]:checked').val();
                    getAddressData(customerId, checkedAddress);
                    customerContactAutocomplete(customerId);
                    customerCompanyName(customerId);
                });

                function getAddressData(customerId, checkedAddress, id = null) {
                    $.ajax({
                        url: '{{ Helper::getRoute('job.getAddress') }}',
                        type: 'post',
                        data: {user_id: customerId, id: id},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (result) {
                            setAddressData(checkedAddress, result);
                            setAreaAddress(checkedAddress, result[1]['area'].id)
                        }
                    })
                }

                function setAddressData(type, data) {
                    $('#company_name_' + type).val(data.company_name);
                    $('#street_address_' + type).val(data.street_address).change();
                    $('#street_number_' + type).val(data.street_number).change();
                    $('#suburb_' + type).val(data.suburb).change();
                    $('#city_' + type).val(data.city).change();
                    $('#state_' + type).val(data.state).change();
                    $('#country_' + type).val(data.country).change();
                    $('#zip_' + type).val(data.zip).change();
                    $('#place_id_' + type).val(data.place_id).change();
                    $('#latitude_' + type).val(data.latitude).change();
                    $('#longitude_' + type).val(data.longitude).change();
                    $('#location_url_' + type).val(data.location_url).change();
                    $('#json_response_' + type).val(data.full_json_response).change();
                    $('#edit_id_' + type).val(data.id).change();
                    setAreaAddress(type, data.area_id);
                }

                function unSetAddressData(type) {
                    $('#company_name_' + type).val('').change();
                    $('#street_address_' + type).val('').change();
                    $('#street_number_' + type).val('').change();
                    $('#suburb_' + type).val('').change();
                    $('#city_' + type).val('').change();
                    $('#state_' + type).val('').change();
                    $('#country_' + type).val('').change();
                    $('#zip_' + type).val('').change();
                    $('#place_id_' + type).val('').change();
                    $('#latitude_' + type).val('').change();
                    $('#longitude_' + type).val('').change();
                    $('#location_url_' + type).val('').change();
                    $('#json_response_' + type).val('').change();
                    $('#edit_id_' + type).val('').change();
                    $('#' + type + '_area_id').val('').change();
                }

                function setAreaAddress(type, area_id) {
                    $('#' + type + '_area_id').select2({
                        placeholder: '--select--',
                        ajax: {
                            url: "{{ Helper::getRoute('area.list') }}",
                            type: "get",
                            dataType: 'json',
                            delay: 250,
                            data: function (params) {
                                return {
                                    search: params.term // search term
                                };
                            },
                            processResults: function (response) {
                                return {
                                    results: response
                                };
                            },
                            cache: true
                        },
                        initSelection: function (element, callback) {
                            let id = area_id;
                            if (id) {
                                $.ajax("{{ Helper::getRoute('area.list') }}", {
                                    data: {id: id},
                                    dataType: "json"
                                }).done(function (data) {
                                    let newOption = new Option(data[0].text, data[0].id, true, true);
                                    $('#' + type + '_area_id').append(newOption).trigger('change');
                                    callback(data);
                                });
                            }
                        }
                    });
                }

                $('.default_address').change(function () {
                    let customerId = $('#customer').val();
                    let checkedAddress = $(this).val();
                    if (checkedAddress == 'from') {
                        unSetAddressData('to');
                        getAddressData(customerId, checkedAddress);
                    } else if (checkedAddress == 'to') {
                        unSetAddressData('from');
                        getAddressData(customerId, checkedAddress);
                    } else {
                        unSetAddressData('from');
                        unSetAddressData('to');
                    }
                });

                $('.address-book').click(function () {
                    let customerId = $('#customer').val();
                    let type = $(this).data('id');
                    $('.my-address-book').empty();
                    if (customerId) {
                        getAddressBook(customerId, type);
                    } else {
                        $('.my-address-book').append(`
                                    <div class="col-md-12">
                            <div class="card border border-danger">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-map-marked"></i>
                                            Please select any customer first
                                    </h3>
                                </div>`);
                    }
                });

                function getAddressBook(customerId, type) {
                    $.ajax({
                        url: '{{ Helper::getRoute('job.getAddressBook') }}',
                        type: 'post',
                        data: {user_id: customerId},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (result) {
                            if (result.length) {
                                $.each(result, function (index, address) {
                                    $('.my-address-book').append(`
                                    <div class="col-md-6">
                            <div class="card address-book-card" data-type="${type}" data-id="${address.id}">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <a href="${address.location_url}" target="_blank">
                                        <i class="fas fa-map-marked"></i>
                                        ${address.street_address}
                                        </a>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-sm-4">Company Name</dt>
                                        <dd class="col-sm-8">${address.company_name}</dd>
                                        <dt class="col-sm-4">Street Number</dt>
                                        <dd class="col-sm-8">${address.street_number}</dd>
                                        <dt class="col-sm-4">Suburb</dt>
                                        <dd class="col-sm-8">${address.suburb}</dd>
                                        <dt class="col-sm-4">City</dt>
                                        <dd class="col-sm-8">${address.city}</dd>
                                        <dt class="col-sm-4">State/Region</dt>
                                        <dd class="col-sm-8">${address.state}</dd>
                                        <dt class="col-sm-4">Postal Code</dt>
                                        <dd class="col-sm-8">${address.zip}</dd>
                                        <dt class="col-sm-4">Country</dt>
                                        <dd class="col-sm-8">${address.country}</dd>
                                        <dt class="col-sm-4">Area</dt>
                                        <dd class="col-sm-8">${address.area.area}</dd>
                                    </dl>
                                </div>
                                <div class="card-footer"><a href="${route('edit_address_book.edit', address.id)}" class="btn btn-link"><i class="fa fa-edit"></i>Edit</a></div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                                `);
                                });
                            } else {
                                $('.my-address-book').append(`
                                    <div class="col-md-12">
                            <div class="card border border-danger">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-map-marked"></i>
                                            No address found
                                    </h3>
                                </div>`);
                            }
                        }
                    })
                }

                $('body').on('click', '.address-book-card', function () {
                    $('.address-book-card').removeClass('border border-info');
                    $(this).toggleClass('border border-info');
                    let id = $(this).data('id');
                    let type = $(this).data('type');
                    getAddressData(null, type, id);
                    $('#modal-xl').modal('hide');
                })

                $(document).ready(function () {
                    customerContactAutocomplete();
                    customerCompanyName();
                })

                function customerContactAutocomplete(customerId = null) {
                    $("#customer_contact").autocomplete({
                        source: function (request, response) {
                            $.ajax({
                                url: "{{ Helper::getRoute('job.getCustomerContact') }}",
                                type: 'post',
                                data: {
                                    search: request.term,
                                    id: customerId
                                },
                                dataType: "json",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (data) {
                                    var resp = $.map(data, function (obj) {
                                        return obj.text;
                                    });
                                    response(resp);
                                }
                            });
                        },
                        minLength: 1
                    });
                }

                function customerCompanyName(userId = null) {
                    $(".company_name").autocomplete({
                        source: function (request, response) {
                            $.ajax({
                                url: "{{ Helper::getRoute('job.getAddress') }}",
                                type: 'post',
                                data: {
                                    search: request.term,
                                    id: userId
                                },
                                dataType: "json",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (data) {
                                    var resp = $.map(data, function (obj) {
                                        return obj.text;
                                    });
                                    response(resp);
                                }
                            });
                        },
                        minLength: 1
                    });
                }

                $("body").on('change', '.company_name', function () {
                    let customerId = $('#customer').val();
                    let type = $(this).data('type');
                    let company_name = $(this).val();
                    if (company_name && customerId) {
                        getAddressByCompanyName(company_name, customerId, type);
                    }
                })

                function getAddressByCompanyName(company_name, user_id, type) {
                    $.ajax({
                        url: '{{ Helper::getRoute('job.getAddress') }}',
                        type: 'post',
                        data: {company_name: company_name, user_id: user_id},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (result) {
                            setAddressData(type, result);
                        }
                    })
                }

                $('body').on('change', '#status_id', function () {
                    if ($(this).val() != '{{ $job->status_id }}') {
                        $('.comment').removeClass('d-none');
                    } else {
                        $('.comment').addClass('d-none');
                    }
                    if ($(this).val() == '{{  App\Models\JobStatus::getStatusId(App\Models\JobStatus::ASSIGNED) }}' || $(this).val() == '{{  App\Models\JobStatus::getStatusId(App\Models\JobStatus::ACCEPTED) }}' || '{{ $job->jobAssign->user_id ?? '' }}') {
                        $('#driver_id').prop('required', true);
                        $('#driver_id').prev('label').html('Assign Driver' + '<span class="text-danger">*</span>');
                        $('.job_driver_id').removeClass('d-none');
                    } else {
                        $('#driver_id').prop('required', false);
                        $('#driver_id').prev('label').html('Assign Driver');
                        $('.job_driver_id').addClass('d-none');
                    }
                });
                $('body').on('change', '#driver_id', function () {
                    if ($(this).val() != '{{ $job->jobAssign->user_id ?? '' }}') {
                        $('.comment').removeClass('d-none');
                    } else {
                        $('.comment').addClass('d-none');
                    }
                });

                $('.edit-comment').click(function (e) {
                    e.preventDefault();
                    let id = $(this).data('id');
                    $('#' + id).removeClass('d-none');
                    $('.show-comment-' + id).removeClass('d-flex');
                    $('.show-comment-' + id).addClass('d-none');
                });

                $('.job_history').click(function () {
                    let id = $(this).data('id');
                    let comment = $('#update_comment_' + id).val();
                    changeStatusHistory(comment, id);
                });

                $('.delete-comment').click(function (e) {
                    e.preventDefault();
                    let id = $(this).data('id');
                    deleteStatusHistory(id);
                });

                function changeStatusHistory(comment, id) {
                    $.ajax({
                        url: '{{ Helper::getRoute('job.updateHistory') }}',
                        type: 'post',
                        data: {comment: comment, id: id},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (result) {
                            if (result) {
                                $('#' + id).addClass('d-none');
                                $('.show-comment-' + id).removeClass('d-none');
                                $('.show-comment-' + id).addClass('d-flex');
                                $('#comment_para_' + id).text(comment);
                                toastr.success('Comment updated successfully');
                            }
                        },
                        error: function () {
                            $('#' + id).addClass('d-none');
                            $('.show-comment-' + id).removeClass('d-none');
                            $('.show-comment-' + id).addClass('d-flex');
                            toastr.info('No changes made');
                        }
                    });
                }

                function deleteStatusHistory(id) {
                    $.ajax({
                        url: '{{ Helper::getRoute('job.deleteHistory') }}',
                        type: 'post',
                        data: {id: id},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (result) {
                            if (result) {
                                $('#' + id).addClass('d-none');
                                $('.show-comment-' + id).removeClass('d-none');
                                $('.show-comment-' + id).addClass('d-flex');
                                $('#comment_para_' + id).text('');
                                toastr.success('Comment deleted successfully');
                            }
                        },
                        error: function () {
                            $('#' + id).addClass('d-none');
                            $('.show-comment-' + id).removeClass('d-none');
                            $('.show-comment-' + id).addClass('d-flex');
                            toastr.info('No changes made');
                        }
                    });
                }
            </script>
    @endpush

@endsection
