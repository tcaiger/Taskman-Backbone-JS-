
app.view.Lists = Backbone.View.extend({

  el: '.list-container',

  template: _.template($('#list-tmp').html()),

  initialize: function () {
    this.collection = new app.collection.Lists();
    app.lists = this;
    this.collection.fetch(
      { 
        add: false,
        reset: true
      }
    );

    this.collection.on('reset', this.render, this);
    this.collection.on('add', this.renderNew, this);
  },

  
  render: function(){
    this.collection.each(function(list){
      var view = new app.view.List({
        model: list
      });
      this.$el.append(view.render().el);
      return this;
    }, this)
  },

  renderNew: function(){
    var id = this.collection.length-1;
    var newModel = this.collection.at(id);
    var view = new app.view.List({
      model: newModel
    });
    this.$el.append(view.render().el);
  },


  events: {
    'keypress #new-list'    : 'createOnEnter',
    'click #new-list+button': 'create'
  },


  createOnEnter: function(e){
     if(e.which ==13){
      this.create();
    }
  },

  create: function(){
    var newListInput = this.$('#new-list');
    this.collection.create(
      { name: newListInput.val() },
      { wait: true }
    );
    var array = this.collection.models;

    app.lists[array[array.length-1].id].rerender();
    newListInput.val('');
  }

});