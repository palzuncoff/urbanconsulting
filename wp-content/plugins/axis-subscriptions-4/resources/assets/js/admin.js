if (typeof(axisubs) == 'undefined') {
    var axisubs = {};
}
if (typeof(axisubs.jQuery) == 'undefined') {
    axisubs.jQuery = jQuery.noConflict();
}
/* For loading fields based on plan type */
function loadFieldsOfPlanType(val, id) {
    (function ($) {
        var postData = {
            id: id,
            type: val,
            view: "Plan",
            task: "loadPlanFields",
            action: 'axisubs_ajax_admin'
        };
        $.ajax({
            // url: $('#site_url').val()+'/index.php/axisubs-admin-ajax',
            url: $('#site_url').val()+'/wp-admin/admin-ajax.php',
            type: 'POST',
            data: postData,
            beforeSend: function () {
                $('.axisubs-fields-plantypes-con-o .loader-ajax').show();
            },
            complete: function () {
                $('.axisubs-fields-plantypes-con-o .loader-ajax').hide();
            },
            success: function (data) {
                var plan_type = $( "#axisub_plan_type option:selected" ).text();
                $('.plan_type_value_text').html(plan_type);
                $('div.axisubs-fields-plantypes-c').html(data);
                checkForeverIsChoosen();
                $('#axisub_plan_name').trigger('change');
            }
        });
    })(axisubs.jQuery);
}

// For validationg plan
function validatePlan(){
        var valid = true;
        valid = validateRequiredFields('#planForm');
        if(valid == false){
            if(validateRequiredFields('#basic') == false){
                axisubs.jQuery(".nav-tabs a[href=#basic]").trigger('click');
            } else {
                axisubs.jQuery(".nav-tabs a[href=#durations]").trigger('click');
            }
        }
        return valid;
}
/**
 * For validating Configuration
* */
function validateConfig(){
    var result = validateRequiredFields('#config');
    if(result == false){
        (function ($) {
            if($('#config #basic .required.invalid-field').length){
                $('a[href="#basic"]').trigger('click');
            } else if($('#config #tax .required.invalid-field').length){
                $('a[href="#tax"]').trigger('click');
            } else if($('#config #eu_vat .required.invalid-field').length){
                $('a[href="#eu_vat"]').trigger('click');
            } else if($('#config #dashboard .required.invalid-field').length){
                $('a[href="#dashboard"]').trigger('click');
            }
        })(axisubs.jQuery);
    }

    return result;
}

// for adding new customer
function addCustomer(){
    (function ($) {
        var messageText = $('.axisubs-user-message-text');
        messageText.hide();
        var valid = true;
        valid = validateRequiredFields('#my_profile');
        if(($('#axisubs_add_type').val() == '0') && ($('#axisubs_user_password1').val() != $('#axisubs_user_password2').val())){
            $('#axisubs_user_password1').addClass('invalid-field').focus();
            $('#axisubs_user_password2').addClass('invalid-field');
            valid = false;
        }
        if(valid){
            var fields = $("#my_profile").serializeArray();
            fields.push({'name':'task','value': 'addCustomer'});
            fields.push({'name':'view','value': 'Customer'});
            fields.push({'name':'action','value': 'axisubs_ajax_admin'});
            $.ajax({
                type: 'post',
                url: $('#site_url').val()+'/wp-admin/admin-ajax.php',
                dataType: 'json',
                data: fields,
                cache: false,
                success: function (json) {
                    removeMessageClass('.axisubs-user-message-text');
                    messageText.html(json['message']).show();
                    if (json['status'] == 'success') {
                        messageText.addClass('message-success');
                        //$("#register_user").submit();
                        var redirectURL = $('#site_url').val()+'/wp-admin/admin.php?page=customers-index&task=edit&id='+json['ID'];
                        window.location = redirectURL;
                    } else {
                        messageText.addClass('message-danger');
                        if(json['field'] != undefined){
                            $('#axisubs_subscribe_'+json['field']).addClass('invalid-field').focus();
                        }
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    })(axisubs.jQuery);
}

// Customer new layout: On change customer type new/existing
function addCustomertype(val){
    (function ($) {
        if(val == '1'){
            $('.axisubs_customer_add_existing').show('slow');
            $('.axisubs_customer_add_new').hide('slow');
            $('input[type="password"]').removeClass('required');
        } else {
            $('.axisubs_customer_add_existing').hide('slow');
            $('.axisubs_customer_add_new').show('slow');
            $('input[type="password"]').addClass('required');
            $('#axisubs_wp_user_id').val('').trigger('change');
        }
    })(axisubs.jQuery);
}

// For auto populate plan fields for create subscription
function autoPopulatePlanDetails(val){
    (function ($) {
        var postData = {
            id: val,
            task: "loadPlanDetails",
            view: "Subscription",
            action: 'axisubs_ajax_admin'
        };
        $.ajax({
            url: $('#site_url').val()+'/wp-admin/admin-ajax.php',
            type: 'POST',
            data: postData,
            dataType: 'json',
            beforeSend: function () {
                // $('.axisubs-fields-plantypes-con-o .loader-ajax').show();
            },
            complete: function () {
                // $('.axisubs-fields-plantypes-con-o .loader-ajax').hide();
            },
            success: function (data) {
                if(data['status'] == 'success'){
                    poupulatePlanData(data['fields']);
                } else {
                    poupulatePlanData();
                }

            }
        });

        function poupulatePlanData(data){
            $('.autopopulate_fields input').each(function (e) {
                $(this).val('');
            });
            if(data != undefined){
                if(data.price != '')
                    $('#subscribe_price').val(data.price);
            } else {

            }
        }
    })(axisubs.jQuery);
}

// Add new subscription
function addNewSubscription(){
    (function ($) {
        var valid = validateRequiredFields("#subscriptionForm");
        if(valid){
            $('#subscriptionForm').submit();
        } else {
            
        }
        var fields = $("#subscriptionForm").serializeArray();
        /*fields.push({'name':'id','value':val});
        fields.push({'name':'task','value': 'addNewSubscription'});
        fields.push({'name':'view','value': 'Subscription'});
        $.ajax({
            url: $('#site_url').val()+'/index.php/axisubs-admin-ajax',
            type: 'POST',
            data: fields,
            dataType: 'json',
            beforeSend: function () {
                // $('.axisubs-fields-plantypes-con-o .loader-ajax').show();
            },
            complete: function () {
                // $('.axisubs-fields-plantypes-con-o .loader-ajax').hide();
            },
            success: function (data) {
                if(data['status'] == 'success'){
                    poupulateCustomerData(data['fields']);
                } else {
                    poupulateCustomerData();
                }

            }
        });*/
    })(axisubs.jQuery);
}

// For auto populate fields
function autoPopulateCustomerDetails(val){
    (function ($) {
        var postData = {
            id: val,
            task: "loadCustomerDetails",
            view: "Customer",
            action: 'axisubs_ajax_admin'
        };
        $.ajax({
            url: $('#site_url').val()+'/wp-admin/admin-ajax.php',
            type: 'POST',
            data: postData,
            dataType: 'json',
            beforeSend: function () {
               // $('.axisubs-fields-plantypes-con-o .loader-ajax').show();
            },
            complete: function () {
               // $('.axisubs-fields-plantypes-con-o .loader-ajax').hide();
            },
            success: function (data) {
                if(data['status'] == 'success'){
                    poupulateCustomerData(data['fields']);
                } else {
                    poupulateCustomerData();
                }

            }
        });

        function poupulateCustomerData(data){
            if(data != undefined){
                $('#axisubs-wordpress_username_text').html(data['user_login']);
                $('#axisubs_subscribe_first_name').val(data['first_name']);
                $('#axisubs_subscribe_last_name').val(data['last_name']);
                $('#axisubs_subscribe_email').val(data['email']);
                $('input[name="id"]').val(data['id']);
            } else {
                $('#axisubs-wordpress_username_text').html('');
                $('#axisubs_subscribe_first_name').val('');
                $('#axisubs_subscribe_last_name').val('');
                $('#axisubs_subscribe_email').val('');
                $('input[name="id"]').val('');
            }
        }
    })(axisubs.jQuery);
}

//for forever choosen
function checkForeverIsChoosen(){
    (function ($) {
        if($('#axisub_plan_period_forever').is(":checked")) {
            $('#axisub_plan_period, #axisub_plan_period_units').hide();
            $('#axisub_plan_period').removeClass('required');
        } else {
            $('#axisub_plan_period, #axisub_plan_period_units').show();
            $('#axisub_plan_period').addClass('required');
        }
    })(axisubs.jQuery);
}

function saveConfigFromInstallationWizard(id){
    (function ($) {
        var fields = $("#"+id).serializeArray();
        fields.push({'name':'task','value': 'saveConfig'});
        fields.push({'name':'view','value': 'InstallationWizard'});
        fields.push({'name':'action','value': 'axisubs_ajax_admin'});
        $.ajax({
            type: 'post',
            url: $('#site_url').val()+'/wp-admin/admin-ajax.php',
            dataType: 'json',
            data: fields,
            cache: false,
            beforeSend: function () {
                 $('.axisubs_wizard-con .loader-ajax').show();
            },
            complete: function () {
                $('.axisubs_wizard-con .loader-ajax').hide();
            },
            success: function (json) {
                if(json == '1'){
                    if(id == 'axisubs_wizard_tax'){
                        redirectToPlanPage()
                    } else {
                        $('#axisubs_wizard_config').hide();
                        $('#axisubs_wizard_paypal').show();
                    }
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    })(axisubs.jQuery);
}

function savePaypalConfigFromInstallationWizard(){
    (function ($) {
        var fields = $("#axisubs_wizard_paypal").serializeArray();
        fields.push({'name':'task','value': 'savePaypalConfig'});
        fields.push({'name':'view','value': 'InstallationWizard'});
        fields.push({'name':'action','value': 'axisubs_ajax_admin'});
        $.ajax({
            type: 'post',
            url: $('#site_url').val()+'/wp-admin/admin-ajax.php',
            dataType: 'json',
            data: fields,
            cache: false,
            beforeSend: function () {
                $('.axisubs_wizard-con .loader-ajax').show();
            },
            complete: function () {
                $('.axisubs_wizard-con .loader-ajax').hide();
            },
            success: function (json) {
                if(json == '1'){
                    $('#axisubs_wizard_tax').show();
                    $('#axisubs_wizard_paypal').hide();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    })(axisubs.jQuery);
}

function skipTaxPageInstallWizard(){
    (function ($) {
        var postData = {
            step: 3,
            task: "updateInstallWizardStatus",
            view: "InstallationWizard",
            action: 'axisubs_ajax_admin'
        };
        $.ajax({
            type: 'post',
            url: $('#site_url').val()+'/wp-admin/admin-ajax.php',
            dataType: 'json',
            data: postData,
            cache: false,
            beforeSend: function () {
                $('.axisubs_wizard-con .loader-ajax').show();
            },
            complete: function () {
                $('.axisubs_wizard-con .loader-ajax').hide();
            },
            success: function (json) {
                if(json == '1'){
                    redirectToPlanPage();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    })(axisubs.jQuery);
}

function redirectToPlanPage(){
    (function ($) {
        var redirectURL = $('#site_url').val()+'/wp-admin/admin.php?page=plans-index&task=edit&install=1';
        window.location = redirectURL;
    })(axisubs.jQuery);
}

function changePlanStatus(id, status){
    (function ($) {
        var postData = {
            id: id,
            status: status,
            task: "updatePlanStatus",
            view: "Plan",
            action: 'axisubs_ajax_admin'
        };
        $.ajax({
            type: 'post',
            url: $('#site_url').val()+'/wp-admin/admin-ajax.php',
            dataType: 'json',
            data: postData,
            cache: false,
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (json) {
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    })(axisubs.jQuery);
}

// For
(function ($) {
    $(document).ready(function () {
        $(document).on('click', 'h2.toggle_axisubs', function() {
            var postbox = $(this).closest('.postbox');
            if(postbox.hasClass('closed')){
                postbox.removeClass('closed');
            } else {
                postbox.addClass('closed');
            }
        });

        // save and close
        $(document).on('click', 'button.axisubs_save_close', function() {
            $('#task').val('saveAndClose');
            $(this).closest("form").submit();
        });

        /* To change plan status */
        $(document).on('click', '.change_plan_status', function() {
            var id = $(this).attr('data-id');
            var checked = $(this).prev("input").is(":checked");
            if(checked == true){
                checked = 0;
            } else {
                checked = 1;
            }
            if(id != ''){
                changePlanStatus(id, checked);
            }
        });

        $(document).on('click', 'button.plan_step_2', function() {
            if(validateRequiredFields('#axisubs_plan_create_step_1')){
                $('#axisubs_plan_create_step_1').hide('slow');
                $('#axisubs_plan_create_step_2').show('slow');
            }
        });

        $(document).on('click', 'button.plan_step_1', function() {
            $('#axisubs_plan_create_step_2').hide('slow');
            $('#axisubs_plan_create_step_1').show('slow');
        });

        // For on click event forever checkbox
        $(document).on('click', '#axisub_plan_period_forever', function() {
            checkForeverIsChoosen();
        });

        // For on click event for installation wizard next
        $(document).on('click', '#next_button_config', function() {
            if(validateRequiredFields('#axisubs_wizard_config')){
                saveConfigFromInstallationWizard('axisubs_wizard_config');
            }
        });

        // For on click event for installation wizard next
        $(document).on('click', '#pre_button_payment', function() {
            $('#axisubs_wizard_config').show();
            $('#axisubs_wizard_paypal').hide();
        });

        // For on click event for installation wizard next
        $(document).on('click', '#skip_button_payment', function() {
            $('#axisubs_wizard_paypal').hide();
            $('#axisubs_wizard_tax').show();
        });

        // For on click event for installation wizard next
        $(document).on('click', '#next_button_payment', function() {
            if(validateRequiredFields('#axisubs_wizard_paypal')) {
                savePaypalConfigFromInstallationWizard();
            }
        });

        // For on click event for installation wizard next
        $(document).on('click', '#skip_button_tax', function() {
            skipTaxPageInstallWizard();
        });

        // For on click event for installation wizard next
        $(document).on('click', '#next_button_tax', function() {
            saveConfigFromInstallationWizard('axisubs_wizard_tax');
        });

        // For on click event for installation wizard next
        $(document).on('click', '#pre_button_tax', function() {
            $('#axisubs_wizard_paypal').show();
            $('#axisubs_wizard_tax').hide();
        });

        //For generating slug
        $(document).on( "blur", '#axisub_plan_name', function() {
            var name = $(this).val();
            name = name.toLowerCase(); // lowercase
            name = name.replace(/ +(?= )/g,'');
            name = name.replace(/\s/g,"-");
            name = name.replace(/[^a-z-0-9]/g, ''); // remove everything that is not [a-z] or -
            $('#axisub_plan_slug').val(name);
        });

        //for loading subscriptions
        $('.load_more_subscriptions').mouseout(function() {
            var contentDiv = $(this).children('.more_subscriptions-data');
            contentDiv.hide();
            contentDiv.prev('.more_subscriptions-data-left-arrow').hide();
        }).mouseover(function() {
            var selected = $(this);
            var postData = {
                id: jQuery(this).attr('data-attr'),
                task: "loadCustomerSubscriptions",
                view: "Customer",
                action: 'axisubs_ajax_admin'
            };
            var contentDiv = selected.children('.more_subscriptions-data');
            //selected.find('.more_subscriptions-data').show();
            contentDiv.show();
            contentDiv.prev('.more_subscriptions-data-left-arrow').show();
            if($(this).attr('send-attr') == '1'){
                return;
            } else {
                selected.parent().find('.more_subscriptions-data').html("Loading..");
                selected.attr('send-attr', '1');
            }
            $.ajax({
                url: $('#site_url').val()+'/wp-admin/admin-ajax.php',
                type: 'POST',
                data: postData,
                async	: false,
                success: function(json) {
                    selected.parent().find('.more_subscriptions-data').html(json);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        });

        // Uploading files
        if(wp.media != undefined) {
            var file_frame;
            var btn_id;
            var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
            var set_to_post_id = 0; // Set this
            $(document).on('click', '.upload_image_button_close', function (event) {
                $(this).prev('.upload_image_preview').attr('src', $(this).attr('data-path'));
                $("#axisub_plan_image").val('');
                $("#axisub_plan_image_attachment_id").val('');
                $(this).removeClass('show').addClass('hide');
            });
            $(document).on('click', '.upload_image_button', function (event) {
                // btn_id = jQuery(this).attr('id');
                // btn_id = btn_id.replace('upload_image_button_', '');
                btn_id = 0;
                event.preventDefault();
                // If the media frame already exists, reopen it.
                if (file_frame) {
                    // Set the post ID to what we want
                    file_frame.uploader.uploader.param('post_id', set_to_post_id);
                    // Open frame
                    file_frame.open();
                    return;
                } else {
                    // Set the wp.media post id so the uploader grabs the ID we want when initialised
                    wp.media.model.settings.post.id = set_to_post_id;
                }
                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a image to upload',
                    button: {
                        text: 'Use this image',
                    },
                    multiple: true	// Set to true to allow multiple files to be selected
                });
                // When an image is selected, run a callback.
                file_frame.on('select', function () {
                    var selection = file_frame.state().get('selection');
                    var images = '';
                    var image_ids = '';
                    var id_list = [];
                    var image_list = {};
                    var image = {};

                    selection.map(function (attachment) {
                        attachment = attachment.toJSON();
                        //console.log(attachment);
                        if (attachment.url != 'undefined') {
                            image_ids += attachment.id + ',';
                            id_list.push(attachment.id);
                            image_list[attachment.id] = attachment.url;
                            image.id = attachment.id;
                            image.url = attachment.url;
                        }
                    });
                    //console.log(image_list);
                    $("#axisub_plan_image").val(image.url);
                    $("#axisub_plan_image").prev().prev('.upload_image_preview').attr('src', image.url);
                    $("#axisub_plan_image_attachment_id").val(image.id);
                    $('.upload_image_button_close').removeClass('hide').addClass('show');
                });
                // Finally, open the modal
                file_frame.open();
            });
        }
    });
})(axisubs.jQuery);