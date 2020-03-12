/**
 * __DIR__ & __FILE__ for JavaScript (was tested in IE 7-10)
 * This definition must be inserted at root of script file, outside of any function.
 */

(function(w,d){
	var u=null;
	w.__FILE__=(function(){
		try{u();}catch(err){
			if(err.stack){
				u=(/(http[s]?:\/\/.*):\d+:\d+/m).exec(err.stack);
				if(u&&u.length>1){ return u[1]; }
			}
			u = (d.scripts.length>0) ? d.scripts[d.scripts.length-1].src : "";
			if (u.length > 0 && u.indexOf("://") < 0 && u.substring(0,1) != "/" ){
				u = location.protocol + "//" + location.host + "/" + u;
			}			
			return u;
		}
	})();
	w.__DIR__=(function(f){
		f=(/^(.*\/)[a-z0-9 -_]+\.[a-z]+$/i).exec(f);
		return (f&&f.length>1)?f[1]:"";
	})(w.__FILE__);
})(window, document);

console.log(__FILE__);
console.log(__DIR__);

  /* Setting __FILE__(asset/plugins/file) & __DIR__(asset/plugins) for jaquery.uploadfile.min.js */
  function getRootUrl() {
    // document.getElementById('rootresult').innerHTML += 
    return window.location.origin ?
      window.location.origin + '/' :
      window.location.protocol + '/' + window.location.host + '/';
  }

  function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
  }

  function domainname(path) {
    return path.replace(/\\/g, '/').replace(/\/[^/]*\/?$/, '')
  }

  function dirname(path) {
    return path.replace(/\\/g, '/').replace(/\/[^/]*\/?$/, '').replace(/^.*\/\/[^\/]+/, '')
  }

  function basename(path) {
    return path.replace(/.*\//, '');
  }