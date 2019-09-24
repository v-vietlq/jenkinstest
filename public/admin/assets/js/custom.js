/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */

var SumServices = function () {
    
    var domain = 'http://localhost:8000';
    /**
     * Bootstrap Switch
     */
    var _componentBootstrapSwitch = function() {
        if (!$().bootstrapSwitch) {
            console.warn('Warning - switch.min.js is not loaded.');
            return;
        }
    
        $('.form-check-input-switch').bootstrapSwitch();
    };

    var _componentDaterange = function() {
        if (!$().daterangepicker) {
            console.warn('Warning - daterangepicker.js is not loaded.');
            return;
        }

        // Single picker
        $('.daterange-single').daterangepicker({ 
            singleDatePicker: true,
            applyClass: 'bg-slate-600',
            cancelClass: 'btn-light',
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

    };

    var _componentMessage = function () {
        $(".alert").delay(5000).slideUp(1000);
    };

    var _componentAlert = function () {
        if (typeof swal == 'undefined') {
            console.warn('Warning - sweet_alert.min.js is not loaded.');
            return;
        }

        $('.accept_delete').on('click', function(e) {
            e.preventDefault();

            var linkDelete = $(this).attr("href");

            // Defaults
            var swalInit = swal.mixin({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-light'
            });

            swalInit({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                closeOnConfirm: false,
                allowOutsideClick: false
            }).then(function(result) {
                if(result.value) {
                    window.location.href = linkDelete;
                }
                else if(result.dismiss === swal.DismissReason.cancel) {
                    swalInit(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    );
                }
            });
        });
    };

    var _componentChecbox = function () {
        $('.chkRole').click(function () {
            $(this).parent().find('li .chkRole').prop('checked', $(this).is(':checked'));
            var sibs = false;
            $(this).closest('ul').children('li').each(function () {
                if($('.chkRole', this).is(':checked')) sibs=true;
            })
            $(this).parents('ul').prev().prop('checked', sibs);
        });
    };

    var _componentTableData = function () {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });
    
        // Column selectors
        $('.datatable-button-html5-columns').DataTable({
            buttons: {            
                buttons: [
                    {
                        extend: 'copyHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: [0, 1, 2, 5]
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="icon-three-bars"></i>',
                        className: 'btn bg-blue btn-icon dropdown-toggle'
                    }
                ]
            }
        });
    }

    var _componentAjaxIncreasePosition = function () {
        $("select[name='parent']").change(function () {
            var id = $(this).val();
            $.ajax({
                url:  domain + '/admin/ajax/position',
                type: 'POST',
                dataType: 'html',
                data: {id: id},
                success: function (position) {
                    $("input[name='position']").val(position);
                }
            });
        });
    }

    var _componentAjaxUpdatePosition = function () {
        $("input[name='position_cate']").change(function(event) {
            var position = $(this).val();
            var id       = $(this).attr('data-id');
            $.ajax({
                url: domain + '/admin/ajax/update-position',
                type: 'POST',
                dataType: 'html',
                data: {id: id , position: position},
                success: function (data) {
                    location.reload();
                }
            });		
        });
    }

    var _componentTokenfield = function() {
        if (!$().tokenfield) {
            console.warn('Warning - tokenfield.min.js is not loaded.');
            return;
        }

        // Basic initialization
        $('.tokenfield').tokenfield();
    }

    var _componentLoadEmployer = function () {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        function formatRepo (repo) {
            if (repo.loading) return repo.text;

            var markup = '<div class="select2-result-repository clearfix">' +
                '<div class="select2-result-repository__avatar"><img src="'+ repo.logo +'" /></div>' +
                '<div class="select2-result-repository__meta">' +
                '<div class="select2-result-repository__title">' + repo.name_vi + '</div>';

            if (repo.description) {
                markup += '<div class="select2-result-repository__description">' + repo.about_vi + '</div>';
            }

            markup += '<div class="select2-result-repository__statistics">' +
                '<div class="select2-result-repository__forks">Phone ' + repo.phone + '</div>' +
                '<div class="select2-result-repository__stargazers">Adress ' + repo.address_vi + '</div>' +
                '</div>' +
                '</div></div>';

            return markup;
        }

        // Format selection
        function formatRepoSelection (repo) {
            return repo.name_vi || repo.text;
        }

        $('.select-remote-data').select2({
            ajax: {
                url: 'http://localhost:8000/admin/ajax/search-employer',
                method: 'POST',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        keyword: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.data,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) { return markup; }, 
            minimumInputLength: 1,
            templateResult: formatRepo, 
            templateSelection: formatRepoSelection 
        });
    }

    var _componentLoadCiti = function () {
        function sortName (object) {
            var array = []

            Object.keys(object).forEach(function(key) {
                array.push(object[key]);
            });

            array.sort(function(a, b) {
                var textA = a.slug.toUpperCase();
                var textB = b.slug.toUpperCase();
                return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
            });

            return array;
        }

        function loadData (url,tag,area = '') {
            var id_select = $(tag).attr('selected');
            alert(id_select);
            $.ajax({
                type: "GET",
                url: domain + "/hanhchinhvn/" + url,
                dataType: "json",
                success: function (repsonse) {
                    var obj = sortName(repsonse);
                    var option = '';
                    obj.forEach(function(item, index){ 
                        option += '<option value="'+item.code+'">'+ item.name_with_type +'</option>';
                    });
    
                    $(tag).html(option);

                    if (area == 'district') {
                        var idFirstDistrict = obj[0].code;
                        loadData('phuong/' + idFirstDistrict + '.json','select[name="ward"]');
                    }
                }
            });
        }

        loadData('tinh_tp.json','select[name="city"]');
        loadData('quan/89.json','select[name="district"]');
        loadData('phuong/886.json','select[name="ward"]');

        $('select[name="city"]').on('change',function () {
            var selectedCity = $(this).val();
            loadData('quan/' + selectedCity + '.json','select[name="district"]','district');
            
        });

        $('select[name="district"]').on('change',function () {
            var selectedDestrict = $(this).val();
            loadData('phuong/' + selectedDestrict + '.json','select[name="ward"]');
        });
    }

    return {
        initComponents: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            _componentBootstrapSwitch();
            _componentTableData();
            _componentMessage();
            _componentChecbox();
            _componentAlert();
            _componentDaterange();   
            _componentAjaxIncreasePosition();
            _componentAjaxUpdatePosition();
            _componentTokenfield();
            _componentLoadEmployer();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    SumServices.initComponents();
});