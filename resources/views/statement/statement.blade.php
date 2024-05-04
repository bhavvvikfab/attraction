@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>Statement</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Statement</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section" id="invoice347">
        <div class="row ">
            <div class="col-lg-12">

                <div class="card" style="min-height: 55vh">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 class="card-title text-start">Statement</h5>
                            </div>
                        </div>
                    </div>

                    <div class="container ">
                        <div class="row d-flex p-3 m-3 rounded border justify-content-center align-item-center">
                            @if (Auth::user()->role == 1)
                                <div class="col-sm-12 col-lg-6 col-md-6 mb-3">
                                    <label for="" class="fw-bold mb-1 agent_lable"><i
                                            class="bi bi-person-fill"></i> Select
                                        Agent :</label>
                                    <select id="single" class="form-select selected_agent_statement "
                                        style="width:100%;">
                                        <option>--Select--Agent--</option>
                                        @isset($agents)
                                            @foreach ($agents as $agent)
                                                <option value="<?php echo $agent['id']; ?>">{{ $agent['name'] ?? '' }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                    <small class="agent_error text-danger" hidden>Select Agent..!</small>
                                </div>
                            @endif
                            <div class="col-sm-12  col-lg-6 col-md-6">
                                <label for="" class="fw-bold mb-1"><i class="bi bi-calendar-week"></i> Select
                                    Date Range :</label>
                                <input type="text" name="daterange" class="form-control" value=""
                                    placeholder="--Start-date--End-date--" id="data_range"
                                    style="border: 1px solid rgba(165, 163, 163, 0.822); height:28px;" />
                            </div>

                        </div>
                        <div class="d-none" id="table">
                            <div class="container p-3">
                                <div class="row" id="agentinfo">
                                    <!-- Content inside agentinfo -->
                                </div>
                                
                                <div class="table-responsive">
                                    <table class="table table-borderless appuser-table" id="statement_table">
                                        <thead>
                                            <tr>
                                                <th>S.no</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Transaction_id</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                {{-- <th>Balance</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody id="statement_body" class="">
                                            <!-- Table body content -->
                                        </tbody>
                                    </table>
                                </div>
                        
                                <div class="col-sm-12 col-lg-12 col-md-12 pdf_btn mt-3">
                                    <a href="{{ session('agent_statement_data') ? route(session('prefix', 'agent') . '.generatePDF') : '#' }}"
                                        class="btn btn-primary btn-sm float-start float-lg-end  mb-3 {{ session('agent_statement_data') ? '' : 'disabled' }}">Download
                                        PDF <i class="bi bi-download"></i></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $("#single").select2({
                placeholder: "--select--agent--",
                allowClear: true,
            });

            $('#statement_table').DataTable({
                responsive: true,

            });

            // $(function() {
            //     var startdate, enddate;
            //     $('input[name="daterange"]').daterangepicker({
            //             opens: 'left',
            //             minDate: '01/01/2010',
            //             maxDate: moment(),
            //             autoUpdateInput: false,
            //             locale: {
            //                 format: 'YYYY-MM-DD',
            //                 cancelLabel: 'Clear'
            //             },
            //             placeholder: 'Select Date Range',
            //             applyButtonClasses: 'btn-primary date_apply_btn',
            //             cancelButtonClasses: 'btn-secondary',
            //             applyButtonText: 'Apply',
            //             cancelButtonText: 'Cancel',
            //         },

            //         function(start, end, label) {
            //             startdate = start.format('YYYY-MM-DD')
            //             enddate = end.format('YYYY-MM-DD')
            //         });
            //         $('.date_apply_btn').on('click', function() {
            //             console.log(startdate);
            //             $('input[name="daterange"]').val( startdate+ ' - ' + enddate);
            //             callAjax(startdate,enddate)
            //         })
            // });

            $('#data_range').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                },
                minDate: '01/01/2010',
                // maxDate: moment(),
                autoUpdateInput: false,
                applyButtonClasses: 'btn-primary date_apply_btn',
                cancelButtonClasses: 'btn btn-secondary',
            });

            $('#data_range').on('apply.daterangepicker', function(ev, picker) {
                // console.log($(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate
                //     .format('DD/MM/YYYY')));

                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format(
                    'DD/MM/YYYY'));
                var start_date = picker.startDate.format('YYYY-MM-DD');
                var end_date = picker.endDate.format('YYYY-MM-DD');
                callAjax(start_date, end_date)

            });

            $('#data_range').on('cancel.daterangepicker', function(ev, picker) {
                // Clear the selected date range
                // $(this).val('');
                location.reload();
            });


            function callAjax(startdate, enddate) {
                var agentid = $('.selected_agent_statement').val()
                if (agentid) {
                    $.ajax({
                        url: 'get_agent_statement',
                        method: 'post',
                        data: {
                            id: agentid,
                            start_date: startdate,
                            end_date: enddate
                        },
                        success: (data) => {
                            // console.log(data);
                            // $('input[name="daterange"]').val('');
                            $('#table').removeClass('d-none');

                            $('.pdf_btn').load('statement .pdf_btn')
                            $('#agentinfo').empty();

                            $('#statement_table').DataTable().destroy();
                            if (data) {
                                $('#agentinfo').append(`
                               <div class="col-sm-12 col-md-6 col-lg-6">
                                    <h6 class="fw-bold" >Name : <span class="agent_name ">${data.agent.name}</span></h6>
                                    <h6 class="fw-bold">Email: <span class="agent_email">${data.agent.email ? data.agent.email : 'N/A'}</span></h6>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <h6 class="fw-bold">Address : <span class="agent_address">${data.agent.address ? data.agent.address : 'N/A'}</span></h6>
                                    <h6 class="fw-bold">Credit balance : <span class="agent_balance">${data.agent.credit_balance}</span></h6>
                                </div>
                                <hr class="border-primary">
                               `)

                                let i = 1;
                                $('#statement_body').empty();
                                data.transactions.forEach(element => {
                                    const datetimeString = element.created_at;
                                    const date = datetimeString.slice(0, 10);
                                    $('#statement_body').append(`
                                            <tr>
                                                <td>${i++}</td>
                                                <td>${date}</td>
                                                <td>
                                                    ${element.status === 'completed' ? '<span>Success</span>' : ''}
                                                    ${element.status === 'rejected' ? '<span>Failed</span>' : ''}
                                                    ${element.status !== 'completed' && element.status !== 'rejected' ? '<span>${element.status}</span>' : ''}
                                                </td>
                                                <td>${element.transaction_id}</td>
                                                <td>${element.type}</td>
                                                <td>${element.amount}</td>
                                              
                                            </tr>
                                        `);
                                });
                                $('#statement_table').DataTable();
                            }
                        },
                        error: (error) => {
                            $('.agent_error').removeAttr('hidden');
                            $('#table').addClass('d-none');
                            console.log(error.responseText);
                        }

                    });
                } else {
                    $.ajax({
                        url: 'get_single_agent_statement',
                        method: 'post',
                        data: {
                            start_date: startdate,
                            end_date: enddate
                        },
                        success: (data) => {
                            // console.log(data);
                            // $('input[name="daterange"]').val('');
                            $('#table').removeClass('d-none');

                            $('.pdf_btn').load('statement .pdf_btn')
                            $('#agentinfo').empty();

                            $('#statement_table').DataTable().destroy();
                            if (data) {
                                $('#agentinfo').append(`
                               <div class="col-sm-12 col-md-6 col-lg-6">
                                    <h6 class="fw-bold" >Name : <span class="agent_name ">${data.agent.name}</span></h6>
                                    <h6 class="fw-bold">Email: <span class="agent_email">${data.agent.email ? data.agent.email : 'N/A'}</span></h6>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <h6 class="fw-bold">Address : <span class="agent_address">${data.agent.address ? data.agent.address : 'N/A'}</span></h6>
                                    <h6 class="fw-bold">Credit balance : <span class="agent_balance">${data.agent.credit_balance}</span></h6>
                                </div>
                                <hr class="border-primary">
                               `)

                                let i = 1;
                                $('#statement_body').empty();
                                data.transactions.forEach(element => {

                                    const datetimeString = element
                                        .created_at;
                                    const date = datetimeString.slice(0,
                                        10);
                                    $('#statement_body').append(`
                                            <tr>
                                                <td>${i++}</td>
                                                <td>${date}</td>
                                                <td>
                                                    ${element.status === 'completed' ? '<span>Success</span>' : ''}
                                                    ${element.status === 'rejected' ? '<span>Failed</span>' : ''}
                                                    ${element.status !== 'completed' && element.status !== 'rejected' ? '<span">${element.status}</span>' : ''}
                                                </td>
                                                <td>${element.transaction_id}</td>
                                                <td>${element.type}</td>
                                                <td>${element.amount}</td>
                                               
                                            </tr>
                                        `);
                                });
                                $('#statement_table').DataTable();
                            }
                        },
                        error: (error) => {
                            console.log(error);
                        }

                    })
                }
            };



        });

        $(document).on('change', '.selected_agent_statement', function() {
            $('.agent_error').attr('hidden', true);
            var data_range = $('#data_range').val();
            if (data_range != '') {
                $('.date_apply_btn').trigger('click');

            }
        });
    </script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"
        integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</main><!-- End #main -->

@include('layouts.footer');
