function max_chosen(tag,status='',log=''){
    if (log == 'tag') {
        console.log(tag);
    }
    if (status != '') {
        switch (status) {
            case 'update':
                let list_option = '';
                let first_option = '';
                tag.find('option').each(function(key,value){
                    if (key == 0) {
                        if (tag.val() != '') {
                            first_option = tag.find('option:selected').html();
                            list_option += '<li class="active-result result-selected" data-option-array-index="'+key+'">'+tag.find('option:selected').html()+'</li>'
                        }else {
                            first_option = $(this).html();
                            list_option += '<li class="active-result result-selected" data-option-array-index="'+key+'">'+$(this).html()+'</li>'
                        }
                    }else {
                        list_option += '<li class="active-result" data-option-array-index="'+key+'">'+$(this).html()+'</li>'
                    }
                });
                let wrap_chosen = tag.next();
                wrap_chosen.find('.max-chosen-container .max-chosen-single span').html(first_option);
                wrap_chosen.find('.max-wrap-chosen-drop .max-chosen-drop ul.max-chosen-results').html(list_option);
                break;
            default:

        }
    }else {
        tag.hide();
        if (tag.next().hasClass('max-wrap-chosen') == false) {
            let html = '<div class="max-wrap-chosen">';
            html += '<div class="max-chosen-container max-chosen-container-single" title="" style="width: 0px;">';
            html += '<a class="max-chosen-single"><span></span><div><b></b></div></a>';
            html += '</div>';
            html += '<div class="max-wrap-chosen-drop">';
            html += '<div class="max-chosen-drop" style="display:none">';
            html += '<div class="max-chosen-search">';
            html += '<input class="max-chosen-search-input" type="text" autocomplete="off">';
            html += '</div>';
            html += '<ul class="max-chosen-results" id="max-chosen-results"></ul>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            let list_option = '';
            let first_option = '';
            tag.find('option').each(function(key,value){
                if (key == 0) {
                    if (tag.val() != '') {
                        first_option = tag.find('option:selected').html();
                        list_option += '<li class="active-result result-selected" data-option-array-index="'+key+'">'+tag.find('option:selected').html()+'</li>';
                    }else {
                        first_option = $(this).html();
                        list_option += '<li class="active-result result-selected" data-option-array-index="'+key+'">'+$(this).html()+'</li>';
                    }
                }else {
                    list_option += '<li class="active-result" data-option-array-index="'+key+'">'+$(this).html()+'</li>';
                }
            });
            tag.after(html);
            let wrap_chosen = tag.next();
            wrap_chosen.find('.max-chosen-container .max-chosen-single span').html(first_option);
            wrap_chosen.find('.max-wrap-chosen-drop .max-chosen-drop ul.max-chosen-results').html(list_option);
            $(document).click(function(){
                $('.max-wrap-chosen').removeClass('max-chosen-with-drop');
                $('.max-chosen-drop').hide();
            });
            wrap_chosen.on('click','.max-chosen-container a.max-chosen-single',function(e){
                e.stopPropagation();
                $(this).closest(document).find('.max-wrap-chosen').removeClass('max-chosen-active');
                $(this).closest('.max-wrap-chosen').addClass('max-chosen-active');
                let this_chosen = $(this);
                this_chosen.closest('.max-wrap-chosen').find('.max-wrap-chosen-drop .max-chosen-search-input').val('');
                wrap_chosen.find('.max-wrap-chosen-drop ul.max-chosen-results li').show();
                $(this).closest(document).find('.max-wrap-chosen').each(function(key,value){
                    if ($(this).hasClass('max-chosen-active') != true) {
                        if($(this).find('.max-chosen-drop').is(':visible')){
                            $(this).find('.max-chosen-drop').hide();
                            $(this).closest('.max-wrap-chosen').removeClass('max-chosen-with-drop');
                        }
                    }
                });
                if (this_chosen.closest('.max-wrap-chosen').find('.max-chosen-drop').is(':visible')) { //close chosen
                    this_chosen.closest('.max-wrap-chosen').removeClass('max-chosen-with-drop');
                    this_chosen.closest('.max-wrap-chosen').find('.max-chosen-drop').hide();
                }else { //open chosen
                    this_chosen.closest('.max-wrap-chosen').find('.max-chosen-drop').show();
                    this_chosen.closest('.max-wrap-chosen').addClass('max-chosen-with-drop');
                    this_chosen.closest('.max-wrap-chosen').find('.max-wrap-chosen-drop .max-chosen-search-input').focus();
                }
            });
            wrap_chosen.find('.max-wrap-chosen-drop .max-chosen-drop ul.max-chosen-results').on('click','li.active-result',function(e){ //choose value chosen
                e.stopPropagation();
                let value = $(this).html();
                let index_li = $(this).attr('data-option-array-index');
                $(this).closest('.max-chosen-results').find('li').each(function(key,value){
                    $(this).removeClass('result-selected');
                });
                $(this).addClass('result-selected');
                $(this).closest('.max-wrap-chosen').find('.max-chosen-container .max-chosen-single span').html(value);
                $(this).closest('.max-wrap-chosen').removeClass('max-chosen-with-drop');
                tag.prop('selectedIndex',index_li).change();
                $(this).closest('.max-wrap-chosen').find('.max-chosen-drop').hide();
                if (log == 'get_value_select') {
                    console.log(tag.val());
                }
            });
            wrap_chosen.on('click','.max-chosen-drop',function(e){ //search chosen
                e.stopPropagation();
            });
            wrap_chosen.on('keyup','.max-chosen-drop .max-chosen-search input.max-chosen-search-input',function(e){ //search chosen
                e.stopPropagation();
                $(this).closest('.max-wrap-chosen').find('.max-wrap-chosen-drop ul.max-chosen-results li.no-results').remove();
                let search = $(this).val();
                search = search.toLowerCase();
                let count_search = 0;
                $(this).closest('.max-wrap-chosen').find('.max-wrap-chosen-drop ul.max-chosen-results li').each(function(key,value){
                    let value_search = $(this).html();
                    value_search = value_search.toLowerCase();
                    if ($(this).hasClass('no-results') == false) {
                        if (value_search.indexOf(search) > -1) {
                            $(this).show();
                            count_search++;
                        }else {
                            $(this).hide();
                        }
                    }
                });
                if (count_search < 1) {
                    let html = '<li class="no-results text-danger" style="display:block">ไม่พบตามคำค้น <span>"'+search+'"</span></li>';
                    $(this).closest('.max-wrap-chosen').find('.max-wrap-chosen-drop ul.max-chosen-results').append(html);
                }
            });
        }
    }
}
