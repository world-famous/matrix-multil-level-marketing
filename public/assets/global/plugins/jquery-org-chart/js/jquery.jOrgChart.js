// jQuery Plugin
(function($) {

    var cx = 0;
    var loopflag = false;
    jOrgChart_user_config_options = {};

    $.fn.jOrgChart = function(options) {

        var opts = $.extend({}, $.fn.jOrgChart.defaults, options);
        jOrgChart_user_config_options = opts;
        var $appendTo = $(opts.chartElement);

        // build the tree
        $this = $(this);
        $this.css("display", "none");
        var $container = $("<div class='" + opts.chartClass + "'/>");
        if ($this.is("ul")) {
            if (opts.rowcolor) {
                //add color to row wise 
                $this.find("li").each(function() {
                    classList = $(this).attr('class').split(/\s+/);
                    $.each(classList, function(index, item) {
                        if (item != "temp" && item != "shoeNode" && item != "child" && !/^unic\d+$/i.test(item)) {
                            re = item;
                        }
                    });


                    var col = $(this).parents('li').length;

                    if (col == 0) {
                        $(this).addClass("nrow");
                    } else if (col == 1) {
                        $(this).addClass("firow");
                    } else if (col == 2) {
                        $(this).addClass("serow");
                    } else if (col == 3) {
                        $(this).addClass("throw");
                    } else if (col == 4) {
                        $(this).addClass("forow");
                    } else if (col == 5) {
                        $(this).addClass("firow");
                    } else if (col == 6) {
                        $(this).addClass("sirow");
                    } else {
                        $(this).addClass("norow");
                    }

                });
            }
            $this.find("li.root").each(function() {
                buildNode($(this), $container, 0, opts);
            })
        } else if ($this.is("li")) {
            buildNode($this, $container, 0, opts);
        }
        $appendTo.append($container);

    };

    // Option defaults
    $.fn.jOrgChart.defaults = {
        chartElement: 'body',
        depth: -1,
        chartClass: "jOrgChart",
        // dragAndDrop: false,
        expand: false,
        control: false,
        rowcolor: false
    };

    var nodeCount = 0;

    // Method that recursively builds the tree
    function buildNode($node, $appendTo, level, opts) {
        var $table = $("<table cellpadding='0' cellspacing='0' border='0'/>");
        var $tbody = $("<tbody/>");

        // Construct the node container(s)
        var $nodeRow = $("<tr/>").addClass("node-cells");
        var $nodeCell = $("<td/>").addClass("node-cell").attr("colspan", 2);
        var $childNodes = $node.children("ul:first").children("li");
        var $nodeDiv;

        if ($childNodes.length > 1) {
            $nodeCell.attr("colspan", $childNodes.length * 2);
        }
        // Draw the node
        // Get the contents - any markup except li and ul allowed
        var $nodeContent = $node.clone()
            .children("ul,li")
            .remove()
            .end()
            .html();

        //Increaments the node count which is used to link the source list and the org chart
        nodeCount++;

        $node.data("tree-node", nodeCount);
        $nodeDiv = $("<div>").addClass("showNode")
            .data("tree-node", nodeCount)
            .append($nodeContent);


        $nodeDiv.mouseenter(function() {
                if ($(this).find("> .details > span").length == 0) {
                    var duplicate = $(this).find("> span.label_node").clone();
                    $(this).find("> .details").prepend(duplicate);
                }
                $(this).find(".details").toggle().parent().css("z-index", "999");
            }).mouseleave(function() {
                $(this).find(".details").toggle().parent().removeAttr("style");
            });

        var append_text = "<li class='temp'></li>";
        var $list_element = $node.clone()
            .children("ul,li")
            .remove()
            .end();


        // Expand and contract nodes
        if (opts.expand) {
            if ($childNodes.length > 0) {
                $nodeDiv.click(function() {
                    var $this = $(this);
                    var $tr = $this.closest("tr");
                    if ($tr.hasClass('contracted')) {
                        $tr.removeClass('contracted').addClass('expanded');
                        $tr.nextAll("tr").css('visibility', '');
                        $node.removeClass('collapsed');
                    } else {
                        $tr.removeClass('expanded').addClass('contracted');
                        $tr.nextAll("tr").css('visibility', 'hidden');
                        $node.addClass('collapsed');
                    }
                });
            }
        }

        $nodeCell.append($nodeDiv);
        $nodeRow.append($nodeCell);
        $tbody.append($nodeRow);

        if ($childNodes.length > 0) {
            // if it can be expanded then change the cursor
            //$nodeDiv.css('cursor','n-resize');

            // recurse until leaves found (-1) or to the level specified
            if (opts.depth == -1 || (level + 1 < opts.depth)) {
                var $downLineRow = $("<tr/>");
                var $downLineCell = $("<td/>").attr("colspan", $childNodes.length * 2);
                $downLineRow.append($downLineCell);

                // draw the connecting line from the parent node to the horizontal line
                $downLine = $("<div></div>").addClass("line down");
                $downLineCell.append($downLine);
                $tbody.append($downLineRow);

                // Draw the horizontal lines
                var $linesRow = $("<tr/>");
                $childNodes.each(function() {
                    var $left = $("<td>&nbsp;</td>").addClass("line left top");
                    var $right = $("<td>&nbsp;</td>").addClass("line right top");
                    $linesRow.append($left).append($right);
                });

                // horizontal line shouldn't extend beyond the first and last child branches
                $linesRow.find("td:first")
                    .removeClass("top")
                    .end()
                    .find("td:last")
                    .removeClass("top");

                $tbody.append($linesRow);
                var $childNodesRow = $("<tr/>");
                $childNodes.each(function() {
                    var $td = $("<td class='node-container'/>");
                    $td.attr("colspan", 2);
                    // recurse through children lists and items
                    buildNode($(this), $td, level + 1, opts);
                    $childNodesRow.append($td);
                });

            }
            $tbody.append($childNodesRow);
        }

        // any classes on the LI element get copied to the relevant node in the tree
        // apart from the special 'collapsed' class, which collapses the sub-tree at this point

        if ($node.attr('class') != undefined) {
            var classList = $node.attr('class').split(/\s+/);
            $.each(classList, function(index, item) {
                if (item == 'collapsed') {

                    $nodeRow.nextAll('tr').css('visibility', 'hidden');
                    $nodeRow.removeClass('expanded');
                    $nodeRow.addClass('contracted');
                } else {
                    $nodeDiv.addClass(item);
                }
            });
        }

        $table.append($tbody);
        $appendTo.append($table);

        /* Prevent trees collapsing if a link inside a node is clicked */
        $nodeDiv.children('a, span').click(function(e) {
            e.stopPropagation();
        });
    }


    var jOrgChart_init = function() {
        $(jOrgChart_user_config_options.chartElement).empty();
        $this.jOrgChart(jOrgChart_user_config_options);
    }

})(jQuery);
