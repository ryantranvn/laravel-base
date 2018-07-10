
$(document).ready( function() {

    var params = getParams();
    var sorting = "";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ajaxStart(function () {
        $('.page-loader-wrapper').fadeIn();
    });
    $(document).ajaxStop(function () {
        $('.page-loader-wrapper').fadeOut();
    });

    // languag switch
    if ($('.language-switch').length>0) {
        $('.language-switch').find('a').click(function (e) {
            e.preventDefault();
            $('input[name="locale"]').val($(this).attr('class'));
            $('#frmLanguageSwitch').submit();
        });
    }

    // table resize
    if ($("table.tableResize").length>0) {
        $("table.tableResize").colResizable({
            hoverCursor: 'ew-resize',
            dragCursor: 'ew-resize'
        });
    }

    // sorting
    if (!$.isEmptyObject(params) && params.sorting != undefined) {
        sorting = params.sorting;
        var sortingField = $('body').find('.table th.sorting[data-sort='+sorting+']');
        if (params.by == 'asc') {
            sortingField.addClass('sorting_asc');
        }
        else {
            sortingField.addClass('sorting_desc');
        }
    }
    $('body').on('click', '.table th.sorting', function() {
        var th = $(this);
        var dataSort = th.attr('data-sort');
        var url = window.location.href;
        params = getParams();

        if ($.isEmptyObject(params)) {
            sorting += '?sorting=' + dataSort + '&by=asc';
            window.location.href = url + sorting;
        }
        else {
            if (params.sorting == undefined || params.sorting==="") {
                sorting += '&sorting=' + dataSort + '&by=asc';
                window.location.href = url + sorting;
            }
            else {
                var newUrl = "";
                var currentUrl = location.href;
                var currentSort = params.sorting;
                if (currentSort != dataSort) {
                    newUrl = currentUrl.replace("sorting="+currentSort, "sorting="+dataSort);
                }
                else {
                    if (params.by == 'asc') {
                        newUrl = currentUrl.replace("by=asc", "by=desc");
                    }
                    else {
                        newUrl = currentUrl.replace("by=desc", "by=asc");
                    }
                }
                window.location.href = newUrl;
            }
        }
    });

    function getParams(k)
    {
        var p={};
        location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v});
        return k?p[k]:p;
    }

    // tree
    if ($('.easy-tree').length>0) {
        $('.easy-tree').EasyTree({
            selectable: true,
            deletable: false,
            editable: false,
            addable: false,
            iconDefault: 'glyphicon-folder-open',
            iconOpen: 'glyphicon-minus',
            iconClose: 'glyphicon-plus'
        });
    }

    // character limit
    if ($('.limit').length>0) {
        $('.limit255').maxlength({
            max : 255,
            feedbackText : '{c}/{m}'
        });
        $('.limit1024').maxlength({
            max : 1024,
            feedbackText : '{c}/{m}'
        });
    }

    $(".spinner").spinner();
});