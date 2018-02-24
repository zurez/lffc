var token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiTWQgWnVyZXogVHViYSIsImF1dGhfcHJvdmlkZXIiOiJnb29nbGUiLCJhY2Nlc3NfdG9rZW4iOiIxMjM0NTY2ODkiLCJlbWFpbCI6Inp1cmV6NHUrdGVzdDJAZ21haWwuY29tIiwiX2lkIjoiNWEyZjllMWI2ODY1YjE0ZDMxZjdkZWQzIiwiaWF0IjoxNTEzMDcwMTA3fQ.0fYvmncR8OC9ERlgNIo1knKcTW-jvJrkGX8j1srd1Zc";


 function get_tags_server() {
        url=url="http://"+location.host+"/contents/tags/all";
        $.ajax({
            "type":"POST",
            "url":url,
            data:{
                "token":token
            },
            success:function(r){
                var t=[];
                for (var i = r.length - 1; i >= 0; i--) {
                    z=r[i];
                    t.push(z.tag);
                }
                st=JSON.stringify(t);
                $('#tstore').val(st);
                localstorage.setItem(st)

                                        
            }
        })
    }

function get_tags() {
	var jtags=[];
	var tags=localstorage.getItem("tags");
	if (tags!= null && tags != undefined) {
		jtags=JSON.parse(tags);
	}

	if (jtags.length<1) {
		jtags=get_tags_server();
	}

	return jtags;
}

