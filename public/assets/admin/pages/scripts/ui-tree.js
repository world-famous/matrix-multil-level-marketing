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
                      return '/admin/genealogy/ajaxtreeview';
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
        }).on('changed.jstree', function (e, data) {
            var i, j, r = [];
            for(i = 0, j = data.selected.length; i < j; i++) {
              r.push(data.instance.get_node(data.selected[i]).text);
            }
           // console.log(r.join(', '));
           var url="/admin/genealogy/edit?username="+r.join(', ');
           console.log(url);
           window.open(url);
          });

        // $('#tree_4')
        //   // listen for event
          
        //   // create the instance
        //   .jstree();
    
    }


    return {
        //main function to initiate the module
        init: function () {

            ajaxTreeSample();

        }

    };

}();