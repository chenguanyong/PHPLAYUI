<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:108:"D:\apache2.4\httpd-2.4.23-win64-VC14\Apache24\htdocs\phpace\public/../application/index\view\menu\index.html";i:1489801535;}*/ ?>





<title>菜单管理</title>
					<div class="space-6"></div>
							<div class="col-sm-3" style="border:#000 0px solid">
								
							<div class="col-xs-12">
								<div class="widget-box">
									<div class="widget-header widget-header-flat">
										<h4 class="widget-title smaller">菜单列表</h4>
									</div>

									<div class="widget-body">
										<div class="widget-main">
										
											<div id="treeview" class="tree"></div>

										</div>
									</div>
								</div>
							</div>

					
					

		</div>
		<div class="space-6"></div>
		<div class="col-sm-5" style="border:#000 0px solid">
				<div class="tabbable ">
											<ul class="nav nav-tabs" id="myTab">
												<li class="active">
													<a data-toggle="tab" href="#menu_add">
														<i class="green ace-icon fa fa-home bigger-120"></i>
														添加菜单
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#menu_fix">
													<i class="green ace-icon fa fa-android bigger-120"></i>
														修改菜单
														
													</a>
												</li>

												<li >
													<a data-toggle="tab" href="#menu_dele">
													<i class="green ace-icon fa fa-home bigger-120"></i>
														删除菜单
														
													</a>


												</li>
											</ul>

											<div class="tab-content" style=" height:500px;">
												<div id="menu_add" class="tab-pane fade in active">
													<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1">菜单名：</label>

															<div class="col-sm-12">
																<input type="text" id="form-field-1" placeholder="请输入菜单名" class="col-xs-10 col-sm-10">
															</div>
													</div>
													<div class="form-group ">
														<div class="widget-main">
															<div>
																<label for="form-field-select-1">角色名：</label>

																<select class="form-control" id="form-field-select-10">
																	<option value=""></option>
																	

																</select>
															</div>

												<script type="text/javascript">
    
															function init(){
															
																			 $.post(
																	　		　'<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Role/getRolelist',  {id:0},
																　			
																　			　
																　		　	  function(data){ 
																	
																				
																					//var myselect = document.getElementById('');
																					for(var i=0;i<data.length;i++){
																						//alert(data[i].id);
																						$('<option value='+data[i].id+'>'+data[i].title+'</option>').appendTo('#form-field-select-10')
																					}
																					
																				},'json');
																　		
																				};
																	
																	
																				
															
														
init();															
														</script>
															<!-- /section:plugins/input.chosen -->
														
													</div>
													<div class="clearfix form-actions">
														<div class="col-md-offset-3 col-md-9">
															<button class="btn btn-info" type="button">
																<i class="ace-icon fa fa-check bigger-110"></i>
																Submit
															</button>

															&nbsp; &nbsp; &nbsp;
															<button class="btn" type="reset">
																<i class="ace-icon fa fa-undo bigger-110"></i>
																Reset
															</button>
														</div>
													</div>
													
													    <script type="text/javascript">
    
															(function(){
															
															$('[type=reset]').on('click',function(e){
															
															//alert('ff');
															$('input').val('');
															
															});
															
															})();				
														</script>
												</div>
												</div>
												<div  id="menu_fix" class="tab-pane fade in ">
													<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1">菜单名：</label>

															<div class="col-sm-12">
																<input type="text" id="form-field-1" placeholder="请输入菜单名" class="col-xs-10 col-sm-10">
															</div>
													</div>
													<div class="form-group ">
														<div class="widget-main">
															<div>
																<label for="form-field-select-1">角色名：</label>

																<select class="form-control" id="form-field-select-1">
																	<option value=""></option>
																	<option value="AL">Alabama</option>
																	<option value="AK">Alaska</option>

																</select>
															</div>

															
															<!-- /section:plugins/input.chosen -->
														
													</div>
													<div class="clearfix form-actions">
														<div class="col-md-offset-3 col-md-9">
															<button class="btn btn-info" type="button">
																<i class="ace-icon fa fa-check bigger-110"></i>
																Submit
															</button>

															&nbsp; &nbsp; &nbsp;
															<button class="btn" type="reset">
																<i class="ace-icon fa fa-undo bigger-110"></i>
																Reset
															</button>
														</div>
													</div>
												</div>
												</div>

												<div id="menu_dele" class="tab-pane fade" >
																										<div class="clearfix form-actions">
														<div class="col-md-offset-3 col-md-9">
															<button class="btn btn-info" type="button">
																<i class="ace-icon fa fa-check bigger-110"></i>
																删除菜单？
															</button>

															
														</div>
													</div>
												</div>
											</div>
										</div>
		
		</div>
		
				
		
	
	

<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/fuelux/tree.js"></script><!---ace树结构库-->
<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/elements.treeview.js"></script><!---ace树结构库-->
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/ace-elements.js"></script>



<script type="text/javascript">

						$(function() {
				//construct the data source object to be used by tree
				var remoteUrl = '<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Menu/getMenu';
				
				var remoteDateSource = function(options, callback) {
					var parent_id = null;
					if('type' in options && options['type'] == 'folder') {
						
						if('additionalParameters' in options && 'children' in options.additionalParameters)
						
						{parent_id = options.additionalParameters['id'];}
					}
					if( !('text' in options || 'type' in options) ){
						parent_id = 0;//load first level data
					}

					
					if(parent_id !== null) {
						$.ajax({
							url: remoteUrl,
							data: 'id='+parent_id,
							type: 'POST',
							dataType: 'json',
							success : function(response) {
								if(response.status == "OK")
									callback({ data: response.data })
							},
							error: function(response) {
								//console.log(response);
							}
						})
					}
				}


					$('#treeview').ace_tree({
		dataSource: remoteDateSource  ,
		loadingHTML:'<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>',
		'open-icon' : 'ace-icon fa fa-folder-open',
		'close-icon' : 'ace-icon fa fa-folder',
		'itemSelect' : true,
		'folderSelect': true,
		'multiSelect': false,
		'selected-icon' : null,
		'unselected-icon' : null,
		'folder-open-icon' : 'ace-icon tree-plus',
		'folder-close-icon' : 'ace-icon tree-minus',

	});
				
				//show selected items inside a modal
				$('#submit-button').on('click', function() {
					var output = '';
					var items = $('#treeview').tree('selectedItems');
					for(var i in items) if (items.hasOwnProperty(i)) {
						var item = items[i];
						output += item.additionalParameters['id'] + ":"+ item.text+"\n";
					}
					
					$('#modal-tree-items').modal('show');
					$('#tree-value').css({'width':'98%', 'height':'200px'}).val(output);
				
				});
				
				
				if(location.protocol == 'file:') alert("For retrieving data from server, you should access this page using a webserver.");
			});	
	$('#treeview')
	.on('selected.fu.tree', function(e) {
	   
	   var items = $('#treeview').tree('selectedItems');
alert(items[0].additionalParameters['id']);
	   
	})
	function initmenu(id){
	
							 $.ajaxSetup({
	　		　url:'<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Menu/getMenuInfo',  
　			　timeout : 10000, 
　			　type : 'post',  
　		　	  data :{id:id},  
　		　	  dataType:'json',
　		　	  success:function(data){ 
	
					if(data == 0){
						alert('错误');
					}
					
					},
　		　		complete : function(XMLHttpRequest,status){
　　　				　	if(status=='timeout'){
 　　　						　
 
										alert("超时");
				
　　　		　			}
　　			}
				});
	
	
			$.ajax();		
					
	
	}
	

		</script>
		


		