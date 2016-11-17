///Solution inspired heavily by https://github.com/zaproxy/community-scripts/blob/master/passive/Find%20Emails.js

function scan(ps, msg, src) {
    // first lets set up some details incase we find an email, these will populate the alert later
    alertRisk = 0
    alertReliability = 3
    alertTitle = 'Found flag'
    cweId = 0
    wascId = 0

	// we need to set the url variable to the request or we cant track the alert later
    url = msg.getRequestHeader().getURI().toString();

	// lets check its not one of the files types that are never likely to contain stuff, like pngs and jpegs
    contenttype = msg.getResponseHeader().getHeader("Content-Type")
	unwantedfiletypes = ['image/png', 'image/jpeg','image/gif','application/x-shockwave-flash','application/pdf']
	
	if (unwantedfiletypes.indexOf(""+contenttype) >= 0) {
		// if we find one of the unwanted headers quit this scan, this saves time and reduces false positives
    		return
	}else{
	// now lets run our regex against the body response
        body = msg.getResponseBody().toString();
		var lines = body.split('\n');
		for(var i = 0;i < lines.length;i++){
		   if(lines[i].indexOf("flag-0WASP") != -1) {
		       ps.raiseAlert(alertRisk, alertReliability, alertTitle, lines[i], url, "", "", "", "", "", cweId, wascId, msg);
		   }
		}
    }
}