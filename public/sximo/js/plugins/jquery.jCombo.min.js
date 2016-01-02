/*
 * jQuery jCombo Plugin (Minified)
 * Carlos De Oliveira
 * cardeol@gmail.com
 *
 * Latest Release: Sep 2011 
 */
(function(a) {
    a.fn.jCombo = function(b, d) {
        function h(b, d, e, f, g) {
            a.ajax({
                type: "GET",
                dataType: "json",
                url: d + e,
                success: function(a) {
                    var d = "";
                    if (a.length == 0) {
                        d += '<option value=""></option>';
                        b.html(d)
                    } else {
                        if (f != "" && f != null) {
                            d += '<option value="">' + f + "</option>"
                        }
                        var curr_values = g.split(",");
                       
                        for (var e = 0; e < a.length; e++) {
                        	var selected = " ";

							for(var x=0; x < curr_values.length;x++)
							{
								// var selected = a[e][0] == curr_values[x] ? ' selected="selected"' : "";
								 if( a[e][0] == curr_values[x])
								 {
								 	var selected = 'selected="selected"';
								 }
							}   
							                 	

                          //  selected = a[e][0] == g ? ' selected="selected"' : "";
                          // selected =  $.inArray(a[e][0], curr_values) ? ' selected="selected"' : "";

                          
                            c = a[e];
                            d += '<option value="' + c[0] + '"' + selected + ">" + c[1] + "</option>"
                        }
                        b.html(d)
                    }
                    b.trigger("change")
                }
            })
        }
        var e = {
            parent: "",
            selected_value: "",
            parent_value: "",
            initial_text: "-- Please Select --"
        };
        var d = a.extend(e, d);
        var f = a(this);
        if (d.parent != "") {
            var g = a(d.parent);
            g.removeAttr("disabled", "disabled");
            g.bind("change", function(c) {
                f.attr("disabled", "disabled");
                if (a(this).val() != "0" && a(this).val() != "") f.removeAttr("disabled");
                h(f, b, a(this).val(), d.initial_text, d.selected_value)
            })
        }
        h(f, b, d.parent_value, d.initial_text, d.selected_value)
    }
})(jQuery)