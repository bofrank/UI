if(typeof pstr=="undefined"||!pstr){var pstr={};pstr.psid='b8204e82-dc72-4a81-b662-e9c5ce3bf0ca';pstr.useguid='1';pstr.pswecdom='.pswec.com';pstr.client_id='32e4c1141e';pstr.ckdomain='nfl.com';pstr.wecsubdom='t';pstr.clientax='XX__ADX__XX';pstr.test='XX_TEST_XX';pstr.cookie_name='psrw';pstr.emailRegex=/[\w!#$%&'*+\/=\?^_`{|}~-]+(?:\.[\w!#$%&'*+\/=\?^_`{|}~-]+)*@(?:(?:[\w-]*\w)?\.)+(?:com|org|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|museum|[a-z]{2})/i;pstr.naturalKeyName="nkid";pstr.events_off='XX_WEC_EVENTS_OFF_XX';pstr.auto_browse='XX_AUTO_BROWSE_XX';pstr.ifsend_only='XX_IFRAME_ONLY_XX';pstr.throttle_regex='XX_THROTTLE_REGEX_XX';pstr.collect_sync='1';pstr.ckidparam='__'+pstr.cookie_name;pstr.jsidparam='__psrj';pstr.cidparam='__psc';pstr.adsrvid='b8204e82-dc72-4a81-b662-e9c5ce3bf0ca';pstr.adsrvname='tuuid';pstr.adsrvparam='__'+pstr.adsrvname;pstr.eparam='e';pstr.__p_ver="3.0";pstr.__p_show_log=false;pstr.head=document.getElementsByTagName('head').item(0);pstr.debug='';pstr.psessid=(function(){return(new Date()).getTime()+'.'+(''+Math.random()).substring(2)})();if(pstr.useguid.indexOf('XX_')!=-1)pstr.useguid=true;if(pstr.wecsubdom.indexOf('XX_')!=-1)pstr.wecsubdom='wecqa';if(pstr.pswecdom.indexOf('XX_')!=-1)pstr.pswecdom='pswec.com';if(pstr.clientax.indexOf('XX_')!=-1)pstr.clientax='';if(pstr.test.indexOf('XX_')!=-1)pstr.test='0';if(pstr.debug.indexOf('XX_')!=-1||pstr.debug=='')pstr.debug=false;pstr.auto_browse=(pstr.auto_browse.indexOf('XX_')==-1&&pstr.auto_browse=='1')?true:false;pstr.events_off=(pstr.events_off.indexOf('XX_')==-1&&pstr.events_off=='1')?true:false;pstr.ifsend_only=(pstr.ifsend_only.indexOf('XX_')==-1&&pstr.ifsend_only=='1')?true:false;pstr.collect_sync=(pstr.collect_sync.indexOf('XX_')==-1&&pstr.collect_sync=='1')?true:false;if(pstr.throttle_regex.indexOf('XX')==-1&&pstr.throttle_regex!=''){var re=new RegExp(pstr.throttle_regex);if(!re.test(pstr.psid)){pstr.events_off=true}}}if(typeof pstr.util=="undefined"||!pstr.util){pstr.util={img:new Image(1,1),srcId:(function(h){return function(){++h;return'ps_scr_'+h+'_'+(''+Math.random()).substring(2,10)}})(0),__p_log:"",__p_lvl:2,log:function(m,p){var h=['D','I','W','E'];p=(arguments.length!=2)?0:p;if(p>=pstr.util.__p_lvl){pstr.util.__p_log+=pstr.util.prclv_dt()+'['+h[p]+']: '+m+((pstr.util.isIE())?'</br>':'\n');pstr.util.__refreshLog()}},d:function(h){pstr.util.log(h,0)},i:function(h){pstr.util.log(h,1)},w:function(h){pstr.util.log(h,2)},e:function(h){pstr.util.log(h,3)},showLog:function(h){if(arguments.length==0)return pstr.__p_show_log;pstr.__p_show_log=h},__refreshLog:function(){if(pstr.__p_show_log==false){return}if(document&&document.body){var h=document.getElementById('__ps_log_area');if(h==null){document.body.innerHTML+='\n\n\n<br/><br/>';document.body.innerHTML+='<table border="1"><tr><td> <pre id="__ps_log_area"> Log Area: </pre> </td></tr></table>';h=document.getElementById('__ps_log_area')}h.innerHTML=pstr.util.__p_log}},url:function(p,a,m,s,h){a=(a)?a.replace(/\.+$/,''):a;m=m.replace(/^\.+/,'');return p+'://'+((a)?a+'.':'')+m+'/'+s+'?'+h},rpc:function(p){var h=document.createElement('script');h.id=pstr.util.srcId();h.type='text/javascript';h.defer=false;h.src=p;void(pstr.head.appendChild(h));pstr.util.log('rpc() sending '+h.id+' to  :  '+h.src);return h.id},removeScript:function(h){var p=document.getElementById(h);if(p)pstr.head.removeChild(p)},isSafariRe:new RegExp('Safari/\\d{1,3}\.\\d{1,3}'),isChromeRe:new RegExp('Chrome/\\d{1,3}\.\\d{1,3}'),isAndroidRe:new RegExp('Android/\\d{1,3}\.\\d{1,3}'),isIERe:new RegExp('MSIE'),isSafari:function(){var h=navigator.userAgent;if(h.match(pstr.util.isSafariRe)){if(!h.match(pstr.util.isChromeRe)&&!h.match(pstr.util.isAndroidRe))return true;else return false}else{return false}},isIE:function(){return(navigator.userAgent.match(pstr.util.isIERe))?true:false},getIf:function(){var h=document.createElement('iframe');h.width=0;h.height=0;h.frameborder=0;h.hidden=true;return h},imgSend:function(h){var m=new Image(1,1);var p=pstr.util.srcId();m.id=p;m.onload=function(){pstr.util.d('removing image w/ id : '+p+'. URL='+h);delete m};m.src=h},iframeSend:function(p){if(pstr.ifsend_only||pstr.util.isSafari()){var h=pstr.util.getIf();var a=pstr.util.srcId();h.name=a;h.id=a;h.src=p;var m=(document.body==null)?true:false;var s=function(){pstr.util.d('iFrame cleaning up with id/name : '+a+' ...');if(m){void(pstr.head.removeChild(h))}else{void(document.body.removeChild(h))}delete h;pstr.util.d('... done removing iFrame with id/name : '+a)};if(h.attachEvent&&pstr.util.isIE()){h.attachEvent("onload",s)}else{h.onload=s}if(m){pstr.util.d('appeneding to head : '+a+". URL: "+p);void(pstr.head.appendChild(h))}else{pstr.util.d('appeneding to body : '+a+". URL: "+p);void(document.body.appendChild(h))}}else{pstr.util.imgSend(p)}},oldIframeSend:function(p){if(pstr.ifsend_only||pstr.util.isSafari()){var h=pstr.util.getIf();var s=pstr.util.srcId();h.name=s;var a=document.createElement('form');a.action=p;a.method='POST';a.target=s;var m=false;if(document.body==null){void(pstr.head.appendChild(a));void(pstr.head.appendChild(h));m=true}else{void(document.body.appendChild(a));void(document.body.appendChild(h))}if(a.submit()){if(m){void(document.head.removeChild(h));void(document.head.removeChild(a))}else{void(document.body.removeChild(h));void(document.body.removeChild(a))}}}else{pstr.util.imgSend(p)}},getParams:function(){var h={},qs="",qq=window.location.href.split('?');if(qq.length==2){qs=qq[1]}if(qs==""){return h}var m=qs.split('&');for(var a=0,len=m.length;a<len;a++){var p=m[a].split('=');h[p[0]]=p[1]}return h},getCookies:function(){var h=document.cookie.split(';'),ch={},re=/\s*(.+)\s*\=\s*(.+)\s*/;for(var m=0;m<h.length;m++){var p=h[m].match(re);if(p&&p[1].indexOf('__utm')<0){ch[p[1]]=p[2]}}return ch},cookieExpireDays:365*2,setCookie:function(m,s,p,h){var r=new Date();if(!h){h=this.cookieExpireDays}r.setDate(r.getDate()+h);if(!p){p=pstr.ckdomain}if(!p||document.location.hostname.indexOf(p)==-1){p=document.location.hostname}var a=m+"="+escape(s);a+="; path=/";a+=((p==null)?"":"; domain="+p);a+=((h==null)?"":"; expires="+r.toGMTString());this.log(a);document.cookie=a},inarr:function(h,m){for(var p=0,l=m.length;p<l;p++){if(h===m[p]){return true}}return false},getPageAndRef:function(){var h=document.location.href,ref=document.referrer;if(h.indexOf('://')==-1){h=''}if(ref.indexOf('://')==-1){ref=''}return{'page':h,'ref':ref}},checksum:function(h){if(!h||h=="")return-1;var m=0;for(var p=0;p<h.length;p++){m+=h.charCodeAt(p)}return m},trim:function(h){if(h&&typeof h=='string'){return(typeof h.trim=='function')?h.trim():h.replace(/^\s*/,"").replace(/\s*$/,"")}else return h},_Sk:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",rev:function(h){if(!h||h=="")return"";h=""+h;var p,b,c,d="",_1,_2,_3,_4,i=0;(function(){_1=p,_2=b,_3=c,_4=d})();do{p=h.charCodeAt(i++);b=h.charCodeAt(i++);c=h.charCodeAt(i++);_1=p>>2;_2=((p&3)<<4)|(b>>4);_3=((b&15)<<2)|(c>>6);_4=c&63;if(isNaN(b)){_3=_4='@'.charCodeAt(0)}else if(isNaN(c)){_4='@'.charCodeAt(0)}d=d+this._Sk.charAt(_1)+this._Sk.charAt(_2)+this._Sk.charAt(_3)+this._Sk.charAt(_4)}while(i<h.length);return d},padZero:function(h){if(h<10)return"0"+h;return h},prclv_dt:function(h){if(h==null)h=new Date();var p=''+h.getFullYear()+'-'+this.padZero(h.getMonth()+1)+'-'+this.padZero(h.getDate());p+=' '+h.getHours()+':'+this.padZero(h.getMinutes())+':'+this.padZero(h.getSeconds());return p},isDate:function(h){return(h instanceof Date)},isArray:function(h){return(h instanceof Array)},isEmail:function(h){if(h){return pstr.emailRegex.test(pstr.util.trim(h.toLowerCase()))}return false},isEmpty:function(h){return(h==null)?true:(pstr.util.trim(h)=="")?true:false},isOffline:function(){if(pstr.util.trim(document.location.href.toLowerCase()).indexOf("file")==0){return true}return false},aflatten:function aflatten(h){var a=[];if(pstr.util.isArray(h)){for(var m=0,l=h.length;m<l;m++){var p=Object.prototype.toString.call(h[m]).split(' ').pop().split(']').shift().toLowerCase();if(p){a=a.concat(/^(array|collection|arguments|object)$/.test(p)?aflatten(h[m]):h[m])}}}else{a.push(h)}return a},maskPiiEmail:function(h){if(!pstr.emailRegex.test(h)){return h}var q=null;var a=h.split('?');if(a){q=a[0]}else{return h}var t=h.match(/\?.*$/);if((!t)||(t.length!=1)){console.log("WARNING! Malformed URL ["+h+"]");return h}else{query=t[0]}var r=query.split('&');for(ind=0,len=r.length;ind<len;ind++){if(ind>0){q+='&'}var o=r[ind].indexOf("=");if((o>0)&&(r[ind].length>o)){var s=r[ind].substr(0,o);var m=r[ind].substr(o+1,r[ind].length);var p=m.match(pstr.emailRegex);if(p){q+=s+'=';q+=pstr.util.md5.hex_md5(p[0].toLowerCase())}else{q+=r[ind]}}else{q+=r[ind]}}return q},hpii:function(h){var n=h.split('&');var k='';for(var j=0,len=n.length;j<len;j++){var r=n[j];var t=r.split('=');var q=t[0];if(pstr.util.isPii(q)){k+=q+'=';var p=n[j].split('=');var o=decodeURIComponent(p[1]);var a=o.split(';');var m='';for(var s=0,len_v_varr=a.length;s<len_v_varr;s++){if(q=="email"){if(pstr.util.isEmail(a[s])){m+=pstr.util.md5.hex_md5(pstr.util.trim(a[s].toLowerCase()))}else{m+=a[s]}}else{m+=pstr.util.md5.hex_md5(a[s])}if(s!=(len_v_varr-1)){m+=';'}}k+=encodeURIComponent(m)}else{k+=n[j]}if(j!=(n.length-1)){k+='&'}}return k},isPii:function(h){h=pstr.util.trim(h).toLowerCase();var m=['email'];for(var p=0,len=m.length;p<len;p++){if(h==m[p]){return true}}return false}};pstr.util.md5={hexcase:0,hex_md5:function(h){return this.rstr2hex(this.rstr_md5(this.str2rstr_utf8(h)))},hex_hmac_md5:function(h,p){return this.rstr2hex(this.rstr_hmac_md5(this.str2rstr_utf8(h),this.str2rstr_utf8(p)))},md5_vm_test:function(){return this.hex_md5("abc").toLowerCase()=="900150983cd24fb0d6963f7d28e17f72"},rstr_md5:function(h){return this.binl2rstr(this.binl_md5(this.rstr2binl(h),h.length*8))},rstr_hmac_md5:function(p,r){var h=this.rstr2binl(p);if(h.length>16){h=this.binl_md5(h,p.length*8)}var m=Array(16),d=Array(16);for(var s=0;s<16;s++){m[s]=h[s]^909522486;d[s]=h[s]^1549556828}var a=this.binl_md5(m.concat(this.rstr2binl(r)),512+r.length*8);return this.binl2rstr(this.binl_md5(d.concat(a),512+128))},rstr2hex:function(h){try{pstr.util.md5.hexcase}catch(g){pstr.util.md5.hexcase=0}var s=pstr.util.md5.hexcase?"0123456789ABCDEF":"0123456789abcdef";var m="";var p;for(var a=0;a<h.length;a++){p=h.charCodeAt(a);m+=s.charAt((p>>>4)&15)+s.charAt(p&15)}return m},str2rstr_utf8:function(m){var a="";var p=-1;var h,e;while(++p<m.length){h=m.charCodeAt(p);e=p+1<m.length?m.charCodeAt(p+1):0;if(55296<=h&&h<=56319&&56320<=e&&e<=57343){h=65536+((h&1023)<<10)+(e&1023);p++}if(h<=127){a+=String.fromCharCode(h)}else{if(h<=2047){a+=String.fromCharCode(192|((h>>>6)&31),128|(h&63))}else{if(h<=65535){a+=String.fromCharCode(224|((h>>>12)&15),128|((h>>>6)&63),128|(h&63))}else{if(h<=2097151){a+=String.fromCharCode(240|((h>>>18)&7),128|((h>>>12)&63),128|((h>>>6)&63),128|(h&63))}}}}}return a},rstr2binl:function(m){var p=Array(m.length>>2);for(var h=0;h<p.length;h++){p[h]=0}for(var h=0;h<m.length*8;h+=8){p[h>>5]|=(m.charCodeAt(h/8)&255)<<(h%32)}return p},binl2rstr:function(m){var p="";for(var h=0;h<m.length*32;h+=8){p+=String.fromCharCode((m[h>>5]>>>(h%32))&255)}return p},binl_md5:function(r,q){r[q>>5]|=128<<((q)%32);r[(((q+64)>>>9)<<4)+14]=q;var j=1732584193;var p=-271733879;var m=-1732584194;var s=271733878;for(var o=0;o<r.length;o+=16){var a=j;var t=p;var k=m;var h=s;j=this.md5_ff(j,p,m,s,r[o+0],7,-680876936);s=this.md5_ff(s,j,p,m,r[o+1],12,-389564586);m=this.md5_ff(m,s,j,p,r[o+2],17,606105819);p=this.md5_ff(p,m,s,j,r[o+3],22,-1044525330);j=this.md5_ff(j,p,m,s,r[o+4],7,-176418897);s=this.md5_ff(s,j,p,m,r[o+5],12,1200080426);m=this.md5_ff(m,s,j,p,r[o+6],17,-1473231341);p=this.md5_ff(p,m,s,j,r[o+7],22,-45705983);j=this.md5_ff(j,p,m,s,r[o+8],7,1770035416);s=this.md5_ff(s,j,p,m,r[o+9],12,-1958414417);m=this.md5_ff(m,s,j,p,r[o+10],17,-42063);p=this.md5_ff(p,m,s,j,r[o+11],22,-1990404162);j=this.md5_ff(j,p,m,s,r[o+12],7,1804603682);s=this.md5_ff(s,j,p,m,r[o+13],12,-40341101);m=this.md5_ff(m,s,j,p,r[o+14],17,-1502002290);p=this.md5_ff(p,m,s,j,r[o+15],22,1236535329);j=this.md5_gg(j,p,m,s,r[o+1],5,-165796510);s=this.md5_gg(s,j,p,m,r[o+6],9,-1069501632);m=this.md5_gg(m,s,j,p,r[o+11],14,643717713);p=this.md5_gg(p,m,s,j,r[o+0],20,-373897302);j=this.md5_gg(j,p,m,s,r[o+5],5,-701558691);s=this.md5_gg(s,j,p,m,r[o+10],9,38016083);m=this.md5_gg(m,s,j,p,r[o+15],14,-660478335);p=this.md5_gg(p,m,s,j,r[o+4],20,-405537848);j=this.md5_gg(j,p,m,s,r[o+9],5,568446438);s=this.md5_gg(s,j,p,m,r[o+14],9,-1019803690);m=this.md5_gg(m,s,j,p,r[o+3],14,-187363961);p=this.md5_gg(p,m,s,j,r[o+8],20,1163531501);j=this.md5_gg(j,p,m,s,r[o+13],5,-1444681467);s=this.md5_gg(s,j,p,m,r[o+2],9,-51403784);m=this.md5_gg(m,s,j,p,r[o+7],14,1735328473);p=this.md5_gg(p,m,s,j,r[o+12],20,-1926607734);j=this.md5_hh(j,p,m,s,r[o+5],4,-378558);s=this.md5_hh(s,j,p,m,r[o+8],11,-2022574463);m=this.md5_hh(m,s,j,p,r[o+11],16,1839030562);p=this.md5_hh(p,m,s,j,r[o+14],23,-35309556);j=this.md5_hh(j,p,m,s,r[o+1],4,-1530992060);s=this.md5_hh(s,j,p,m,r[o+4],11,1272893353);m=this.md5_hh(m,s,j,p,r[o+7],16,-155497632);p=this.md5_hh(p,m,s,j,r[o+10],23,-1094730640);j=this.md5_hh(j,p,m,s,r[o+13],4,681279174);s=this.md5_hh(s,j,p,m,r[o+0],11,-358537222);m=this.md5_hh(m,s,j,p,r[o+3],16,-722521979);p=this.md5_hh(p,m,s,j,r[o+6],23,76029189);j=this.md5_hh(j,p,m,s,r[o+9],4,-640364487);s=this.md5_hh(s,j,p,m,r[o+12],11,-421815835);m=this.md5_hh(m,s,j,p,r[o+15],16,530742520);p=this.md5_hh(p,m,s,j,r[o+2],23,-995338651);j=this.md5_ii(j,p,m,s,r[o+0],6,-198630844);s=this.md5_ii(s,j,p,m,r[o+7],10,1126891415);m=this.md5_ii(m,s,j,p,r[o+14],15,-1416354905);p=this.md5_ii(p,m,s,j,r[o+5],21,-57434055);j=this.md5_ii(j,p,m,s,r[o+12],6,1700485571);s=this.md5_ii(s,j,p,m,r[o+3],10,-1894986606);m=this.md5_ii(m,s,j,p,r[o+10],15,-1051523);p=this.md5_ii(p,m,s,j,r[o+1],21,-2054922799);j=this.md5_ii(j,p,m,s,r[o+8],6,1873313359);s=this.md5_ii(s,j,p,m,r[o+15],10,-30611744);m=this.md5_ii(m,s,j,p,r[o+6],15,-1560198380);p=this.md5_ii(p,m,s,j,r[o+13],21,1309151649);j=this.md5_ii(j,p,m,s,r[o+4],6,-145523070);s=this.md5_ii(s,j,p,m,r[o+11],10,-1120210379);m=this.md5_ii(m,s,j,p,r[o+2],15,718787259);p=this.md5_ii(p,m,s,j,r[o+9],21,-343485551);j=this.safe_add(j,a);p=this.safe_add(p,t);m=this.safe_add(m,k);s=this.safe_add(s,h)}return Array(j,p,m,s)},md5_cmn:function(m,h,s,p,a,r){return this.safe_add(this.bit_rol(this.safe_add(this.safe_add(h,m),this.safe_add(p,r)),a),s)},md5_ff:function(a,s,m,q,h,r,p){return this.md5_cmn((s&m)|((~s)&q),a,s,h,r,p)},md5_gg:function(a,s,m,q,h,r,p){return this.md5_cmn((s&q)|(m&(~q)),a,s,h,r,p)},md5_hh:function(a,s,m,q,h,r,p){return this.md5_cmn(s^m^q,a,s,h,r,p)},md5_ii:function(a,s,m,q,h,r,p){return this.md5_cmn(m^(s|(~q)),a,s,h,r,p)},safe_add:function(p,a){var h=(p&65535)+(a&65535);var m=(p>>16)+(a>>16)+(h>>16);return(m<<16)|(h&65535)},bit_rol:function(h,p){return(h<<p)|(h>>>(32-p))}};pstr.util.params=pstr.util.getParams();pstr.util.send=pstr.util.iframeSend;if(pstr.debug){pstr.util.send=pstr.util.rpc}Object.size=function(h){var p=0,key;for(key in h){if(h.hasOwnProperty(key))p++}return p};if('__ps_show_log'in pstr.util.params){pstr.util.showLog(true)}if('__ps_debug'in pstr.util.params){pstr.debug=true;pstr.util.__p_lvl=1}if(window.location.href.indexOf('test_ie.html')>=0){pstr.debug=true;pstr.util.__p_lvl=0;pstr.util.showLog(true)}}if(pstr.useguid){var guidCookie=pstr.util.getCookies()[pstr.ckidparam];pstr.util.log('guidCookie = '+guidCookie);if(guidCookie==undefined||guidCookie==null){pstr.util.log('tryin to set cookie');if(pstr.psid!='OO'){pstr.util.setCookie(pstr.ckidparam,pstr.psid,pstr.ckdomain,pstr.util.cookieExpireDays)}}var adsrvCookie=pstr.util.getCookies()[pstr.adsrvparam];if(adsrvCookie==undefined||adsrvCookie==null){if(pstr.adsrvid.indexOf('XX_')==-1&&pstr.psid!='OO'){pstr.util.setCookie(pstr.adsrvparam,pstr.adsrvid,pstr.ckdomain,pstr.util.cookieExpireDays)}}}if(typeof pstr.mwec=="undefined"||!pstr.mwec){pstr.mwec={protocol:("https"==document.location.protocol.substring(0,5))?"https":"http",collect:'collect',valcollect:'validate'};pstr.mwec.getCurr=(function(h){return function(){return h}})({});pstr.mwec.initCurr=function(){var h={};pstr.mwec.getCurr=function(){return h}};pstr.mwec.currcoll=pstr.mwec.collect;pstr.mwec.collectUrl=function(h){return pstr.util.url(pstr.mwec.protocol,pstr.wecsubdom,pstr.pswecdom,pstr.mwec.currcoll,h)};pstr.mwec.obj_add=function obj_add(h,a,m){a=pstr.util.trim(a.toString().toLowerCase());pstr.util.log('obj_add adding '+a+'='+m);if(a in h){if(m==='undefined')return;var p=h[a];var s=typeof p;if(s==='object'&&pstr.util.isArray(p)){h[a].push(m)}else{h[a]=[p,m]}}else{h[a]=m}};pstr.mwec.obj_update=function obj_update(h,m,p){m=pstr.util.trim(m.toString().toLowerCase());pstr.util.log('obj_overwrite putting  '+m+'='+p);if(!(m in h)){h[m]=p}};pstr.mwec.obj_overwrite=function obj_overwrite(h,m,p){m=pstr.util.trim(m.toString().toLowerCase());pstr.util.log('obj_overwrite putting  '+m+'='+p);h[m]=p};pstr.mwec.sflatten=function sflatten(h,p){if(p==null)return;if(p===pstr||p===wec||p===pstr.mwec||p===pstr.util||p===pstr.ax){pstr.util.e('Attempt to add self to self!');return}if(arguments.length>2){for(var m=1,l=arguments.length;m<l;m++){sflatten(h,arguments[m])}return}var t=typeof p;switch(t){case'string':if(p.indexOf('=')==-1){this.obj_add(h,p,'')}else{var a=p.split('=');if(a.length==2){this.obj_add(h,a[0],a[1])}else{this.obj_add(h,a[0],p.substring(p.indexOf('=')+1))}}return;case'object':if(pstr.util.isArray(p)){for(var q in p){pstr.mwec.sflatten(h,p[q])}}else{for(var r in p){var s=p[r];switch(typeof s){case'string':case'number':case'boolean':this.obj_add(h,r,s);break;case'object':if(pstr.util.isArray(s)){this.obj_add(h,r,pstr.util.aflatten(s));break}default:pstr.util.w('WEC.add: Throwing away bad value in hash! Got Key: ['+r+'] Value: '+((typeof s=='function')?'function':s));break}}}return;case'function':default:return}};pstr.mwec.h2s=function(q){var o=function o(h){var a=pstr.util.aflatten(h);var m='';for(var p=0,l=a.length;p<l;p++){m+=a[p]+';'}return m.substring(0,m.length-1)};var r="";for(var t in q){var s=(q[t]===undefined)?'':o(q[t]).toString();r+=(t+'='+encodeURIComponent(s)+'&')}pstr.util.log('h2s: '+r);return r.substring(0,r.length-1)};pstr.mwec.prepSend=function prepSend(h){var s=pstr.util.getPageAndRef();pstr.mwec.obj_update(pstr.mwec.getCurr(),'current_url',pstr.util.maskPiiEmail(s['page']));pstr.mwec.obj_update(pstr.mwec.getCurr(),'referrer',pstr.util.maskPiiEmail(s['ref']));pstr.mwec.obj_update(pstr.mwec.getCurr(),'browser_ts',pstr.util.prclv_dt());pstr.mwec.obj_update(pstr.mwec.getCurr(),'ps_page_id',pstr.psessid);var a=pstr.mwec.h2s(pstr.mwec.getCurr());var p=pstr.util.hpii(a);var m='data='+pstr.util.rev(p)+'|'+pstr.util.checksum(p)+'|'+pstr.__p_ver;m+='&'+pstr.ckidparam+'='+pstr.util.getCookies()[pstr.ckidparam];m+='&'+pstr.jsidparam+'='+pstr.psid;m+='&'+pstr.cidparam+'='+pstr.client_id;m+='&'+pstr.eparam+'='+h;if(!pstr.collect_sync){m+='&nosync'}if(parseInt(pstr.test)==1){m+='&dev=1'}return m};pstr.mwec.s=function(p,s){if(pstr.events_off===true){return 0}var m=pstr.mwec.prepSend(p);var a=pstr.mwec.collectUrl(m);if(s){a+=s}var h=a;a=pstr.util.maskPiiEmail(h);try{if(a.length>4096){pstr.util.e('URI length is too long: '+a.length,3);pstr.util.e(a,3);pstr.util.send(a.substring(0,a.length-4096))}else{pstr.util.log('URI length is OK: '+a.length);pstr.util.send(a)}pstr.mwec.initCurr()}catch(e){pstr.util.e(' Failed to send() data: '+e)}return a.length};pstr.mwec.getNaturalKey=function(h){if(!h){return null}var p="";var m=pstr.mwec.getCurr()[h];if(m){p=pstr.mwec.wrapNkid(m)}return p};pstr.mwec.wrapNkid=function(h){if(h){h=encodeURIComponent(h);return pstr.mwec.wrapNaturalKey(pstr.naturalKeyName,h)}else{return null}};pstr.mwec.wrapNaturalKey=function(h,p){return'&'+h+'='+p};pstr.mwec.isRepeatOrder=function(h){if(pstr.util.isEmpty(h)){return false}var p=pstr.mwec.getExistingOrders();return pstr.util.inarr(h,p)};pstr.mwec.getExistingOrders=function(){var q=wec.getCookie('__psord');if(pstr.util.isEmpty(q)){return[]}var a=q.split('|');var s=[];for(var r=0;r<a.length;r++){s.push(unescape(a[r]))}return s.filter(function(h,p,m){return!pstr.util.isEmpty(h)})};pstr.mwec.saveOrderID=function(h){var p=wec.getCookie('__psord');if(pstr.util.isEmpty(p)){p=''}p+=escape(h)+"|";pstr.util.setCookie('__psord',p,null,null)};pstr.mwec.getOrderID=function(){return pstr.mwec.getCurr()["order_id"]}}if(!pstr.ax||typeof pstr.ax=='undefined'){pstr.ax={aup:'add_user'};pstr.ax.axUrl=function(h){return pstr.util.url(pstr.mwec.protocol,pstr.wecsubdom,pstr.pswecdom,pstr.ax.aup,h)};pstr.ax.au=function(h){var p='ax='+h+'&s='+pstr.client_id;if(parseInt(pstr.test)==1){p+='&dev=1'}return pstr.ax.axUrl(p)};pstr.ax.cn=function(){if(pstr.clientax=="")return;var m=pstr.clientax.split(',');for(var h=0,len=m.length;h<len;h++){var p=pstr.util.trim(m[h]);if(p){p=pstr.ax.au(p);pstr.util.log(p);pstr.util.send(p)}}};pstr.ax.cn()}if(typeof wec=='undefined'||!wec){var wec={};wec.__validate=function(h){pstr.debug=(h)?true:false;pstr.util.__p_lvl=(pstr.debug)?1:2;pstr.util.showLog(pstr.debug);pstr.mwec.currcoll=(pstr.debug)?pstr.mwec.valcollect:pstr.mwec.collect;pstr.util.send=(pstr.debug)?pstr.util.rpc:pstr.util.imgSend};wec.__log=function(h,p){pstr.util.log(h,p)};wec.getById=function(h){return document.getElementById(h)};wec.getCookie=function(p){var h=pstr.util.getCookies()[p];return(h)?unescape(h):h};wec.getParam=function(h){return pstr.util.params[h]};wec.addCookieByName=function(h){return wec.add({cookie:wec.getCookie(h)})};wec.addCookieId=function(h){return wec.add({cookie:h})};wec.addSessionByName=function(h){return wec.add({session:wec.getCookie(h)})};wec.addSessionId=function(h){return wec.add({session:h})};wec.addServerTs=function(h){return wec.add({server_ts:((pstr.util.isDate(h))?pstr.util.prclv_dt(h):h)})};wec.addHeir=function(h){return wec.add({heir:h})};wec.addPageType=function(h){return wec.add({page_type:h})};wec.addPageName=function(h){return wec.add({page_name:h})};wec.add=function add(){for(var h=0,l=arguments.length;h<l;h++){pstr.mwec.sflatten(pstr.mwec.getCurr(),arguments[h])}return wec};pstr.mwec.getValidator=function(s){var r={required:function(h){var p=s['required'];var m=s['req_values'];if(p){pstr.util.i("checking required values ...");for(var a=0,l=p.length;a<l;a++){if(!(p[a]in h)){pstr.util.w(p[a]+" param not found in input.");return false}pstr.util.i(p[a]+" param found in input.");if(m){if(p[a]in m){pstr.util.i("Checking "+p[a]+"'s value ...");if(!pstr.util.inarr(h[p[a]],m[p[a]])){pstr.util.e(p[a]+"'s value ["+h[p[a]]+"] is not in allowed fields ["+m[p[a]]+"]");return false}pstr.util.i(p[a]+"'s value ["+h[p[a]]+"] is OK.")}}}}return true},short_hand:function(){return false},run:function(h){var p=false;if(this.required(h)){p=true}return(p==true)?true:this.short_hand(h)}};if(s['short_hand']&&typeof s['short_hand']=='function'){r.short_hand=s['short_hand']}return r};wec.browse=function(){wec.add.apply(null,arguments);pstr.mwec.obj_overwrite(pstr.mwec.getCurr(),'event','browse');var s=pstr.mwec.getValidator({required:['viewtype','viewid'],req_values:{'viewtype':['dept','cat','sub_cat','brand','prod','page','token']},short_hand:function(h){for(var p in h){if(pstr.util.inarr(p,['dept','cat','sub_cat','prod','page','token'])){pstr.util.i('Found acceptable short hand value `'+p+'` in input');wec.add({viewtype:p,viewid:h[p]});delete pstr.mwec.getCurr()[p];return true}}return false}}).run(pstr.mwec.getCurr());if(!s){wec.add({jserr:1});if(pstr.debug){pstr.util.e('WEC ERROR: wec.browse() is missing required fields!')}}var a=null;var r='b';if('viewtype'in pstr.mwec.getCurr()){var m=pstr.mwec.getCurr().viewtype;m=m.toString();switch(m){case'dept':r='bd';a=pstr.mwec.getNaturalKey("viewid");break;case'cat':r='bc';a=pstr.mwec.getNaturalKey("viewid");break;case'sub_cat':r='bsc';break;case'brand':r='bb';break;case'prod':r='bp';a=pstr.mwec.getNaturalKey("viewid");break;case'page':r='p';a=pstr.mwec.getNaturalKey("viewid");break;case'token':r='bt';a='&node='+pstr.mwec.getCurr()['viewid'];break;default:r='b';break}}pstr.mwec.s(r,a);return s};wec.search=function(){wec.add.apply(null,arguments);pstr.mwec.obj_overwrite(pstr.mwec.getCurr(),'event','search');var h=pstr.mwec.getValidator({required:['term']}).run(pstr.mwec.getCurr());if(!h){wec.add({jserr:1});if(pstr.debug){pstr.util.e('WEC ERROR: wec.search() is missing required fields!')}}else{delete pstr.mwec.getCurr()['jserr']}pstr.mwec.s('s');return h};wec.cart_insert=function(){wec.add.apply(null,arguments);pstr.mwec.obj_overwrite(pstr.mwec.getCurr(),'event','cart');pstr.mwec.obj_overwrite(pstr.mwec.getCurr(),'cart','add');var m=pstr.mwec.getValidator({required:['sku','price','qty'],short_hand:function(h){if('cartitem'in h){pstr.util.i('Found acceptable short hand value `cartitem` in input');return true}return false}}).run(pstr.mwec.getCurr());if(!m){wec.add({jserr:1});if(pstr.debug){pstr.util.e('WEC ERROR: wec.cart_insert() is missing required fields!')}}else{delete pstr.mwec.getCurr()['jserr']}var p=pstr.mwec.getNaturalKey('sku');if(p==null&&'cartitem'in pstr.mwec.getCurr()){var a=pstr.mwec.getCurr()['cartitem'];if(a.indexOf(',')>=0){pstr.mwec.wrapNkid(a.split(",")[0])}}pstr.mwec.s('ci',p);return m};wec.cart_remove=function(){wec.add.apply(null,arguments);pstr.mwec.obj_overwrite(pstr.mwec.getCurr(),'event','cart');pstr.mwec.obj_overwrite(pstr.mwec.getCurr(),'cart','remove');var p=pstr.mwec.getValidator({required:['sku','qty'],short_hand:function(h){return('cartitem'in h)}}).run(pstr.mwec.getCurr());if(!p){wec.add({jserr:1});if(pstr.debug){pstr.util.e('WEC ERROR: wec.cart_remove() is missing required fields!')}}else{delete pstr.mwec.getCurr()['jserr']}pstr.mwec.s('cr');return p};wec.cart_reset=function(){wec.add.apply(null,arguments);pstr.mwec.obj_overwrite(pstr.mwec.getCurr(),'event','cart');pstr.mwec.obj_overwrite(pstr.mwec.getCurr(),'cart','reset');var h=pstr.mwec.getValidator({required:['cartitem']}).run(pstr.mwec.getCurr());if(!h){wec.add({jserr:1});if(pstr.debug){pstr.util.e('WEC ERROR: wec.cart_reset() is missing required fields!')}}else{delete pstr.mwec.getCurr()['jserr']}pstr.mwec.s('crs');return h};wec.order=function(){wec.add.apply(null,arguments);pstr.mwec.obj_overwrite(pstr.mwec.getCurr(),'event','order');var t=pstr.mwec.getValidator({required:['lineitems','order_total','order_id']}).run(pstr.mwec.getCurr());if(!t){wec.add({jserr:1});if(pstr.debug){pstr.util.e('WEC ERROR: wec.order() is missing required fields!')}}else{delete pstr.mwec.getCurr()['jserr']}var n=pstr.mwec.getOrderID();if(pstr.mwec.isRepeatOrder(n)){pstr.util.w('Detected repeat wec.order() event with order id ['+n+'] from existing order in cookie');pstr.mwec.s('or','&repeat_order=true');return false}if(pstr.util.isOffline()){pstr.util.w('Detected wec.order() event with order id ['+n+'] from a saved file');pstr.mwec.s('or','&offline_order=true');return false}var j=pstr.mwec.getCurr()['order_total'];var r="";if(j){r="&tpr="+pstr.util.rev(j)}var q=function(p,h){var a="";if(p){var m=p.split(';');for(ind=0,len=m.length;ind<len;ind++){a+=m[ind].split(',')[0]+","}if(h){a=a.substring(0,a.length-1)}}return a};if('lineitems'in pstr.mwec.getCurr()){var o=pstr.mwec.getCurr()['lineitems'];var k="";if(pstr.util.isArray(o)){for(var s=0,len=o.length;s<len;s++){if(o[s].indexOf(";")>-1){k+=q(o[s])}else{k+=o[s].split(',')[0]+','}}k=k.substring(0,k.length-1)}else{if(o.indexOf(";")>0){k=q(o,true)}else{k=o.split(',')[0]}}r+=pstr.mwec.wrapNkid(k)}var f=pstr.mwec.getCurr()['token'];if(f){r+="&label="+encodeURIComponent(f)}pstr.mwec.s('o',r);pstr.mwec.saveOrderID(n);return t};wec.register=function(){wec.add.apply(null,arguments);pstr.mwec.obj_overwrite(pstr.mwec.getCurr(),'event','register');var p=pstr.mwec.getValidator({required:['email','user_id'],short_hand:function(h){return('email'in h||'user_id'in h)}}).run(pstr.mwec.getCurr());if(!p){wec.add({jserr:1});if(pstr.debug){pstr.util.e('WEC ERROR: wec.register() is missing required fields!')}}else{delete pstr.mwec.getCurr()['jserr']}pstr.mwec.s('r');return p};wec.login=function(){wec.add.apply(null,arguments);pstr.mwec.obj_overwrite(pstr.mwec.getCurr(),'event','login');var m=pstr.mwec.getValidator({required:['login_type','login_id'],req_values:{'login_type':['email','user_id']},short_hand:function(h){for(var p in h){if(pstr.util.inarr(p,['email','user_id'])){return true}}return false}}).run(pstr.mwec.getCurr());if(!m){wec.add({jserr:1});if(pstr.debug){pstr.util.e('WEC ERROR: wec.login() is missing required fields!')}}else{delete pstr.mwec.getCurr()['jserr']}pstr.mwec.s('l');return m};if('__ps_validate'in pstr.util.params){wec.__validate(true)}}(function(){var p=function(){var h=wec.getParam('email');if(!h)h=wec.getParam('email_address');if(h){if('utm_medium'in pstr.util.params&&wec.getParam('utm_medium')=='email'){wec.send({event:'em_url',email:h})}}};var a=function(){if(pstr.auto_browse===true){pstr.util.log('Auto browsing current page');if(typeof ps_token_id!='undefined'){if(pstr.util.isEmpty(ps_token_id)){wec.add({token:""})}else{wec.add({token:pstr.util.trim(ps_token_id)})}}else{wec.add({page:'auto_browse'})}wec.browse()}};a();var m=function(){if(typeof _pswf=='string'&&typeof _pswa!='undefined'){_pswf=_pswf.toLowerCase();if(wec.hasOwnProperty(_pswf)&&pstr.util.inarr(_pswf,['browse','cart_insert','cart_remove','cart_reset','order','login','register','search'])){return wec[_pswf](_pswa)}}};m()})();