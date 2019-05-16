@extends('pages.member.home')

@section('additional_partial_css')
	<link rel="stylesheet" href="{{asset('assets/global/plugins/jquery-org-chart/css/jquery.jOrgChart.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/global/plugins/jquery-org-chart/css/custom.css')}}" />

@endsection

@section('member_content')
	<div class="row">
		<div class="col-md-12">
			<h1 style="color:#348EFE;">Matrix Tree</h1>
		</div>
		<div class="col-md-12">
			<div class="portlet blue box">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cogs"></i>Matrix Genealogy
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<a href="#portlet-config" data-toggle="modal" class="config">
						</a>
						<a href="javascript:;" class="reload">
						</a>
						<a href="javascript:;" class="remove">
						</a>
					</div>
				</div>
				<div class="portlet-body">
					<div id="chart" class="orgChart" style="overflow: auto;"></div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional_partial_plugins')
	<script type="text/javascript" src="{{asset('assets/global/plugins/jquery-org-chart/js/taffy.js')}}"></script>
	<script src="{{asset('assets/global/plugins/jquery-org-chart/js/jquery.jOrgChart.js')}}"></script>
	<script>
	    function loadjson() {
	    	var data=TAFFY([]);
	    	$.ajax({
               type:'post',
               url: "{{url('/member/genealogy/matrix_get_user')}}",
               dataType: 'json',

               success:function(response){
                 process_data(response.data);

               }
            });
            function process_data(dataa){	            	
		        var datab= TAFFY(dataa);
		        data = datab;
		        data({
		            "parent": ""
		        }).each(function(record, recordnumber) {
		            loops(record);
		        });

			    $("<ul>", {
		            "id": "org",
		            "style": "float:right;",
		            html: items.join("")
	        	}).appendTo("body");

	        	init_tree();
            }
	        var items = [];

	        function loops(root) {
	        	
			    if (root.parent == "") {
				   items.push("<li class='unic" + root.id + " root' id='" + root.username + "'><div class='person'><div class='person_img'><img class='img-tree' src='{{asset('/Icons/avatar-big.png')}}''></div>  <div class='person_title label_node'>" + root.username + "</br></div></div><div class='details'><p><strong>Email:</strong>" + root.email + "</p></div>");
			    } else {
				   items.push("<li class='child unic" + root.id + "' id='" + root.username + "'><div class='person'><div class='person_img'><img class='img-tree' src='{{asset('/Icons/avatar-big.png')}}''></div>  <div class='person_title label_node'>" + root.username + "</br></div></div><div class='details'><p><strong>Email:</strong>" + root.email + "</p></div>");
				}
	            var c = data({
	                "parent": root.id
	            }).count();
	            if (c != 0) {
	                items.push("<ul>");
	                data({
	                    "parent": root.id
	                }).each(function(record, recordnumber) {
	                    loops(record);
	                });
	                items.push("</ul></li>");
	            } else {
	                items.push("</li>");
	            }

	        } // End the generate html code
	    

	        //push to html code
	    }

        	//////////////////////////////////////////////////

    </script>
	<script type="text/javascript">
	    function init_tree() {
	        var opts = {
	            chartElement: '#chart',
	            dragAndDrop: true,
	            expand: true,
	            control: true,
	            rowcolor: false
	        };
	        $("#chart").html("");
	        $("#org").jOrgChart(opts);
	    }

	    function scroll() {
	        $(".node").click(function() {
	            $("#chart").scrollTop(0)
	            $("#chart").scrollTop($(this).offset().top - 140);
	        })
	    }

	    $(document).ready(function() {
	        loadjson();
	        
	        scroll()
	    });
    </script>
@endsection


    
    
    