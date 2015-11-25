(function($){
	var backend = {
		init : function(){

			this.admin_url = $('#admin_url').val();
			this.site_url = $('#site_url').val();

			this.pluginsInit();
			this.initAjaxCommands();

			return this;
		},
		pluginsInit : function(){
			if($('.redactor-content').length){
				$('.redactor-content').redactor({
					imageUpload: this.site_url+'/backend/assets/upload',
					imageGetJson: this.site_url+'/backend/assets/imagesJson'
				});
			}
			$('.popover-icon').popover();
		},
		initAjaxCommands:function(){
			var self = this;
			$(document).on('click', '[data-ajax-command]', function(e){
				var elem = $(this),
					controller = elem.data('ajax-controller'),
					command = elem.data('ajax-command'),
					params = elem.data('ajax-params')||'';
				if(controller && command){
					$.getJSON(self.admin_url+'/'+controller+'/'+command+'/'+params, function(data){
						if(!data.error){
							if(data.callback)
								eval(data.callback);
						}
					});
				}
				e.preventDefault();
			});
		}
	};
	$(function(){
		window.backend = backend.init();
	});
})(jQuery);