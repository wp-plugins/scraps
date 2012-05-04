(function()
{
	tinymce.create('tinymce.plugins.scScraps',
	{
		init : function(ed, url) {
            ed.addCommand( 'mceScraps', function()
                {
                    ed.windowManager.open(
                        {
                            file : ajaxurl + '?action=scraps_tinymce_popup',
                            id : "scScrapsPopup",
                            width : 400,
                            height : 280,
                            inline : 1,
                            title : ed.getLang("scScraps.dialog_title")
                        }, {
                            plugin_url : url,
                            selectTxt : ed.selection.getContent( { format : 'html' } ),
                            shortcode : '[scrap id="%VALUE1%" title="%VALUE2%"]'
                        }
                    );
                }
            );
            ed.addButton( 'scScraps',
                {
                    title : ed.getLang("scScraps.button_title"),
                    image : url + '/tinymce-assets/scraps.png',
                    cmd : 'mceScraps'
                }
            );
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