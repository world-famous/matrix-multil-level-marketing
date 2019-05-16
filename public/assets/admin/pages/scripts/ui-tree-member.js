var UITree = function () {

     var ajaxTreeSample = function() {

        $("#tree_4").jstree({
            "core" : {
                "themes" : {
                    "responsive": true
                }, 
                // so that create works
                "check_callback" : true,
                'data' : {
                    'url' : function (node) {
                      return '/member/genealogy/ajaxtreeview';
                    },
                    'data' : function (node) {
                      return { 'parent' : node.id };
                    },
                    'dataType' : "json"
                }
            },
            "types" : {
                "default" : {
                    "icon" : "fa fa-user icon-state-warning icon-lg"
                },
                "file" : {
                    "icon" : "fa fa-user icon-state-warning icon-lg"
                }
            },
            "state" : { "key" : "demo3" },
            "plugins" : [ "dnd", "types" ]
        });
    
    }


    return {
        //main function to initiate the module
        init: function () {

            ajaxTreeSample();

        }

    };

}();