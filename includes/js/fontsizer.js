/**
* Purpose:              Font sizer class, handles increasing and decreasing font size of a page.
*                       It increases the font in 10% increments. By getting the level / 10 + 1.
*                       i.e. level 2 is .2 + 1 so 1.2 or 120%.
*
* Requires:             JQuery and the JQuery cookies plugin.
*
* Use:                  Setup the fontsizer $.FontSizer.Init(options); the two options are
*                       min and max, for the min level and max level.
*                       Defaults are min: -3 and max: 5.
*
* Author:               Stefan Sedich (stefan.sedich@gmail.com
*/
$.FontSizer = {

        level: 0,

        options : {            
                min: -3,
                max: 5
        },

        Init : function(options) {
                if(options)
		    $.FontSizer.options = $.extend($.FontSizer.options, options);

                //Get the current level from cookies.
                var level = ($.cookie('font_level') != null) ? $.cookie('font_level') : 0;                      

                //Set the font size to the current leve.
                $.FontSizer.SetSize(level);

        },

        IncreaseSize : function() {

                if(($.FontSizer.level) + 1 <= $.FontSizer.options.max) {            
                        //If we have not exceded the max level,
                        //Get the next level and the set the size to this level.
                        var next = (parseInt($.FontSizer.level) + 1);
                        $.FontSizer.SetSize(next);  
                }

        },

        DecreaseSize : function() {
                if(($.FontSizer.level - 1) >= $.FontSizer.options.min) {
                        //If we have not exceded the min level,
                        //Get the next level and the set the size to this level.
                        var next = (parseInt($.FontSizer.level) - 1);
                        $.FontSizer.SetSize(next);  
                }      
        },      

        SetSize: function(level) {

                //Set the current level in the member variable and the cookie.
                $.FontSizer.level = level;      
                $.cookie('font_level', level);

                //Work out the new em value and set it.
                var level = (level / 10) + 1;
                $(".content_inner").css("fontSize", level+"em");    

        },

        Reset: function() {
            
            //Reset the level back to 0
            $.FontSizer.SetSize(0);
        
        }

}; 