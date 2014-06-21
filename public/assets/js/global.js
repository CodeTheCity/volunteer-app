var $ = this.jQuery.noConflict();

var LaravelBoilerplate = {
    Page: {
        segments: [],
        init: function() {
            LaravelBoilerplate.Page.segments = window.location.href.split("/");
            
            $(function() {
                /*
                |--------------------------------------------------------------------------
                | Validation
                |--------------------------------------------------------------------------
                */

                $('#contact-form').parsley();


    
            });
        },

        fcnMark: function() {
            return true;
        }
    }
};

LaravelBoilerplate.Page.init();