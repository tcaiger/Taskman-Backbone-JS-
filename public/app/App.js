
var app = (function() {

  var api = {

    view: {},
    model: {},
    collection: {},
    init: function(){
      var render = new app.view.Lists();
      return render;
    }
  }

  return api;

})();