(function() {
    tinymce.create("tinymce.plugins.gwp_gracipe_button_plugin", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //add new button     
            ed.addButton("green", {
                title : "Insert Gracipe",
                cmd : "green_command",
                image : "data:image/png;base64,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"
            });

            //button functionality.
            ed.addCommand("green_command", function() {

                var selected_text = ed.selection.getContent();
                
                function cbVal (cb_val) {
                  var return_text = selected_text + cb_val;
                  ed.execCommand("mceInsertContent", 0, return_text);
                }

                window.GRACIPE_CB_FUNC = cbVal;

                jQuery("body").trigger('gracipeShow');

            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "Extra Buttons",
                author : "Narayan Prusty",
                version : "1"
            };
        }
    });

    tinymce.PluginManager.add("gwp_gracipe_button_plugin", tinymce.plugins.gwp_gracipe_button_plugin);
})();