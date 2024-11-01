jQuery(document).ready(function(){
    jQuery('.facebookButton').click(function(ev) {
        var link = jQuery(this).attr('href');
        window.open(link,'Facebook','menubar=0,status=0;resizable=1,scrollbars=0,location=0,width=665,height=405');
        ev.preventDefault();
        return false;
        });
    
    jQuery('.googleplusButton').click(function(ev) {
        var link = jQuery(this).attr('href');
        window.open(link,'GooglePlus','menubar=0,status=0;resizable=1,scrollbars=0,location=0,width=470,height=530');
        ev.preventDefault();
        return false;
        });
    
    jQuery('.twitterButton').click(function(ev) {
        var link = jQuery(this).attr('href');
        window.open(link,'Twitter','menubar=0,status=0;resizable=1,scrollbars=0,location=0,width=470,height=252');
        ev.preventDefault();
        return false;
        });
    
    jQuery('.diggButton').click(function(ev) {
        var link = jQuery(this).attr('href');
        window.open(link,'Digg','menubar=0,status=0;resizable=1,scrollbars=0,location=0,width=690,height=380');
        ev.preventDefault();
        return false;
        });
	
	jQuery('.facebookSmallButton').click(function(ev) {
        var link = jQuery(this).attr('href');
        window.open(link,'Facebook','menubar=0,status=0;resizable=1,scrollbars=0,location=0,width=665,height=405');
        ev.preventDefault();
        return false;
        });
    
    jQuery('.googleplusSmallButton').click(function(ev) {
        var link = jQuery(this).attr('href');
        window.open(link,'GooglePlus','menubar=0,status=0;resizable=1,scrollbars=0,location=0,width=470,height=530');
        ev.preventDefault();
        return false;
        });
    
    jQuery('.twitterSmallButton').click(function(ev) {
        var link = jQuery(this).attr('href');
        window.open(link,'Twitter','menubar=0,status=0;resizable=1,scrollbars=0,location=0,width=470,height=252');
        ev.preventDefault();
        return false;
        });
    
    jQuery('.diggSmallButton').click(function(ev) {
        var link = jQuery(this).attr('href');
        window.open(link,'Digg','menubar=0,status=0;resizable=1,scrollbars=0,location=0,width=690,height=380');
        ev.preventDefault();
        return false;
        });
    });