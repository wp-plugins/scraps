(function()
{
	tinymce.create('tinymce.plugins.scScraps',
	{
		init : function(ed, url) {
            ed.addButton('scScraps',
			{
				title : 'Add a Scrap',
				image : url + '/tinymce-assets/scraps.png',
				cmd : 'mceScraps'
			});
            ed.addCommand('mceScraps', function() {
                ed.windowManager.open({
                    width : 400,
                    height : 300,
                    inline : 1
                }, {
                    plugin_url : url
                });
            });
		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
				longname : 'Scraps Dialog',
				author : 'l3rady',
				authorurl : 'http://l3rady.com',
				infourl : 'http://l3rady.com/projects/scraps',
				version : "0.1"
			};
		}
	});
	tinymce.PluginManager.add( 'scScraps', tinymce.plugins.scScraps );
})();